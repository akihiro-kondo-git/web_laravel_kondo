<?php
//--------------------------------------------------------------------------------------------------//
//---------------------------入力値のチェックメソッドをまとめたクラス----------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Http\Controllers\Validation;
use App\Http\Controllers\Message\Message;
use App\Models\Employee;

class Check

{
    //method: 必須チェック
    public static function RequisitionCheck()
    {

        //explain: 入力された値の取得
        // $employee_id = $_POST['employee_id'];
        // $family_name = $_POST['family_name'];
        // $first_name = $_POST['first_name'];
        // $section_id = $_POST['section_id'];
        // $mail_address = $_POST['mail_address'];
        //$gender_id = $_POST['gender_id'];

        //explain: エラーメッセージの表示
        if (empty($_POST['employee_id'])) {Message::pushMessage("社員IDを入力してください");}
        if (empty($_POST['family_name'])) {Message::pushMessage("社員名(性)を入力してください");}
        if (empty($_POST['first_name'])) {Message::pushMessage("社員名(名)を入力してください");}
        if (empty($_POST['section_id'])) {Message::pushMessage("所属セクションを入力してください");}
        if (empty($_POST['mail_address'])) {Message::pushMessage("メールアドレスを入力してください");}
        if (empty($_POST['gender_id'])) {Message::pushMessage("性別を入力してください");}

        //explain: 入力されていない場合は「社員登録画面」に遷移
        //          入力されている場合は「登録結果画面」に遷移
        if (empty($_POST['employee_id'])
            || empty($_POST['family_name'])
            || empty($_POST['first_name'])
            || empty($_POST['section_id'])
            || empty($_POST['mail_address'])
            || empty($_POST['gender_id'])) {
            return false;
        }
        return true;
    }

     //////////////////////////////////////////////////////////////////////////////////////////////////////
    //桁数チェック
    public static function DigitCheck()
    {
        //explain: 入力された値の取得
        $employee_id = $_POST['employee_id'];

        //explain: エラーメッセージの表示
        if (strlen($employee_id) < 10
            || strlen($employee_id) > 10) {
            Message::pushMessage("社員IDは10文字で入力してください");
            return false;
        }
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //method: 最大桁数チェック
    public static function MaxDigitCheck()
    {

        //explain: 入力された値の取得
        $family_name = $_POST['family_name'];
        $first_name = $_POST['first_name'];
        $mail_address = $_POST['mail_address'];

        //explain: エラーメッセージの表示
        if (strlen($family_name) > 25) {Message::pushMessage("社員名(性)は25文字以内で入力してください");}
        if (strlen($first_name) > 25) {Message::pushMessage("社員名(名)は25文字以内で入力してください");}
        if (strlen($mail_address) > 256) {Message::pushMessage("メールアドレスは256文字以内で入力してください");}

        //explain: 最大桁数以上の場合は「社員登録画面」に遷移
        //          適切な入力の場合は「登録結果画面」に遷移
        if (strlen($family_name) > 25
            || strlen($first_name) > 25
            || strlen($mail_address) > 256) {
            return false;
        }

        return true;
    }
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //method: 重複チェック
    public static function DuplicationCheck()
    {
        $judge_employee_id = true;
        $judge_mail_address = true;

        //explain: 入力された値の取得
        $employee_id = $_POST['employee_id'];
        $mail_address = $_POST['mail_address'];

        //explain: データベースからデータを取得
        $employee = new Employee();
        $employee_data = $employee->pdo_get_employee();

        //explain: 社員データと入力されたデータの重複判定
        for ($i = 0; $i < count($employee_data); $i++) {
            $database_employee_id = $employee_data[$i][1];
            $database_mail_address = $employee_data[$i][5];


            //Todo: 別々の社員の社員IDとメールアドレスが既に存在している場合に、エラーメッセージを片方しか表示できていない
            //explain: エラーメッセージの表示
            if ($database_employee_id == $employee_id) {
                $judge_employee_id = false;
                Message::pushMessage("入力した社員IDはすでに登録されています");}
            if ($database_mail_address == $mail_address) {
                $judge_mail_address = false;
                Message::pushMessage("入力したメールアドレスはすでに登録されています");
            }

           
            
        }
            //explain: 重複項目がある場合は「社員登録画面」に遷移
            //         重複が無い場合は「登録結果画面」に遷移
            if (!$judge_employee_id || !$judge_mail_address) {
                return false;
            }
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //method: 重複チェック
    public static function DuplicationMailCheck()
    {
        $judge_mail_address = true;

        //explain: 入力された値の取得
        $mail_address = $_POST['mail_address'];

        //explain: データベースからデータを取得
        $employee = new Employee();
        $employee_data = $employee->pdo_get_employee();

        //explain: セッション情報と入力値の判定
        if(session()->get('mail_address') != $mail_address){

        //explain: 社員データと入力されたデータの重複判定
        for ($i = 0; $i < count($employee_data); $i++) {
            $database_mail_address = $employee_data[$i][5];

            //explain: エラーメッセージの表示
            if ($database_mail_address == $mail_address) {
                $judge_mail_address = false;
                Message::pushMessage("入力したメールアドレスはすでに登録されています");
            }
        }
            //explain: 重複項目がある場合は「社員編集画面」に遷移
            //         重複が無い場合は「登録結果画面」に遷移
            if (!$judge_mail_address) {
                return false;
            }
        }
        return true;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //method: 書式チェック
    public static function FormatCheck()
    {

        //explain: 入力された値の取得
        $employee_id = $_POST['employee_id'];
        $section_id = $_POST['section_id'];
        $mail_address = $_POST['mail_address'];
        $gender_id = $_POST['gender_id'];

        //explain: 正規表現での書式判定
        $correct_employee_id = preg_match("/^[YZ]+([0-9]{8})/", $employee_id);
        $correct_section_id = preg_match("/[1-3]/", $section_id);
        $correct_mail_address = preg_match("/^[a-zA-Z0-9_.+-]{1,256}+[@]+[a-zA-Z0-9.-]{1,256}+$/", $mail_address); 
        $correct_gender_id = preg_match("/[1-2]/", $gender_id);
        $validation_check = $correct_employee_id + $correct_section_id + $correct_mail_address + $correct_gender_id;

        //explain: エラーメッセージの表示
        if ($correct_employee_id == 0) {Message::pushMessage("社員IDを正しく入力してください");}
        if ($correct_section_id == 0) {Message::pushMessage("所属セクションを正しく入力してください");}
        if ($correct_mail_address == 0) {Message::pushMessage("メールアドレスを正しく入力してください");}
        if ($correct_gender_id == 0) {Message::pushMessage("性別を正しく入力してください");}

        //explain: 正規表現に合致しない場合は「社員登録画面」に遷移
        //                  合致する場合は「登録結果画面」に遷移
        if ($validation_check != 4) {
            return false;
        }
        return true;
    }
}






