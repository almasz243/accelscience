<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 255)->nullable(false)->unique('name');
            $table->string('video', 255)->nullable(false);
            $table->string('document', 255)->nullable(false);
            $table->integer('value')->nullable(false);
            $table->integer('valueOf')->nullable(false);
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
        //
    }
};
