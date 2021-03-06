<?php

namespace App\Http\Controllers;

use App\Bunch;
use Illuminate\Http\Request;
use App\Http\Requests\BunchRequest;
use App\Subscriber;
use Hash;

class BunchController extends Controller
{   
    /**
     * Bunch может принадлежать только одной кампании
     */

     private $view_folder = 'bunch';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bunch $item)
    {
       $items = $item->owned()->get();//with('subscribers')->
       
       return view($this->view_folder.'.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subscriber $subscribers)
    {
        $subscribers = $subscribers->getSelectList();
        $selected_subs = [1];
        return view( $this->view_folder.'.create', compact(['subscribers', 'selected_subs']) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch
            ->create($request->except('subscriber_id'))
            ->subscribers()
            ->sync($request->subscriber_id);

        return redirect()->route($this->view_folder . '.index')->with('message', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bunch  $template
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Bunch::owned()->findOrFail($id);
        return view($this->view_folder . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bunch  $template
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Bunch::owned()->findOrFail($id);
        $subscribers = Subscriber::getSelectList();


        $selected_subs = Bunch::selected($id, 'subscribers', $subscribers, 'name');
        //$this->getSelectedSubscribers($item, $subscribers);

        return view($this->view_folder.'.edit', compact(['item', 'subscribers', 'selected_subs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bunch  $template
     * @return \Illuminate\Http\Response
     */
    public function update(BunchRequest $request, Bunch $item, $id)
    {
        $item
            ->find($id)
            ->subscribers()
            ->sync($request->subscriber_id);

        // $item->find($id)->update($request->except('subscriber_id'));

        return redirect()->route( $this->view_folder . '.index' )->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bunch  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch)
    {
        $bunch->delete();
        return redirect()->route($this->view_folder . '.index')->with('message', 'Successfully deleted');
    }

    public function unsubscribe($id, $subscriber_id)
    {
        $hash = $_GET['hash'];

        $bunch = Bunch::findOrFail($id);
        $subscriber = $bunch->subscribers()->where('hash', $hash)->findOrFail($subscriber_id);

        if ( $subscriber->hash != $hash) {
            abort(403);
        }

        Bunch::findOrFail($id)
            ->subscribers()
            ->detach($subscriber_id);

        return view($this->view_folder . '.unsubscribe', compact('bunch'));

    }

}
