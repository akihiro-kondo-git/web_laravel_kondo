<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RegistEmployeeController extends Controller
{
    public function index(){

        return view('regist-employee');
    }

}