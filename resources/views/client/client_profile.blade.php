@extends('client.client_dashboard')

@section('menu_first')
<li class="">
@endsection

@section('menu_second')
<li class="">
@endsection

@section('menu_third')
<li class="">
@endsection

@section('menu_fourth')
<li class="active-menu">
@endsection

@section('menu_fifth')
<li class="">
@endsection

@section('profile')
<section class="content" >
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">

            <div class="form-line">
                @if( Auth::user()->image != NULL )
                    <?php 
                        $link = 'storage/users/'.Auth::user()->image;
                    ?>
                    <img src="{{ asset($link) }}" width="150" height="150">
                @else 
                    <img src="{{ asset('images/user.png') }}" width="150" height="150" alt="User" />
                @endif
            </div>


        </div>
        <div class="col-md-8">
            <form id="form-set-image" method="POST" action="{{ url( '/client/editProfileImage' ) }}" enctype="multipart/form-data">
                <br><label>Deseja alterar a imagem de perfil? Selecione um arquivo abaixo.</label>
                <input type="file" name="image" id="image">
                <br>
                <button type="button" class="btn btn-purple"  onclick="setProfileImage()">Alterar imagem</button>
                <div id="confirm-set-image" title="Tem certeza que deseja alterar a foto?"></div>
            </form>
            
        </div>
        <br><br>
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <a href="{{ url('client/editarPerfil') }}"><h4 style="color: #FD840D"><i class="material-icons">edit</i>Editar</h4></a>
            <h2>{{ Auth::user()->name }}</h2>
            <h4>{{ Auth::user()->email }} </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h4>Ajude-nos a melhorar este sistema! Mantenha seus dados pessoais atualizados =]</h4>
            <br>
            <h5>Formação: {{ Auth::user()->graduate }}</h5>
            <h5>Profissão: {{ Auth::user()->occupation }}</h5>
            <h5>Idade: {{ Auth::user()->age }}</h5>
            <h5>Sexo: {{ Auth::user()->gender }}</h5>
            <h5>Estado: {{ Auth::user()->state }}</h5>
            <h5>Município: {{ Auth::user()->city }}</h5>
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-md-12">
            <center>

                <?php 
                    $link = '/client/deletarConta';
                ?>
                <!--<form id="formulario" method="POST" action="{{ url( $link ) }}" enctype="multipart/form-data">
                    <button type="button" onclick="confirmDeleteAccount()" class="btn btn-purple">Excluir Conta</button>
                    <div id="confirm-delete-acc" title="Tem certeza que deseja excluir seu perfil?"></div>
                </form>-->

            </center>
        </div>
        <br><br>
    </div>
</section>
@endsection
