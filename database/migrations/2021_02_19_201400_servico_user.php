<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ServicoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $servico1 = new \App\Models\TipoServico();
        $servico1->servico = "Acompanhamento Presencial";
        $servico1->save();

        $servico2 = new \App\Models\TipoServico();
        $servico2->servico = "Acompanhamento Online";
        $servico2->save();

        $servico3 = new \App\Models\TipoServico();
        $servico3->servico = "Personal Trainer";
        $servico3->save();


        $user = new User();
        $user->name = 'Daniela Narciso';
        $user->email = 'admin@admin.com';
        $user->email_verified_at = now();
        $user->admin = 1;
        $user->tipo_servico_id = 1;
        $user->password = Hash::make('admin123');
        $user->remember_token = Str::random(10);
        $user->save();


        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Cardio";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Glúteos";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Bíceps";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Funcional";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "ABS";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Mobilidade";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Alongamento";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Tríceps";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Peito";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Quadríceps";
        $tipoExercicio->save();

        $tipoExercicio = new \App\Models\TipoExercicio();
        $tipoExercicio->nome = "Posteriores de coxa (isquiotibiais)";
        $tipoExercicio->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
