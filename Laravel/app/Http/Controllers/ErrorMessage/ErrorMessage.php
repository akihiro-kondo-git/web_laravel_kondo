<?php
namespace App\Http\Controllers\ErrorMessage;

class ErrorMessage{
    static $errorMessage = array();
    static public $resultMessage = "";

    //explain: 表示するエラーメッセージを配列に格納
    static function pushMessage($message){
        
        array_push(self::$errorMessage, $message);
        
    }
    //explain: 表示する登録完了メッセージをセット
    static function setMessage($message){

        self::$resultMessage = $message; 

    }
}