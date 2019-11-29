<?php

namespace App\Http\Controllers;

use App\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $streams = Stream::all();
        return view("admin.streams.index" , compact(['streams']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.streams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Stream::create($request->all());
        $request->session()->flash('created', "Stream created successfully");
        return redirect("/streams");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $stream = Stream::findOrFail($id);
        return view('admin.streams.edit' , compact('stream'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $stream = Stream::findOrFail($id);
        $stream->update($request->all());
        $request->session()->flash('updated', "Updated Successfully");
        return redirect('/streams');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $stream = Stream::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();
    }
}
