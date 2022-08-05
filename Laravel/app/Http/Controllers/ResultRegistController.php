<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\CheckCorrectness\CheckCorrectness;

class ResultRegistController extends Controller
{
    public function index(){
        
        //explain: 正規表現に合致しない場合は「社員登録画面に遷移」
        //explain: 正規表現に合致する場合は「登録結果画面に遷移」
        if(CheckCorrectness::check() == false){
            return view('regist-employee');
        }
        return view('result-regist');
    }
}