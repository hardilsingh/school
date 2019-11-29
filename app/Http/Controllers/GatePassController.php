<?php

namespace App\Http\Controllers;

use App\GatePass;
use App\Students;
use App\Father;
use App\Mother;
use App\Grade;
use Illuminate\Http\Request;

class GatePassController extends Controller
{
    //

    public function index()
    {
        $passes = GatePass::all();
        return view("admin.gate-pass.index" , compact('passes'));
    }


    public function create()
    {
        if (isset($_GET['student_id'])) {
            $id = $_GET['student_id'];
            $student = Students::findOrFail($id);
            $father = Father::findOrFail($student->father);
            $mother = Mother::findOrFail($student->mother);
            $class = Grade::findOrFail($student->class);
            return view("admin.gate-pass.create", compact(['student', 'father', 'mother', 'class']));
        }
    }


    public function store(Request $request)
    {
        GatePass::create($request->all());
        $request->session()->flash('created', "Gate Pass issued successfully");
        return redirect('/gate-passes');
    }

    public function destroy($id)
    {
        GatePass::findOrFail($id)->delete();
        session()->flash('deleted', "Gate Pass deleted Successfully");
        return redirect()->back();
    }

    public function edit($id)
    {
        $pass = GatePass::findOrFail($id);
        return view('admin.gate-pass.edit' , compact(['pass']));
    }

    public function update(Request $request, $id)
    {
        $pass = GatePass::findOrFail($id);
        $pass->update($request->all());
        $request->session()->flash('updated', "Pass updated successfully");
        return redirect('/gate-passes');
    }
}
