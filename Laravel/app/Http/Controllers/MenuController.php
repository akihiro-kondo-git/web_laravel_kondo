<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        
        //メニュー画面へ遷移
        return view('menu');
    }

}