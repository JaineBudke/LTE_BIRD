@extends('client.client_dashboard')

@section('menu_first')
<li class="">
@endsection

@section('menu_second')
<li class="active-menu">
@endsection

@section('menu_third')
<li class="">
@endsection

@section('menu_fourth')
<li class="">
@endsection

@section('menu_fifth')
<li class="">
@endsection

@section('profile_image')
<?php 
    $link = '..\..\storage\app\public\users\\'.Auth::user()->image;
?>
<img src="{{ $link }}" width="48" height="48">
@endsection

@section('my_objects')
<section class="content">

    @if(Session::has('mensagem_sucesso'))
        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <h3>Meus Recursos</h3>
        </div>
        <div class="col-md-6">
            <br>
            {{ Form::open(array('url' => '/client/objectRegister', 'method'=> 'POST' )) }}
            {{ Form::submit('Novo Recurso', array('class'=>'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Link</th>
                <th scope="col">Nível de Ensino</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            @php
                $cont = 1;
            @endphp
        
            @foreach( $objects as $object )

                <tr>
                    <th scope="row"> {{ $cont }} </th>
                    <td>{{ $object->title }}</td>
                    <td>{{ $object->link }}</td>
                    <td>{{ $object->educationLevel }}</td>
                    @if( $object->requested == 1 )
                    <td>Aguardando aprovação</td>
                    @elseif( $object->requested == 2 )
                    <td>Rejeitado</td>
                    @else
                    <td>Aprovado</td>
                    @endif
                    <td>
                        <?php 
                            $detail = '/client/objectDetail/'.$object->id;
						?>
                        <a href="{{ url( $detail ) }}" class="btn btn-default btn-sm">Ver Detalhes</a>
                    </td>
                </tr>
                @php
                    $cont+=1;
                @endphp

            @endforeach
            

        </tbody>
    </table>
    {{ $objects->links() }}

</section>
@endsection