<?php // 修正中のため機能不可

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    
    static public function regist_employee(){


        //データの取得
        $employee_id = $_GET['employee_id'];
        $family_name = $_GET['family_name'];
        $first_name = $_GET['first_name'];
        $section_id = $_GET['section_id'];
        $mail_address = $_GET['mail_address'];
        $gender_id = $_GET['gender_id'];


        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        
        //comment: 下記はデータベース接続確認用コードです。
        // if (!$link) { die('接続失敗です。'.pg_last_error());}
        // print('接続に成功しました。<br>');

    
        //explain: テーブルへの登録
        $sql = "INSERT INTO employee VALUES (default, '$employee_id', '$family_name', '$first_name', $section_id, '$mail_address', $gender_id)";
        pg_query($sql);

        //comment: 下記はINSERTクエリーでエラーが出た場合の確認コードです。
        // if (!$result_flag) {die('INSERTクエリーが失敗しました。'.pg_last_error());}   

        //explain: データベースの切断
        $close_flag = pg_close($link);

        //comment:下記はデータベースの接続確認用コードです。
        //if ($close_flag){print('切断に成功しました。<br>');}
    }
}
