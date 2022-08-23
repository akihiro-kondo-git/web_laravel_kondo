<?php
//--------------------------------------------------------------------------------------------------//
//-----------------------------------登録結果画面へのコントローラー-----------------------------------//
//--------------------------------------------------------------------------------------------------//

namespace App\Http\Controllers;

use App\Http\Controllers\Validation\Validation;
use App\Models\Employee;

class ResultRegistController extends Controller
{
    public function index()
    {
        //explain: 遷移元ページの情報取得
        $pastPage = $_POST['from_where'];

        //explain: 「社員登録画面」からの遷移の場合
        if ($pastPage == "regist_page") {

            //explain: サーバーサイドでの入力チェックエラーの場合は「社員登録画面」に遷移
            if (Validation::InputCheck() == false) {
                return view('regist-employee');
            }

            //explain: 社員の登録
            //PDO利用の場合：pdo_regist_employee()
            //saveメソッド利用の場合:save_regist_employee())
            if (Validation::InputCheck() == true) {
                $employee = new Employee;
                $employee->pdo_regist_employee();
            }


        //explain: 「社員編集画画面」からの遷移の場合
         } else if ($pastPage == "edit_page") {

            //explain: 社員情報の更新
            $employee = new Employee;
            $employee->pdo_update_employee();

        }

        //explain: 「登録結果画面」に遷移
        return view('result-regist');
    }
}
