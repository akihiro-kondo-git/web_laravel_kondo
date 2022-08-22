<?php
//--------------------------------------------------------------------------------------------------//
//-----------------------------------テーブル定義のクラス---------------------------------------------//
//--------------------------------------------------------------------------------------------------//

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id')->from(4)->comment('ID');
            $table->char('employee_id', 10)->comment('社員ID');
            $table->string('family_name', 20)->comment('社員名（性）');
            $table->string('first_name', 20)->comment('社員名（名）');
            $table->integer('section_id')->length(1)->comment('所属セクション');
            $table->string('mail', 256)->comment('メールアドレス');
            $table->integer('gender_id')->length(1)->comment('性別');

            //$table->primary(['id']);
            $table->unique(['employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
