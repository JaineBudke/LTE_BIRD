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



@section('register')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">

            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Editar recurso de aprendizagem</h2>
                        </div>
                    </div>
                    <div class="body" style="background-color: white" >
            
                        <div class="col-md-4 item-menu-form" id="step1" style="background-color: #009688">
                            <h3 class="item">1. Descrição do Recurso</h3>
                        </div>
                        <div class="col-md-4 item-menu-form" id="step2">
                            <h3 class="item">2. Classificação do Recurso</h3>
                        </div>
                        <div class="col-md-4 item-menu-form" id="step3">
                            <h3 class="item">3. Unidade Temática</h3>
                        </div>
                        <br><br><br><br>


                        <!-- Formulario começa aqui -->
                        <?php 
                            $edit = '/client/editObject/'.$object->id;
                        ?>
                        <form id="form-register-oa" method="POST" action="{{ url( $edit ) }}" enctype="multipart/form-data">
                            <div class="form-block">
                                
                                <div class="campos-block">

                                    <!-- Primeira parte do formulario -->
                                    <fieldset id="page1">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" maxlength="80" class="form-control" name="title" id="title" value="{{ $object->title }}" >
                                                <label class="form-label">Titulo do Objeto</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                @if( $object->image != '' )
                                                    <?php 
                                                        $link = 'storage/objects/'.$object->image;
                                                    ?>
                                                    <img src="{{ asset( $link ) }}" width="100" height="100">
                                                @else 
                                                    <img src="{{ asset('images/padrao-objeto.jpg') }}" width="100" height="100">
                                                @endif
                                                <br><label>Deseja alterar a imagem? Selecione um arquivo abaixo.</label>
                                                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" maxlength="300" class="form-control" name="link" id="link" value="{{ $object->link }}">
                                                <label class="form-label">Link de acesso ao Objeto</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea rows="5" maxlength="500" class="form-control" id="description" name="description">{{ $object->description }}</textarea>
                                                <label class="form-label">Descrição do recurso</label>
                                            </div>
                                        </div>
                                        <br>
                                        <label>Tipo do recurso</label>                                    
                                        <div class="checkbox-tipo-recurso demo-checkbox">
                                            <?php
                                            $types = [];
                                            foreach( $objTypes as $objType ){
                                                array_push($types, $objType['type']);
                                            }
                                            ?>
                                            <input type="checkbox" value="animacao" name="recurso0" id="md_checkbox_animacao" class="filled-in chk-col-blue-grey" <?php if(in_array('animacao', $types)) echo 'checked="checked"';?>/>
                                            <label for="md_checkbox_animacao">Animação</label>
                                            <input type="checkbox" value="audiovisual" name="recurso1" id="md_checkbox_audiovisual" class="filled-in chk-col-blue-grey" <?php if(in_array('audiovisual', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_audiovisual">Audiovisual</label>
                                            <input type="checkbox" value="ebook" name="recurso2" id="md_checkbox_ebook" class="filled-in chk-col-blue-grey" <?php if(in_array('ebook', $types)) echo 'checked="checked"';?>/>
                                            <label for="md_checkbox_ebook">e-book</label>
                                            <input type="checkbox" value="experimento" name="recurso12" id="md_checkbox_experimento" class="filled-in chk-col-blue-grey" />
                                            <label for="md_checkbox_experimento">Experimento prático</label>
                                            <input type="checkbox" value="fotografia" name="recurso3" id="md_checkbox_fotografia" class="filled-in chk-col-blue-grey" <?php if(in_array('fotografia', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_fotografia">Fotografia</label><br>
                                            <input type="checkbox" value="ilustracao" name="recurso4" id="md_checkbox_ilustracao" class="filled-in chk-col-blue-grey" <?php if(in_array('ilustracao', $types)) echo 'checked="checked"';?>/>
                                            <label for="md_checkbox_ilustracao">Ilustração</label>
                                            <input type="checkbox" value="infografico" name="recurso5" id="md_checkbox_infografico" class="filled-in chk-col-blue-grey" <?php if(in_array('infografico', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_infografico">Infográfico</label>
                                            <input type="checkbox" value="jogo" name="recurso6" id="md_checkbox_jogo" class="filled-in chk-col-blue-grey" <?php if(in_array('jogo', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_jogo">Jogo</label>
                                            <input type="checkbox" value="podcast" name="recurso7" id="md_checkbox_podcast" class="filled-in chk-col-blue-grey" <?php if(in_array('podcast', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_podcast">Podcast</label>
                                            <input type="checkbox" value="realidadeAumentada" name="recurso8" id="md_checkbox_realidade_aumentada" class="filled-in chk-col-blue-grey" <?php if(in_array('realidadeAumentada', $types)) echo 'checked="checked"';?> />
                                            <label for="md_checkbox_realidade_aumentada">Realidade Aumentada</label><br>
                                            <input type="checkbox" value="realidadeVirtual" name="recurso9" id="md_checkbox_realidade_virtual" class="filled-in chk-col-blue-grey" <?php if(in_array('realidadeVirtual', $types)) echo 'checked="checked"';?>/>
                                            <label for="md_checkbox_realidade_virtual">Realidade Virtual</label>
                                            <input type="checkbox" value="simulacao" name="recurso10" id="md_checkbox_simulacao" class="filled-in chk-col-blue-grey" <?php if(in_array('simulacao', $types)) echo 'checked="checked"';?>/>
                                            <label for="md_checkbox_simulacao">Simulação</label>
                                            <input type="checkbox" value="sequencia" name="recurso11" id="md_checkbox_sequencia" class="filled-in chk-col-blue-grey" />
                                            <label for="md_checkbox_sequencia">Sequência didática</label>

                                        </div>   
                                        
                                        <br><br>
                                        <select id="nivelensino" class="form-control form-float form-group " name="nivelEnsino" >
                                            <option value="">Nível de Ensino</option>
                                            <option value="Ensino Infantil" id="infantil" <?php if( $object['educationLevel'] == "Ensino Infantil" ) echo 'selected="selected"';?> >Ensino Infantil</option>
                                            <option value="Ensino Fundamental 1" id="fundamental" <?php if( $object['educationLevel'] == "Ensino Fundamental 1" ) echo 'selected="selected"';?>>Ensino Fundamental 1</option>
                                        </select>

                                    </fieldset>
                                    
                                    <!-- Segunda parte do formulario -->
                                    <fieldset id="page2" style="display: none">

                                        <!-- Ensino Fundamental 1 -->
                                        <div id="comp_curr" style="display: none" >
                                            <label>Componente Curricular</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <?php
                                                    $campos = [];
                                                    foreach( $components as $comp ){
                                                        array_push($campos, $comp['component']);
                                                    }
                                                ?>
                                                <input type="checkbox" value="Artes" id="cc_checkbox1"  name="comp1" class="filled-in chk-col-blue-grey" <?php if(in_array('Artes', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox1">Artes</label>
                                                <br><input type="checkbox" value="Ciências" id="cc_checkbox2" name="comp2" class="filled-in chk-col-blue-grey"  <?php if(in_array('Ciências', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox2">Ciências</label>
                                                <br><input type="checkbox" value="Educação Física" id="cc_checkbox3" name="comp3" class="filled-in chk-col-blue-grey" <?php if(in_array('Educação Física', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox3">Educação Física</label>
                                                <br><input type="checkbox" value="Geografia" id="cc_checkbox4" name="comp4" class="filled-in chk-col-blue-grey" <?php if(in_array('Geografia', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox4">Geografia</label>
                                                <br><input type="checkbox" value="História" id="cc_checkbox5" name="comp5" class="filled-in chk-col-blue-grey" <?php if(in_array('História', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox5">História</label>
                                                <br><input type="checkbox" value="Língua Portuguesa" id="cc_checkbox6" name="comp6" class="filled-in chk-col-blue-grey" <?php if(in_array('Língua Portuguesa', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox6">Língua Portuguesa</label>
                                                <br><input type="checkbox" value="Matemática" id="cc_checkbox7" name="comp7" class="filled-in chk-col-blue-grey" <?php if(in_array('Matemática', $campos)) echo 'checked="checked"';?>/>
                                                <label for="cc_checkbox7">Matemática</label>
                                            </div>
                                        </div>


                                        <div id="ano" style="display: none">
                                            <label>Ano</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <?php
                                                    $ano = [];
                                                    foreach( $ageRange as $ageR ){
                                                        array_push($ano, $ageR['age']);
                                                    }
                                                ?>
                                                <!-- Fundamental I -->
                                                <input type="checkbox" value="1º ano" id="fund1" name="ano1" class="filled-in chk-col-blue-grey" <?php if(in_array('1º ano', $ano)) echo 'checked="checked"';?>/>
                                                <label for="fund1">1º ano</label>
                                                <input type="checkbox" value="2º ano" id="fund2" name="ano2" class="filled-in chk-col-blue-grey" <?php if(in_array('2º ano', $ano)) echo 'checked="checked"';?>/>
                                                <label for="fund2">2º ano</label>
                                                <input type="checkbox" value="3º ano" id="fund3" name="ano3" class="filled-in chk-col-blue-grey" <?php if(in_array('3º ano', $ano)) echo 'checked="checked"';?>/>
                                                <label for="fund3">3º ano</label>
                                                <input type="checkbox" value="4º ano" id="fund4" name="ano4" class="filled-in chk-col-blue-grey" <?php if(in_array('4º ano', $ano)) echo 'checked="checked"';?>/>
                                                <label for="fund4">4º ano</label>
                                                <input type="checkbox" value="5º ano" id="fund5" name="ano5" class="filled-in chk-col-blue-grey" <?php if(in_array('5º ano', $ano)) echo 'checked="checked"';?>/>
                                                <label for="fund5">5º ano</label>
                                            </div>
                                        </div>
                                        
                                        <div id="campo_exp" style="display: none">
                                            <label>Campo de experiência</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <?php
                                                $campos = [];
                                                foreach( $components as $comp ){
                                                    array_push($campos, $comp['component']);
                                                }
                                                ?>
                                                <!-- Infantil -->
                                                <input type="checkbox" value="O eu, o outro e nós" name="campo1" id="ce_md_checkbox1" class="check1 filled-in chk-col-blue-grey" value="1"  <?php if(in_array('O eu, o outro e nós', $campos)) echo 'checked="checked"';?> />
                                                <label for="ce_md_checkbox1">O eu, o outro e nós</label>
                                                <br><input type="checkbox" value="Corpo, gesto e movimentos" name="campo2" id="ce_md_checkbox2" class="check1 filled-in chk-col-blue-grey" value="2" <?php if(in_array('Corpo, gesto e movimentos', $campos)) echo 'checked="checked"';?>/>
                                                <label for="ce_md_checkbox2">Corpo, gesto e movimentos</label>
                                                <br><input type="checkbox" value="Traços, sons, cores e formas" name="campo3" id="ce_md_checkbox3" class="check1 filled-in chk-col-blue-grey" value="3" <?php if(in_array('Traços, sons, cores e formas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="ce_md_checkbox3">Traços, sons, cores e formas</label>
                                                <br><input type="checkbox" value="Oralidade e escrita" name="campo4" id="ce_md_checkbox4" class="filled-in chk-col-blue-grey" value="4" <?php if(in_array('Oralidade e escrita', $campos)) echo 'checked="checked"';?>/>
                                                <label for="ce_md_checkbox4">Escuta, fala, pensamento e imaginação</label>
                                                <br><input type="checkbox" value="Espaços, tempos, quantidades, relação e transformações" name="campo5" id="ce_md_checkbox5" class="filled-in chk-col-blue-grey" value="5" <?php if(in_array('Espaços, tempos, quantidades, relação e transformações', $campos)) echo 'checked="checked"';?>/>
                                                <label for="ce_md_checkbox5">Espaços, tempos, quantidades, relação e transformações</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="faixaEtaria" style="display: none">
                                            <label>Faixa Etária</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <?php
                                                    $faixa = [];
                                                    foreach( $ageRange as $ageR ){
                                                        array_push($faixa, $ageR['age']);
                                                    }
                                                ?>
                                                <!-- Infantil -->
                                                <input type="checkbox" value="Creche" name="faixaetaria1" id="inf1" class="filled-in chk-col-blue-grey" value="1" <?php if(in_array('Creche', $faixa)) echo 'checked="checked"';?>/>
                                                <label for="inf1">Creche</label>
                                                <br><input type="checkbox" value="Pré-escola" name="faixaetaria2" id="inf2" class="filled-in chk-col-blue-grey" value="2" <?php if(in_array('Pré-escola', $faixa)) echo 'checked="checked"';?>/>
                                                <label for="inf2">Pré-escola</label>
                                            </div>
                                        </div>

                                        <br> 
                                        <select id="nivelAcess" class="form-control form-float form-group " name="nivelAcess" >
                                            <option value="">Nível de Acessibilidade</option>
                                            <option id="acess1" value="pouco" <?php if( $object['acessLevel'] == "pouco" ) echo 'selected="selected"';?> >Pouco</option>
                                            <option id="acess2" value="medio" <?php if( $object['acessLevel'] == "medio" ) echo 'selected="selected"';?> >Médio</option>
                                            <option id="acess3" value="alto"  <?php if( $object['acessLevel'] == "alto" )  echo 'selected="selected"';?> >Alto</option>
                                        </select>

                                        <br>
                                         
                                    </fieldset>
                                    
                                    
                                    <!-- Terceira parte do formulario -->
                                    <fieldset id="page3" style="display: none">
                                            
                                        <?php
                                            $campos = [];
                                            foreach( $thematics as $them ){
                                                array_push($campos, $them['thematic']);
                                            }
                                        ?>

                                        <div id="unid_arte" style="display: none">
                                            <label>Unidades Temáticas - Artes</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">

                                                <!-- Fundamental 1 / Artes -->
                                                <input type="checkbox" value="Artes Integradas" id="unid_md_checkbox1" name="unid1" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Artes Integradas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox1">Artes Integradas</label>
                                                <br><input type="checkbox" value="Artes Visuais" id="unid_md_checkbox2" name="unid2" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Artes Visuais', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox2">Artes Visuais</label>
                                                <br><input type="checkbox" value="Dança" id="unid_md_checkbox3" name="unid3" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Dança', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox3">Dança</label>
                                                <br><input type="checkbox" value="Música" id="unid_md_checkbox4" name="unid4" class="filled-in chk-col-blue-grey" <?php if(in_array('Música', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox4">Música</label>
                                                <br><input type="checkbox" value="Teatro" id="unid_md_checkbox5" name="unid5" class="filled-in chk-col-blue-grey" <?php if(in_array('Teatro', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox5">Teatro</label>
                                                
                                            </div>
                                        </div><br>

                                        <div id="unid_educFisica" style="display: none">
                                            <label>Unidades Temáticas - Educação Física</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <!-- Fundamental 1 / Educação Física -->
                                                <input type="checkbox" value="Brincadeiras e Jogos" id="unid_md_checkbox6" name="unid6" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Brincadeiras e Jogos', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox6">Brincadeiras e Jogos</label>
                                                <br><input type="checkbox" value="Danças" id="unid_md_checkbox7" name="unid7" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Danças', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox7">Danças</label>
                                                <br><input type="checkbox" value="Esportes" id="unid_md_checkbox8" name="unid8" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Esportes', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox8">Esportes</label>
                                                <br><input type="checkbox" value="Ginásticas" id="unid_md_checkbox9" name="unid9" class="filled-in chk-col-blue-grey" <?php if(in_array('Ginásticas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox9">Ginásticas</label>
                                                <br><input type="checkbox" value="Lutas" id="unid_md_checkbox10" name="unid10" class="filled-in chk-col-blue-grey" <?php if(in_array('Lutas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox10">Lutas</label>
                                                <br><input type="checkbox" value="Práticas Corporais de Aventura" id="unid_md_checkbox11" name="unid11" class="filled-in chk-col-blue-grey" <?php if(in_array('Práticas Corporais de Aventura', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox11">Práticas Corporais de Aventura</label>
                                                
                                            </div>
                                        </div><br>

                                        <div id="unid_ciencias" style="display: none">
                                            <label>Unidades Temáticas - Ciências</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <!-- Fundamental 1 / Ciencias -->
                                                <input type="checkbox" value="Matéria e Energia" id="unid_md_checkbox12" name="unid12" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Matéria e Energia', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox12">Matéria e Energia</label>
                                                <br><input type="checkbox" value="Vida e Evolução" id="unid_md_checkbox13" name="unid13" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Vida e Evolução', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox13">Vida e Evolução</label>
                                                <br><input type="checkbox" value="Terra e Universo" id="unid_md_checkbox14" name="unid14" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Terra e Universo', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox14">Terra e Universo</label>
                                            </div>
                                        </div><br>

                                        <div id="unid_geografia" style="display: none">
                                            <label>Unidades Temáticas - Geografia</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <!-- Fundamental 1 / Geografia -->
                                                <input type="checkbox" value="O sujeito e seu lugar no mundo" id="unid_md_checkbox15" name="unid15" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('O sujeito e seu lugar no mundo', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox15">O sujeito e seu lugar no mundo</label>
                                                <br><input type="checkbox" value="Conexões e escalas" id="unid_md_checkbox16" name="unid16" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Conexões e escalas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox16">Conexões e escalas</label>
                                                <br><input type="checkbox" value="Mundo do trabalho" id="unid_md_checkbox17" name="unid17" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Mundo do trabalho', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox17">Mundo do trabalho</label>
                                                <br><input type="checkbox" value="Formas de representação e pensamento espacial" id="unid_md_checkbox18" name="unid18" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Formas de representação e pensamento espacial', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox18">Formas de representação e pensamento espacial</label>
                                                <br><input type="checkbox" value="Natureza, ambientes e qualidade de vida" id="unid_md_checkbox19" name="unid19" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Natureza, ambientes e qualidade de vida', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox19">Natureza, ambientes e qualidade de vida</label>

                                            </div>
                                        </div><br>


                                        <div id="unid_mat" style="display: none">
                                            <label>Unidades Temáticas - Matemática</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">

                                                <!-- Fundamental 1 / Matemática -->
                                                <input type="checkbox" value="Álgebra" id="unid_md_checkbox20" name="unid20" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Álgebra', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox20">Álgebra</label>
                                                <br><input type="checkbox" value="Geometria" id="unid_md_checkbox21" name="unid21" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Geometria', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox21">Geometria</label>
                                                <br><input type="checkbox" value="Grandezas e Medidas" id="unid_md_checkbox22" name="unid22" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Grandezas e Medidas', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox22">Grandezas e Medidas</label>
                                                <br><input type="checkbox" value="Números" id="unid_md_checkbox23" name="unid23" class="filled-in chk-col-blue-grey" <?php if(in_array('Números', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox23">Números</label>
                                                <br><input type="checkbox" value="Probabilidade e Estatística" id="unid_md_checkbox24" name="unid24" class="filled-in chk-col-blue-grey" <?php if(in_array('Probabilidade e Estatística', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox24">Probabilidade e Estatística</label>
                                                
                                            </div>
                                        </div><br>
                                        
                                        <div id="unid_historia" style="display: none">
                                            <label>Unidades Temáticas - História</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                <div id="unid_historia-1" style="display: none">
                                                    <label>1º ano</label>   
                                                    <!-- 1ano -->
                                                    <br><input type="checkbox" value="Mundo pessoal: meu lugar no mundo" id="unid_md_checkbox25" name="unid25" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Mundo pessoal: meu lugar no mundo', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox25">Mundo pessoal: meu lugar no mundo</label>
                                                    <br><input type="checkbox" value="Mundo pessoal: eu, meu grupo social e meu tempo" id="unid_md_checkbox26" name="unid26" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Mundo pessoal: eu, meu grupo social e meu tempo', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox26">Mundo pessoal: eu, meu grupo social e meu tempo</label>
                                                </div>
                                                <!-- 2ano -->
                                                <div id="unid_historia-2" style="display: none">
                                                    <label>2º ano</label>   
                                                    <br><input type="checkbox" value="A comunidade e seus registros" id="unid_md_checkbox27" name="unid27" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('A comunidade e seus registros', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox27">A comunidade e seus registros</label>
                                                    <br><input type="checkbox" value="As formas de registrar as experiências da comunidade" id="unid_md_checkbox28" name="unid28" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('As formas de registrar as experiências da comunidade', $campos)) echo 'checked="checked"';?> />
                                                    <label for="unid_md_checkbox28">As formas de registrar as experiências da comunidade</label>
                                                    <br><input type="checkbox" value="O trabalho e a sustentabilidade da comunidade" id="unid_md_checkbox29" name="unid29" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('O trabalho e a sustentabilidade da comunidade', $campos)) echo 'checked="checked"';?> />
                                                    <label for="unid_md_checkbox29">O trabalho e a sustentabilidade da comunidade</label>
                                                </div>
                                                <!-- 3ano -->
                                                <div id="unid_historia-3" style="display: none">
                                                    <label>3º ano</label>   
                                                    <br><input type="checkbox" value="As pessoas e os grupos que compõem a cidade e o município" id="unid_md_checkbox30" name="unid30" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('As pessoas e os grupos que compõem a cidade e o município', $campos)) echo 'checked="checked"';?> />
                                                    <label for="unid_md_checkbox30">As pessoas e os grupos que compõem a cidade e o município</label>
                                                    <br><input type="checkbox" value="O lugar em que se vive" id="unid_md_checkbox31" name="unid31" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('O lugar em que se vive', $campos)) echo 'checked="checked"';?> />
                                                    <label for="unid_md_checkbox31">O lugar em que se vive</label>
                                                    <br><input type="checkbox" value="A noção de espaço público e privado" id="unid_md_checkbox32" name="unid32" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('A noção de espaço público e privado', $campos)) echo 'checked="checked"';?> />
                                                    <label for="unid_md_checkbox32">A noção de espaço público e privado</label>
                                                </div>
                                                <!-- 4ano -->
                                                <div id="unid_historia-4" style="display: none">
                                                    <label>4º ano</label>   
                                                    <br><input type="checkbox" value="Transformações e permanências nas trajetórias dos grupos humanos" id="unid_md_checkbox33" name="unid33" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Transformações e permanências nas trajetórias dos grupos humanos', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox33">Transformações e permanências nas trajetórias dos grupos humanos</label>
                                                    <br><input type="checkbox" value="Circulação de pessoas, produtos e culturas" id="unid_md_checkbox34" name="unid34" class="check1 filled-in chk-col-blue-grey"   <?php if(in_array('Circulação de pessoas, produtos e culturas', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox34">Circulação de pessoas, produtos e culturas</label>
                                                    <br><input type="checkbox" value="As questões históricas relativas às migrações" id="unid_md_checkbox35" name="unid35" class="check1 filled-in chk-col-blue-grey"   <?php if(in_array('As questões históricas relativas às migrações', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox35">As questões históricas relativas às migrações</label>
                                                </div>
                                                <!-- 5ano -->
                                                <div id="unid_historia-5" style="display: none">
                                                    <label>5º ano</label>   
                                                    <br><input type="checkbox" value="Povos e culturas: meu lugar no mundo e meu grupo social" id="unid_md_checkbox36" name="unid36" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Povos e culturas: meu lugar no mundo e meu grupo social', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox36">Povos e culturas: meu lugar no mundo e meu grupo social</label>
                                                    <br><input type="checkbox" value="Registros da história: linguagens e culturas" id="unid_md_checkbox37" name="unid37" class="check1 filled-in chk-col-blue-grey"   <?php if(in_array('Registros da história: linguagens e culturas', $campos)) echo 'checked="checked"';?>/>
                                                    <label for="unid_md_checkbox37">Registros da história: linguagens e culturas</label>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div id="unid_port" style="display: none">
                                            <label>Unidades Temáticas - Língua Portuguesa</label>                                    
                                            <div class="checkbox-componente-curricular demo-checkbox">
                                                
                                                <br><label>Eixo: Oralidade</label>   
                                                <br><input type="checkbox" value="Interação discursiva/intercâmbio oral no contexto escolar" id="unid_md_checkbox38" name="unid38" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Interação discursiva/intercâmbio oral no contexto escolar', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox38">Interação discursiva/intercâmbio oral no contexto escolar</label>
                                                <br><input type="checkbox" value="Funcionamento do discurso oral" id="unid_md_checkbox39" name="unid39" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Funcionamento do discurso oral', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox39">Funcionamento do discurso oral</label>
                                                <br><input type="checkbox" value="Estratégias de escuta de textos orais em situações específicas de interação" id="unid_md_checkbox40" name="unid40" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Estratégias de escuta de textos orais em situações específicas de interação', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox40">Estratégias de escuta de textos orais em situações específicas de interação</label>
                                                <br><input type="checkbox" value="Produção de textos orais em situações específicas de interação" id="unid_md_checkbox41" name="unid41" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Produção de textos orais em situações específicas de interação', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox41">Produção de textos orais em situações específicas de interação</label>
                                                
                                                <br><label>Eixo: Leitura</label>   
                                                <br><input type="checkbox" value="Construção da autonomia de leitura" id="unid_md_checkbox42" name="unid42" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Construção da autonomia de leitura', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox42">Construção da autonomia de leitura</label>
                                                <br><input type="checkbox" value="Estratégias de leitura" id="unid_md_checkbox43" name="unid43" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Estratégias de leitura', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox43">Estratégias de leitura</label>
                                        
                                            
                                                <br><label>Eixo: Escrita</label>   
                                                <br><input type="checkbox" value="Apropriação do sistema alfabético de escrita" id="unid_md_checkbox44" name="unid44" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Apropriação do sistema alfabético de escrita', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox44">Apropriação do sistema alfabético de escrita</label>
                                                <br><input type="checkbox" value="Estratégias antes da produção do texto" id="unid_md_checkbox45" name="unid45" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Estratégias antes da produção do texto', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox45">Estratégias antes da produção do texto</label>
                                                <br><input type="checkbox" value="Estratégias durante a produção do texto" id="unid_md_checkbox46" name="unid46" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Estratégias durante a produção do texto', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox46">Estratégias durante a produção do texto</label>
                                                <br><input type="checkbox" value="Estratégias após a produção do texto" id="unid_md_checkbox47" name="unid47" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Estratégias após a produção do texto', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox47">Estratégias após a produção do texto</label>

                                                <br><label>Eixo: Conhecimentos Linguísticos e Gramaticais</label>   
                                                <br><input type="checkbox" value="Apropriação do sistema alfabético de escrita" id="unid_md_checkbox48" name="unid48" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Apropriação do sistema alfabético de escrita', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox48">Apropriação do sistema alfabético de escrita</label>
                                                <br><input type="checkbox" value="Convenções gráficas da escrita" id="unid_md_checkbox49" name="unid49" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Convenções gráficas da escrita', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox49">Convenções gráficas da escrita</label>
                                                <br><input type="checkbox" value="Processos de formação e significados das palavras" id="unid_md_checkbox50" name="unid50" class="check1 filled-in chk-col-blue-grey"  <?php if(in_array('Processos de formação e significados das palavras', $campos)) echo 'checked="checked"';?>/>
                                                <label for="unid_md_checkbox50">Processos de formação e significados das palavras</label>

                                                <br><label>Eixo: Educação Literária</label>   
                                                <br><input type="checkbox" value="Categorias do discurso literário" id="unid_md_checkbox51" name="unid51" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Categorias do discurso literário', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox51">Categorias do discurso literário</label>
                                                <br><input type="checkbox" value="Reconstrução do sentido do texto literário" id="unid_md_checkbox52" name="unid52" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Reconstrução do sentido do texto literário', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox52">Reconstrução do sentido do texto literário</label>
                                                <br><input type="checkbox" value="Experiências estéticas" id="unid_md_checkbox53" name="unid53" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Experiências estéticas', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox53">Experiências estéticas</label>
                                                <br><input type="checkbox" value="O texto literário no contexto sociocultural" id="unid_md_checkbox54" name="unid54" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('O texto literário no contexto sociocultural', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox54">O texto literário no contexto sociocultural</label>
                                                <br><input type="checkbox" value="Interesse pela leitura literária" id="unid_md_checkbox55" name="unid55" class="check1 filled-in chk-col-blue-grey" <?php if(in_array('Interesse pela leitura literária', $campos)) echo 'checked="checked"';?> />
                                                <label for="unid_md_checkbox55">Interesse pela leitura literária</label>

                                            </div>
                                        </div><br>

                                        

                                    
                                    </fieldset>

                                    <!-- Quarta parte do formulario -->
                                    <fieldset id="page4" style="display: none">
                                       


                                    </fieldset>

                                </div>
                                <div class="content" style="text-align: right; padding: 2em 2em 2em 2em;">
                                    <button type="button" id="next" class="btn btn-purple" onclick="nextPage()">Próximo</button>
                                    <input  type="button" id="finish" value="Editar" onclick="verificarCamposSubmit()" class="btn btn-purple" style="display: none"/>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        </div>
                        

                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection
