@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-white bg-primary mb-3">Dashboard</div>

    <div class="card-body">
        @if (auth()->user()->is_support)

            <div class="card">
                <div class="card-header text-white bg-success mb-3">Incidencias asignadas a mi</div>
                    
                    <div class="card-body p-3 mb-2 bg-light text-dark">
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Categoria</th>
                                    <th>Severidad</th>
                                    <th>Estado</th>
                                    <th>Fecha creación</th>
                                    <th>Resumen</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard_my_incidents">
                                @foreach ($my_incidents as $incident)
                                    <tr>
                                        <td><a href="/ver/{{ $incident->id }}">{{ $incident->id }}</a></td>
                                        <td>{{ $incident->category_name }}</td>
                                        <td>{{ $incident->severity_full }}</td>
                                        <td>{{ $incident->state }}</td>
                                        <td>{{ $incident->created_at }}</td>
                                        <td>{{ $incident->title_short}}</td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-header text-white bg-info mb-3">Incidencias sin asignar</div>
                    
                    <div class="card-body p-3 mb-2 bg-light text-dark">
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Categoria</th>
                                    <th>Severidad</th>
                                    <th>Estado</th>
                                    <th>Fecha creación</th>
                                    <th>Resumen</th>
                                    <th>Opción</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard_pending_incidents">
                            @foreach ($pending_incidents as $incident)
                                <tr>
                                    <td><a href="/ver/{{ $incident->id }}">{{ $incident->id }}</a></td>
                                    <td>{{ $incident->category_name }}</td>
                                    <td>{{ $incident->severity_full }}</td>
                                    <td>{{ $incident->state }}</td>
                                    <td>{{ $incident->created_at }}</td>
                                    <td>{{ $incident->title_short}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Atender</a>
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br><br>
        @endif
        <div class="card">
            <div class="card-header text-white bg-danger mb-3">Incidencias reportadas por mi</div>
                
                <div class="card-body p-3 mb-2 bg-light text-dark">
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Categoria</th>
                                <th>Severidad</th>
                                <th>Estado</th>
                                <th>Fecha creación</th>
                                <th>Resumen</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_by_me">
                            @foreach ($incidents_by_me as $incident)
                            <tr>
                                <td><a href="/ver/{{ $incident->id }}">{{ $incident->id }}</a></td>
                                <td>{{ $incident->category_name }}</td>
                                <td>{{ $incident->severity_full }}</td>
                                <td>{{ $incident->state }}</td>
                                <td>{{ $incident->created_at }}</td>
                                <td>{{ $incident->title_short}}</td>
                                <td><strong>{{ $incident->support_id  ?: 'Sin asignar' }}</strong></td>
                            </tr>
                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

       <!-- <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Incidencias asignadas a mi</div>

            
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoria</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha creacion</th>
                            <th>Resumen</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard_my_incidents"></tbody>
                </table>

            </div>

        </div>

    </div> -->
</div>

@endsection
