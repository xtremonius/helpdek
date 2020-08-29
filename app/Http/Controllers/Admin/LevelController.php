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


    public function update(Request $request)
    {  /*
        $level_id = $request->input('level_id');
        $level = Level::find($level_id);
        echo "Variable $level->name : ".$level->name;
    
        echo "Variable Name: ".$request->input('name')."<BR>";
        echo "Variable level ID: ".$request->input('level_id');*/
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => 'Es necesario ingresar un nombre para el nivel.'
        ]);
        
        
        $level_id = $request->input('level_id');
        $level = Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();
        return back()->with('notification', 'Se modifico el nivel correctamente.');
    }

    public function delete($id)
    {
        $level = Level::find($id)->delete();
        return back()->with('notification', 'El nivel se ha dado de baja correctamente.');;
    }

    public function byProject($id)
    {
        return Level::where('project_id', $id)->get();

    }
}
