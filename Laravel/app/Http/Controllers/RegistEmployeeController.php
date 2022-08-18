<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RegistEmployeeController extends Controller
{
    public function index(){

        //社員登録画面へ遷移
        return view('regist-employee');
    }

}