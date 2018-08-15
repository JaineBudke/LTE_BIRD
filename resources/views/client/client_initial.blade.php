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
					
						@if( $object->numberEvaluations != 0 )
						<h5>Avaliação geral: {{ $object->evaluation / $object->numberEvaluations }}</h5></center>
						@else 
						<h5>Avaliação geral: Sem avaliação</h5></center>
						@endif

						<?php
						$evaluate = '/client/avaliarObjeto/'.$object->id;
						?>
						<?php
							$stars = 0;
							foreach( $historic as $hist ){
								if( $hist['id_object'] == $object->id ){

									$eval = explode(" ", $hist['event']);
									$stars = $eval[2];
								}
							}
						?>
							<?php $avaliado = false;
								  $obj = null;       
								  $count++; 
							?>

							@foreach( $evaluations as $eval )
								@if( $eval->id_object == $object->id )
									<?php $avaliado = true; 
									 	  $obj = $eval;     ?>
								@endif
							@endforeach

							@if( $avaliado == false )
							<form id="formulario" method="POST" action="{{ url( $evaluate ) }}" enctype="multipart/form-data">

								<div id="dialog-confirm" title="Deseja avaliar este recurso?">
									<center><h5 id="stars">Default</h5></center>
								</div>
								
								<?php
									$count2 += 1; 
									$id_block0 = 'cm_star-empty'.$count2;
									$id_block1 = 'cm_star-1'.$count2;
									$id_block2 = 'cm_star-2'.$count2;
									$id_block3 = 'cm_star-3'.$count2;
									$id_block4 = 'cm_star-4'.$count2;
									$id_block5 = 'cm_star-5'.$count2;
								?>

								<div class="estrelas" name="selected_star">
									<input type="radio" id="cm_star-empty" name="fb" value="0" checked/>
									<label for="{{ $id_block1 }}"><i class="fa"></i></label>
									<input type="radio" id="{{ $id_block1 }}" name="fb" value="1" onclick="evaluateObject('1')"/>
									<label for="{{ $id_block2 }}"><i class="fa"></i></label>
									<input type="radio" id="{{ $id_block2 }}" name="fb" value="2" onclick="evaluateObject('2')"/>
									<label for="{{ $id_block3 }}"><i class="fa"></i></label>
									<input type="radio" id="{{ $id_block3 }}" name="fb" value="3" onclick="evaluateObject('3')"/>
									<label for="{{ $id_block4 }}"><i class="fa"></i></label>
									<input type="radio" id="{{ $id_block4 }}" name="fb" value="4" onclick="evaluateObject('4')"/>
									<label for="{{ $id_block5 }}"><i class="fa"></i></label>
									<input type="radio" id="{{ $id_block5 }}" name="fb" value="5" onclick="evaluateObject('5')"/>
								</div>

							</form>
							@else
					
								<div id="dialog-confirm" title="Deseja avaliar este recurso?">
									<center><h5 id="stars">Default</h5></center>
								</div>
								
								<div class="estrelas">
									<input type="radio" name="fb" value=""/>
									<label><i class="fa"></i></label>
									<input type="radio" value="1"  <?php if( $obj['evaluation'] == 1 ) echo 'checked="checked"';?>/>
									<label><i class="fa"></i></label>
									<input type="radio" value="2"  <?php if( $obj['evaluation'] == 2 ) echo 'checked="checked"';?>/>
									<label><i class="fa"></i></label>
									<input type="radio" value="3"  <?php if( $obj['evaluation'] == 3 ) echo 'checked="checked"';?>/>
									<label><i class="fa"></i></label>
									<input type="radio" value="4"  <?php if( $obj['evaluation'] == 4 ) echo 'checked="checked"';?>/>
									<label><i class="fa"></i></label>
									<input type="radio" value="5"  <?php if( $obj['evaluation'] == 5 ) echo 'checked="checked"';?>/>
								</div>

							@endif

							<br>
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


									<?php $eval_obj = false;  ?>
									
									@foreach( $evaluations as $eval )
										@if( $eval != null )
											@if( $eval->id_object == $object->id )
												<?php $eval_obj = true; ?>
											@endif
										@endif
									@endforeach
									

									@if( $eval_obj == true )
										<?php 
											$url = '/client/removeEval/'.$object->id;
										?>
										<form method="POST" action="{{ url( $url ) }}" enctype="multipart/form-data">
											<button class="object-eval" type="submit"></button>			
										</form>
									@endif


								</div>

							</div>

							<div class="row" >

							<div class="col-md-8"></div>
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