<?php

use Illuminate\Database\Seeder;

class PtDataTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pt_data')->insert([
            [ 'pt_id'=>'111',
            'pt_last_name'=>'テスト', 
            'pt_name'=>'患者', 
            'pt_last_name_kata'=>'ﾃｽﾄ',
            'pt_name_kata'=>'ｶﾝｼﾞｬ',
            'sex'=>'1',
            'birthday'=>'19881011',
            'email_adress'=>'test@sample.com',],
         ]);
        factory(App\pt_data::class,30)->create();
    }
}
