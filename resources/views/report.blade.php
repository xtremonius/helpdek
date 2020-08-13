@extends('layouts.app')

@section('content')


        <div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" class="form-control">
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="severity">Severidad</label>
                            <select name="severity" class="form-control">
                                <option value="M">Menor</option>
                                <option value="N">Normal</option>
                                <option value="A">Alta</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" value="title" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="descripcion" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Registrar incidente</button>
                           
                        </div>
                    </form>
                        
                </div>
            </div>
        </div>
@endsection
