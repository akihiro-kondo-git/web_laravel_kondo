<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferEmployeeController extends Controller
{
    public function index(){
        return view('refer-employee');
    }

}