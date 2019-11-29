<?php

namespace App\Http\Controllers;

use App\Concession;
use Illuminate\Http\Request;

class ConcessionController extends Controller
{
    //


    public function index() {
        $concessions = Concession::all();
        return view('admin.concession.index' , compact('concessions'));
    }

    public function create() {
        return view('admin.concession.create');
    }

    public function store(Request $request) {
        Concession::create($request->all());
        $request->session()->flash('created', 'Created Successfully');
        return redirect('/concession');
    } 

    public function edit($id) {
        $concession =Concession::findOrFail($id);
        return view('admin.concession.edit' , compact('concession'));
    } 

    public function update(Request $request , $id) {
        Concession::findOrFail($id)->update($request->all());
        $request->session()->flash('updated', 'Updated Successfully');
        return redirect('/concession');
    } 

    public function destroy($id) {
        Concession::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted successfully');
        return redirect()->back();
    }
}
