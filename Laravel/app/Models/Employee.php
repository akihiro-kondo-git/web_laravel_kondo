<?php
//--------------------------------------------------------------------------------------------------//
//--------------------------------------データベース操作のクラス-------------------------------------//
//--------------------------------------------------------------------------------------------------//


namespace App\Models;
use App\Http\Controllers\Message\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;


//explain: データベース操作メソッド一覧
// Laravelでのデータ登録:laravel_regist_employee()
// PDOを利用したデータ登録:pdo_regist_employee()
// PDOを利用した一覧データ表示:pdo_get_employee()
// PDOを利用した詳細データ表示:pdo_get_info()
// PDOを利用したデータ更新:pdo_update_employee()
// PDOを利用しないデータ登録:normal_regist_employee()
// PDOを利用しない一覧データ表示:normal_get_employee()
// PDOを利用しない詳細データ表示:noraml_get_info()

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    public $timestamps = false;
    public $incrementing = true;

//--------------------------------------------------------------------------------------------------//
//-----------------------------------Laravelでのデータベース操作-------------------------------------//
//--------------------------------------------------------------------------------------------------//

    public static function laravel_regist_employee()
    {

        $employee = new \App\Models\Employee;

        //explain: データの取得
        $employee_id = $_POST['employee_id'];
        $family_name = $POST['family_name'];
        $first_name = $_POST['first_name'];
        $section_id = $_POST['section_id'];
        $mail_address = $_POST['mail_address'];
        $gender_id = $_POST['gender_id'];

        //$current_id = $employee->select('id')->get();

        //$employee->id = 'defalut';
        $employee->employee_id = $employee_id;
        $employee->family_name = $family_name;
        $employee->first_name = $first_name;
        $employee->section_id = $section_id;
        $employee->mail = $mail_address;
        $employee->gender_id = $gender_id;
        $employee->save();
        Message::setMessage("データを登録しました");
    }

//--------------------------------------------------------------------------------------------------//
//---------------------------------PDOを利用しないデータベース操作------------------------------------//
//--------------------------------------------------------------------------------------------------//

    //explain: Employeeデータ登録メソッド
    public static function normal_regist_employee()
    {try {

        //explain: データの取得
        $employee_id = $_POST['employee_id'];
        $family_name = $_POST['family_name'];
        $first_name = $_POST['first_name'];
        $section_id = $_POST['section_id'];
        $mail_address = $_POST['mail_address'];
        $gender_id = $_POST['gender_id'];

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
    public static function normal_get_employee()
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
    public static function normal_get_info($id)
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

        //explain: エラーメッセージの出力
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
//-----------------------------------PDOを利用するデータベース操作------------------------------------//
//--------------------------------------------------------------------------------------------------//

    //PDOによるデータの登録メソッド
    public static function pdo_regist_employee()
    {

        //explain: 入力データの取得
        $employee_id = $_POST['employee_id'];
        $family_name = $_POST['family_name'];
        $first_name = $_POST['first_name'];
        $section_id = $_POST['section_id'];
        $mail = $_POST['mail_address'];
        $gender_id = $_POST['gender_id'];

        try {
            //explain: データベースへの接続
            $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
            $user = 'homestead';
            $password = 'secret';
            $pdo = new PDO($database, $user, $password);

            //explain: トランザクション開始
            $pdo->beginTransaction();

            //explain: テーブルへの登録
            $stmt = $pdo->prepare('INSERT INTO employee VALUES
            (default, :employee_id,:family_name,:first_name,:section_id,:mail,:gender_id)');

            //explain: 入力データの挿入
            $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
            $stmt->bindParam(':family_name', $family_name, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_INT);
            $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);

            //explain: SQLの実行
            $res = $stmt->execute();

            //explain: コミット
            if ($res) {$pdo->commit();}
            Message::setMessage("データを登録しました");

        //explain: エラーメッセージを出力とロールバック
        } catch (PDOException $e) {
            echo $e->getMessage();
            $pdo->rollBack();
            Message::setMessage("データを登録できませんでした");

        //explain: データベースの切断
        } finally {
            $pdo = null;

        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////

    //explain　PDOによるデータ表示メソッド
    public static function pdo_get_employee()
    {try {
        //explain: データベースへの接続
        $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
        $user = 'homestead';
        $password = 'secret';
        $pdo = new PDO($database, $user, $password);

        //explain: トランザクション開始
        $pdo->beginTransaction();

        //explain: SQL文のセット
        $stmt = $pdo->prepare('SELECT * FROM employee');

        //explain: SQLの実行
        $stmt->execute();

        //explain: SQLの結果をまとめて配列に格納
        $data = $stmt->fetchALL();

    //explain: エラーメッセージを出力とロールバック
    } catch (PDOException $e) {
        echo $e->getMessage();
        $pdo->rollBack();

    //explain: データベースの切断
    } finally {
        $pdo = null;
    }
        
        return $data;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////

    //explain: PDOによる詳細データ表示メソッド
    public static function pdo_get_info($id)
    {try {
        //explain: データベースへの接続
        $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
        $user = 'homestead';
        $password = 'secret';
        $pdo = new PDO($database, $user, $password);

        //explain: トランザクション開始
        $pdo->beginTransaction();

        //explain: SQL文のセット
        $stmt = $pdo->prepare("SELECT * FROM employee WHERE employee_id = :employee_id ");
        $stmt->bindParam(':employee_id', $id, PDO::PARAM_INT);

        //explain: SQLの実行
        $stmt->execute();

        //explain: SQLの結果をまとめて配列に格納
        $employee_data = $stmt->fetch();

    //explain: エラーメッセージを出力とロールバック
    } catch (PDOException $e) { 
        echo $e->getMessage();
        $pdo->rollBack();

        //explain: データベースの切断
    } finally {
        $pdo = null;
    }
        
        return $employee_data;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////

    public static function pdo_update_employee()
    {

        //explain: 入力データの取得
        $employee_id = $_POST['employee_id'];
        $family_name = $_POST['family_name'];
        $first_name = $_POST['first_name'];
        $section_id = $_POST['section_id'];
        $mail = $_POST['mail_address'];
        $gender_id = $_POST['gender_id'];

        try {
            //explain: データベースへの接続
            $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
            $user = 'homestead';
            $password = 'secret';
            $pdo = new PDO($database, $user, $password);

            //explain: トランザクション開始
            $pdo->beginTransaction();

            //explain: テーブルへの登録
            $stmt = $pdo->prepare('UPDATE employee SET family_name = :family_name,first_name = :first_name, section_id = :section_id, mail = :mail,gender_id= :gender_id WHERE employee_id = :employee_id');

            //explain: 入力データの挿入
            $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
            $stmt->bindParam(':family_name', $family_name, PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_INT);
            $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
            $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);

            //explain: SQLの実行
            $res = $stmt->execute();

            //explain: コミット
            if ($res) {$pdo->commit();}
            Message::setMessage("データを更新しました");

        //explain: エラーメッセージを出力とロールバック
        } catch (PDOException $e) {
            echo $e->getMessage();
            $pdo->rollBack();
            Message::setMessage("データを更新できませんでした");

        //explain: データベースの切断
        } finally {
            $pdo = null;

        }

    }
}
