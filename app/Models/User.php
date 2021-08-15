<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoServico()
    {
        return $this->belongsTo(TipoServico::class);
    }

    public function avaliacaoInicial()
    {
        return $this->belongsTo(AvaliacaoInicial::class);
    }

    public function condicoes()
    {
        return $this->hasMany(Condicao::class);
    }

    public function fotosProgressos()
    {
        return $this->hasMany(FotosProgresso::class);
    }

    static function addCliente(string $nome, string $email, string $password, int $tipoServico, $telemovel)
    {
        $servico = TipoServico::find($tipoServico);
        $user = new User();
        $user->name = $nome;
        $user->email = $email;
        $user->password = Hash::make($password);
        if($telemovel != null)
            $user->telemovel = $telemovel;
        $user->tipoServico()->associate($servico);
        $user->save();

        return $user;
    }

    public static function apagarCliente(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public static function getCliente(int $id)
    {
        return User::findOrFail($id);
    }

    public function getClientes ()
    {
        return User::all();
    }

    public function alterarCliente(string $nome, string $email, int $tipoServico, $telemovel, int $pagamento)
    {
        $this->name = $nome;
        $this->email = $email;
        if($telemovel != null)
            $this->telemovel = $telemovel;
        $this->pagamento = $pagamento;
        $this->tipoServico()->associate($tipoServico);
        $this->save();
    }

    public function alterarPassword(string $password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }

    public function associarAvaliacao($avaliacao, $dataNascimento, $altura, $profissao)
    {
        $this->data_nascimento = $dataNascimento;
        $this->altura = $altura;
        $this->profissao = $profissao;
        $this->avaliacaoInicial()->associate($avaliacao);
        $this->save();
    }

    public function updateCliente($nome, $telemovel, $dataNascimento, $profissao)
    {
        $this->name = $nome;
        $this->telemovel = $telemovel;
        $this->data_nascimento = $dataNascimento;
        $this->profissao = $profissao;

        $this->save();
    }


}
