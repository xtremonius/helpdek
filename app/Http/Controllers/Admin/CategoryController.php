<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required' => 'Es necesario ingresar un nombre para la categoria.'
        ]);

        Category::create($request->all());
        return back()->with('notification', 'Se agrego la categoria correctamente.');
    }
}
