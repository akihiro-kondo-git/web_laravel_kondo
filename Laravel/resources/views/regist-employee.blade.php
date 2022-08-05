<!DOCTYPE html>
<html>
<head>
    <title>社員登録画面</title>
</head>

<body>
    <form action = "{{route('result-regist')}}" method = "GET">
        <table>
            <tr><td>社員ID</td><td>
                <input type="text" name="employee_id" placeholder="YZ12345678" required>
            </td></tr>

            <tr><td>社員名</td><td>
                <input type="text" size="7" name="family_name" required>
                <input type="text" size= "7" name= "first_name" required>
            </td></tr>

            <tr><td>所属セクション</td><td>
                <select name="belonging_section" size="1" required>
                <option value="シス開">シス開</option>
                <option value="グロカル">グロカル</option>
                <option value="ビジソル">ビジソル</option>
                </select>
            </td></tr>

            <tr><td>メールアドレス</td><td>
                <input type="text" name ="mail_address" placeholder="taro_yaz@yaz.co.jp" required>
            </td></tr>
            
            <tr><td>性別</td><td>
                <input type="radio" name = "gender" value="男性">男性
                <input type="radio" name="gender" value="女性">女性
            </td></tr>
        </table>
        <br>
        <input type="submit" value="登録">
    </form>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>
</html>