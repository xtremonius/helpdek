<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->get();
        return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request)
    {
        $messages = [
            'email.required' => 'Es necesario ingresar un e-mail!',
            'email.email' => 'El e-mail ingresado no es valido.',
            'email.max' => 'El e-mail es demasiado extenso.',
            'email.unique' => 'El e-mail ya se encuentra en uso.',
            'name.required' => 'Debe ingresar un nombre de usuario !',
            'name.max' => 'El nombre es demasiado extenso.',
            'password.required' => 'Debe ingresar una contraseña!',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.',
    
        ];

        $rules = [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            
        ];
        $this->validate($request, $rules, $messages);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 1;
        $user->save();


        //dd($request->all());
        return back()->with('notification', 'Usuario registrado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with(compact('user'));
    }

    public function update($id, Request $request)
    {
        $messages = [

            'name.required' => 'Debe ingresar un nombre de usuario !',
            'name.max' => 'El nombre es demasiado extenso.',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.',
    
        ];

        $rules = [
            
            'name' => 'required|string|max:255',
            'password' => 'string|min:8',
            
        ];
        $this->validate($request, $rules, $messages);
        $user = User::find($id);
        $user->name = $request->input('name');
        $password = $request->input('password');
        if($password)
            $user->password = bcrypt($password);
        
        $user->save();
        return back()->with('notification', 'Usuario modificado correctamente.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('notification', 'El usuario se ha dado de baja correctamente.');

    }
}
