<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kullanici')->insert([
            [
                'name'=>'Alp Eren ÖZDEMİR1',
                'email'=>'ozdemiiraleren@gmail1.com',
                'password'=>'123456',
                'kullanici_status'=>1
            ],
            [
                'name'=>'Alp Eren ÖZDEMİR2',
                'email'=>'ozdemiiraleren@gmail2.com',
                'pasword'=>'123456',
                'kullanici_status'=>1
            ],
            [
                'name'=>'Alp Eren ÖZDEMİR3',
                'email'=>'ozdemiiraleren@gmail3.com',
                'pasword'=>'123456',
                'kullanici_status'=>1
            ]
        ]);
    }
}
