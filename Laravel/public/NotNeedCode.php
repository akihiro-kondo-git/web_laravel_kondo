<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------今後利用するかもしれないコードの補完クラス----------------------------//
//--------------------------------------------------------------------------------------------------//



//     public static $employee_data = array();
//     public static $employee_id = array();
//     public static $family_name = array();
//     public static $first_name = array();
//     public static $section_name = array();
//     public static $mail_address = array();
//  public static $gender = array();


// public static $sec_name = array();
// public static $gen_name = array();
// public static $emp_id = array();
// public static $fam_name = array();
// public static $fir_name = array();
// public static $sec_id = array();
// public static $mail = array();
// public static $gen_id = array();



//     public static function setInfo()
//     {

//         $employee_data = Employee::get_employee();

//         //explain: 取得したデータを各変数に代入
//         for ($i = 0; $i < count($employee_data); $i++) {
//             array_push(self::$emp_id, $employee_data[$i][1]);
//             array_push(self::$fam_name, $employee_data[$i][2]);
//             array_push(self::$fir_name, $employee_data[$i][3]);
//             array_push(self::$sec_id, $employee_data[$i][4]);
//             array_push(self::$mail, $employee_data[$i][5]);
//             array_push(self::$gen_id, $employee_data[$i][6]);
//         }
//             for ($i = 0; $i < count(self::$emp_id); $i++){

//             //explain: 所属セクション名とセクションIDを合致
//             if (self::$sec_id[$i] == 1) {
//                 array_push(self::$sec_name, "シス開");
//             } else if (self::$sec_id == 2) {
//                 array_push(self::$sec_name,"グロカル");
//             } else {
//                 array_push(self::$sec_name, "ビジソル");
//             }

//             //explain: 性別名と性別IDを合致
//             if (self::$gen_id[$i] == 1) {
//                 array_push(self::$gen_name, "男性");
//             } else {
//                 array_push(self::$gen_name, "女性");
//             }

//             array_push(self::$employee_id, self::$emp_id[$i]);
//             array_push(self::$family_name, self::$fam_name[$i]);
//             array_push(self::$first_name, self::$fir_name[$i]);
//             array_push(self::$section_name, self::$sec_name[$i]);
//             array_push(self::$mail_address, self::$mail[$i]);
//             array_push(self::$gender, self::$gen_name[$i]);
// }

//         }

    

// }

// <?php
// namespace App\Http\Controllers\EmployeeData;
// use App\Models\Employee;
// //現在利用していません(08/17)
// class OneEmployee
// {

//     public static $employee_id;
//     public static $employee_name;
//     public static $section_name;
//     public static $mail_address;
//     public static $gender;

//     public static function setInfo($id)
//     {
//         $employee_data = Employee::get_Info($id);

//         self::$employee_id = $employee_data[1];
//         self::$employee_name = $employee_data[2].$employee_data[3];
//         self::$mail_address = $employee_data[5];

// //explain: 所属セクション名とセクションIDを合致
//         $section_id = $employee_data[4];
//         if ($section_id == 1) {
//             self::$section_name = "シス開";
//         } else if ($section_id == 2) {
//             self::$section_name = "グロカル";
//         } else {
//             self::$section_name = "ビジソル";
//         }

// //explain: 性別名と性別IDを合致
//         $gender_id = $employee_data[6];

//         if ($gender_id == 1) {
//             self::$gender = "男性";
//         } else {
//             self::$gender = "女性";
//         }

//     }


// }

