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
        $concession = Concession::pluck('name', 'concession');
        return view('admin.fee.manage', compact(['student', 'fee' ,  'concession']));
    }

    public function updateConcession(Request $request)
    {

        Fee::findOrFail($request->id)->update([
            'concession' => $request->concession
        ]);
    }


    public function feeForm()
    {


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $quater = $_GET['quater'];

            $student = Students::findOrFail($id);
            $fee = Fee::where('student_id', $student->id)->first();
            $station = Station::find($student->station);
            $section = Section::findOrFail($student->section);
            $father = Father::findOrFail($student->father);
            $concession = Concession::pluck('name', 'concession');
            return view('admin.fee.form', compact(['student', 'quater', 'section', 'father', 'concession', 'station', 'fee']));
        };

        $sectionData['data'] = 0;

        echo json_encode($sectionData);
        exit;
    }


    public function saveData()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $quater = $_GET['quater'];
            $balance = $_GET['balance'];

            $student = Students::findOrFail($id);
            $fee = Fee::where('student_id', $student->id)->first();



            if ($quater == 1) {

                $fee->update([
                    'q1' => $balance == 0 ? 1 : 0,
                    'balance1' => $balance
                ]);
            } else if ($quater == 2) {
                $fee->update([
                    'q2' => $balance == 0 ? 1 : 0,
                    'balance2' => $balance
                ]);
            } else if ($quater == 3) {
                $fee->update([
                    'q3' => $balance == 0 ? 1 : 0,
                    'balance3' => $balance
                ]);
            } else if ($quater == 4) {
                $fee->update([
                    'q4' => $balance == 0 ? 1 : 0,
                    'balance4' => $balance
                ]);
            }


            $sectionData['data'] = 0;
            echo json_encode($sectionData);
            exit;
        }
    }
}
