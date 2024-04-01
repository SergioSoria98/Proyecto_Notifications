@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Notificaciones</h1><br>
        <div class="row">
            <div class="col-sm-6">
                <h2>No leídas</h2>
                
                <ul class="list-group">
                    @foreach ($unreadNotifications as $unreadNotification)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="{{ $unreadNotification->data['link'] }}">{{ $unreadNotification->data['text'] }}</a>
                           
                            <form method="POST" action="{{ route('notifications.read', $unreadNotification->id) }}" style="margin-left: auto;">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <button class="btn btn-danger">X</button>
                            </form>
                            
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6">
                <h2>Leídas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $readNotification)
                    <li class="list-group-item d-flex justify-content-between">
                        <a href="{{ $readNotification->data['link'] }}">{{ $readNotification->data['text'] }}</a>

                        <form method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}" style="margin-left: auto;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">X</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop