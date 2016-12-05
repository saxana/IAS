<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn');            
            $table->string('title');
            $table->string('author_1');
            $table->string('author_2');
            $table->string('publisher');            
            $table->smallInteger('year');
            $table->decimal('price', 4, 2);
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
        if(Schema::hasTable('library'))
            Schema::drop('library');
    }
}
