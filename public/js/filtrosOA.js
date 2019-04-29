
var page = 1;
var nivelEnsino;
var nivelEnsinoSelec;
var campo_exp = [];
var faixaEtaria;
var faixaEtariaSelec = [];

            

function nextPage(){

    page++;
    
    if( page == 2 ){

        // verificar se todos os campos da primeira página estão preenchidos
        var title = document.getElementById("title");
        // var fileUpload = document.getElementById("image");
        var link = document.getElementById("link");
        var description = document.getElementById("description");
        // itens do tipo de recurso
        var animacao = document.getElementById("md_checkbox_animacao");
        var audiovisual = document.getElementById("md_checkbox_audiovisual");
        var ebook = document.getElementById("md_checkbox_ebook");
        var fotografia = document.getElementById("md_checkbox_fotografia");
        var ilustracao = document.getElementById("md_checkbox_ilustracao");
        var infografico = document.getElementById("md_checkbox_infografico");
        var jogo = document.getElementById("md_checkbox_jogo");
        var podcast = document.getElementById("md_checkbox_podcast");
        var ra = document.getElementById("md_checkbox_realidade_aumentada");
        var rv = document.getElementById("md_checkbox_realidade_virtual");
        var simulacao = document.getElementById("md_checkbox_simulacao");
        var type = false;
        
        if( animacao.checked || audiovisual.checked || ebook.checked || fotografia.checked || ilustracao.checked || infografico.checked || jogo.checked || podcast.checked || ra.checked || rv.checked || simulacao.checked ){
            type = true;
        }
        // nivel de ensino
        var infantil = document.getElementById("infantil");
        var fundamental = document.getElementById("fundamental");
        var level = false;
        if( infantil.selected || fundamental.selected ){
            level = true;
        }
        
        if( title.value != '' && link.value != '' && description.value != '' && type == true && level == true ){
            
            $("#step1").css("background-color", "#b7b7b8");
            $("#step2").css("background-color", "#009688");
    
    
            page1 = document.getElementById("page1");
            page1.style.display = 'none';
    
            page2 = document.getElementById("page2");
            page2.style.display = 'block';
            
            selecionarnivel();
        } else {
                       
            page--;
            alert("Por favor, preencha todos os campos.");
        }
        
       
    }

        
    if( page == 3 ){
        
        // verificar componentes curriculares
        var comp1 = document.getElementById("cc_checkbox1");
        var comp2 = document.getElementById("cc_checkbox2");
        var comp3 = document.getElementById("cc_checkbox3");
        var comp4 = document.getElementById("cc_checkbox4");
        var comp5 = document.getElementById("cc_checkbox5");
        var comp6 = document.getElementById("cc_checkbox6");
        var comp7 = document.getElementById("cc_checkbox7");
        var comp = false;
        if( comp1.checked || comp2.checked || comp3.checked || comp4.checked || comp5.checked || comp6.checked || comp7.checked )
            comp = true;

        // verificar ano
        var fund1 = document.getElementById("fund1");
        var fund2 = document.getElementById("fund2");
        var fund3 = document.getElementById("fund3");
        var fund4 = document.getElementById("fund4");
        var fund5 = document.getElementById("fund5");
        var ano = false;
        if( fund1.checked || fund2.checked || fund3.checked || fund4.checked || fund5.checked ){
            ano = true;
        }
        // nivel de acessibilidade
        var acess1 = document.getElementById("acess1");
        var acess2 = document.getElementById("acess2");
        var acess3 = document.getElementById("acess3");
        var acess = false;
        if( acess1.selected || acess2.selected || acess3.selected ){
            acess = true;
        }



        if( comp == true && ano == true && acess == true ){

            $("#step2").css("background-color", "#b7b7b8");
            $("#step3").css("background-color", "#009688");

            
            $("#next").css("display", "none");
            $("#finish").css("display", "block");


            page2 = document.getElementById("page2");
            page2.style.display = 'none';
            page3 = document.getElementById("page3");
            page3.style.display = 'block';

            // artes selecionado
            if ($("#cc_checkbox1").is(':checked')){
                $("#unid_arte").css("display", "block");
            }
                
            // ciencias selecionado
            if ($("#cc_checkbox2").is(':checked')){
                $("#unid_ciencias").css("display", "block");
            }

            // educFisica selecionado
            if ($("#cc_checkbox3").is(':checked')){
                $("#unid_educFisica").css("display", "block");
            }

            // Geografia selecionado
            if ($("#cc_checkbox4").is(':checked')){
                $("#unid_geografia").css("display", "block");
            }

            // Historia selecionado
            if ($("#cc_checkbox5").is(':checked')){
                $("#unid_historia").css("display", "block");            
                if ($("#fund1").is(':checked')){
                    $("#unid_historia-1").css("display", "block");
                }
                if ($("#fund2").is(':checked')){
                    $("#unid_historia-2").css("display", "block");
                }
                if ($("#fund3").is(':checked')){
                    $("#unid_historia-3").css("display", "block");
                }
                if ($("#fund4").is(':checked')){
                    $("#unid_historia-4").css("display", "block");
                }
                if ($("#fund5").is(':checked')){
                    $("#unid_historia-5").css("display", "block");
                }
            }

            // Lingua Portuguesa selecionado
            if ($("#cc_checkbox6").is(':checked')){
                $("#unid_port").css("display", "block");
            }

            // Matematica selecionado
            if ($("#cc_checkbox7").is(':checked')){
                $("#unid_mat").css("display", "block");
            }

        } else {
            page--;
            alert("Por favor, preencha todos os campos.");
        }

        
    }



}

