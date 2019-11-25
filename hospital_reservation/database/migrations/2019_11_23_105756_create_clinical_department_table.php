<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinical_department', function (Blueprint $table) {
            $table->increments('No')->comment('主キー');
            $table->date('data_maked_day')->comment('データ作成日');
            $table->string('clinical_department',50)->comment('診療科');  
            $table->unsignedInteger('possible_peoples')->comment('予約可能人数');  
            $table->time('start_time')->comment('診療開始時間');  
            $table->time('break_time_start')->comment('診療休診開始時間');  
            $table->time('break_time_close')->comment('診療休診終了時間'); 
            $table->time('close_time')->comment('診療終了時間');
            $table->timestamps();

            $table->index('clinical_department');
            
            $table->foreign('clinical_department')->reference('reservation_department')->on('reservation_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinical_department');
    }
}
