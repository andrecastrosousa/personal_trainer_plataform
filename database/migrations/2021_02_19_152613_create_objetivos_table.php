<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id();
            $table->boolean("perder_peso")->default(0);
            $table->boolean("hipertrofia")->default(0);
            $table->boolean("melhorar_condicao")->default(0);
            $table->boolean("melhorar_mental")->default(0);
            $table->boolean("outro")->default(0);
            $table->string("outro_objetivo")->nullable();
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
        Schema::dropIfExists('objetivos');
    }
}
