<?php
use App\Http\Controllers\EmployeeData\EmployeeData;
?>
<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
</head>

<body>
        <table>
            <tr ><td>社員ID</td><td>&emsp;
            <?php echo EmployeeData::$employee_id?>
            </td></tr>
          
            <tr><td >社員名</td><td>&emsp;
            <?php echo EmployeeData::$employee_name?>
            </td></tr>
           
            <tr><td>所属セクション</td><td>&emsp;
            <?php echo EmployeeData::$section_name?>
            </td></tr>

            <tr><td>メールアドレス</td><td>&emsp;
            <?php echo EmployeeData::$mail_address?>
            </td></tr>

            <tr><td>性別</td><td>&emsp;
            <?php echo EmployeeData::$gender?>
            </td></tr>
        </table>

    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
