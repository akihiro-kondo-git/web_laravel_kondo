<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmployeeData\EmployeeData;
class ReferEmployeeController extends Controller
{
    public function index(){

        //explain: 社員情報をセットする
        $id = $_GET['employee'];
        EmployeeData::setInfo($id);

        //explain: 社員参照画面へ遷移
        return view('refer-employee');
    }

}