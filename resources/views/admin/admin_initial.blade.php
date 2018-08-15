@extends('admin.admin_dashboard')

@section('menu_first')
<li class="active">
@endsection

@section('menu_second')
<li class="">
@endsection

@section('menu_third')
<li class="">
@endsection

@section('menu_fourth')
<li class="">
@endsection

@section('content')

<section class="content">
        <div class="container-fluid">

            @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
            @endif
            
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix" >

                <a href="{{ url('/admin/cadastrar') }}" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">CADASTRAR NOVO RED</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>

                </div></a>
                <a href="{{ url('/admin/lista') }}" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">list</i>
                        </div>
                        <div class="content">
                            <div class="text">VISUALIZAR REDs</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div></a>


                <a href="{{ url('/admin/avaliar') }}" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done_all</i>
                        </div>
                        <div class="content">
                            <div class="text">AVALIAR REDs</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div></a>


            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Atividade</th>
                        <th scope="col">Data</th>
                        <th scope="col">User</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $cont = 1;
                    @endphp
                
                    @foreach( $activities as $activity )

                        <tr>
                            <th scope="row"> {{ $cont }} </th>
                            <td>{{ $activity->event }}</td>
                            <td>{{ $activity->created_at }}</td>
                            <td>{{ $activity->name }}</td>

                        </tr>
                        @php
                            $cont+=1;
                        @endphp

                    @endforeach
                    
   
                </tbody>
            </table>
            {{ $activities->links() }}
     

        
            
        </div>
    </section>

@endsection