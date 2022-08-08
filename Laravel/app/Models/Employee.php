<?php // 修正中のため機能不可

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    
    //explain: Employeeデータ登録メソッド
    static public function regist_employee(){

        //explain: データの取得
        $employee_id = $_GET['employee_id'];
        $family_name = $_GET['family_name'];
        $first_name = $_GET['first_name'];
        $section_id = $_GET['section_id'];
        $mail_address = $_GET['mail_address'];
        $gender_id = $_GET['gender_id'];


        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        if (!$link) { die('接続失敗です。'.pg_last_error());}

    
        //explain: テーブルへの登録
        $sql = "INSERT INTO employee VALUES (default, '$employee_id', '$family_name', '$first_name', $section_id, '$mail_address', $gender_id)";
        pg_query($sql);
 

        //explain: データベースの切断
        $close_flag = pg_close($link);
        if (!$close_flag){print('切断に失敗しました。<br>');}
    }

    
    //explain　Employeeデータ表示メソッド
    static public function get_employee(){

        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        if (!$link) { die('接続失敗です。'.pg_last_error());}
  
        //explain: テーブルデータの取得
        $sql = "SELECT employee_id FROM employee";
        $result = pg_query("SELECT * FROM employee");

        //explain: 取得したデータを配列に格納
        for ($i = 0 ; $i < pg_num_rows($result) ; $i++){
            $row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
            $employee_data[$i][1]= $row['employee_id'];
            $employee_data[$i][2]=$row['family_name'];
            $employee_data[$i][3]=$row['first_name'];
            $employee_data[$i][4]=$row['section_id'];
            $employee_data[$i][5]=$row['mail'];
            $employee_data[$i][6] =$row['gender_id'];
        }
    

        //explain: データベースの切断
        $close_flag = pg_close($link);
        if (!$close_flag){print('切断に失敗しました。<br>');}


        return $employee_data;

    }
}

