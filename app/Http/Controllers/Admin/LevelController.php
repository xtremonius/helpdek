<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => 'Es necesario ingresar un nombre para el nivel.'
        ]);

        Level::create($request->all());
        return back()->with('notification', 'Se agrego el nivel correctamente.');
    }
}
