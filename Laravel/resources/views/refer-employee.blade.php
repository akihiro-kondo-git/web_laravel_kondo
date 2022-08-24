<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員参照画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
use App\Http\Controllers\EmployeeData\EmployeeData;
use Illuminate\Http\Request;
?>
<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
</head>

<body>
        <table>
            <tr ><td>社員ID</td><td>&emsp;
            <?php echo EmployeeData::$employee_id ?>
            </td></tr>

            <tr><td >社員名</td><td>&emsp;
            <?php echo EmployeeData::$employee_name ?>
            </td></tr>

            <tr><td>所属セクション</td><td>&emsp;
            <?php echo EmployeeData::$section_name ?>
            </td></tr>

            <tr><td>メールアドレス</td><td>&emsp;
            <?php echo EmployeeData::$mail_address ?>
            </td></tr>

            <tr><td>性別</td><td>&emsp;
            <?php echo EmployeeData::$gender_name ?>
            </td></tr>
        </table>
        
        <!-- 社員編集画面へ遷移 -->
        <button type="submit" name="編集" onclick="location.href='{{route('edit-employee')}}'" >編集</button>

    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>




<!-- 以下php -->




<?php
//セッションIDの再発行
session()->regenerate();

//セッションへのデータの保存
session()->put('employee_id', EmployeeData::$employee_id);
session()->put('family_name', EmployeeData::$family_name);
session()->put('first_name', EmployeeData::$first_name);
session()->put('section_name', EmployeeData::$section_name);
session()->put('mail_address', EmployeeData::$mail_address);
session()->put('gender_name', EmployeeData::$gender_name);


?>
