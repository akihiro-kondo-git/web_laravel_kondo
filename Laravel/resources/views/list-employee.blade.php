<?php
//--------------------------------------------------------------------------------------------------//
//------------------------------------------社員一覧画面---------------------------------------------//
//--------------------------------------------------------------------------------------------------//
use App\Http\Controllers\EmployeeData\EmployeeAll;
EmployeeAll::setArray();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <title>社員一覧画面</title>
</head>

<body>
<table>
            <tr>
                <td>&nbsp;社員ID</td>
                <td>&emsp;社員名</td>
                <td>&emsp;所属セクション</td>
                <td>&emsp;メールアドレス</td>
                <td>&emsp;性別</td>
            </tr>

            <!-- explain: 社員一覧を表示 -->
            <?php for ($i = 0; $i < EmployeeAll::$count; $i++):?>

	        <tr>
                <td>
                    <form action = http://192.168.56.56/refer-employee name = employee method = GET>
	                    <button type = submit class = link-style name = employee_id value = <?php echo EmployeeAll::$employee_id[$i] ?>>
	                        <?php //echo EmployeeAll::$employee_id[$i] ?>
                        </button>
                    </form>

                    <a href="http://192.168.56.56/refer-employee?employee_id=<?php  EmployeeAll::$employee_id[$i] ?>&family_name=<?php EmployeeAll::$family_name[$i]?>
                    &first_name=<?php echo EmployeeAll::$first_name[$i] ?>
                    &section_name=<?php echo EmployeeAll::$section_name[$i] ?>
                    &mail_address=<?php echo EmployeeAll::$mail_address[$i] ?>
                    &gender_name=<?php echo EmployeeAll::$gender_name[$i] ?>">
                    <?php echo EmployeeAll::$employee_id[$i] ?></a>

                </td>
	            <td>&emsp;<?php echo EmployeeAll::$family_name[$i] ?>&nbsp;<?php echo EmployeeAll::$first_name[$i] ?></td>
	            <td>&emsp;<?php echo EmployeeAll::$section_name[$i] ?></td>
	            <td>&emsp;<?php echo EmployeeAll::$mail_address[$i] ?></td>
	            <td>&emsp;<?php echo EmployeeAll::$gender_name[$i] ?></td>
	        </tr>

	        <?php endfor;?>

        </table>
    <br>
    <a href = "{{route('regist-employee')}}">社員登録画面</a></br>
    <a href = "{{route('menu')}}">メニュー画面</a>

</body>
</html>