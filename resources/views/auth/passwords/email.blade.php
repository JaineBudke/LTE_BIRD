@extends('layouts.master')

@section('content')

<div class="col-md-12">
    <div class="row" style="background-color: #555B7A; height: 25vh;">
            <center>
                <h2 class="" style="color: white; margin-top: 15vh; font-size: 1.5em">RECUPERAÇÃO DE SENHA</h2>
            </center>
        </div>
    </div>
</div>

<div class="container">

    
    <div class="row">
        <div class="col-md-8 col-md-offset-2"  style="margin-top: 15vh">
            <div class="panel panel-default">
                <div class="panel-heading">Recuperação de senha</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Digite seu e-mail: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-purple">
                                    Enviar link para obter nova senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div><br><br><br><br><br><br>
</div>

@endsection
