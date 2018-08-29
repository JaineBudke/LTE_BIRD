@extends('layouts.master')


@section('title', 'BIRD - Login')



@section('content')


<div class="col-md-12">
    <div class="row" style="background-color: #555B7A; height: 40vh;">
			<center>
				<h2 class="title-section">LOGIN</h2>
			</center>
		</div>
    </div>
</div>
    
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="min-height: 60vh">
            
            <br><br><br>
            <div >
                <!--<div class="panel-heading">Entrar</div>-->


                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" style="height: 3em" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Senha</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" style="height: 3em" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" style="background-color: #555B7A; border: 0.1em solid white">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #555B7A">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
