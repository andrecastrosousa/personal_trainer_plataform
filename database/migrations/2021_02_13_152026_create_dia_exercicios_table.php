<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_exercicios', function (Blueprint $table) {
            $table->id();
            $table->string("tempo_desc")->nullable();
            $table->string("carga")->nullable();
            $table->integer("serie")->nullable();
            $table->integer("rep")->nullable();
            $table->string("metodo")->nullable();
            $table->string("observacoes")->nullable();
            $table->string("nota")->nullable();
            $table->string("tecnica")->nullable();
            $table->foreignId("dia_id")->constrained("dias");
            $table->foreignId("exercicio_id")->constrained("exercicios");
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
        Schema::dropIfExists('dia_exercicios');
    }
}
