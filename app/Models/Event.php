<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'hora_inicio', 'hora_fim', 'task_date'];

    public function alterarEvento($name, $description, $hora_inicio, $hora_fim, $task_date)
    {
        $this->name = $name;
        $this->description = $description;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fim = $hora_fim;
        $this->task_date = $task_date;

        $this->save();
    }
}
