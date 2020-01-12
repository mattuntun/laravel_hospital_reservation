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
            $table->bigIncrements('id')->comment('主キー');
            $table->string('clinical_department',50)->comment('診療科');
            $table->date('holiday＿date')->comment('休日');; 
            $table->string('description'); 
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
