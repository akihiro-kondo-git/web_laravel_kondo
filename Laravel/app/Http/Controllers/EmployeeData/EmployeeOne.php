<?php
//--------------------------------------------------------------------------------------------------//
//----------------------------------社員の詳細情報をセットするクラス----------------------------------//
//--------------------------------------------------------------------------------------------------//

namespace App\Http\Controllers\EmployeeData;
use App\Models\Employee;

class EmployeeOne
{

    public static $employee_id;
    public static $employee_name;
    public static $family_name;
    public static $first_name;
    public static $section_name;
    public static $section_id;
    public static $mail_address;
    public static $gender_name;
    public static $gender_id;

    //method: 社員情報のセットメソッド
    public static function setInfo($id)
    {
        //explain: データの取得
        //(PDOを利用しない場合:「get_Info($id)」メソッドを利用)
        $employee_data = Employee::pdo_get_info($id);

        //explain: 社員ID・社員名・メールアドレスのセット
        self::$employee_id = $employee_data[1];
        self::$employee_name = $employee_data[2].$employee_data[3];
        self::$mail_address = $employee_data[5];
        self::$family_name = $employee_data[2];
        self::$first_name = $employee_data[3];

        //explain: 所属セクション名とセクションIDを合致
        self::$section_id = $employee_data[4];
        if (self::$section_id == 1) {
            self::$section_name = "シス開";
        } else if (self::$section_id == 2) {
            self::$section_name = "グロカル";
        } else {
            self::$section_name = "ビジソル";
        }

        //explain: 性別名と性別IDを合致
        self::$gender_id = $employee_data[6];

        if (self::$gender_id == 1) {
            self::$gender_name = "男性";
        } else {
            self::$gender_name = "女性";
        }

    }


}
