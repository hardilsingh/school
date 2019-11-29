<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::all();
        return view('admin.sections.index', compact("sections"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = Grade::pluck("class", "id");
        return view('admin.sections.create', compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $input = $request->all();
        // //
        Section::create([
            'grade_id'=>$request->grade_id,
            'name'=>$request->name,
            'capacity'=>$request->capacity
        ]);
        $request->session()->flash('created', "Section created successfully");
        return redirect("/sections");

        // return $input['grade_id'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $section = Section::findOrFail($id);
        $classes = Grade::pluck('class' , 'id');

        return view('admin.sections.edit' , compact('section' , 'classes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $section = Section::findOrFail($id);
        $section->update($request->all());
        $request->session()->flash('updated', 'Updated Successfully');
        return redirect('/sections');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Section::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();
    }
}
