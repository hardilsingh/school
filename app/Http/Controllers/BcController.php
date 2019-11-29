<?php

namespace App\Http\Controllers;

use App\BirthCertificate;
use App\Father;
use App\Grade;
use App\Mother;
use App\Students;
use Illuminate\Http\Request;

class BcController extends Controller
{
    //

    public function index()
    {
        $certificates = BirthCertificate::all();
        return view("admin.birth-certificates.index" , compact('certificates'));
    }


    public function create()
    {

        if (isset($_GET['student_id'])) {
            $id = $_GET['student_id'];
            $student = Students::findOrFail($id);
            $father = Father::findOrFail($student->father);
            $mother = Mother::findOrFail($student->mother);
            $class = Grade::findOrFail($student->class);
            return view("admin.birth-certificates.create" , compact(['student' , 'father' , 'mother' , 'class']));
        }
    }


    public function store(Request $request) {


        BirthCertificate::create($request->all());
        $request->session()->flash('created', "Birth Certificate Created Successfully");
        return redirect('/birth-certificates');

    }


    public function edit($id) {
        
        $certificate = BirthCertificate::findOrFail($id);
        return view('admin.birth-certificates.edit' , compact('certificate'));
    }

    public function update(Request $request , $id) {
        $certificate = BirthCertificate::findOrFail($id);
        $certificate->update($request->all());
        $request->session()->flash('updated', "Updated Successfully");
        return redirect('/birth-certificates');
    }


    public function destroy($id) {
        BirthCertificate::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted Successfully');
        return redirect()->back();

    }


    public function show($id) {
        $certificate = BirthCertificate::findOrFail($id);
        return view('admin.forms.bc' , compact('certificate'));
    }
}
