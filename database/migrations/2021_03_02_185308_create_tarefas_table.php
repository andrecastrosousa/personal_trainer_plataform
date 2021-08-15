<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->boolean("avaliacao_inicial")->default(0);
            $table->boolean("plano_treino")->default(0);
            $table->boolean("dicas_alimentar")->default(0);
            $table->boolean("feedback_semanal")->default(0);
            $table->boolean("avaliacao_periodica")->default(0);
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
        Schema::dropIfExists('tarefas');
    }
}
