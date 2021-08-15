<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->integer("cansaco");
            $table->integer("fome");
            $table->integer("sono");
            $table->integer("humor");
            $table->integer("motivacao");
            $table->integer("stress");
            $table->integer("satisfacao");
            $table->integer("recomendacao");
            $table->integer("satisfacao_treino");
            $table->string("feedback");
            $table->foreignId("opiniao_id")->constrained("opiniaos");
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
        Schema::dropIfExists('feedback');
    }
}
