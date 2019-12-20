<?php

namespace App\Http\Controllers;

use App\CharacterCertificate;
use Illuminate\Http\Request;

use App\Students;
use App\Father;
use App\Mother;
use App\Grade;

class CcController extends Controller
{
    //

    public function index() {
        $certificates = CharacterCertificate::all();
        return view("admin.character-certificates.index" , compact("certificates"));
    }


public function create() {
        if (isset($_GET['student_id'])) {
            $id = $_GET['student_id'];
            $student = Students::findOrFail($id);
            return view("admin.character-certificates.create" , compact(['student' , 'father' , 'mother' , 'class']));
        }
    }


    public function store(Request $request) {

        CharacterCertificate::create($request->all());
        $request->session()->flash('created', "Character Certificate Created Successfully");
        return redirect('/character-certificates');

    }


    public function edit($id) {
        
        $certificate = CharacterCertificate::findOrFail($id);
        return view('admin.character-certificates.edit' , compact('certificate'));
    }

    public function update(Request $request , $id) {
        $certificate = CharacterCertificate::findOrFail($id);
        $certificate->update($request->all());
        $request->session()->flash('updated', "Updated Successfully");
        return redirect('/character-certificates');
    }


    public function destroy($id) {
        CharacterCertificate::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();

    }


    public function show($id) {
        $certificate = CharacterCertificate::findOrFail($id);
        return view('admin.forms.cc' , compact('certificate'));
    }
}
