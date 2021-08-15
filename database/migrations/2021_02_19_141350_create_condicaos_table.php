<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicaos', function (Blueprint $table) {
            $table->id();
            $table->decimal("peso", 2, 2);
            $table->integer("cintura")->nullable();
            $table->integer("coxa")->nullable();
            $table->integer("quadril")->nullable();
            $table->integer("abdominal")->nullable();
            $table->integer("braco")->nullable();
            $table->integer("peito")->nullable();
            $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
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
        Schema::dropIfExists('condicaos');
    }
}
