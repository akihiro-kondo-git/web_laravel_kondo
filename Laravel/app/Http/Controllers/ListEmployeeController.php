<?php
//--------------------------------------------------------------------------------------------------//
//-----------------------------------社員一覧画面へのコントローラー-----------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ListEmployeeController extends Controller
{
    public function index(){
        
        //explain: 社員一覧画面へ遷移
         return view('list-employee');
    }

}