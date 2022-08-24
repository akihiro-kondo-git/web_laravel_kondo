<?php
//--------------------------------------------------------------------------------------------------//
//---------------------------------------入力値の判定クラス------------------------------------------//
//--------------------------------------------------------------------------------------------------//


namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Message\Message;
use App\Http\Controllers\Validation\Check;
use App\Models\Employee;

class Validation
{
    //method: 登録の際の入力チェック
    public static function InputCheck()
    {

         //必須チェック
         $judge_Requisiton = Check::RequisitionCheck();
         //桁数チェック
         if($judge_Requisiton){$judge_Digit = Check::DigitCheck();}
         //最大桁数チェック
         $judge_MaxDigit = Check::MaxDigitCheck();
         //重複チェック
         $judge_Duplication = Check::DuplicationCheck();
         //書式チェック
         if($judge_Requisiton){$judge_Format = Check::FormatCheck();}
 

         //explain: チェックでfalseの場合は「社員登録画面」遷移
        if($judge_Requisiton == false
        || $judge_Digit == false
        || $judge_MaxDigit == false
        || $judge_Duplication == false
        || $judge_Format == false){
            return false;
        }
        //explain: 「登録結果画面」に遷移
         return true;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////

    //method: 更新の際の入力チェック
    public static function updateCheck()
    {

         //必須チェック
         $judge_Requisiton = Check::RequisitionCheck();
         //桁数チェック
         if($judge_Requisiton){$judge_Digit = Check::DigitCheck();}
         //最大桁数チェック
         $judge_MaxDigit = Check::MaxDigitCheck();
         //重複チェック
         $judge_Duplication = Check::DuplicationMailCheck();
         //書式チェック
         if($judge_Requisiton){$judge_Format = Check::FormatCheck();}
 

         //explain: チェックでfalseの場合は「社員編集画面」に遷移
        if($judge_Requisiton == false
        || $judge_Digit == false
        || $judge_MaxDigit == false
        || $judge_Duplication == false
        || $judge_Format == false){
            return false;
        }
        //explain: 「登録結果画面」に遷移
         return true;
    }
}