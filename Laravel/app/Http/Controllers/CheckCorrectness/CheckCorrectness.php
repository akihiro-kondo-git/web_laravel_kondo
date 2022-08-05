<?php

namespace App\Http\Controllers\CheckCorrectness;

class CheckCorrectness {

    static public function check(){

    //explain: 入力された値の取得
    $employee_id = $_GET['employee_id'];
    $family_name = $_GET['family_name'];
    $first_name = $_GET['first_name'];
    $belonging_section = $_GET['belonging_section'];
    $mail_address = $_GET['mail_address'];


    //learn:preg_matchメソッドは正規表現に合致する場合1、合致しない場合は0を返す 
    $correct_id = preg_match("/^[YZ]+([0-9]{8})/",$employee_id);
    $correct_address = preg_match("/^[a-zA-Z0-9_.+-]+[@]+[a-zA-Z0-9.-]+$/",$mail_address);


    //explain: 正規表現に合致しない場合はfalseを返す
    //explain: 正規表現に合致する場合はtrueを返す
    if($correct_id != 1 || $correct_address != 1){
        return false;
    }
    return true;
    }
}

