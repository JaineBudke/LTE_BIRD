@extends('client.client_dashboard')

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

@section('menu_fifth')
<li class="">
@endsection

@section('profile_image')
<?php 
    $link = '..\storage\app\public\users\\'.Auth::user()->image;
?>
<img src="{{ $link }}" width="48" height="48">
@endsection



@section('initial')

<section class="content">

    <div class="mais-acessados container">

		<div class="col-md-12" style="padding-right: 100px">
			<br><br>

			
			<?php 
				$count = 0;
				$count2 = 0;
			?>			

			@foreach( $objects as $object )

				<div class="col-md-3" style="border: 0.2em solid white; background-color: white">

					<?php
						$str_nivel = strtoupper($object->educationLevel);
					?>

					<div class="row block-level"><center>{{ $str_nivel }}</center></div>


					@if( $object->image != '' )
						<?php 
							$link = '..\storage\app\public\objects\\'.$object->image;
						?>
						<div class="row">
							<center><a href="{{ $object->link }}">
								<img class="image-recurso" onmouseover="swapImage(this)" src="{{ $link }}" />
								<img class="image-recurso-acessar" onmouseleave="swapImageAgain(this)"  src="{{ asset('images/acessar_recurso.png') }}" style="display: none"/>							
							</a></center>
						</div>
					@else 
						<div class="row">
							<center><a href="{{ $object->link }}">
								<img class="image-recurso" onmouseover="swapImage(this)" src="{{ asset('images/padrao-objeto.jpg') }}" />
								<img class="image-recurso-acessar" onmouseleave="swapImageAgain(this)"  src="{{ asset('images/acessar_recurso.png') }}" style="display: none"/>							
							</a></center>
						</div>
					@endif


					<?php 
						$url = '/objects/save/'.$object->id;
					?>

					<div class="object_block">
						<center><h6 class="font-title block-title">{{ $object->title }}</h6>
					

											
							<?php $avaliado = false;
								  $obj = null;       
								  $count++; 
							?>

							<div class="row">

								<?php 
									$url = '/client/removeSaved/'.$object->id;
								?>
								<div class="col-md-5" style="margin-left: 10px">
									<form method="POST" action="{{ url( $url ) }}" enctype="multipart/form-data">
										<button class="object-save" type="submit"></button>
									</form>
								</div>
								<div class="col-md-6">
									<?php
                                                                        $id_block = 'more-info'+$count;
                                                                        ?>
                                                                <div onclick="objectDetail( {{ $id_block }} )" class="col-md-2 more-info-icon"></div>

                                                                <div class="col-md-3" id="{{ $id_block }}" title="{{ $object->title }}" style="display: none">
                                                                        <h5>Nível de Ensino:</h5>
                                                                        <h6> - {{ ucwords( $object->educationLevel ) }} </h6>

                                                                        <h5>Descrição do recurso:</h5>
                                                                        <h6> - {{ ucwords( $object->description ) }} </h6>

                                                                        <h5>Nível de Acessibilidade: </h5>
                                                                        <h6> - {{ ucwords( $object->acessLevel ) }} </h6>
                                                                </div>

								</div>

							</div>

					
							
							<br>

					</div>
					
				</div>

				
				
				
			@endforeach
			


		</div>

		

		
		<center>
		{{ $objects->links() }}
		</center>
		
    </div>



</section>

@endsection
