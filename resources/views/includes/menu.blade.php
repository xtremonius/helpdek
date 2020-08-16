<div class="card">
    <div class="card-header text-white bg-primary mb-3">Menú</div>

        <div class="card-body">        
            
            <ul class="nav nav-pills flex-column">
            @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link p-3 mb-2 bg-light text-dark" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3 mb-2 bg-light text-dark" href="#">Ver incidencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3 mb-2 bg-light text-dark" href="#">Reportar incidencia</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-3 mb-2 bg-light text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administración</a>
                    <div class="dropdown-menu" style="">
                    <a class="dropdown-item" href="usuarios">Usuarios</a>
                    <a class="dropdown-item" href="#">Proyectos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Configuración</a>
                    </div>
                </li>

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
