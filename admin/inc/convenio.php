<!--
<b>Digite o que procura</b>
<!--Aqui o formulário para a busca
<form name='busca'>
    <input type="text" name="produto">
    <input type="button" value="buscar" onclick="mostraConteudo('inc/consul-teste.php?produto=' + document.busca.produto.value, 'resultado_busca')">
</form>
<!--Fim do formulário busca
<br />

<b>Resultado da busca</b><br />

Aqui é onde vai aparecer o resultado da busca
<div id="resultado_busca"></div>
-->

<?php
$hostname_conexao = "localhost";
$database_conexao = "radiologia";
$username_conexao = "root";
$password_conexao = "radi123";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// definir o numero de itens por pagina
$itens_por_pagina = 10;

// pegar a pagina atual
$pagina = intval($_GET['pg']);
if (!empty($pagina)):
    $item = $pagina * $itens_por_pagina;
    // puxar produtos do banco
    $sql_code = "select * from tb_convenio order by nome_empresa asc LIMIT $item, $itens_por_pagina";
    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    $produto = $execute->fetch_assoc();
    $num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
    $num_total = $mysqli->query("select nome_empresa from tb_convenio")->num_rows;

// definir numero de páginas
    $num_paginas = ceil($num_total / $itens_por_pagina);
else:
    $pagina = 0;
    $item = $pagina * $itens_por_pagina;
    // puxar produtos do banco
    $sql_code = "select * from tb_convenio order by nome_empresa asc LIMIT $item, $itens_por_pagina ";
    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    $produto = $execute->fetch_assoc();
    $num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
    $num_total = $mysqli->query("select nome_empresa from tb_convenio")->num_rows;

// definir numero de páginas
    $num_paginas = ceil($num_total / $itens_por_pagina);

endif;
?>
<div class="well col-md-10 col-md-push-1">
    <div class="container-fluid">
        <div class="row">
            <a class="btn btn-warning pull-right" href="painel.php"><i class="ti-arrow-left"></i> Voltar</a>
            <a class="btn btn-success pull-right" href="?p=cad-convenio"><i class="ti-arrow-left"></i> Adicionar Convênio</a>
            <div class="col-lg-12">
                <legend><h1>Convênio</h1></legend>
                <?php if ($num > 0) { ?>
                    <table class="table  table-hover table-striped table-condensed table-responsive">
                        <thead>
                            <tr class="success">
                                <td>Nome Empresa</td>
                                <td class="text-center">CNPJ</td>
                                <td class="text-center">CPF</td>
                                <td class="text-center">Telefone</td>
                                <td class="text-center">Contato</td>
                                <td class="text-center">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do { ?>
                                <tr>
                                    <td><?php echo $produto['nome_empresa']; ?></td>
                                    <td class="text-center"><?php echo $produto['cnpj']; ?></td>
                                    <td class="text-center"><?php echo $produto['cpf']; ?></td>
                                    <td class="text-center"><?php echo $produto['telefone']; ?></td>
                                    <td class="text-center"><?php echo $produto['contato']; ?></td>                                  
                                    <td class="text-center">
                                        <form action="?p=alterar-convenio" method="post">
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $produto['cod_convenio']; ?>">Mais Detalhes</button>
                                            <input type="text" name="cod_convenio" value="<?php echo $produto['cod_convenio']; ?>" hidden="">
                                            <button class="btn btn-xs btn-default"  type="submit">
                                                <i class="ti-pencil-alt"></i> Alterar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Inicio Modal -->
                            <div class="modal fade" id="myModal<?php echo $produto['cod_convenio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel"><strong><?php echo $produto['nome_empresa']; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">

                                            <p><strong>CNPJ:</strong> <?php echo $produto['cnpj']; ?></p>
                                            <p><strong>Cidade:</strong> <?php echo $produto['cidade']; ?></p>
                                            <p><strong>Endereço:</strong> <?php echo $produto['endereco']; ?></p>
                                            <p><strong>Telefone:</strong> <?php echo $produto['telefone']; ?></p>
                                            <p><strong>Contato:</strong> <?php echo $produto['contato']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal -->
                        <?php } while ($produto = $execute->fetch_assoc()); ?>
                        </tbody>
                    </table>
                    <center>
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a href="?p=convenio&pg=0" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 0; $i < $num_paginas; $i++) {
                                    $estilo = "";
                                    if ($pagina == $i)
                                        $estilo = "class=\"active\"";
                                    ?>
                                    <li <?php echo $estilo; ?> ><a href="?p=convenio&pg=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
                                <?php } ?>
                                <li>
                                    <a href="?p=convenio&pg=<?php echo $num_paginas - 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php } ?>
                </center>
            </div>
        </div>
    </div>
</div>