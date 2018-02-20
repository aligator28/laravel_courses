<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;

class SubscriberController extends Controller
{
    private $view_folder = 'subscriber';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subscriber $item)
    {
       $items = $item->get();
       return view($this->view_folder.'.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_folder.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscriber $item, SubscriberRequest $request)
    {
        $item->create($request->all());
        return redirect()->route($this->view_folder . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $template
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Subscriber::findOrFail($id);
        return view($this->view_folder . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $template
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Subscriber::findOrFail($id);
        return view($this->view_folder.'.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $template
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Subscriber $item, $id)
    {
        $item->findOrFail($id)->update($request->all());
        return redirect()->route( $this->view_folder . '.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route($this->view_folder . '.index');
    }
}
