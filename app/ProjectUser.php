<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $table = 'project_user';

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public static $rules = [
        'project_id' => 'required|exists:projects,id',
        'level_id' => 'required|exists:levels,id',
        'user_id' => 'required|exists:users,id'
        //'start' => 'date'
    ];

    public static $messages = [
        'project_id.required' => 'Es necesario seleccionar el proyecto.',
        'project_id.exists' => 'El proyecto seleccionado no existe en la base de datos.',
        'level_id.required' => 'Es necesario seleccionar el nivel.',
        'level_id.exists' => 'El nivel seleccionado no existe en la base de datos.',
        'user_id.required' => 'Error no se esta enviando el usuario.',
        'user_id.exists' => 'El usuario no existe en la base de datos.'
       // 'start.date' => 'La fecha no tiene un formato adecuado.'
    ];
}
