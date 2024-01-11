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
    Schema::create('eventos', function (Blueprint $table) {
        $table->id();
        $table->string('nomevento', 100);
        $table->date('fecha');
        $table->time('hora');
        $table->string('lugar', 255);
        $table->string('imagen')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
    
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
