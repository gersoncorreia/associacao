<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="js/jquery.maskmoney.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/teste.js"></script>

<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="js/autocomplete.js" type="text/javascript"></script>-->
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>



<script>

    $(document).ready(function() {

        $("#tab-geral").dataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }

        });
    });
</script>
<script>

    $(document).ready(function() {

//Captura o retorno do retornaCliente.php

        $.getJSON('inc/consulta.php', function(data) {
            var cliente = [];

            //Armazena na array capturando somente o nome do cliente
            $(data).each(function(key, value) {
                cliente.push(value.nome);
            });

// Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
            $('#busca').autocomplete({
                source: cliente,
                minLength: 3
            });
        });
    });
</script>

<script>
    function buscar(palavra)
    {
        var page = "inc/imprimir.php";
        $.ajax
                ({
                    type: 'POST',
                    dataType: 'html',
                    url: page,
                    data: {palavra: palavra},
                    success: function(msg)
                    {
                        $("#dados").html(msg);
                    }
                });
    }


    $('#buscar').click(function() {
        buscar($("#palavra").val())
    });

    $(document).ready(function() {
        $('#form-emitir').submit(function() {
            var dados = jQuery(this).serialize();

            $.ajax({
                type: "POST",
                url: "inc/imprimir.php",
                data: dados,
                success: function(data)
                {
                    alert(data);
                }
            });

            return false;
        });
    });

</script>

<script>
    $(function($) {
        // Aqui fazemos uso do plugin MASKED INPUT
        $("#data").mask("99/99/9999");
        $("#cpf").mask("999.999.999-99");
        $("#cnpj").mask("99.999.999/9999-99");
        $("#cep").mask("99.999-999");
        $("#telefone").mask("(99) 9999-9999");
        $("#celular").mask("(99)99999-9999");
        // Aqui usamos fazemos uso do plugin MASK MONEY
        $("#valor").maskMoney({thousands: '', decimal: ','});
    });
</script>
