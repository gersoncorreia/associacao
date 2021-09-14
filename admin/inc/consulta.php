<?php

// Dados da conexão com o banco de dados
define('SERVER', 'localhost');
define('DBNAME', 'radiologia');
define('USER', 'root');
define('PASSWORD', '');

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';

$acao2 = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro2 = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';


// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=" . SERVER . "; dbname=" . DBNAME, USER, PASSWORD, $opcoes);

// Verifica se foi solicitado uma consulta para o autocomplete
if ($acao == 'autocomplete'):
    $where = (!empty($parametro)) ? 'WHERE nome LIKE ?' : '';
    $sql = "SELECT orgao_contrat, nome, cargo FROM tb_socio " . $where;

    $stm = $conexao->prepare($sql);
    $stm->bindValue(1, '%' . $parametro . '%');
    $stm->execute();
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);

    $json2 = json_encode($dados);
    echo $json2;
endif;


// Verifica se foi solicitado uma consulta para preencher os campos do formulário
if ($acao == 'consulta'):
    $sql = "SELECT cod_socio, orgao_contrat, rg, cpf, cargo, lotacao, limite_cred FROM tb_socio ";
    $sql .= "WHERE nome LIKE ? LIMIT 1";

    $stm = $conexao->prepare($sql);
    $stm->bindValue(1, $parametro . '%');
    $stm->execute();
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);

    $json = json_encode($dados);
    echo $json;
endif;

$sql = "SELECT  nome FROM tb_socio ";

$stm = $conexao->prepare($sql);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);

$json2 = json_encode($dados);
echo $json2;
