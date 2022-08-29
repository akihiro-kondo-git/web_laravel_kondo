<?php
namespace App\Http\Controllers\EmployeeData;

use App\Models\Employee;

//nethod: 社員一覧表示メソッド
class EmployeeAll
{

    // explain: 呼び出すメンバー変数を準備
    public static $employee_id = array();
    public static $family_name = array();
    public static $first_name = array();
    public static $section_name = array();
    public static $mail_address = array();
    public static $gender_name = array();
    public static $count;


    public static function setArray()
    {
        //explain: データベースからデータを取得
        $employee = new Employee();
        $employee_data = $employee->pdo_get_employee();

        //explain: 配列の数を確認
        self::$count = count($employee_data);

        //explain: 取得したデータを各変数に代入
        for ($i = 0; $i < count($employee_data); $i++) {
            array_push(self::$employee_id, $employee_data[$i][1]);
            array_push(self::$family_name, $employee_data[$i][2]);
            array_push(self::$first_name, $employee_data[$i][3]);
            array_push(self::$mail_address, $employee_data[$i][5]);

            //explain: 所属セクション名とセクションIDを合致
            $section_id = $employee_data[$i][4];
            if ($section_id == 1) {
                array_push(self::$section_name, "シス開");
            } else if ($section_id == 2) {
                array_push(self::$section_name, "グロカル");
            } else {
                array_push(self::$section_name, "ビジソル");
            }

            //explain: 性別名と性別IDを合致
            $gender_id = $employee_data[$i][6];
            if ($gender_id == 1) {
                array_push(self::$gender_name, "男性");
            } else {
                array_push(self::$gender_name, "女性");
            }
        }
    }
}