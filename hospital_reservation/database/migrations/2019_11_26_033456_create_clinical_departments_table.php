<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_departments', function (Blueprint $table) {
            $table->increments('No')->comment('主キー');
            //$table->date('data_maked_day')->comment('データ作成日');
            $table->string('clinical_department',50)->unique()->comment('診療科');  
            $table->unsignedInteger('possible_peoples')->comment('予約可能人数');  
            $table->time('start_time')->comment('診療開始時間');  
            $table->time('break_time_start')->comment('診療休診開始時間');  
            $table->time('break_time_close')->comment('診療休診終了時間'); 
            $table->time('close_time')->comment('診療終了時間');
            $table->unsignedInteger('more_than_enough_capacity')->comment('予約可能容量二重丸');
            $table->unsignedInteger('enough_capacity')->comment('予約可能容量丸');
            $table->unsignedInteger('not_enough_capacity')->comment('予約可能容量三角');
            $table->unsignedInteger('half_open_week')->comment('半日診療曜日設定');  
            $table->time('half_open_start')->nullable()->comment('半日開始時間');  
            $table->time('half_open_close')->nullable()->comment('半日終了時間');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinical_departments');
    }
}
