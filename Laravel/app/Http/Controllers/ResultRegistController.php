<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\CheckCorrectness\CheckCorrectness;
use App\Models\Employee;

class ResultRegistController extends Controller
{
    public function index(){
        
        //explain: 正規表現に合致しない場合は「社員登録画面に遷移」
        if(CheckCorrectness::check() == false){
            return view('regist-employee');
        }
        //explain: 社員の登録
        if(CheckCorrectness::check() ==true){
            $employee = new Employee;
            $employee->regist_employee();
        }
        //explain: 正規表現に合致する場合は「登録結果画面に遷移」
        return view('result-regist');
    }
}