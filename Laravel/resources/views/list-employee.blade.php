<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員一覧画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
use App\Http\Controllers\EmployeeData\EmployeeAll;
EmployeeAll::setArray();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <title>社員一覧画面</title>
</head>

<body>
<table>
            <tr>
                <td>&nbsp;社員ID</td>
                <td>&emsp;社員名</td>
                <td>&emsp;所属セクション</td>
                <td>&emsp;メールアドレス</td>
                <td>&emsp;性別</td>
            </tr>

            <!-- explain: 社員一覧を表示 -->
            <?php for ($i = 0; $i < EmployeeAll::$count; $i++):?>

	        <tr>
	        <td>
	        <form action = http://192.168.56.56/refer-employee name = employee method = GET>
	            <button type = submit class = link-style name = employee value = <?php echo EmployeeAll::$employee_id[$i] ?>>
	            <?php echo EmployeeAll::$employee_id[$i] ?>
                </button>
            </form>
            </td>
	        <td>&emsp;<?php echo EmployeeAll::$family_name[$i] ?><?php echo EmployeeAll::$first_name[$i] ?></td>
	        <td>&emsp;<?php echo EmployeeAll::$section_name[$i] ?></td>
	        <td>&emsp;<?php echo EmployeeAll::$mail_address[$i] ?></td>
	        <td>&emsp;<?php echo EmployeeAll::$gender_name[$i] ?></td>
	        </tr>

	        <?php endfor;?>

        </table>
    <br>
    <a href = "{{route('regist-employee')}}">社員登録画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>





<!-- 以下php -->





<?php

// use App\Models\Employee;

// //method: 社員一覧表示メソッド

// //explain: データベースからデータを取得
// //(PDOを利用しない場合:「get_employee()」メソッドを利用)

//     $employee = new Employee();
//     $employee_data = $employee->pdo_get_employee();

// //explain: 取得したデータを各変数に代入
//     for ($i = 0; $i < count($employee_data); $i++) {
//         $employee_id = $employee_data[$i][1];
//         $family_name = $employee_data[$i][2];
//         $first_name = $employee_data[$i][3];
//         $section_id = $employee_data[$i][4];
//         $mail_address = $employee_data[$i][5];
//         $gender_id = $employee_data[$i][6];

//         //explain: 所属セクション名とセクションIDを合致
//         if ($section_id == 1) {
//             $section_name = "シス開";
//         } else if ($section_id == 2) {
//             $section_name = "グロカル";
//         } else {
//             $section_name = "ビジソル";
//         }

//         //explain: 性別名と性別IDを合致
//         if ($gender_id == 1) {
//             $gender_name = "男性";
//         } else {
//             $gender_name = "女性";
//         }

// //explain 社員データの表示 origin
// echo '<tr>';
// echo "<td><form action = http://192.168.56.56/refer-employee
//     name = employee method = GET>
//     <button type = submit class = link-style name = employee
// value = $employee_id>$employee_id</button></form></td>
// <td>&emsp;$family_name$first_name</td>
// <td>&emsp;$section_name</td>
// <td>&emsp;$mail_address</td>
// <td>&emsp;$gender_name</td>";
// echo '</tr>';

//explain 社員データの表示

// }
//}
//?>

