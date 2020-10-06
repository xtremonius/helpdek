@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-white bg-primary mb-3">Dashboard</div>


    <div class="card-body">
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
        <label for="category_id">Categoría</label>
        <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        <select class="form-control" id="category_id" name="category_id">
            <option value="">General</option>
            @foreach($categories as $category)
                
                <option value="{{ $category->id }}" @if($incident->category_id == $category->id) selected @endif>{{ $category->name }}</option>

            @endforeach
        </select>
        </div>
        <div class="form-group">
        <label for="severity">Severidad</label>
        <select class="form-control" id="severity" name="severity">
            <option value="M" @if($incident->severity == 'M') selected @endif>Menor</option>
            <option value="N" @if($incident->severity == 'N') selected @endif>Normal</option>
            <option value="A" @if($incident->severity == 'A') selected @endif>Alta</option>
        </select>
        </div>
        <div class="form-group">
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{ old('title', $incident->title) }}">
        </div>
        <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $incident->description) }}</textarea>
        </div>
        <div class="form-group">
    
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </fieldset>
    </form>

    </div>
</div>

@endsection
