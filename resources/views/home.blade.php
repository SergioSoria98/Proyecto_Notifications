@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enviar mensaje') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('messages.store') }}">
                        {{ csrf_field() }}
                        <div class="panel_body">
                            <div class="form-group  {{ $errors->has('recipient_id') ? 'has-error' : '' }}">
                                <select name="recipient_id" class="form-control">
                                    <option value="">Selecciona el usuario</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('recipient_id', "<span class=help-block>:message</span>") !!}
                            </div><br>
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <textarea name="body" class="form-control" placeholder="Escribe aqui tu mensaje.."></textarea>
                                {!! $errors->first('body', "<span class=help-block>:message</span>") !!}
                            </div><br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Enviar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
