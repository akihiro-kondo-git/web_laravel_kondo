<!DOCTYPE html>
<html>
<head>
    <title>社員一覧画面</title>
</head>

<body>
<table>
            <tr>
                <td>&emsp;社員ID</td>
                <td>&emsp;社員名</td>
                <td>&emsp;所属セクション</td>
                <td>&emsp;メールアドレス</td>
                <td>&emsp;性別</td>
            </tr>

<?php       //explain: データベースからデータを取得
            use App\Models\Employee;
            $employee = new Employee();
            $employee_data = $employee->get_employee();
           
            //explain: 取得したデータを各変数に代入
            for($i = 0; $i<count($employee_data); $i++){
                $employee_id=$employee_data[$i][1];
                $family_name=$employee_data[$i][2];
                $first_name=$employee_data[$i][3];
                $section_id=$employee_data[$i][4];
                $mail_address=$employee_data[$i][5];
                $gender_id=$employee_data[$i][6];

                //explain: 所属セクション名とセクションIDを合致
                if($section_id==1){
                    $section_name = "シス開";
                }else if($section_id==2){
                    $section_name= "グロカル";
                }else{
                    $section_name="ビジソル";
                }

                //explain: 性別名と性別IDを合致
                if($gender_id==1){
                    $gender_name="男性";    
                }else{
                    $gender_name="女性";
                }
                
                //explain 社員データの表示
                echo '<tr>';
                echo "<td>&emsp;$employee_id</td>
                    <td>&emsp;$family_name$first_name</td>
                    <td>&emsp;$section_name</td>
                    <td>&emsp;$mail_address</td>
                    <td>&emsp;$gender_name</td>";
                echo '</tr>';
            
            }
            ?>
        </table>
    <br>
    <a href = "{{route('menu')}}">メニュー画面</a>
</body>
</html>