<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員編集画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
namespace App\Homestead\Laravel\resources\views;
use App\Http\Controllers\Message\Message;
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('requisition.css') }}" rel="stylesheet">
    <title>社員編集画面</title>
</head>

<body>


    <form action = "{{route('result-regist')}}" name = "regist" method = "POST">
        @csrf
        <table>
            <tr ><td class="required">社員ID</td><td>
                <input id = "input_employee_id" pattern = "^(YZ)+[0-9]+$" value = <?php echo $_GET['employee_id']?>
                max = "10" type="text" name="employee_id" 
                minlength = "10" maxlength = "10" required readonly="readonly">
            </td></tr>

            <tr><td class="required">社員名</td><td>
                <input id = "input_family_name" pattern = ".{0,25}"type="text" value = <?php echo $_GET['family_name']?>
                size="7" name="family_name" max="20" required>
                <input id = "input_first_name" pattern = ".{0,25}"type="text"value = <?php echo $_GET['first_name']?>
                size= "7" name= "first_name" max="20" required>
            </td></tr>

            <tr><td class="required" >所属セクション</td><td>
            <input id = "section_name" type = "hidden" name = "section_name" value= <?php echo $_GET['section_name']?>>
                <select id = "input_section_id" pattern = "[1-3]" name="section_id" size="1" required>
                <option id = "system_section" value="1">シス開</option>
                <option id = "glocal_section" value="2">グロカル</option>
                <option id = "business_section" value="3">ビジソル</option>
                </select>
            </td></tr>

            <tr><td class="required">メールアドレス</td><td>
                <input id ="input_mail_address" type="text" pattern = "[a-z0-9._%+-]{1,256}[@][a-z0-9.-]{1,256}"
                name ="mail_address" maxlength="256" value = <?php echo $_GET['mail_address']?> required>
            </td></tr>

            <tr><td class="required">性別</td><td>
                <input id = "gender_name" type = "hidden" name = "gender_name" value= <?php echo $_GET['gender_name']?>>
                <input id= "male" pattern = "[1-2]" 
                type="radio" name ="gender_id" value="1" required>男性
                <input id= "female" type="radio" name ="gender_id" value="2">女性
               
            </td></tr>
        </table>
        <span class = "require_box"><p class = "asterisk">必須項目</p></span>
        
         <input type= "hidden" name = "from_where" value = "edit_page"> 
        <button type="submit" value="登録" onclick = "error();">更新</button>
    </form>
    <br>
    <a href = "{{route('list-employee')}}">社員一覧画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>






<!-- 以下JavaScript -->
<script  language="JavaScript">







//所属セクションとセクションIDの一致
var section = document.getElementById('section_name');
var section_name = section.getAttribute('value');
var system_section = document.getElementById('system_section');
var glocal_section = document.getElementById('glocal_section');
var business_section = document.getElementById('business_section');

if(section_name == 'シス開'){
    system_section.selected = true;
}else if (section_name == "グロカル"){
    glocal_section.selected = true;
}else if (section_name == "ビジソル"){
    business_section.selected = true;
}


//explain: 性別IDと性別名の一致
var gender = document.getElementById('gender_name');
var gender_name = gender.getAttribute('value');
var male= document.getElementById('male');
var female = document.getElementById('female');

if(gender_name == '男性'){
    male.checked = true;
}else if (gender_name == "女性"){
    female.checked = true;
}




//method: クライアントサイドの入力チェック
function error(){

//explain: 社員IDの必須チェック・桁数チェック・書式チェック
    var input_employee_id = document.getElementById("input_employee_id");
    input_employee_id.addEventListener('invalid', function(e) {
    if(input_employee_id.validity.valueMissing){
        e.target.setCustomValidity("社員IDを入力してください");
    } else if(input_employee_id.validity.tooShort) {
        e.target.setCustomValidity("社員IDは10文字で入力してください");
    } else if(input_employee_id.validity.patternMismatch) {
        e.target.setCustomValidity("社員IDを正しく入力してください");
    }else {
        e.target.setCustomValidity("");
    }
}, false);


//explain: 社員名(性)の必須チェックと最大桁数チェック
var input_family_name = document.getElementById("input_family_name");
var input_first_name = document.getElementById("input_first_name");
    input_family_name.addEventListener('invalid', function(e) {
    if(input_family_name.validity.valueMissing){
        e.target.setCustomValidity("社員名(性)を入力してください");
    } else if(input_family_name.validity.patternMismatch) {
        e.target.setCustomValidity("社員名(性)は25文字以内で入力してください");
    } else {
        e.target.setCustomValidity("");
    }
}, false);


//explain: 社員名(名)の必須チェックと最大桁数チェック
    input_first_name.addEventListener('invalid', function(e) {
    if(input_first_name.validity.valueMissing){
        e.target.setCustomValidity("社員名(名)を入力してください");
    } else if(input_first_name.validity.patternMismatch) {
        e.target.setCustomValidity("社員名(名)は25文字以内で正しく入力してください");
    } else {
        e.target.setCustomValidity("");
    }
}, false);


//explain: 所属セクションの必須チェック・備考チェック
var input_section_id = document.getElementById("input_section_id");
    input_section_id.addEventListener('invalid', function(e) {
    if(input_section_id.validity.valueMissing){
        e.target.setCustomValidity("所属セクションを入力してください");
    } else if(input_section_id.validity.patternMismatch) {
        e.target.setCustomValidity("所属セクションを正しく入力してください");
    } else {
        e.target.setCustomValidity("");
    }
}, false);


//explain: メールアドレスの必須チェック・最大桁数チェック・書式チェック、
var input_mail_address = document.getElementById("input_mail_address");
    input_mail_address.addEventListener('invalid', function(e) {
    if(input_mail_address.validity.valueMissing){
        e.target.setCustomValidity("メールアドレスを入力してください");
    } else if(input_mail_address.validity.tooLong) {
        e.target.setCustomValidity("メールアドレスは256文字以内で入力してください");
    } else if(input_mail_address.validity.patternMismatch) {
        e.target.setCustomValidity("メールアドレスを正しく入力してください");
    }
    else {
        e.target.setCustomValidity("");
    }
}, false);


//explain: 性別の書式チェック
var input_gender_id = document.getElementById("input_gender_id");
    input_gender_id.addEventListener('invalid', function(e) {
    if(input_gender_id.validity.valueMissing){
        e.target.setCustomValidity("性別を入力してください");
    } else if(input_gender_id.validity.patternMismatch) {
        e.target.setCustomValidity("性別を正しく入力してください");
    } else {
        e.target.setCustomValidity("");
    }
}, false);
}
</script>
</html>