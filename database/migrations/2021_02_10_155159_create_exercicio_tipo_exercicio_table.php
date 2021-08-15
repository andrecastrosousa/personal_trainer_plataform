<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicioTipoExercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicio_tipo_exercicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exercicio_id")->constrained("exercicios");
            $table->foreignId("tipo_exercicio_id")->constrained("tipo_exercicios");
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
        Schema::dropIfExists('exercicio_tipo_exercicio');
    }
}
