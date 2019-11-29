<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //

    public function index() {
        return view("admin.annual-expenses.index");
    }

    
    public function create() {
        return view("admin.annual-expenses.create");
    }
}
