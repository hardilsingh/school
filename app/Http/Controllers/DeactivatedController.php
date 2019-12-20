<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class DeactivatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $results = Students::where('status' , 0)->paginate(6);
        return view('admin.deactivated.index' , compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function activate() {
        $id = $_GET['student_id'];
        Students::findOrFail($id)->update([
            'status'=>1,
        ]);

        session()->flash('updated', 'Student activated successfully');
        return redirect()->back();
    }

    public function deactivate() {
        $id = $_GET['student_id'];
        Students::findOrFail($id)->update([
            'status'=>0,
        ]);

        session()->flash('updated', 'Student deactivated successfully');
        return redirect()->back();
    }
}
