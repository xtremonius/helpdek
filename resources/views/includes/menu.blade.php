<div class="card">
    <div class="card-header text-white bg-primary mb-3">Menú</div>

    <div class="card-body">
        <div class="list-group">
            @if (auth()->check())
                <a href="#" class="list-group-item list-group-item-action">
                Dashboard
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                Ver incidencias
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                Reportar incidencias
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                Administración
                </a>
            @else
                <a href="#" class="list-group-item list-group-item-action">
                Bienvenido
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                Intrucciones
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                Créditos
                </a>
            @endif
        </div>



    </div>
</div>
