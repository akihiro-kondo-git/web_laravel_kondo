<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/app.css">
    <title>社員登録画面</title>
</head>

<body>
    <form action = "{{route('result-regist')}}" method = "GET">
        <table>
            <tr ><td class="required">社員ID</td><td>
                <input type="text" name="employee_id" placeholder="YZ12345678" required>
            </td></tr>

            <tr><td class="required">社員名</td><td>
                <input type="text" size="7" name="family_name" maxlength="25" required>
                <input type="text" size= "7" name= "first_name" maxlength="25" required>
            </td></tr>

            <tr><td class="required" >所属セクション</td><td>
                <select name="section_id" size="1" required>
                <option value="1">シス開</option>
                <option value="2">グロカル</option>
                <option value="3">ビジソル</option>
                </select>
            </td></tr>

            <tr><td class="required">メールアドレス</td><td>
                <input type="text" name ="mail_address" placeholder="taro_yaz@yaz.co.jp"maxlength="256" required>
            </td></tr>
            
            <tr><td class="required">性別</td><td>
                <input type="radio" name = "gender_id" value="1">男性
                <input type="radio" name="gender_id" value="2">女性
            </td></tr>
        </table>
        <br>
        <input type="submit" value="登録">
    </form>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>
</html>