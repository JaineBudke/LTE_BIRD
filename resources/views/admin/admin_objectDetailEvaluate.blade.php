@extends('admin.admin_dashboard')

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
                $accept = '/admin/aceitarRecurso/'.$object->id;
                $reject = '/admin/rejeitarRecurso/'.$object->id;
            ?>
                <form id="form_accept" method="POST" action="{{ url( $accept ) }}" enctype="multipart/form-data">
                    <button type="button" onclick="confirmAccept()" class="btn btn-primary">Aceitar Recurso</button>
                    <div id="accept-confirm" title="Tem certeza que deseja aceitar este recurso?"></div>
                </form>
                <br>
                <form id="form_reject" method="POST" action="{{ url( $reject ) }}" enctype="multipart/form-data">
                    <button type="button" onclick="confirmReject()" class="btn btn-primary">Rejeitar Recurso</button>
                    <div id="accept-reject" title="Tem certeza que deseja rejeitar este recurso?"></div>
                </form>
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

</section>
@endsection