function verificarCamposSubmit(){

    // nivel de ensino
    var infantil = document.getElementById("infantil");
    var fundamental = document.getElementById("fundamental");
    if( infantil.selected ){
        // verificar se algum campo de experiencia foi selecionado
        var campo1 = document.getElementById("ce_md_checkbox1");
        var campo2 = document.getElementById("ce_md_checkbox2");
        var campo3 = document.getElementById("ce_md_checkbox3");
        var campo4 = document.getElementById("ce_md_checkbox4");
        var campo5 = document.getElementById("ce_md_checkbox5");
        var campo = false;
        if( campo1.checked || campo2.checked || campo3.checked || campo4.checked || campo5.checked ){
            campo = true;
        }
        var inf1 = document.getElementById("inf1");
        var inf2 = document.getElementById("inf2");
        var faixaEta = false;
        if( inf1.checked || inf2.checked ){
            faixaEta = true;
        }
        var acess1 = document.getElementById("acess1");
        var acess2 = document.getElementById("acess2");
        var acess3 = document.getElementById("acess3");
        var acess = false;
        if( acess1.selected || acess2.selected || acess3.selected ){
            acess = true;
        }

        if( campo == true && faixaEta == true && acess == true ){
            $('#form-register-oa').submit();                
        } else {
            alert("Por favor, preencha todos os campos.");
        }
        

    } else if( fundamental.selected ){
        
        var unidade = false;
        for( var i=1; i<=55; i++ ){
            var unid = document.getElementById("unid_md_checkbox"+i);            
            if( unid.checked ){
                unidade = true;
            }
        }

        
        if( unidade == true ){
            $('#form-register-oa').submit();                
        } else {
            alert("Por favor, preencha todos os campos.");
        }

    }


}




