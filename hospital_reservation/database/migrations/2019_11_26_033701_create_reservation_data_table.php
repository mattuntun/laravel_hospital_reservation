<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_data', function (Blueprint $table) {
            $table->increments('No')->comment('主キー');
            $table->date('data_maked_day')->comment('データ作成日');
            $table->date('reservation_date')->comment('予約日');  
            $table->time('reservation_time')->comment('予約時間');  
            $table->string('reservation_department',50)->comment('予約診療科');  
            $table->unsignedInteger('pt_id')->unique()->comment('患者ID');  
            $table->string('letter_of_introduction',50)->comment('紹介状有無'); 
            $table->string('introduction_hp',50)->nullable()->comment('紹介元医療機関'); 
            $table->string('introduction_hp_tell', 20)->nullable()->comment('紹介元電話番号');$table->date('introduction_hp_date')->nullable()->comment('紹介元受診日'); 
            $table->timestamps();

            $table->index('pt_id');
            $table->index('reservation_department');

            $table->foreign('pt_id')
                  ->references('pt_id')
                  ->on('pt_data')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('reservation_department')
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
        Schema::dropIfExists('reservation_data');
    }
}
