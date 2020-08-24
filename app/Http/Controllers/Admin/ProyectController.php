<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;

class ProyectController extends Controller
{
    public function index()
    {
        $projects = Project::withTrashed()->get();
        return view('admin.projects.index')->with(compact('projects'));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $categories = $project->categories;
        $levels = $project->levels;
        return view('admin.projects.edit')->with(compact('project', 'categories', 'levels'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, Project::$rules, Project::$messages);
        Project::find($id)->update($request->all());
        return back()->with('notification', 'El proyecto se ha actualizado correctamente.');

    }

    public function store(Request $request)
    {
        $this->validate($request, Project::$rules, Project::$messages);
        Project::create($request->all());
        return back()->with('notification', 'El proyecto se ha registrado correctamente.');


    }

    public function delete($id)
    {
        Project::find($id)->delete();
        return back()->with('notification', 'El proyecto se ha deshabilitado correctamente.');
    }

    public function restore($id)
    {
        Project::withTrashed()->find($id)->restore();
        return back()->with('notification', 'El proyecto se restauró correctamente.');
    }

}
