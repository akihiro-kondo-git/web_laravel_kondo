<?php

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
            
                $table->increments('id');
                $table->string('employee_id')->unique();
                $table->char('family_name', 20); 
                $table->char('first_name', 20); 
                $table->integer('section_id'); 
                $table->char('mail', 256); 
                $table->integer('gender_id'); 
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
