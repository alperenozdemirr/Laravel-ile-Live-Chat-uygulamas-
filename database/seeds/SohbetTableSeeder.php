<?php

use Illuminate\Database\Seeder;

class SohbetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sohbet')->insert([
            [
                'kullanici_id'=>1,
                'mesaj_icerik'=>'Sohbet içeriği 1'
            ],
            [
                'kullanici_id'=>2,
                'mesaj_icerik'=>'Sohbet içeriği 2'
            ],
            [
                'kullanici_id'=>3,
                'mesaj_icerik'=>'Sohbet içeriği 3'
            ]
        ]);
    }
}
