$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('strong', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#busca" ).autocomplete({
	    minLength: 2,
	    source: function( request, response ) {
	        $.ajax({
	            url: "inc/consulta.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#busca').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#busca").val( ui.item.nome );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#busca").val( ui.item.nome );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a><b>Orgão Contratante: </b>" + item.orgao_contrat + "<br><b>Nome: </b>" + item.nome + " - <b> Cargo: </b>" + item.cargo + "</a><br>" )
        .appendTo( ul );
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
    	var busca = $('#busca').val();

    	if(busca != "" && busca.length >= 2){
    		$.ajax({
	            url: "inc/consulta.php",
	            dataType: "json",	
	            data: {
	            	acao: 'consulta',
	                parametro: $('#busca').val()
	            },
	            success: function( data ) {
	               $('#orgao').append(data[0].orgao_contrat);
	               $('#cargo').append(data[0].cargo);
	               $('#lota').append(data[0].lotacao);
	               $('#rg').append(data[0].rg);
	               $('#cpf').append(data[0].cpf);
	               $('#limite').append(data[0].limite_cred);
	               $('#idS').val(data[0].cod_socio);
	            }
	        });
    	}
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#busca').val();

       if(busca == ""){
	   $('#orgao').append('');
           $('#cargo').append('')
           $('#lota').append('');
           $('#rg').append('');
           $('#cpf').append('');
           $('#liimite').append('');
           $('#idS').val('')
       }
    }


});