function selecionarnivel(){
    nivelEnsino = document.getElementById("nivelensino");
    faixaEtaria = document.getElementById("faixaEtaria");

    nivelEnsinoSelec = nivelEnsino.options[nivelEnsino.selectedIndex].value;
        
    // tornar visivel todos os campos
    if( nivelEnsinoSelec == "1" ){

        faixaEtaria.disabled = true;

        document.getElementById("faixaEtaria").style.display = 'block';

        for( var i=1; i<=5; i++ ){
            document.getElementById("fund"+i).style.display = 'block';
        }
    }
    
    // tornar visivel campos do ensino infantil e invisivel ensino fund1
    if( nivelEnsinoSelec == "Ensino Infantil" ){

        $("#step3").css("display", "none");
        $("#step4").css("display", "none");
        
        $("#next").css("display", "none");
        $("#finish").css("display", "block");

        faixaEtaria.disabled = false;
        document.getElementById("campo_exp").style.display = 'block';
        document.getElementById("comp_curr").style.display = 'none';

        document.getElementById("faixaEtaria").style.display = 'block';
        

        for( var i=1; i<=7; i++ ){
            document.getElementById("fund"+i).style.display = 'none';
        }
        
        
    }

    // tornar visivel campos do ensino fund1 e invisivel ensino infantil
    if( nivelEnsinoSelec == "Ensino Fundamental 1" ){        

        faixaEtaria.disabled = false;
        document.getElementById("campo_exp").style.display = 'none';
        document.getElementById("comp_curr").style.display = 'block';

        document.getElementById("faixaEtaria").style.display = 'none';
        document.getElementById("ano").style.display = 'block';
        
        for( var i=1; i<=5; i++ ){
            document.getElementById("fund"+i).style.display = 'block';
        }

        
    }

    
}




/**
 * Função para avaliar um objeto - não tem a ver com os filtros   
 */
function evaluateObject( $rating ) {

    $("#stars").css("display", "block");    
    $("#stars").html("Você avaliou este recurso com "+$rating+" estrela(s)!");


    $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            'Confirmar avaliação': function() {        
                $( this ).dialog( "close" );       
                $('#formulario').submit();
            },
            'Não quero avaliar': function() {
                $('#cm_star-empty').prop("checked", true);               
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
            
        }
    });

}



function selectEnsinoFundamental(){

    $("#inf").css("display", "none");    
    $("#fund").css("display", "block");    
    
    $("#menu-inf").removeClass("active");
    $("#menu-fund").addClass("active");

}

function selectEnsinoInfantil(){

    $("#inf").css("display", "block");    
    $("#fund").css("display", "none");    
    
    $("#menu-inf").addClass("active");
    $("#menu-fund").removeClass("active");

}


function confirmDelete(){
    
    $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Confirmar exclusão': function() {        
                $( this ).dialog( "close" );       
                $('#formulario').submit();
            },
            'Não quero excluir': function() {
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
        }
    });
}


function confirmAccept(){
    
    $( "#accept-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Confirmar': function() {        
                $( this ).dialog( "close" );       
                $('#form_accept').submit();
            },
            'Não quero avaliar': function() {
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
        }
    });

}

function confirmReject(){
    
    $( "#accept-reject" ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Confirmar': function() {        
                $( this ).dialog( "close" );       
                $('#form_reject').submit();
            },
            'Não quero avaliar': function() {
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
        }
    });

}


function objectDetail( $id_block ){
    
    $( "#"+$id_block ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Fechar': function() {        
                $( this ).dialog( "close" );       
            }
        }
    });

}

function confirmDeleteAccount(){
    
    $( "#confirm-delete-acc" ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Confirmar exclusão': function() {        
                $( this ).dialog( "close" );       
                $('#formulario').submit();
            },
            'Não quero excluir': function() {
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
        }
    });

}


function swapImage( block ){
    $(block).css("display", "none");    
    $(block).next().css("display", "block");    
}

function swapImageAgain( block ){
    $(block).css("display", "none");    
    $(block).prev().css("display", "block");    
}


function setProfileImage(){
    
    $( "#confirm-set-image" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            'Confirmar': function() {        
                $( this ).dialog( "close" );       
                $('#form-set-image').submit();
            },
            'Cancelar': function() {
                $( this ).dialog( "close" );
                console.log('cancelado');
            }
        }
    });

}


function accessibilityDescription( ){
    
    
    $( "#description" ).dialog({
        resizable: false,
        height: "auto",
        width: 500,
        modal: true,
        buttons: {
            'Fechar': function() {        
                $( this ).dialog( "close" );       
            }
        }
    });

}