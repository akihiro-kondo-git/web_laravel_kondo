<?php use App\Http\Controllers\ErrorMessage\ErrorMessage;?>
<!DOCTYPE html>
<html>
<head>
    <title>登録結果画面</title>
</head>

<body>

    <p><?php echo ErrorMessage::$resultMessage;?></p>

        ・<a href = "{{route('regist-employee')}}">社員登録画面</a>
        <br>
        ・<a href = "{{route('list-employee')}}">社員一覧画面</a>
        <br>
        ・<a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>