<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpiniaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opiniaos', function (Blueprint $table) {
            $table->id();
            $table->boolean("divertidos")->default(0);
            $table->boolean("monotonos")->default(0);
            $table->boolean("desafiantes")->default(0);
            $table->boolean("faceis")->default(0);
            $table->boolean("dificeis")->default(0);
            $table->boolean("educacionais")->default(0);
            $table->boolean("eficazes")->default(0);
            $table->boolean("ineficazes")->default(0);
            $table->boolean("outra")->default(0);
            $table->string("opiniao_outro")->nullable();
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
        Schema::dropIfExists('opiniaos');
    }
}
