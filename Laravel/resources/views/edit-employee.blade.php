<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員編集画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Homestead\Laravel\resources\views;

use Illuminate\Http\Request;
use App\Http\Controllers\Message\Message;
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
    <title>社員編集画面</title>
</head>

<body>

    <!-- 登録結果画面へ遷移 -->
    <form action = "{{route('result-regist')}}" name = "regist" method = "POST">
        @csrf
        <table>
            <tr ><td class="required">社員ID</td><td>
                <input id = "input_employee_id" pattern = "^(YZ)+[0-9]+$" value = <?php echo session()->get('employee_id');?>
                max = "10" type="text" name="employee_id" 
                minlength = "10" maxlength = "10" required readonly="readonly">
            </td></tr>

            <tr><td class="required">社員名</td><td>
                <input id = "input_family_name" pattern = ".{0,25}"type="text" value = <?php echo session()->get('family_name')?>
                size="7" name="family_name" max="20" required><input class = "box" type = "text" 
                 readonly><input id = "input_first_name" pattern = ".{0,25}"type="text"value = <?php echo session()->get('first_name')?>
                size= "7" name= "first_name" max="20" required>
            </td></tr>

            <tr><td class="required" >所属セクション</td><td>
            <input id = "section_name" type = "hidden" name = "section_name" value= <?php echo session()->get('section_name')?>>
                <select id = "input_section_id" pattern = "[1-3]" name="section_id" size="1" required>
                <option id = "system_section" value="1">シス開</option>
                <option id = "glocal_section" value="2">グロカル</option>
                <option id = "business_section" value="3">ビジソル</option>
                </select>
            </td></tr>

            <tr><td class="required">メールアドレス</td><td>
                <input id ="input_mail_address" type="text" pattern = "[a-z0-9._%+-]{1,256}[@][a-z0-9.-]{1,256}"
                name ="mail_address" maxlength="256" required value = <?php echo session()->get('mail_address')?>>
            </td></tr>

            <tr><td class="required">性別</td><td>
                <input id = "gender_name" type = "hidden" name = "gender_name" value= <?php echo session()->get('gender_name')?>>
                <input id= "male" pattern = "[1-2]" 
                type="radio" name ="gender_id" value="1" required>男性
                <input id= "female" type="radio" name ="gender_id" value="2">女性
               
            </td></tr>
        </table>
        <span class = "require_box"><p class = "asterisk">必須項目</p></span>
        
        <!-- 現在のページ情報を送信 -->
        <input type= "hidden" name = "from_where" value = "edit_page"> 

        <button type="submit" value="登録" onclick = "error();">更新</button>
    </form>
    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>
</html>




<!-- 以下JavaScript -->
<script src="{{ asset('js/edit.js') }}"></script>