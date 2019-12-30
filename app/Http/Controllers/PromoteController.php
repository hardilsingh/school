<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Grade;
use App\Students;

class PromoteController extends Controller
{
    //

    public function index() {
        $classes = Grade::pluck('class', 'id');
        return view('admin.promote.index', compact("classes"));
    } 

    public function promote() {
        $cc = $_GET['cc'];
        $cs = $_GET['cs'];
        $nc = $_GET['nc'];
        $ns = $_GET['ns'];

        $students = Students::where('class' , $cc)->where('section' , $cs);
        $students->update([
            'class'=>$nc,
            'section'=>$ns
        ]);

        session()->flash('updated', 'success');
        
        $sectionData = 0;
        echo json_encode($sectionData);
        exit;
    }
}
