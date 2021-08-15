<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoInicialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_inicials', function (Blueprint $table) {
            $table->id();
            $table->integer("horas_trabalho");
            $table->integer("horas_diarias");
            $table->integer("sedentarismo");
            $table->foreignId("anamnese_clinica_id")->constrained("anamnese_clinicas");
            $table->integer("motivacao");
            $table->integer("treinos_semana");
            $table->string("parq1");
            $table->string("parq2");
            $table->string("parq3");
            $table->string("parq4");
            $table->string("parq5");
            $table->string("parq6");
            $table->string("questao_atividade")->nullable();
            $table->string("questao_cirurgia")->nullable();
            $table->string("questao_gravidez");
            $table->string("questao_medicacao");
            $table->string("anamnese_desportiva1");
            $table->string("anamnese_desportiva2");
            $table->string("questao_trabalho");
            $table->string("questao_trabalho_outro")->nullable();
            $table->string("observacoes")->nullable();
            $table->foreignId("objetivo_id")->constrained("objetivos");
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
        Schema::dropIfExists('avaliacao_inicials');
    }
}
