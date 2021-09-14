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
    // puxar produtos do banco
    $item = $pagina * $itens_por_pagina;
    $sql_code = "select *, date_format(data_nasc, '%d/%m/%Y') 'data_nascimento' from tb_socio order by nome asc LIMIT $item, $itens_por_pagina";
    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    $produto = $execute->fetch_assoc();
    $num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
    $num_total = $mysqli->query("select nome from tb_socio")->num_rows;

// definir numero de páginas
    $num_paginas = ceil($num_total / $itens_por_pagina);
else:
    $pagina = 0;
    // puxar produtos do banco
    $item = $pagina * $itens_por_pagina;
    $sql_code = "select *, date_format(data_nasc, '%d/%m/%Y') 'data_nascimento' from tb_socio order by nome asc LIMIT $item, $itens_por_pagina";
    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    $produto = $execute->fetch_assoc();
    $num = $execute->num_rows;

// pega a quantidade total de objetos no banco de dados
    $num_total = $mysqli->query("select nome from tb_socio")->num_rows;

// definir numero de páginas
    $num_paginas = ceil($num_total / $itens_por_pagina);

endif;
?>
<div class="well col-md-10 col-md-push-1">
    <div class="container-fluid">
        <div class="row">
            <a class="btn btn-warning pull-right" href="painel.php"><i class="ti-arrow-left"></i> Voltar</a>
            <a class="btn btn-success pull-right" href="?p=cad-socio"><i class="ti-arrow-left"></i> Adicionar Socio</a>
            <div class="col-lg-12">
                <legend><h1>Socios</h1></legend>

                <?php if ($num > 0) { ?>
                    <table class="table  table-hover table-striped table-condensed table-responsive">
                        <thead>
                            <tr class="success">
                                <td>Nº Matricula</td>
                                <td>Orgão Contratante</td>
                                <td>Nome</td>
                                <td class="text-center">CPF</td>
                                <td class="text-center">Telefone</td>
                                <td class="text-center">Celular</td>
                                <td class="text-center">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do { ?>
                                <tr>
                                    <td class="text-center"><?php echo $produto['cod_matri']; ?></td>
                                    <td><?php echo $produto['orgao_contrat']; ?></td>
                                    <td><?php echo $produto['nome']; ?></td>
                                    <td class="text-center"><?php echo $produto['cpf']; ?></td>
                                    <td class="text-center"><?php echo $produto['telefone']; ?></td>
                                    <td class="text-center"><?php echo $produto['celular']; ?></td>
                                    <td class="text-center">
                                        <form action="?p=alterar-socio" method="post">
                                            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $produto['cod_socio']; ?>">Mais Detalhes</button>
                                            <input type="text" name="id-socio" value="<?php echo $produto['cod_socio']; ?>" hidden="">
                                            <button class="btn btn-xs btn-default"  type="submit">
                                                <i class="ti-pencil-alt"></i> Alterar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Inicio Modal -->
                            <div class="modal fade" id="myModal<?php echo $produto['cod_socio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel"><strong><?php echo $produto['nome']; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <legend><h4>Informações Funcionais</h4></legend>
                                            <p><strong>Matricula:</strong> <?php echo $produto['cod_matri']; ?></p>
                                            <p><strong>Orgão Contratante:</strong> <?php echo $produto['orgao_contrat']; ?></p>
                                            <p><strong>Lotação:</strong> <?php echo $produto['lotacao']; ?></p>
                                            <p><strong>Cargo:</strong> <?php echo $produto['cargo']; ?></p><br>
                                            <legend><h4>Informações Pessoais</h4></legend>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><strong>RG:</strong> <?php echo $produto['rg']; ?></p>
                                                    <p><strong>CPF:</strong> <?php echo $produto['cpf']; ?></p>
                                                    <p><strong>Sexo:</strong> <?php echo $produto['sexo']; ?></p>
                                                </div>
                                                <div class="col-md-5 col-md-offset-3">
                                                    <p><strong>Data Nascimento:</strong> <?php echo $produto['data_nascimento']; ?></p>
                                                    <p><strong>Naturalidade:</strong> <?php echo $produto['naturalidade']; ?></p>
                                                    <p><strong>Nascionalidade:</strong> <?php echo $produto['nacionalidade']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>Endereço:</strong> <?php echo $produto['endereco']; ?></p>
                                                    <p><strong>Bairro:</strong> <?php echo $produto['bairro']; ?></p>                                            
                                                    <p><strong>CEP:</strong> <?php echo $produto['cep']; ?></p> 
                                                </div>
                                                <div class="col-md-3 col-md-offset-1">
                                                    <p><strong>Cidade:</strong> <?php echo $produto['cidade']; ?></p>                                            
                                                    <p><strong>UF:</strong> <?php echo $produto['uf']; ?></p>
                                                </div>
                                            </div>
                                            <legend><h4>Informações Financeiras</h4></legend>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>Limite:</strong> R$ <?php echo $produto['limite_cred']; ?></p>
                                                    <p><strong>Saldo Utilizado:</strong> R$ <?php echo $produto['cred_utilizado']; ?></p>
                                                    <p><strong>Saldo Disponivel:</strong> R$ <?php echo $produto['cred_saldo']; ?></p>
                                                </div>
                                                <div class="col-md-4 col-md-offset-1">
                                                </div>
                                            </div>
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
                                    <a href="?p=socio&pg=0" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 0; $i < $num_paginas; $i++) {
                                    $estilo = "";
                                    if ($pagina == $i)
                                        $estilo = "class=\"active\"";
                                    ?>
                                    <li <?php echo $estilo; ?> ><a href="?p=socio&pg=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
                                <?php } ?>
                                <li>
                                    <a href="?p=socio&pg=<?php echo $num_paginas - 1; ?>" aria-label="Next">
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