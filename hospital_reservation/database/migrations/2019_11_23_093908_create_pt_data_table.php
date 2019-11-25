<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pt_data', function (Blueprint $table) {
            $table->increments('No')->comment('主キー');
            $table->date('data_maked_day')->comment('データ作成日');
            $table->unsignedInteger('pt_id')->unique()->comment('患者ID');  
            $table->string('pt_last_name',20)->comment('患者姓');  
            $table->string('pt_name',20)->comment('患者名');  
            $table->string('pt_last_name_kata',20)->comment('患者姓(ｶﾀｶﾅ)');  
            $table->string('pt_name_kata',20)->comment('患者名(ｶﾀｶﾅ)'); 
            $table->unsignedInteger('sex')->comment('性別:1/男性 2/女性'); 
            $table->date('birthday')->comment('生年月日'); 
            $table->string('email_adress',50)->unique()->comment('アドレス'); 
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
        Schema::dropIfExists('pt_data');
    }
}
