<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員参照画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
use App\Http\Controllers\EmployeeData\EmployeeOne;
sessionStart();
?>
<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
    <script src="{{ asset('js/refer.js') }}"></script>
</head>

<body>
        <table>
            <tr ><td>社員ID</td><td>&emsp;
            <?php echo EmployeeOne::$employee_id ?>
            </td></tr>

            <tr><td >社員名</td><td>&emsp;
            <?php echo EmployeeOne::$employee_name ?>
            </td></tr>

            <tr><td>所属セクション</td><td>&emsp;
            <?php echo EmployeeOne::$section_name ?>
            </td></tr>

            <tr><td>メールアドレス</td><td>&emsp;
            <?php echo EmployeeOne::$mail_address ?>
            </td></tr>

            <tr><td>性別</td><td>&emsp;
            <?php echo EmployeeOne::$gender_name ?>
            </td></tr>
        </table>

        <!-- explain: 社員編集画面へ遷移 -->
        <button type="submit" name="編集" onclick="location.href='{{route('edit-employee')}}'" >編集</button>

        <!-- explain: ダイアログ表示後登録結果画面へ遷移 -->
        <form action = "{{route('result-regist')}}" id = "delete" method = "POST" enctype="multipart/form-data" onsubmit="return dialog();" >
        @csrf  
        <input type = "hidden" name = "employee_id" value = <?php echo EmployeeOne::$employee_id ?>>

        <!-- explain: 現在のページ情報と社員IDの送信 -->
        <input type= "hidden" name = "from_where" value = "refer_page">
        <button type="submit"  >削除</button> 
        </form>

    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>




<!-- 以下php -->




<?php

function sessionStart(){

//セッションIDの再発行
session()->regenerate();

//セッションへのデータの保存
session()->put('employee_id', EmployeeOne::$employee_id);
session()->put('family_name', EmployeeOne::$family_name);
session()->put('first_name', EmployeeOne::$first_name);
session()->put('section_name', EmployeeOne::$section_name);
session()->put('mail_address', EmployeeOne::$mail_address);
session()->put('gender_name', EmployeeOne::$gender_name);

}
?>
