<?php
//--------------------------------------------------------------------------------------------------//
//-----------------------------------社員参照画面へのコントローラー-----------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmployeeData\EmployeeOne;
class ReferEmployeeController extends Controller
{
    public function index(){

        //explain: 社員情報をセットする
        $id = $_GET['employee_id'];
        EmployeeOne::setInfo($id);

        //explain: 社員参照画面へ遷移
        return view('refer-employee');
    }

}