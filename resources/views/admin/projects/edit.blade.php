@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-white bg-primary mb-3">Editar proyecto</div>


    <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>    
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="" method="POST">
                @csrf
                <fieldset>


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" value="{{ old('name', $project->name ) }}">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp" placeholder="Enter description" value="{{ old('description', $project->description) }}">
                    </div>
                    <div class="form-group">
                        <label for="start">Fecha de inicio</label>
                        <input type="date" class="form-control" id="start" name="start" aria-describedby="emailHelp" value="{{ old('start', $project->start) }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar proyecto</button>
                </fieldset>
            </form>

            <div class="row">
                <div class="col-md-6">
                    <p>Categorias</p>
                    <form class="form-inline" action="/categorias" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Añadir</button>
                        </div>

                    </form>
                    </br>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($categories as $category)
                               
                           
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="/proyecto" class="btn btn-sm btn-primary" title="Editar">
                                            <svg width="15" height="15" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                         <a href="/proyecto/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                            <svg width="15" height="15" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                             @endforeach
                        </tbody>
                      </table>

                </div>
                <div class="col-md.6">
                    <p>Niveles</p>
                    <form class="form-inline" action="/niveles" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Añadir</button>
                        </div>

                    </form>
                    </br>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $key => $level)
                                
                            
                                <tr>
                                <th scope="row">N{{ $key+1 }}</th>
                                    <td>{{ $level->name }}</td>
                                    <td>
                                        <a href="/proyecto" class="btn btn-sm btn-primary" title="Editar">
                                            <svg width="15" height="15" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                         <a href="/proyecto/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                            <svg width="15" height="15" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                             @endforeach
                        </tbody>
                      </table>

                </div>

            </div>

          

            
              
              
    </div>
</div>

@endsection
