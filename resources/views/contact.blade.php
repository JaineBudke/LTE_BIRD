@extends('layouts.master')

@section('title', 'BIRD - Contato')


@section('content')

<section style="background-color: #f2f2f2">

	<div class="col-md-12">
		<div class="row" style="background-color: #555B7A; height: 40vh;">
			<center>
				<h2 class="title-section">CONTATO</h2>
			</center>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-1"></div>
			
			<div class="col-md-10">
				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:300px;width:100%;'><div id='gmap_canvas' style='height:300px;width:100%;'></div><div><small><a href="embedgooglemaps.com/pt/">https://embedgooglemaps.com/pt/</a></small></div><div><small><a href="http://sparpedia.no/">http://www.sparpedia.no</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(-5.838797339056119,-35.19596535335461),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-5.838797339056119,-35.19596535335461)});infowindow = new google.maps.InfoWindow({content:'<strong>LTE</strong><br> Centro de Educação - CE / UFRN<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>



			<div class="col-md-1"></div>

		</div>
		<br><br><br><br>
		<div class="row" >

			<div class="col-md-1"></div>

			<div class="col-md-3 col-sm-12 col-xsm-12" >
				<br>
				<div class="row">
					<div class="col-md-12" >
						<center><i class="fa fa-map" style="color: #4d4d4d; font-size: 3em"></i></center>					
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12" >
						<center><h2 class="text-contact">Campus Universitário UFRN - Lagoa Nova</h2></center>
						<center><h2 class="text-contact">CEP 59.072-970 | Natal - RN, Brasil</h2></center>
					</div>
				</div>
				<br>
			</div>

			<div class="col-md-4 col-sm-12 col-xsm-12 " >
				<br>
				<div class="row">
					<div class="col-md-12" >
						<center><i class="fa fa-phone" style="color: #4d4d4d; font-size: 3em"></i></center>					
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12" >
						<center><h2 class="text-contact">Fone: (84) 3342-2270 </h2></center>
						<center><h2 class="text-contact">Fax: (84) 3342-2270 - R. 272</h2></center>
					</div>
				</div>
				<br>
			</div>

			<div class="col-md-3 col-sm-12 col-xsm-12 " >
				<br>
				<div class="row">
					<div class="col-md-12" >
						<center><i class="fa fa-envelope" style="color: #4d4d4d; font-size: 3em"></i></center>					
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" >
						<center><h2 class="text-contact"> lte@ce.ufrn.br </h2></center>
						<center><h2 class="text-contact"><br><i>Coordenadora LTE:</i> cibelle.amorim@ce.ufrn.br</h2></center>
					</div>
				</div>
				<br>
			</div>

        </div>
    	<div class="col-md-1"></div>

		<br><br><br><br><br><br>

	</div>

</section>

@endsection