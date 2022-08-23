<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員参照画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
use App\Http\Controllers\EmployeeData\EmployeeData;
?>
<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
</head>

<body>
    <form action = "{{route('edit-employee')}}" method = "GET" >
        <table>
            <tr ><td>社員ID</td><td>&emsp;
            <?php echo EmployeeData::$employee_id ?>
            <input type="hidden" name = "employee_id" value =  <?php echo EmployeeData::$employee_id ?>>
            </td></tr>

            <tr><td >社員名</td><td>&emsp;
            <?php echo EmployeeData::$employee_name ?>
            <input type="hidden" name = "family_name" value =  <?php echo EmployeeData::$family_name ?>>
            <input type="hidden" name = "first_name" value =  <?php echo EmployeeData::$first_name ?>>
            </td></tr>

            <tr><td>所属セクション</td><td>&emsp;
            <?php echo EmployeeData::$section_name ?>
            <input type="hidden" name = "section_name" value =  <?php echo EmployeeData::$section_name ?>>


            </td></tr>

            <tr><td>メールアドレス</td><td>&emsp;
            <?php echo EmployeeData::$mail_address ?>
            <input type="hidden" name = "mail_address" value = <?php echo EmployeeData::$mail_address ?>>
            </td></tr>

            <tr><td>性別</td><td>&emsp;
            <?php echo EmployeeData::$gender_name ?>
            <input type="hidden" name = "gender_name" value =  <?php echo EmployeeData::$gender_name ?>>
            </td></tr>
        </table>
        
        <button type="submit" name="編集">編集</button>
    </form>
    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
