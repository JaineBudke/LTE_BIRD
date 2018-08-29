@extends('layouts.master')

@section('title', 'BIRD - Explore')


@section('content')
<section style="background-color: #f2f2f2">

	<div class="col-md-12">
		<div class="row" style="background-color: #555B7A; height: 40vh;">
			<center>
				<h2 class="title-section">EXPLORE</h2>
			</center>
		</div>
		<br><br><br>

		@if(Session::has('mensagem_sucesso'))
        <center><div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div></center>
		@endif

		@if(Session::has('mensagem_erro'))
        <center><div class="alert alert-danger">{{ Session::get('mensagem_erro') }}</div></center>
    	@endif
		
		<div class="row">
			<center><h3>Busque por recursos digitais!</h3></center>
		</div>
		<div class="row">
			<div class="col-md-12">
				<br>
				
				<div class="col-md-2"></div>

				<div class="col-md-8" >
					
					@if( $ensino == 'infantil' )
						<div class="row" style="margin-left: 0.1em">
						<form method="POST" action="{{ url('/searchFund') }}" enctype="multipart/form-data">
							<button type="button" id="menu-inf"  class="menu-search active">Ensino Infantil</button>
							<button type="submit" id="menu-fund" class="menu-search">Ensino Fundamental I</button>
						</form>
						</div>
					

					<div class="col-md-12" style="border: 0.1em solid #d0d0d0">

					<br>

						<!-- FORMULARIO DE BUSCA DO ENSINO INFANTIL -->
						<div id="inf">
						<form method="POST" action="{{ url('/searchInf') }}" enctype="multipart/form-data">

						  	<div class="form-row">

								<div class="form-group col-md-6">
							      	<select id="campoExp" class="form-control explore-select" name="campoExp"> 
								        <option value="campo" selected>Campo de experiência</option>
								        <option value="O eu, o outro e nós" <?php if( $campoExp == "O eu, o outro e nós" ) echo 'selected="selected"';?>>O eu, o outro e nós</option>
								        <option value="Corpo, gesto e movimentos" <?php if( $campoExp == "Corpo, gesto e movimentos" ) echo 'selected="selected"';?>>Corpo, gesto e movimentos</option>
										<option value="Traços, sons, cores e formas" <?php if( $campoExp == "Traços, sons, cores e formas" ) echo 'selected="selected"';?>>Traços, sons, cores e formas</option>
										<option value="Oralidade e escrita" <?php if( $campoExp == "Oralidade e escrita" ) echo 'selected="selected"';?>>Oralidade e escrita</option>
										<option value="Espaços, tempos, quantidades, relação e transformações" <?php if( $campoExp == "Espaços, tempos, quantidades, relação e transformações" ) echo 'selected="selected"';?>>Espaços, tempos, quantidades, relação e transformações</option>
							      	</select>
						   		</div>
								
								<div class="form-group col-md-6">
							      	<select id="faixaEt" class="form-control explore-select" name="faixaEtaria">
								        <option value="faixa" selected>Faixa etária</option>
								        <option value="Creche" <?php if( $faixaEta == "Creche" ) echo 'selected="selected"';?>>Creche</option>
								        <option value="Pré-escola" <?php if( $faixaEta == "Pré-escola" ) echo 'selected="selected"';?>>Pré-escola</option>
							      	</select>
						   		</div>

						  	</div>

						  	<div class="form-row">
						    	<div class="form-group col-md-6">
							    	<select id="inputTipoRecursos" class="form-control explore-select" name="tipoRecurso">
								        <option value="tipo" selected>Tipo de recurso</option>
								        <option value="animacao" <?php if( $tipoRec == "animacao" ) echo 'selected="selected"';?> >Animação</option>
								        <option value="audiovisual" <?php if( $tipoRec == "audiovisual" ) echo 'selected="selected"';?>>Audiovisual</option>
								        <option value="ebook" <?php if( $tipoRec == "ebook" ) echo 'selected="selected"';?>>E-book</option>
								        <option value="fotografia" <?php if( $tipoRec == "fotografia" ) echo 'selected="selected"';?>>Fotografia</option>
								        <option value="ilustracao" <?php if( $tipoRec == "ilustracao" ) echo 'selected="selected"';?>>Ilustração</option>
								        <option value="infografico" <?php if( $tipoRec == "infografico" ) echo 'selected="selected"';?>>Infográfico</option>
								        <option value="jogo" <?php if( $tipoRec == "jogo" ) echo 'selected="selected"';?>>Jogo</option>
								        <option value="podcast" <?php if( $tipoRec == "podcast" ) echo 'selected="selected"';?>>Podcast</option>
								        <option value="realidadeAumentada" <?php if( $tipoRec == "realidadeAumentada" ) echo 'selected="selected"';?>>Realidade Aumentada</option>
								        <option value="realidadeVirtual" <?php if( $tipoRec == "realidadeVirtual" ) echo 'selected="selected"';?>>Realidade Virtual</option>
								        <option value="simulacao" <?php if( $tipoRec == "simulacao" ) echo 'selected="selected"';?>>Simulação</option>
							      	</select>
						    	</div>

								<div class="form-group col-md-6">
									<select id="inputNivelAcess" class="form-control explore-select" name="nivelAcess">
										<option value="nivel" selected>Nível de acessibilidade</option>
										<option value="pouco" <?php if( $nivelAcess == "pouco" ) echo 'selected="selected"';?>>Pouco</option>
										<option value="medio" <?php if( $nivelAcess == "medio" ) echo 'selected="selected"';?>>Médio</option>
										<option value="alto"  <?php if( $nivelAcess == "alto" ) echo 'selected="selected"';?>>Alto</option>
									</select>
								</div>

						  	</div>


						  	<div class="form-row">
							  	<div class="form-group col-md-10">
						  		
						  		</div>
						  		<div class="form-group col-md-2">
						  			<button type="submit" class="btn btn-primary" style="width: 100%">Buscar</button>
						  		</div>
						  	</div>


						</form>
						</div>
						<!-- FIM DO FORMULARIO DO ENSINO INFANTIL -->
						@else
							<div class="col-md-12" style="border: 0.1em solid #d0d0d0">

							<br>
							<div class="row" style="margin-left: 0.1em">
								<form method="POST" action="{{ url('/searchInf') }}" enctype="multipart/form-data">
									<button type="submit" id="menu-inf"  class="menu-search">Ensino Infantil</button>
									<button type="button" id="menu-fund" class="menu-search active">Ensino Fundamental I</button>
								</form>
	
							</div><br>
						
							<!-- FORMULARIO DE BUSCA DO ENSINO FUNDAMENTAL I -->
							<div id="fund" >
							<form method="POST" action="{{ url('/searchFund') }}" enctype="multipart/form-data">

								<div class="form-row">
								
									<div class="form-group col-md-6">
										<select id="compCurr" class="form-control explore-select" name="compCurr">
											<option value="comp" selected>Componente Curricular</option>
											<option value="Artes" <?php if( $compCurr == "Artes" ) echo 'selected="selected"';?>>Artes</option>
											<option value="Ciências" <?php if( $compCurr == "Ciências" ) echo 'selected="selected"';?>>Ciências</option>
											<option value="Educação Física" <?php if( $compCurr == "Educação Física" ) echo 'selected="selected"';?>>Educação Física</option>
											<option value="Geografia" <?php if( $compCurr == "Geografia" ) echo 'selected="selected"';?>>Geografia</option>
											<option value="História" <?php if( $compCurr == "História" ) echo 'selected="selected"';?>>História</option>
											<option value="Língua Portuguesa" <?php if( $compCurr == "Língua Portuguesa" ) echo 'selected="selected"';?>>Língua Portuguesa</option>
											<option value="Matemática" <?php if( $compCurr == "Matemática" ) echo 'selected="selected"';?>>Matemática</option>
										</select>
									</div>

									<div class="form-group col-md-6">
										<select id="faixaEt" class="form-control explore-select" name="year">
											<option value="ano" selected>Ano</option>
											<option value="1º ano" <?php if( $ano == "1º ano" ) echo 'selected="selected"';?>>1º ano</option>
											<option value="2º ano" <?php if( $ano == "2º ano" ) echo 'selected="selected"';?>>2º ano</option>
											<option value="3º ano" <?php if( $ano == "3º ano" ) echo 'selected="selected"';?>>3º ano</option>
											<option value="4º ano" <?php if( $ano == "4º ano" ) echo 'selected="selected"';?>>4º ano</option>
											<option value="5º ano" <?php if( $ano == "5º ano" ) echo 'selected="selected"';?>>5º ano</option>
										</select>
									</div>

								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<select id="inputTipoRecursoFund" class="form-control explore-select" name="tipoRecursoFund">
											<option value="tipoFund" selected>Tipo de recurso</option>
											<option value="animacao" <?php if( $tipoRecFund == "animacao" ) echo 'selected="selected"';?> >Animação</option>
											<option value="audiovisual" <?php if( $tipoRecFund == "audiovisual" ) echo 'selected="selected"';?>>Audiovisual</option>
											<option value="ebook" <?php if( $tipoRecFund == "ebook" ) echo 'selected="selected"';?>>E-book</option>
											<option value="fotografia" <?php if( $tipoRecFund == "fotografia" ) echo 'selected="selected"';?>>Fotografia</option>
											<option value="ilustracao" <?php if( $tipoRecFund == "ilustracao" ) echo 'selected="selected"';?>>Ilustração</option>
											<option value="infografico" <?php if( $tipoRecFund == "infografico" ) echo 'selected="selected"';?>>Infográfico</option>
											<option value="jogo" <?php if( $tipoRecFund == "jogo" ) echo 'selected="selected"';?>>Jogo</option>
											<option value="podcast" <?php if( $tipoRecFund == "podcast" ) echo 'selected="selected"';?>>Podcast</option>
											<option value="realidadeAumentada" <?php if( $tipoRecFund == "realidadeAumentada" ) echo 'selected="selected"';?>>Realidade Aumentada</option>
											<option value="realidadeVirtual" <?php if( $tipoRecFund == "realidadeVirtual" ) echo 'selected="selected"';?>>Realidade Virtual</option>
											<option value="simulacao" <?php if( $tipoRecFund == "simulacao" ) echo 'selected="selected"';?>>Simulação</option>
										</select>
									</div>

									<div class="form-group col-md-6">
										<select id="inputNivelAcessFund" class="form-control explore-select" name="nivelAcessFund">
											<option value="nivelFund" selected>Nível de acessibilidade</option>
											<option value="pouco" <?php if( $nivelAcessFund == "pouco" ) echo 'selected="selected"';?>>Pouco</option>
											<option value="medio" <?php if( $nivelAcessFund == "medio" ) echo 'selected="selected"';?>>Médio</option>
											<option value="alto"  <?php if( $nivelAcessFund == "alto" ) echo 'selected="selected"';?>>Alto</option>
										</select>
									</div>

								</div>

								<div class="form-row">
									<div class="form-group col-md-10">
										<select id="unidTem" class="form-control explore-select" name="unidTem">
											<option value="unid" selected>Unidade temática</option>
											<option value="Artes Integradas" <?php if( $unidTem == "Artes Integradas" ) echo 'selected="selected"';?>>Artes - Artes Integradas</option>
											<option value="Artes Visuais" <?php if( $unidTem == "Artes Visuais" ) echo 'selected="selected"';?>>Artes - Artes Visuais</option>
											<option value="Dança" <?php if( $unidTem == "Dança" ) echo 'selected="selected"';?>>Artes - Dança</option>
											<option value="Música" <?php if( $unidTem == "Música" ) echo 'selected="selected"';?>>Artes - Música</option>
											<option value="Teatro" <?php if( $unidTem == "Teatro" ) echo 'selected="selected"';?>>Artes - Teatro</option>
											<option value="Brincadeiras e Jogos" <?php if( $unidTem == "Brincadeiras e Jogos" ) echo 'selected="selected"';?>>Educação Física - Brincadeiras e Jogos</option>
											<option value="Danças" <?php if( $unidTem == "Danças" ) echo 'selected="selected"';?>>Educação Física - Danças</option>
											<option value="Esportes" <?php if( $unidTem == "Esportes" ) echo 'selected="selected"';?>>Educação Física - Esportes</option>
											<option value="Ginásticas" <?php if( $unidTem == "Ginásticas" ) echo 'selected="selected"';?>>Educação Física - Ginásticas</option>
											<option value="Lutas" <?php if( $unidTem == "Lutas" ) echo 'selected="selected"';?>>Educação Física - Lutas</option>
											<option value="Práticas Corporais de Aventura" <?php if( $unidTem == "Práticas Corporais de Aventura" ) echo 'selected="selected"';?>>Educação Física - Práticas Corporais de Aventura</option>
											<option value="Matéria e Energia" <?php if( $unidTem == "Matéria e Energia" ) echo 'selected="selected"';?>>Ciências - Matéria e Energia</option>
											<option value="Vida e Evolução" <?php if( $unidTem == "Vida e Evolução" ) echo 'selected="selected"';?>>Ciências - Vida e Evolução</option>
											<option value="Terra e Universo" <?php if( $unidTem == "Terra e Universo" ) echo 'selected="selected"';?>>Ciências - Terra e Universo</option>
											<option value="O sujeito e seu lugar no mundo" <?php if( $unidTem == "O sujeito e seu lugar no mundo" ) echo 'selected="selected"';?>>Geografia - O sujeito e seu lugar no mundo</option>
											<option value="Conexões e escalas" <?php if( $unidTem == "Conexões e escalas" ) echo 'selected="selected"';?>>Geografia - Conexões e escalas</option>
											<option value="Mundo do trabalho" <?php if( $unidTem == "Mundo do trabalho" ) echo 'selected="selected"';?>>Geografia - Mundo do trabalho</option>
											<option value="Formas de representação e pensamento espacial" <?php if( $unidTem == "Formas de representação e pensamento espacial" ) echo 'selected="selected"';?>>Geografia - Formas de representação e pensamento espacial</option>
											<option value="Natureza, ambientes e qualidade de vida" <?php if( $unidTem == "Natureza, ambientes e qualidade de vida" ) echo 'selected="selected"';?>>Geografia - Natureza, ambientes e qualidade de vida</option>
											<option value="Mundo pessoal: meu lugar no mundo" <?php if( $unidTem == "Mundo pessoal: meu lugar no mundo" ) echo 'selected="selected"';?>>História - 1ano - Mundo pessoal: meu lugar no mundo</option>
											<option value="Mundo pessoal: eu, meu grupo social e meu tempo" <?php if( $unidTem == "Mundo pessoal: eu, meu grupo social e meu tempo" ) echo 'selected="selected"';?>>História - 1ano - Mundo pessoal: eu, meu grupo social e meu tempo</option>
											<option value="A comunidade e seus registros" <?php if( $unidTem == "A comunidade e seus registros" ) echo 'selected="selected"';?>>História - 2ano - A comunidade e seus registros</option>
											<option value="As formas de registrar as experiências da comunidade" <?php if( $unidTem == "As formas de registrar as experiências da comunidade" ) echo 'selected="selected"';?>>História - 2ano - As formas de registrar as experiências da comunidade</option>
											<option value="O trabalho e a sustentabilidade da comunidade" <?php if( $unidTem == "O trabalho e a sustentabilidade da comunidade" ) echo 'selected="selected"';?>>História - 2ano - O trabalho e a sustentabilidade da comunidade</option>
											<option value="As pessoas e os grupos que compõem a cidade e o município" <?php if( $unidTem == "As pessoas e os grupos que compõem a cidade e o município" ) echo 'selected="selected"';?>>História - 3ano - As pessoas e os grupos que compõem a cidade e o município </option>
											<option value="O lugar em que se vive" <?php if( $unidTem == "O lugar em que se vive" ) echo 'selected="selected"';?>>História - 3ano - O lugar em que se vive</option>
											<option value="A noção de espaço público e privado" <?php if( $unidTem == "A noção de espaço público e privado" ) echo 'selected="selected"';?>>História - 3ano - A noção de espaço público e privado</option>
											<option value="Transformações e permanências nas trajetórias dos grupos humanos" <?php if( $unidTem == "Transformações e permanências nas trajetórias dos grupos humanos" ) echo 'selected="selected"';?>>História - 4ano - Transformações e permanências nas trajetórias dos grupos humanos</option>
											<option value="Circulação de pessoas, produtos e culturas" <?php if( $unidTem == "Circulação de pessoas, produtos e culturas" ) echo 'selected="selected"';?>>História - 4ano - Circulação de pessoas, produtos e culturas</option>
											<option value="As questões históricas relativas às migrações" <?php if( $unidTem == "As questões históricas relativas às migrações" ) echo 'selected="selected"';?>>História - 4ano - As questões históricas relativas às migrações</option>
											<option value="Povos e culturas: meu lugar no mundo e meu grupo social" <?php if( $unidTem == "Povos e culturas: meu lugar no mundo e meu grupo social" ) echo 'selected="selected"';?>>História - 5ano - Povos e culturas: meu lugar no mundo e meu grupo social</option>
											<option value="Registros da história: linguagens e culturas" <?php if( $unidTem == "Registros da história: linguagens e culturas" ) echo 'selected="selected"';?>>História - 5ano - Registros da história: linguagens e culturas</option>
											<option value="Interação discursiva/intercâmbio oral no contexto escolar" <?php if( $unidTem == "Interação discursiva/intercâmbio oral no contexto escolar" ) echo 'selected="selected"';?>>Língua Portuguesa - Oralidade - Interação discursiva/intercâmbio oral no contexto escolar</option>
											<option value="Funcionamento do discurso oral" <?php if( $unidTem == "Funcionamento do discurso oral" ) echo 'selected="selected"';?>>Língua Portuguesa - Oralidade - Funcionamento do discurso oral</option>
											<option value="Estratégias de escuta de textos orais em situações específicas de interação" <?php if( $unidTem == "Estratégias de escuta de textos orais em situações específicas de interação" ) echo 'selected="selected"';?>>Língua Portuguesa - Oralidade - Estratégias de escuta de textos orais em situações específicas de interação</option>
											<option value="Produção de textos orais em situações específicas de interação" <?php if( $unidTem == "Produção de textos orais em situações específicas de interação" ) echo 'selected="selected"';?>>Língua Portuguesa - Oralidade - Produção de textos orais em situações específicas de interação</option>
											<option value="Construção da autonomia de leitura" <?php if( $unidTem == "Construção da autonomia de leitura" ) echo 'selected="selected"';?>>Língua Portuguesa - Leitura - Construção da autonomia de leitura</option>
											<option value="Estratégias de leitura" <?php if( $unidTem == "Estratégias de leitura" ) echo 'selected="selected"';?>>Língua Portuguesa - Leitura - Estratégias de leitura</option>
											<option value="Apropriação do sistema alfabético de escrita" <?php if( $unidTem == "Apropriação do sistema alfabético de escrita" ) echo 'selected="selected"';?>>Língua Portuguesa - Escrita - Apropriação do sistema alfabético de escrita</option>
											<option value="Estratégias antes da produção do texto" <?php if( $unidTem == "Estratégias antes da produção do texto" ) echo 'selected="selected"';?>>Língua Portuguesa - Escrita - Estratégias antes da produção do texto</option>
											<option value="Estratégias durante a produção do texto" <?php if( $unidTem == "Estratégias durante a produção do texto" ) echo 'selected="selected"';?>>Língua Portuguesa - Escrita - Estratégias durante a produção do texto</option>
											<option value="Estratégias após a produção do texto" <?php if( $unidTem == "Estratégias após a produção do texto" ) echo 'selected="selected"';?>>Língua Portuguesa - Escrita - Estratégias após a produção do texto</option>
											<option value="Apropriação do sistema alfabético de escrita" <?php if( $unidTem == "Apropriação do sistema alfabético de escrita" ) echo 'selected="selected"';?>>Língua Portuguesa - CLG - Apropriação do sistema alfabético de escrita</option>
											<option value="Convenções gráficas da escrita" <?php if( $unidTem == "Convenções gráficas da escrita" ) echo 'selected="selected"';?>>Língua Portuguesa - CLG - Convenções gráficas da escrita</option>
											<option value="Processos de formação e significados das palavras" <?php if( $unidTem == "Processos de formação e significados das palavras" ) echo 'selected="selected"';?>>Língua Portuguesa - CLG - Processos de formação e significados das palavras</option>
											<option value="Categorias do discurso literário" <?php if( $unidTem == "Categorias do discurso literário" ) echo 'selected="selected"';?>>Língua Portuguesa - Educação Literária - Categorias do discurso literário</option>
											<option value="Reconstrução do sentido do texto literário" <?php if( $unidTem == "Reconstrução do sentido do texto literário" ) echo 'selected="selected"';?>>Língua Portuguesa - Educação Literária - Reconstrução do sentido do texto literário</option>
											<option value="Experiências estéticas" <?php if( $unidTem == "Experiências estéticas" ) echo 'selected="selected"';?>>Língua Portuguesa - Educação Literária - Experiências estéticas</option>
											<option value="O texto literário no contexto sociocultural" <?php if( $unidTem == "O texto literário no contexto sociocultural" ) echo 'selected="selected"';?>>Língua Portuguesa - Educação Literária - O texto literário no contexto sociocultural</option>
											<option value="Interesse pela leitura literária" <?php if( $unidTem == "Interesse pela leitura literária" ) echo 'selected="selected"';?>>Língua Portuguesa - Educação Literária - Interesse pela leitura literária</option>
											<option value="Álgebra" <?php if( $unidTem == "Álgebra" ) echo 'selected="selected"';?>>Matemática - Álgebra</option>
											<option value="Geometria" <?php if( $unidTem == "Geometria" ) echo 'selected="selected"';?>>Matemática - Geometria</option>
											<option value="Grandezas e Medidas" <?php if( $unidTem == "Grandezas e Medidas" ) echo 'selected="selected"';?>>Matemática - Grandezas e Medidas</option>
											<option value="Números" <?php if( $unidTem == "Números" ) echo 'selected="selected"';?>>Matemática - Números</option>
											<option value="Probabilidade e Estatística" <?php if( $unidTem == "Probabilidade e Estatística" ) echo 'selected="selected"';?>>Matemática - Probabilidade e Estatística</option>
											
										</select>

									</div>
									<div class="form-group col-md-2">
										<button type="submit" class="btn btn-primary" style="width: 100%">Buscar</button>
									</div>
								</div>

									
							</form>
							</div>
							<!-- FIM DO FORMULARIO DO ENSINO FUNDAMENTAL I -->
						@endif

					</div>

				</div>
				<div class="col-md-2"></div>

			</div>
		</div>
	</div>



    <div class="col-md-12">
        <div class="mais-acessados container">

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
                                                    <button class="button-save" type="submit"><i class="far fa-star" style="color: #4d4d4d; font-size: 1.5em"></i></button>
                                                    <!--button class="button-save button-active"></button>-->
                                                @else
                                                    <button class="button-save" type="submit"><i class="fas fa-star" style="color: #4d4d4d; font-size: 1.5em"></i></button>

                                                    <!--<button class="button-save button-deactivated" type="button"></button>-->
                                                @endif
            
                                                </div>
        
                                                <?php 
                                                    $id_block = 'more-info'.$count;
                                                    ?>
                                                <div onclick="objectDetail( {{ $id_block }} )" class="col-md-2 more-info-icon"><i class="fa fa-info-circle" style="color: #4d4d4d; font-size: 2em"></i></div>

                                                
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
            
        	<br><br><br>
			<center>
			{{ $objects->links() }}
			</center>
    	</div>
		<br><br><br><br><br><br>
	</div>


</section>
@endsection

