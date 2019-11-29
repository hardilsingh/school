<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Section;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Grade::all();
        return view('admin.classes.index' , compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.classes.create');
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

        Grade::create($request->all());
        $request->session()->flash('created', "Class created successfully");
        return redirect("/classes");

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            $grade = Grade::findOrFail($id);
            return view('admin.classes.edit' , compact('grade'));
            
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        //
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
        $request->session()->flash('updated', 'Class name updated successfully');
        return redirect('/classes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Grade::findOrFail($id)->delete();
        Section::where('grade_id' , $id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();
    }
}
