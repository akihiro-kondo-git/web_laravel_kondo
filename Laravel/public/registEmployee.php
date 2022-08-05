<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
</head>

<body>
    <form action = "" method = post>
        <table>
            <tr><td>社員ID</td><td><input type="text" placeholder="YZ12345678" required></td></tr>
            <tr><td>社員名</td><td>
                <input type="text" size="10" name="name_family" required>
                <input type="text" size= "15" name= "name_first" required>
            </td></tr>
            <tr><td>所属セクション</td><td>
                <select name="pull_down_menu" size="1">
                <option value="シス開">シス開</option>
                <option value="グロカル">グロカル</option>
                <option value="ビジソル">ビジソル</option>
                </select>
            </td></tr>
            <tr><td>メールアドレス</td><td><input type="text" placeholder="taro_yaz@yaz.co.jp" required></td></tr>
            <tr><td>性別</td><td>
                <input type="radio" name = "radio_button" value="男性">男性
                <input type="radio" name="radio_button" value="女性">女性
            </td></tr>
        </table>
        <br>
        <button>登録</button>
    </form>
    <br>
    <a href = "menu.php">メニュー画面</a>
</body>
</html>