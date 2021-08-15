<?php


namespace App\Models;


class ExercicioHandler
{
    public function getTipoExercicios()
    {
        return TipoExercicio::all();
    }

    public function getExercicios()
    {
        return Exercicio::all();
    }

    public function addExercicio(string $nome, ?string $musculos, int $idTipoExercicio, ?int $idTipoExercicio2, string $pathFotoVideo)
    {
        $tipoExercicio = TipoExercicio::find($idTipoExercicio);
        $tipoExercicio2 = TipoExercicio::find($idTipoExercicio2);
        Exercicio::createExercicio($nome, $musculos, $tipoExercicio, $tipoExercicio2, $pathFotoVideo);
    }

    public function getExercicio(int $id)
    {
        return Exercicio::find($id);
    }

    public function getTipoFicheiro(int $id): bool
    {
        $videoFormat = ['webm', 'mkv', 'flv', 'vob', 'ogv', 'ogg', 'drc', 'gifv', 'mng', 'avi', 'MTS', 'M2TS', 'TS', 'mov', 'qt', 'wmv', 'yuv', 'rm', 'rmvb', 'viv', 'asf', 'amv', 'mp4', 'm4p', 'm4v', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'm2v', 'm4v', 'svi', '3gp', '3g2', 'mxf', 'roq', 'nsv', 'flv', 'f4v', 'f4p', 'f4a', 'f4b'];
        $video = false;
        $exercicio = Exercicio::find($id);
        $pointExtension = $exercicio->foto_video[strlen($exercicio->foto_video) - 4];
        if($pointExtension == ".")
            $extension = substr($exercicio->foto_video, strlen($exercicio->foto_video)-3, strlen($exercicio->foto_video));
        else
            $extension = substr($exercicio->foto_video, strlen($exercicio->foto_video)-4, strlen($exercicio->foto_video));

        foreach($videoFormat as $format) {
            if($format == $extension)
                $video = true;
        }

        return $video;
    }

    public function updateExercicio(int $id, string $nome, ?string $musculos, int $idTipoExercicio, ?int $idTipoExercicio2, string $pathFotoVideo)
    {
        $exercicio = Exercicio::find($id);
        $count = 1;
        $containsIdTipoExercicio2 = 0;

        foreach (TipoExercicio::all() as $tipoExercicioFor){
            if ($exercicio->tipoExercicios->contains($tipoExercicioFor->id) && $count == 1) {
                $containsIdTipoExercicio = $tipoExercicioFor->id;
                $count++;
                printf($containsIdTipoExercicio);
            } else if ($exercicio->tipoExercicios->contains($tipoExercicioFor->id) && $count == 2) {
                $containsIdTipoExercicio2 = $tipoExercicioFor->id;
                $count++;
                printf($containsIdTipoExercicio2);
            }
        }
        if($idTipoExercicio != $containsIdTipoExercicio) {
            $tipoExercicio = TipoExercicio::find($containsIdTipoExercicio);
            $exercicio->tipoExercicios()->detach($tipoExercicio);
            $tipoExercicio = TipoExercicio::find($idTipoExercicio);
        } else {
            $tipoExercicio = null;
        }

        if($idTipoExercicio2 != $containsIdTipoExercicio2 && $idTipoExercicio2 != 0) {
            if($containsIdTipoExercicio2 != 0) {
                $tipoExercicio2 = TipoExercicio::find($containsIdTipoExercicio2);
                $exercicio->tipoExercicios()->detach($tipoExercicio2);
            }
            $tipoExercicio2 = TipoExercicio::find($idTipoExercicio2);

        } else {
            $tipoExercicio2 = null;
        }

        $exercicio->updateExercicio($nome, $musculos, $tipoExercicio, $tipoExercicio2, $pathFotoVideo);
    }

    public function getExerciciosFiltros()
    {
        $exerciciosFiltros = [];
        foreach (Exercicio::all() as $exercicio) {
            $exerciciosFiltros[$exercicio->id] = [$exercicio];
            foreach ($exercicio->tipoExercicios()->get() as $tipoExercicio) {
                array_push($exerciciosFiltros[$exercicio->id], $tipoExercicio->id);
            }
        }
        return $exerciciosFiltros;
    }

    public function getExerciciosByTipo(int $id)
    {
        $exercicios = array();
        foreach (Exercicio::all() as $exercicio) {
            if ($exercicio->tipoExercicios->contains($id)) {
                array_push($exercicios, $exercicio->nome);
            }
        }
        return $exercicios;
    }

    public function getTipoExercicio(int $id)
    {
        return TipoExercicio::find($id);
    }

    public function deleteExercicio(int $id)
    {
        $exercicio = Exercicio::find($id);
        $exercicio->tipoExercicios()->detach();
        $exercicio->delete();
    }
}
