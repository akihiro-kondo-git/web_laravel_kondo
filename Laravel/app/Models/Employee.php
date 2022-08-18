<?php

namespace App\Models;

use App\Http\Controllers\Message\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

//--------------------------------------------------------------------------------------------------//
//---------------------------------PDOを利用しないデータベース操作------------------------------------//
//--------------------------------------------------------------------------------------------------//

//////////////////////////////////////////////////////////////////////////////////////////

    //explain: Employeeデータ登録メソッド
    public static function regist_employee()
    {try {

        //explain: データの取得
        $employee_id = $_GET['employee_id'];
        $family_name = $_GET['family_name'];
        $first_name = $_GET['first_name'];
        $section_id = $_GET['section_id'];
        $mail_address = $_GET['mail_address'];
        $gender_id = $_GET['gender_id'];

        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        if (!$link) {die('接続失敗です。' . pg_last_error());}

        //explain: テーブルへの登録
        $sql = "INSERT INTO employee VALUES (default, '$employee_id', '$family_name', '$first_name', $section_id, '$mail_address', $gender_id)";
        pg_query($sql);
        Message::setMessage("データを登録しました");

    } catch (SQLException $e) {
        Message::setMessage("データ登録に失敗しました");

    } finally {
        //explain: データベースの切断
        $close_flag = pg_close($link);
        if (!$close_flag) {print('切断に失敗しました。<br>');}
    }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    //explain　Employeeデータ表示メソッド
    public static function get_employee()
    {try {

        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        if (!$link) {die('接続失敗です。' . pg_last_error());}

        //explain: テーブルデータの取得
        $result = pg_query("SELECT * FROM employee");

        //explain: 取得したデータを配列に格納
        for ($i = 0; $i < pg_num_rows($result); $i++) {
            $row = pg_fetch_array($result, null, PGSQL_ASSOC);
            $employee_data[$i][1] = $row['employee_id'];
            $employee_data[$i][2] = $row['family_name'];
            $employee_data[$i][3] = $row['first_name'];
            $employee_data[$i][4] = $row['section_id'];
            $employee_data[$i][5] = $row['mail'];
            $employee_data[$i][6] = $row['gender_id'];
        }
    } catch (SQLException $e) {
        echo $e;
    } finally {
        //explain: データベースの切断
        $close_flag = pg_close($link);
        if (!$close_flag) {print('切断に失敗しました。<br>');}
    }

        return $employee_data;

    }
//////////////////////////////////////////////////////////////////////////////////////////////////

//explain　Employeeデータ表示メソッド
    public static function get_Info($id)
    {try {
        $employee_data = array();
        //explain: データベースへの接続
        $link = pg_connect("host=localhost dbname=company_directory user=homestead password=secret");
        if (!$link) {die('接続失敗です。' . pg_last_error());}

        //explain: テーブルデータの取得
        $sql = "SELECT * FROM employee WHERE employee_id = '$id'";
        $result = pg_query($sql);

        //explain: 取得したデータを配列に格納
        $row = pg_fetch_array($result, null, PGSQL_ASSOC);
        $employee_data[1] = $row['employee_id'];
        $employee_data[2] = $row['family_name'];
        $employee_data[3] = $row['first_name'];
        $employee_data[4] = $row['section_id'];
        $employee_data[5] = $row['mail'];
        $employee_data[6] = $row['gender_id'];

    } catch (SQLException $e) {
        echo $e;
    } finally {
        //explain: データベースの切断
        $close_flag = pg_close($link);
        if (!$close_flag) {print('切断に失敗しました。<br>');}
    }

        return $employee_data;

    }

//--------------------------------------------------------------------------------------------------//
//---------------------------------PDOを利用するデータベース操作------------------------------------//
//--------------------------------------------------------------------------------------------------//

    //現在PDOは利用できていません(08/17)
    public static function PDO_regist_employee()
    {

        //explain: データの取得
        $employee_id = $_GET['employee_id'];
        $family_name = $_GET['family_name'];
        $first_name = $_GET['first_name'];
        $section_id = $_GET['section_id'];
        $mail = $_GET['mail_address'];
        $gender_id = $_GET['gender_id'];

        try {
            //explain: データベースへの接続
            $pdo = new PDO('pgsql:dbname=company_directory; host=localhost; user=homestead; password=secret');

            //トランザクション開始
            $pdo->beginTransaction();

            //explain: テーブルへの登録
            $stmt = $pdo->prepare('INSERT INTO employee VALUES(default, employee_id = :employee_id,
                                                                    family_name = :family_name,
                                                                    first_name = :first_name,
                                                                    section_id = section_id,
                                                                    mail = mail,
                                                                    gender_id = :gender_id)');

            $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
            $stmt->bindParam(':family_name', $family_name, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_INT);
            $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);

            //SQLの実行
            $res = $stmt->execute();

            //コミット
            if ($res) {$pdo->commit();
            }

        } catch (PDOException $e) {

            //エラーメッセージを出力とロールバック
            echo $e->getMessage();
            $pdo->rollBack();

        } finally {

            //explain: データベースの切断
            $pdo = null;

        }

    }
}
