<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Incident;
use App\Project;
use App\ProjectUser;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        $categories = Category::where('project_id', 1)->get();
        return view('incidents.create')->with(compact('categories'));
    }


    public function store(Request $request)
    {



       $this->validate($request, Incident::$rules, Incident::$messages);

       $incident = new Incident();
       $incident->category_id = $request->input('category_id') ?: null;// ?: operador ternario? si el valor es falso
       $incident->severity = $request->input('severity');
       $incident->title = $request->input('title');
       $incident->description = $request->input('description');

       $user = auth()->user();

       $incident->client_id = $user->id;
       $incident->project_id = $user->selected_project_id;
       $incident->level_id = Project::find($user->selected_project_id)->first_level_id;

      // dd($incident->level_id);


       $incident->save();

       return back(); //vuelve a la pagina anterior que estaba el usuario.
        
    }

    public function show($id)
    {
        $incident = Incident::findOrFail($id);
        $messages = $incident->messages;
        return view('incidents.show')->with(compact('incident', 'messages'));

    }

    public function take($id)
    {
        $user = auth()->user();
        if (! $user->is_support)
            return back();
        
        $incident = Incident::findOrFail($id);
        //esta es la relacion entre proyecto y usuario
        $project_user = ProjectUser::where('project_id', $incident->project_id)
                                        ->where('user_id', $user->id)->first();

        if (! $project_user)
            return back();
        //valida si el nivel es el mismo tanto el usuario como el incidente
        if ($project_user->level_id != $incident->level_id)
            return back();

        $incident->support_id = $user->id;
        $incident->save();

        return back();

    }

    public function solve($id)
    {   
        $incident = Incident::findOrFail($id);
        //verifica si el usuario logueado es el autor del incidente
        if  ($incident->client_id != auth()->user()->id)
            return back();

        
        $incident->active = 0;
        $incident->save();
        return back();

    }

    public function open($id)
    {
        $incident = Incident::findOrFail($id);
        //verifica si el usuario logueado es el autor del incidente
        if  ($incident->client_id != auth()->user()->id)
            return back();

        
        $incident->active = 1;
        $incident->save();
        return back();

    }


    public function nextLevel($id)
    {
        $incident = Incident::findOrFail($id);
        $level_id = $incident->level_id;
        $project = $incident->project;
        $levels = $project->levels;

        $next_level_id = $this->getNextLevelId($level_id, $levels);

        if ($next_level_id)
        {
            $incident->level_id = $next_level_id;
            $incident->support_id = null;
            $incident->save();
            return back();

        }

        return back()->with('notification', 'No es posible derivar porque no hay un siguiente nivel disponible.');




    }

    private function getNextLevelId($level_id, $levels)
    {
        if (sizeof($levels) <= 1)
            return null;
        
        $position = -1;
        for ($i=0; $i<sizeof($levels)-1; $i++)
        {
            if ($levels[$i]->id == $level_id)
            {
                $position = $i;
                break;
            }

        }

        if ($position == -1)
            return null;

        //if ($position == sizeof($levels)-1)
        //    return null;

       // dd($levels[$i+3]);
        
        return $levels[$position+1]->id;




    }

    public function edit($id)
    {
        $incident = Incident::findOrFail($id);
        $categories = $incident->project->categories;
        return view('incidents.edit')->with(compact('incident', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Incident::$rules, Incident::$messages);

        $incident = Incident::findOrFail($id);


        $incident->category_id = $request->input('category_id') ?: null;// ?: operador ternario? si el valor es falso
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
 
  
 
        
 
       // dd($incident->level_id);
 
 
        $incident->save();
 
        return redirect("/ver/$id"); //vuelve a la pagina anterior que estaba el usuario.

    }



}
