<?php

namespace App\Http\Controllers;

use App\Concession;
use App\Father;
use App\Fee;
use App\Grade;
use App\Reciept;
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
        $reciepts = Reciept::orderBy('id' , 'DESC')->paginate(3);
        return view('admin.fee.index', compact("classes" , 'reciepts'));
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

        Fee::findOrFail($id)->update($request->except('particulars' , 'fee' , 'paid' , 'student_id'));

        $particulars = explode(",", $request->particulars);
        $fee = explode(",", $request->fee);
        $paid = $request->paid;
        $outstanding = $request->outstanding;
        $student_id = $request->student_id;

        $reciept = Reciept::create([
            'student_id'=>$student_id,
            'paid'=>$paid,
            'outstanding'=>$outstanding,
            'particulars'=>serialize($particulars),
            'fee'=>serialize($fee),
        ]);

        $request->session()->flash('updated', 'updated');
        return redirect('/reciepts/'.$reciept->id);


        
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
        $fee = Fee::where('student_id', $student_id)->first();
        $concession = Concession::pluck('name', 'id');
        $reciepts = Reciept::where('student_id' , $student_id)->get();


        if ($fee->concession == null) {
            $fee_concession = null;
            return view('admin.fee.manage', compact(['student', 'fee',  'concession', 'fee_concession' , 'reciepts']));
        } else {
            $fee_concession = Concession::findOrFail($fee->concession);
            return view('admin.fee.manage', compact(['student', 'fee',  'concession', 'fee_concession' , 'reciepts']));
        }
    }

    public function updateConcession()
    {

        $id = $_GET['id'];
        $con_id = $_GET['con_id'];
        $fee = Fee::where('student_id', $id);
        $fee->update([
            'concession' => $con_id,
        ]);
        session()->flash('updated', 'success');

        $sectionData['data'] = 0;
        echo json_encode($sectionData);
        exit;
    }

    public function exempt()
    {
        $name = $_GET['name'];
        $id = $_GET['id'];

        Fee::findOrFail($id)->update([
            $name => 1,
        ]);

        session()->flash('updated', 'success');
        return redirect()->back();
    }
}
