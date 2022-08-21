<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSohbetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sohbet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('kullanici_id')->nullable();
            $table->text('mesaj_icerik')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sohbet');
    }
}
