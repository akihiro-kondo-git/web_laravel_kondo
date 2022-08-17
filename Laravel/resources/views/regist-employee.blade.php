<?php
namespace App\Homestead\Laravel\resources\views;
use App\Http\Controllers\ErrorMessage\ErrorMessage;
use Illuminate\Http\Request;
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Todo: jsファイルとcssファイルが読み込めないため後に対処する必要あり(08/16) -->
    <title>社員登録画面</title>
</head>

<body>


<?php for ($i=0 ; $i<count(ErrorMessage::$errorMessage); $i++):?> 
<option class = "error" value = "<?php echo ErrorMessage::$errorMessage[$i];?>">
<?php echo ErrorMessage::$errorMessage[$i];?></option>
<?php endfor ?>



    <form action = "{{route('result-regist')}}" name = "regist" method = "GET">
        <table>
            <tr ><td class="required">社員ID</td><td>
                <input id = "input_employee_id" pattern = "^(YZ)+[0-9]+$"
                max = "10" type="text" name="employee_id" placeholder="YZ12345678"
                minlength = "10" maxlength = "10" required>
            </td></tr>

            <tr><td class="required">社員名</td><td>
                <input id = "input_family_name" pattern = ".{0,25}"type="text" 
                size="7" name="family_name" maxlength="20" required>
                <input id = "input_first_name" pattern = ".{0,25}"type="text" 
                size= "7" name= "first_name" maxlength="20" required>
            </td></tr>

            <tr><td class="required" >所属セクション</td><td>
                <select id = "input_section_id" pattern = "[1-3]" name="section_id" size="1" required>
                <option value="1">シス開</option>
                <option value="2">グロカル</option>
                <option value="3">ビジソル</option>
                </select>
            </td></tr>

            <tr><td class="required">メールアドレス</td><td>
                <input id ="input_mail_address" type="text" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
                name ="mail_address" placeholder="taro_yaz@yaz.co.jp"maxlength="256" required>
            </td></tr>

            <tr><td class="required">性別</td><td>
                <input id= "input_gender_id" pattern = "[1-2]" 
                type="radio" name ="gender_id" value="1" required>男性
                <input type="radio" name ="gender_id" value="2">女性
            </td></tr>
        </table>
        <span class = "require_box"><p class = "asterisk">必須項目</p></span>
        <button type="submit" value="登録" onclick="error_css();">登録</button>
    </form>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>





<!-- 以下css -->





<style>
        .required:after {
            content: " *";
            color: red;
        }
        .asterisk:before {
            content: " *";
            color: red;

        }
        .require_box{
            position: relative;
            left: 30px;
            bottom: 20px;
        }

        .error {
         padding:12px;
         font-weight:850;
         color: red;
        }
    </style>



    

<!-- 以下JavaScript -->
<script  language="JavaScript">





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
</script>
</html>