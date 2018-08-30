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
<section class="content" style="background-color: white">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h3>Meu Perfil</h3>
        </div>
    </div>
    <br><br>
    <form method="POST" action="{{ url('/client/editProfile') }}">
    
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                @php
                    $graduate   = Auth::user()->graduate;
                    $occupation = Auth::user()->occupation;
                    $age        = Auth::user()->age;
                    $gender     = Auth::user()->gender;
                    $state      = Auth::user()->state;
                    $city       = Auth::user()->city;
                @endphp

                <label class="form-label">Formação: </label>
                <input type="text" class="form-control" name="graduate" value="<?php echo htmlspecialchars($graduate); ?>" >

                <label class="form-label">Profissão: </label>
                <input type="text" class="form-control" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>">

                <label class="form-label">Idade: </label>
                <input type="text" class="form-control" name="age" value="<?php echo htmlspecialchars($age); ?>" >

                <label class="form-label">Sexo: </label>
                <input type="text" class="form-control" name="gender" value="<?php echo htmlspecialchars($gender); ?>">

                <label class="form-label">Estado: </label>
                <input type="text" class="form-control" name="state" value="<?php echo htmlspecialchars($state); ?>">

                <label class="form-label">Município: </label>
                <input type="text" class="form-control" name="city" value="<?php echo htmlspecialchars($city); ?>">
                
                <br><br><br>
                <input type="submit" id="finish" value="Salvar" class="btn btn-primary"/>

            </div>
        </div>

    </form>


</section>
@endsection
