@extends('layouts.master')

@section('title', 'BIRD')


@section('header')
<section>
    <!-- Header -->
    <div style="width: 100vw">
        <img src="{{ asset('images/homebg-7.png') }}">
    </div>
</section>
@endsection


@section('intro')
<section class="page-section" id="intro">
    <div class="container intro">
        <div class="row margin-bottom-50">
            <!--<div class="col-md-12 text-center">
                <h1 class="title-section"><span class="title-regular">Banco Interdisciplinar de Recursos Digitais <strong>(BIRD)</strong></span><br/></h1>
                <hr class="title-underline-center">
            </div>-->
        </div>
        <div class="row text-center">
            <div>
                <div class="col-md-3 col-sm-6"></div>
                <div class="col-md-3 col-sm-6">
                    <div>
                        <i class="fa fa-folder" style="color: #fd840d; font-size: 5em"></i>
                        <label><h4 style="font-size: 2em">{{ $obj_count }}</h4>
                            Recursos adicionados</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div>
                        <i class="fa fa-users" style="color: #fd840d; font-size: 5em"></i>
                        <label><h4 style="font-size: 2em">{{ $users_count }}</h4>
                        Usuários cadastrados</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6"></div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('explore')
<section style="background-color: rgb(250, 250, 250)">
    <div class="col-md-12" style="margin-top: 1.5em">
        <div class="mais-acessados container">
            <br><br>
            <center><h2 class="title-section"><span class="title-regular">Recursos Populares</span></h2></center>
            

            <div class="col-md-12">
                <div class="mais-acessados container">

                    <div class="col-md-12">
                        <br><br><br>

                        <?php 
                            $count = 0;
                            $ative = false;
                        ?>


                        @foreach( $objects as $object )
                        
                        <div class="col-md-3" style="">
    
                           
                            <?php 
                                $link = 'storage/objects/'.$object->image;
                                $count++;
                            ?>
                            
                            <div class="row">
                                <center><a target="_blank" href="{{ $object->link }}">
                                    <img class="image-recurso" src="{{ asset($link) }}" />
                                    <!--<img class="image-recurso-acessar" onmouseleave="swapImageAgain(this)"  src="{{ asset('images/acessar_recurso.png') }}" style="display: none"/>-->							
                                </a></center>
                            </div>
    
    
                            <?php 
                                $url = '/objects/save/'.$object->id;
                            ?>
                            


                             <div>
                                    <center><h6 class="font-title block-title">{{ $object->title }}</h6></center>
                                    <form method="post" action="{{ url( $url ) }}">
                                        <div class="row" style="margin-top: -30px">
                                            <center>
                                                <?php $saved_obj = false;  ?>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                @if( Auth::check() )
                                                    @foreach( $saved_object as $saved )
                                                        @if( $saved != null )
                                                            @if( $saved->id_object == $object->id )
                                                                <?php $saved_obj = true; ?>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
        
                                                @if( $saved_obj == false )
                                                    <button class="button-save" type="submit"><i class="fa fa-save" style="color: #fd840d; font-size: 1.5em"></i></button>
                                                    <!--button class="button-save button-active"></button>-->
                                                @else
                                                    <button class="button-save" type="submit"><i class="fa fa-save" style="color: #fd840d; font-size: 1.5em"></i></button>

                                                    <!--<button class="button-save button-deactivated" type="button"></button>-->
                                                @endif
            
                                                </div>
        
                                                <?php 
                                                    $id_block = 'more-info'+$count;
                                                    ?>
                                                <div onclick="objectDetail( {{ $id_block }} )" class="col-md-2 more-info-icon"><i class="fa fa-info-circle" style="color: #fd840d; font-size: 2em"></i></div>

                                                
                                                <div id="{{ $id_block }}" title="{{ $object->title }}" style="display: none">
                                                    <h5>Nível de Ensino:</h5>
                                                    <h6> - {{ ucwords( $object->educationLevel ) }} </h6>
        
                                                    <h5>Descrição do recurso:</h5>
                                                    <h6> - {{ ucwords( $object->description ) }} </h6>
        
                                                    <h5>Nível de Acessibilidade: </h5>
                                                    <h6> - {{ ucwords( $object->acessLevel ) }} </h6>
                                                </div>
        
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            
                        </div>
    
                    @endforeach

                    </div>
                </div>
            </div>
            
        </div>
        <br><br><br><br><br>
    </div>
</section>
@endsection


@section('features')
<!--<section class="page-section ">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title-section"><span class="title-regular">RECURSOS DE</span><br/>APRENDIZAGEM</h2>
                <hr class="title-underline " />
                <div class="row">
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-gamepad"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Jogos</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-gears"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Simuladores</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">  
                                <i style="margin-top: 8px" class="fa fa-book"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">e-books</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-microphone"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Podcast</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-picture-o"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Imagens</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-video-camera"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Vídeos</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-cube"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Infográficos</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i style="margin-top: 8px" class="fa fa-code"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="objects-font">Outros</h4>
                                <a href="{{ url('/explore') }}"><p class="see-objects-font">Ver objetos</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
@endsection
