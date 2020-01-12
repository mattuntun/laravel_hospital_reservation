<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->string('clinical_department',50)->comment('診療科');
            $table->date('holiday_date')->comment('休日'); 
            $table->string('description')->comment('休日概要');
            $table->string('weekly_holiday_1')->nullable()->comment('毎週の休み1(日曜日：0～土曜日6)');
            $table->string('weekly_holiday_2')->nullable()->comment('毎週の休み2(日曜日：0～土曜日6)');
            $table->string('weekly_holiday_3')->nullable()->comment('毎週の休み3(日曜日：0～土曜日6)');
            $table->timestamps();

            $table->index('clinical_department');

            $table->foreign('clinical_department')
            ->references('clinical_department')
            ->on('clinical_departments')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
}
