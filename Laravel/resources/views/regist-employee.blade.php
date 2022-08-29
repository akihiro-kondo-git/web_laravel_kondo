<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員登録画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//

//message: 現在サーバサイドでの入力チェック実装中のため各タグのrequired属性とjsを削除中(08/24)
//         maxlength, pattern属性 も削除を検討中
//

namespace App\Homestead\Laravel\resources\views;

use App\Http\Controllers\Message\Message;
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/regist.css') }}" rel="stylesheet">
    <script src="{{ asset('js/regist.js') }}"></script>
    <title>社員登録画面</title>
</head>

<body>

<!-- エラーメッセージの表示 -->
<?php for ($i = 0; $i < count(Message::$errorMessage); $i++): ?>
<option class = "error" value = "<?php echo Message::$errorMessage[$i]; ?>">
<?php echo Message::$errorMessage[$i]; ?></option>
<?php endfor?>

    <!-- explain: 登録結果画面へ遷移 -->
    <form action = "{{route('result-regist')}}" name = "regist" method = "POST">
    @csrf
        <table>

            <!-- explain: 社員ID入力ボックス -->
            <tr ><td class="required">社員ID</td><td>
                <input id = "input_employee_id" max = "10" type="text" name="employee_id" placeholder="YZ12345678"maxlength = "10" pattern = "^(YZ)+[0-9]+$" minlength = "10" required>
            </td></tr>

            <!-- explain: 社員名入力ボックス -->
            <tr><td class="required">社員名</td><td>
                <input id = "input_family_name" type="text"size="6" name="family_name" max="20" pattern = ".{0,25}"placeholder="姓"required
                ><input class = "box" type = "text"readonly
                ><input id = "input_first_name" type="text"size= "6" pattern = ".{0,25}"name= "first_name" max="20" placeholder="名"required>
            </td></tr>

            <!-- explain: 所属セクションプルダウンメニュー -->
            <tr><td class="required" >所属セクション</td><td>
                <select id = "input_section_id" pattern = "[1-3]" name="section_id" size="1" required >
                <option value="">選択してください</option>
                <option value="1">シス開</option>
                <option value="2">グロカル</option>
                <option value="3">ビジソル</option>
                </select>
            </td></tr>

            <!-- explain: メールアドレス入力ボックス -->
            <tr><td class="required">メールアドレス</td><td>
                <input id ="input_mail_address" type="text" name ="mail_address" pattern ="[a-z0-9._%+-]{1,256}[@][a-z0-9.-]{1,256}"placeholder="taro_yaz@yaz.co.jp"maxlength="256" required>
            </td></tr>

            <!-- explain: 性別ラジオボタン -->
            <tr><td class="required">性別</td><td>
                <input id= "input_gender_id" pattern = "[1-2]"type="radio" name ="gender_id" value="1" required>男性
                <input type="radio" name ="gender_id" value="2">女性
            </td></tr>

        </table>

         <!-- explain: アスタリスクと必須項目の表示 -->
        <span class = "require_box"><p class = "asterisk">必須項目</p></span>

        <!-- explain: 現在のページ情報を送信 -->
        <input type= "hidden" name = "from_where" value = "regist_page">

        <!-- explain: JavaScriptの呼び出し -->
        <button type="submit" value="登録" onclick = "error();">登録</button>
    </form>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>
</script>
</html>