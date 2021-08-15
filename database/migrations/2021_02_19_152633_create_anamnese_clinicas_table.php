<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamneseClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamnese_clinicas', function (Blueprint $table) {
            $table->id();
            $table->boolean('asma')->default(0);
            $table->boolean('cardiorrespiratorias')->default(0);
            $table->boolean('depressao')->default(0);
            $table->boolean('diabetes')->default(0);
            $table->boolean('hipertensao')->default(0);
            $table->boolean('hipotensao')->default(0);
            $table->boolean('lesoes')->default(0);
            $table->boolean('musculares')->default(0);
            $table->boolean('osteoarticulares')->default(0);
            $table->boolean('pressao_arterial')->default(0);
            $table->boolean('problemas_coluna')->default(0);
            $table->boolean('tiroide')->default(0);
            $table->boolean('renais')->default(0);
            $table->boolean('outro')->default(0);
            $table->string('outro_anamnese')->nullable();
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
        Schema::dropIfExists('anamnse_clinicas');
    }
}
