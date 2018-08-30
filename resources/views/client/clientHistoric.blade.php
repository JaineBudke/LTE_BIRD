@extends('client.client_dashboard')

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

@section('menu_fifth')
<li class="">
@endsection


@section('historic')
<section class="content">

    <div class="row">
        <div class="col-md-2">
            <h3>Histórico</h3>
        </div>
    </div>
    <br><br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Atividade</th>
                <th scope="col">Data</th>
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

                </tr>
                @php
                    $cont+=1;
                @endphp

            @endforeach
            

        </tbody>
    </table>
    {{ $activities->links() }}

</section>
@endsection
