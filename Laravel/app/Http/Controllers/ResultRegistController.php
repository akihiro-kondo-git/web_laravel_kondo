<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Validation\Validation;
use App\Models\Employee;

class ResultRegistController extends Controller
{
    public function index(){
        
        //explain: サーバーサイドでの入力チェックエラーの場合は「社員登録画面」に遷移
        if(Validation::InputCheck() == false){
            return view('regist-employee');
        }

        //explain: 社員の登録
        if(Validation::InputCheck() == true){
            $employee = new Employee;
            $employee->regist_employee();
        }
        
        //explain: 「登録結果画面」に遷移
        return view('result-regist');
    }
}