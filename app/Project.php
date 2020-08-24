<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public static $rules = [
        'name' => 'required',
        //'description' => '',
        'start' => 'date'
    ];

    public static $messages = [
        'name.required' => 'Es necesario ingresar el nombre',
        'start.date' => 'La fecha no tiene un formato adecuado.'
    ];

    protected $fillable = [
        'name', 'description', 'start',
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }


}
