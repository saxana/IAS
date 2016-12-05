<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKsiazkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ksiazki', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tytul');
            $table->string('autorzy');
            $table->string('opis');
            $table->boolean('jest_dostepne');
            $table->integer('strony')->unsigned();
            $table->string('wydawca');
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
        if(Schema::hasTable('ksiazki'))
            Schema::drop('ksiazki');
    }
}
