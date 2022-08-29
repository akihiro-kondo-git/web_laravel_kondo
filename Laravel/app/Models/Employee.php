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

// PDOを利用したデータ登録:pdo_regist_employee()
// PDOを利用した一覧データ表示:pdo_get_employee()
// PDOを利用した詳細データ表示:pdo_get_info()※
// PDOを利用したデータ更新:pdo_update_employee()※
// PDOを利用したデータ削除:pdo_delete_employee()※
// Laravelでのデータ登録:laravel_regist_employee()


class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    public $timestamps = false;
    public $incrementing = true;


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
        } catch (\PDOException$e) {
            $pdo->rollBack();
            Message::setMessage("データ登録に失敗しました");

            //explain: データベースの切断
        } finally {
            $pdo = null;

        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////

//message: 今後修正してください

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
        $stmt = $pdo->prepare('SELECT * FROM employee ORDER BY employee_id');

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

    //message: 今後修正してください

    //explain: PDOによる詳細データ表示メソッド
    public static function pdo_get_info($id){
    // try {
    //     //explain: データベースへの接続
    //     $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
    //     $user = 'homestead';
    //     $password = 'secret';
    //     $pdo = new PDO($database, $user, $password);

    //     //explain: トランザクション開始
    //     $pdo->beginTransaction();

    //     //explain: SQL文のセット
    //     $stmt = $pdo->prepare("SELECT * FROM employee WHERE employee_id = :employee_id ");
    //     $stmt->bindParam(':employee_id', $id, PDO::PARAM_INT);

    //     //explain: SQLの実行
    //     $stmt->execute();

    //     //explain: SQLの結果をまとめて配列に格納
    //     $employee_data = $stmt->fetch();

    //     //explain: エラーメッセージを出力とロールバック
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    //     $pdo->rollBack();

    //     //explain: データベースの切断
    // } finally {
    //     $pdo = null;
    // }

    //     return $employee_data;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////

//message: 今後修正してください

    //explain: PDOによるデータ更新メソッド
    public static function pdo_update_employee()
    {

        // //explain: 入力データの取得
        // $employee_id = $_POST['employee_id'];
        // $family_name = $_POST['family_name'];
        // $first_name = $_POST['first_name'];
        // $section_id = $_POST['section_id'];
        // $mail = $_POST['mail_address'];
        // $gender_id = $_POST['gender_id'];

        // try {
        //     //explain: データベースへの接続
        //     $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
        //     $user = 'homestead';
        //     $password = 'secret';
        //     $pdo = new PDO($database, $user, $password);

        //     //explain: トランザクション開始
        //     $pdo->beginTransaction();

        //     //explain: テーブルへの登録
        //     $stmt = $pdo->prepare('UPDATE employee SET family_name = :family_name,first_name = :first_name, section_id = :section_id, mail = :mail,gender_id= :gender_id WHERE employee_id = :employee_id');

        //     //explain: 入力データの挿入
        //     $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
        //     $stmt->bindParam(':family_name', $family_name, PDO::PARAM_STR);
        //     $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        //     $stmt->bindParam(':section_id', $section_id, PDO::PARAM_INT);
        //     $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        //     $stmt->bindParam(':gender_id', $gender_id, PDO::PARAM_INT);

        //     //explain: SQLの実行
        //     $res = $stmt->execute();

        //     //explain: コミット
        //     if ($res) {$pdo->commit();}
        //     Message::setMessage("データを更新しました");

        //     //explain: エラーメッセージを出力とロールバック
        // } catch (\PDOException$e) {
        //     $pdo->rollBack();
        //     Message::setMessage("データ更新に失敗しました");

        //     //explain: データベースの切断
        // } finally {
        //     $pdo = null;

        // }

    }
//////////////////////////////////////////////////////////////////////////////////////////////////


//message: 今後修正してください

    //explain: PDOによるデータ削除メソッド
    public static function pdo_delete_employee($id){
    // {try {
    //     //explain: データベースへの接続
    //     $database = 'pgsql:dbname=company_directory; host=localhost; port=5432;';
    //     $user = 'homestead';
    //     $password = 'secret';
    //     $pdo = new PDO($database, $user, $password);

    //     //explain: トランザクション開始
    //     $pdo->beginTransaction();

    //     //explain: SQL文のセット
    //     $stmt = $pdo->prepare("DELETE FROM employee WHERE employee_id = :employee_id ");
    //     $stmt->bindParam(':employee_id', $id, PDO::PARAM_INT);

    //     //explain: SQLの実行
    //     $res = $stmt->execute();

    //     //explain: コミット
    //     if ($res) {$pdo->commit();}
    //     Message::setMessage("データを削除しました");

    //     //explain: エラーメッセージを出力とロールバック
    // } catch (\PDOException$e) {
    //     $pdo->rollBack();
    //     Message::setMessage("データ削除に失敗しました");

    //     //explain: データベースの切断
    // } finally {
    //     $pdo = null;
    
    }
//}



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

}
