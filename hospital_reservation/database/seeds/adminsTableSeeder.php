<?php

use Illuminate\Database\Seeder;

class adminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
           [ 'name'=>'admin', 
            'email'=>'test@sample.com', 
            'password'=>'$2y$10$zLaYSQCjUYFaEIxw3ojewuF3cCTqEKrz.dq4bJ2Z.ByYzFTev7y/u' ],
        ]);
    }
}
