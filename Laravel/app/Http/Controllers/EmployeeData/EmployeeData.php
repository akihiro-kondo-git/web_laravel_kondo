<?php
namespace App\Http\Controllers\EmployeeData;
use App\Models\Employee;

class EmployeeData
{

    public static $employee_id;
    public static $employee_name;
    public static $section_name;
    public static $mail_address;
    public static $gender;

    //method: 社員情報のセットメソッド
    public static function setInfo($id)
    {
        $employee_data = Employee::get_Info($id);

        //explain: 社員ID・社員名・メールアドレスのセット
        self::$employee_id = $employee_data[1];
        self::$employee_name = $employee_data[2].$employee_data[3];
        self::$mail_address = $employee_data[5];

        //explain: 所属セクション名とセクションIDを合致
        $section_id = $employee_data[4];
        if ($section_id == 1) {
            self::$section_name = "シス開";
        } else if ($section_id == 2) {
            self::$section_name = "グロカル";
        } else {
            self::$section_name = "ビジソル";
        }

        //explain: 性別名と性別IDを合致
        $gender_id = $employee_data[6];

        if ($gender_id == 1) {
            self::$gender = "男性";
        } else {
            self::$gender = "女性";
        }

    }


}
