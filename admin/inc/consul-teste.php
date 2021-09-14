<?php

//Resgata valor por get digitado no formulário
$busca = $_GET['produto'];

// Dados da conexão com o banco de dados
define('SERVER', 'localhost');
define('DBNAME', 'radiologia');
define('USER', 'root');
define('PASSWORD', 'root');


// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=" . SERVER . "; dbname=" . DBNAME, USER, PASSWORD, $opcoes);

$sql = "SELECT  nome FROM tb_socio WHERE nome  LIKE  '%".$busca."%'";

$stm = $conexao->prepare($sql);
$stm->execute();
$dados = $stm->fetchAll(PDO::FETCH_OBJ);

//Aqui verifica se veio algum resultado
if ($stm->rowCount() == 0) {

    echo "Nenhum resultado encontrado";
} else {
    $c = new ArrayIterator($dados);
    while ($c->valid()):
        echo $c->current()->nome . "<br />";
        $c->next();
    endwhile;
}
 