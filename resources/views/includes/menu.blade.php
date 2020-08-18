<div class="card">
    <div class="card-header text-white bg-primary mb-3">Menú</div>

        <div class="card-body">        
            
          <ul class="nav nav-pills flex-column">
            @if (auth()->check())
                <li class="nav-item">
                    <a @if(request()->is('home')) class="nav-link active" @else class="nav-link" @endif href="/home">Dashboard</a>
                </li>
                @if (! auth()->user()->is_client)
                    <li class="nav-item">
                        <a @if(request()->is('ver')) class="nav-link active" @else class="nav-link" @endif href="/ver">Ver incidencia</a>
                    </li>   
                @endif
                <li class="nav-item">
                    <a @if(request()->is('reportar')) class="nav-link active" @else class="nav-link" @endif href="/reportar">Reportar incidencia</a>
                </li> 
                
                @if (auth()->user()->is_admin)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administración</a>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="reportar">Usuarios</a>
                            <a class="dropdown-item" href="#">Proyectos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Configuración</a>
                        </div>
                    </li>
                @endif

            </ul>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            @endif 

        </div>
</div>
