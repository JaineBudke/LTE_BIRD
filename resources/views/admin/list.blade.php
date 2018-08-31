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

@section('content')

<section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="header">
                    <h2>LISTA DE RECURSOS DIGITAIS CADASTRADOS</h2>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">ID_Usuário</th>
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
                            @if( $object->name != null )
                            <td>{{ $object->name }}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>
                                <?php 
                                    $detail = '/admin/objectDetail/'.$object->id;
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

        
            
        </div>
    </section>

@endsection