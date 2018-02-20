<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use App\Http\Requests\TemplateRequest;

class TemplateController extends Controller
{
    private $view_folder = 'template';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Template $item)
    {
       $items = $item->owned()->get();
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
    public function store(Template $item, TemplateRequest $request)
    {
        $item->create($request->all());
        return redirect()->route($this->view_folder . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Template::owned()->findOrFail($id);
        return view($this->view_folder . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Template::owned()->findOrFail($id);
        return view($this->view_folder.'.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, Template $item, $id)
    {
        $item->findOrFail($id)->update($request->all());
        return redirect()->route( $this->view_folder . '.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route($this->view_folder . '.index');
    }
}
