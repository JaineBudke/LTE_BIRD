@extends('client.client_dashboard')

@section('menu_first')
<li class="active-menu">
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

				<div class="col-md-3" >


					@if( $object->image != '' )
						<?php 
							$link = 'storage/objects/'.$object->image;

						?>
						<div class="row">
							<center><a href="{{ $object->link }}">
								<img class="image-recurso" src="{{ asset($link) }}" />
							</a></center>
						</div>
					@else 
						<div class="row">
							<center><a href="{{ $object->link }}">
								<img class="image-recurso" src="{{ asset('images/padrao-objeto.jpg') }}" />
							</a></center>
						</div>
					@endif


					<?php 
						$url = '/objects/save/'.$object->id;
					?>

					<div>
						<center><h6 class="font-title block-title">{{ $object->title }}</h6>
					
							<?php $avaliado = false;
								  $obj = null;       
								  $count++; 
							?>

							<div class="row" style="margin-top: -30px">

								<?php 
									$url = '/client/removeSaved/'.$object->id;
								?>
								<div class="col-md-2"></div>
								<div class="col-md-3" style="margin-left: 10px">
									<form method="POST" action="{{ url( $url ) }}" enctype="multipart/form-data">
										<button class="button-save" type="submit"><i class="fa fa-star" style="color: #4d4d4d; font-size: 1.5em"></i></button>
									</form>
								</div>
								<div class="col-md-3">
									<?php
										$id_block = 'more-info'.$count;
										?>
								<div onclick="objectDetail( {{ $id_block }} )" class="col-md-2 more-info-icon"><i class="fa fa-info-circle" style="color: #4d4d4d; font-size: 2em"></i></div>

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

    </div>


		<div class="col-md-12" style="padding-right: 100px">

		<center>
		{{ $objects->links() }}
		</center>

		</div>



</section>

@endsection
