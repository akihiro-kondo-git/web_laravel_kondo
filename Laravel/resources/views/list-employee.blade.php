<!DOCTYPE html>
<html>
<head>
    <title>社員一覧画面</title>
</head>

<body>
<table>
            <tr>
                <td>&emsp;社員ID</td>
                <td>&emsp;社員名</td>
                <td>&emsp;所属セクション</td>
                <td>&emsp;メールアドレス</td>
                <td>&emsp;性別</td>
            </tr>
            
            <!-- 社員一覧を表示 -->
            <?php show_employee();?>

        </table>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>





<!-- 以下php -->





<?php
use App\Models\Employee;

//nethod: 社員一覧表示メソッド
function show_employee()
{

//explain: データベースからデータを取得
//(PDOを利用しない場合:「get_employee()」メソッドを利用)

    $employee = new Employee();
    $employee_data = $employee->pdo_get_employee();

//explain: 取得したデータを各変数に代入
    for ($i = 0; $i < count($employee_data); $i++) {
        $employee_id = $employee_data[$i][1];
        $family_name = $employee_data[$i][2];
        $first_name = $employee_data[$i][3];
        $section_id = $employee_data[$i][4];
        $mail_address = $employee_data[$i][5];
        $gender_id = $employee_data[$i][6];

        //explain: 所属セクション名とセクションIDを合致
        if ($section_id == 1) {
            $section_name = "シス開";
        } else if ($section_id == 2) {
            $section_name = "グロカル";
        } else {
            $section_name = "ビジソル";
        }

        //explain: 性別名と性別IDを合致
        if ($gender_id == 1) {
            $gender_name = "男性";
        } else {
            $gender_name = "女性";
        }

        //explain 社員データの表示
        echo '<tr>';
        echo "<td><form action = http://192.168.56.56/refer-employee
            name = employee method = GET>
            <button type = submit class = link-style name = employee
        value = $employee_id>$employee_id</button></form></td>
        <td>&emsp;$family_name$first_name</td>
        <td>&emsp;$section_name</td>
        <td>&emsp;$mail_address</td>
        <td>&emsp;$gender_name</td>";
        echo '</tr>';

    }
}
?>




<!-- 以下css -->





<style>
button.link-style{
  cursor: pointer;
  border: none;
  background: none;
  color: #0033cc;
  text-decoration: underline;
}
button.link-style:hover{

  color: #002080;
}
</style>