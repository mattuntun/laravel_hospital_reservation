<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllDepartmentHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_department_holidays', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->date('holiday_date')->comment('休日'); 
            $table->string('description')->comment('休日概要');
            $table->string('weekly_holiday_1',10)->nullable()->comment('毎週の休み1(日曜日：0～土曜日6)');
            $table->string('weekly_holiday_2',10)->nullable()->comment('毎週の休み2(日曜日：0～土曜日6)');
            $table->string('weekly_holiday_3',10)->nullable()->comment('毎週の休み3(日曜日：0～土曜日6)');
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
        Schema::dropIfExists('all_department_holidays');
    }
}
