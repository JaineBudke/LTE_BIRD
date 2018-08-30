@extends('admin.admin_dashboard')

@section('menu_first')
<li class="">
@endsection

@section('menu_second')
<li class="">
@endsection

@section('menu_third')
<li class="active-menu">
@endsection

@section('menu_fourth')
<li class="">
@endsection

@section('detail')
<section class="content" style="background-color: white">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
        
            @if( $object->image != '' )
                <?php 
                    $link = 'storage/objects/'.$object->image;
                ?>
                <img src="{{ asset($link) }}" width="150" height="150">
            @else 
                <img src="{{ asset('images/padrao-objeto.jpg') }}" width="150" height="150">
            @endif
            
            
        </div>
        <div class="col-md-8">
            <h2></h2>
            <h4>{{ $object->title }} </h4>
            <?php 
                $edit = '/admin/editarRecurso/'.$object->id;
            ?>
            <a href="{{ url( $edit ) }}"><h4 style="color: #ffbd60"><i class="material-icons">edit</i>Editar</h4></a>
        </div>
        <br><br>
    </div>
    <br><br><br><br>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h4>INFORMAÇÕES SOBRE ESTE RECURSO DE APRENDIZAGEM</h4>
            <br>
            <h5>Nível de Ensino:</h5>
            <h6> - {{ ucwords( $object->educationLevel ) }} </h6>

            <h5>Descrição do recurso:</h5>
            <h6> - {{ ucwords( $object->description ) }} </h6>

            <h5>Nível de Acessibilidade: </h5>
            <h6> - {{ ucwords( $object->acessLevel ) }} </h6>

            <h5>Faixa Etária:</h5>
            @foreach( $ageRange as $ag )
                <h6> - {{ ucwords( $ag->age ) }} </h6>
            @endforeach

            <h5>Eixo(s) Norteador(es):</h5>
            @foreach( $components as $comp )
                <h6> - {{ ucwords( $comp->component ) }} </h6>
            @endforeach

            <h5>Tipo de Recurso:</h5>
            @foreach( $objTypes as $obj )
                <h6> - {{ ucwords( $obj->type ) }} </h6>
            @endforeach

            @if( $object->educationLevel == 'Ensino Fundamental 1' )
                <h5>Unidade Temática:</h5>
                @foreach( $thematics as $them )
                    <h6> - {{ ucwords( $them->thematic ) }} </h6>
                @endforeach
            @endif

        </div>
    </div>

    
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <center>
                <?php 
                    $link = '/admin/deletarObjeto/'.$object->id;
                ?>
                <form id="formulario" method="POST" action="{{ url( $link ) }}" enctype="multipart/form-data">
                    <button type="button" onclick="confirmDelete()" class="btn btn-primary">Excluir Recurso</button>
                    <div id="dialog-confirm" title="Tem certeza que deseja excluir este recurso?"></div>
                </form>
            </center>
        </div>
        <br><br>
    </div>

</section>
@endsection
