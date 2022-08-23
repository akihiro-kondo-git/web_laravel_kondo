<?php
//--------------------------------------------------------------------------------------------------//
//-----------------------------------社員編集画面へのコントローラー-----------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditEmployeeController extends Controller
{
    public function index(){
        
        //explain: 社員編集画面へ遷移
        return view('edit-employee');
    }
}
