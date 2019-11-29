<?php

namespace App\Http\Controllers;

use App\Concession;
use App\Father;
use App\Fee;
use App\Grade;
use App\Section;
use App\Station;
use App\Students;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Grade::pluck('class', 'id');
        return view('admin.fee.index', compact("classes"));
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


    public function manage($student_id)
    {


        $student = Students::findOrFail($student_id);
        $fee = Fee::where('student_id', $student->id)->first();
        $station = Station::find($student->station);
        $section = Section::findOrFail($student->section);
        $father = Father::findOrFail($student->father);
        $concession = Concession::pluck('name', 'concession');
        return view('admin.fee.manage', compact(['student', 'section', 'father', 'concession', 'station', 'fee']));
    }

    public function updateConcession(Request $request)
    {

        Fee::findOrFail($request->id)->update([
            'concession'=>$request->concession
        ]);
    }
}
