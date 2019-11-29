<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TcController extends Controller
{
    //

    public function index() {
        return view("admin.transfer-certificates.index");
    }



    public function create() {
        return view('admin.transfer-certificates.create');
    }


    public function store(Request $request) {
        
    }
}
