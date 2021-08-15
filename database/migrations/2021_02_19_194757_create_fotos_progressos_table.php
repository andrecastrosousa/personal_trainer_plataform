<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosProgressosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_progressos', function (Blueprint $table) {
            $table->id();
            $table->string("titulo")->nullable();
            $table->string("foto_frente")->nullable();
            $table->string("foto_lado")->nullable();
            $table->string("foto_costas")->nullable();
            $table->foreignId("user_id")->constrained("users");
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
        Schema::dropIfExists('fotos_progressos');
    }
}
