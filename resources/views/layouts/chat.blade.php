<div class="card">
    <div class="card-header text-white bg-primary mb-10"><strong>Discusión</strong></div>
    <div class="card-body">
        <div class="panel panel-info">
            <div class="panel-heading">
               
            </div>
            <div class="panel-body">
                <ul class="media-list">
                    @foreach ($messages as $message)
                        <li class="media">
                            <div class="media-body">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle" src="{{ $message->user->avatar_path }}" width="50">


                                    </a>

                                    <div class="media-body">
                                        {{ $message->message }}
                                        <br>
                                        <small class="text-muted">{{ $message->user->name }} | {{ $message->created_at }}</small>
                                        <hr>

                                    </div>

                                </div>

                            </div>

                        </li>
                    @endforeach


                </ul>


            </div>
            <div class="panel-footer">
                <form action="/mensajes" method="post">
                    @csrf
                    <input type="hidden" name="incident_id" value="{{ $incident->id }}">
                    <div class="input-group">
                        <input type="text" class="form-control" name="message">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Enviar</button>

                        </span>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>