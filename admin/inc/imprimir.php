<?php
require_once "config.php";
//carrega o componente pelo GUID (pelo nome n�o funcionou)
$bema = new COM("{310DBDAC-85FF-4008-82A8-E22A09F9460B}");
//abre porta
$init = $bema->IniciaPorta("LPT1");
//verifica erro
if ($init <= 0) {
   echo "erro!";
   exit;
}

$lista = new CredCheque();
$lista->setCodCredCheque($_POST['id']);
$lista->setParcela($_POST['p']);
$dados = $lista->montaCredCheque();
if (empty($dados)):
    echo "";
else:
    $l = new ArrayIterator($dados);
    while ($l->valid()):
        
        //echo $l->current()->nome_socio."<br>";
        //echo $l->current()->nome_empresa."<br>";
        //echo $l->current()->data_cad."<br>";
        //echo $l->current()->valor."<br>";
        //echo $l->current()->data_desc."<br>";
        //echo $l->current()->qtd_parcelas."<br>";
        //echo $l->current()->parcela."<br>";
        //echo $l->current()->valor_parc."<br>";
       
//imprime texto com formata��o em cada linha
//o espa�amento deve ser ajustado a depender da impressora
        $bema->FormataTX("================================================ ", 2, 0, 0, 0, 0);
        $bema->FormataTX("     ATRLASAC \n", 3, 1, 0, 1, 0);
        $bema->FormataTX("     Associacao dos Tecnicos em Radiologia \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("================================================ ", 2, 0, 0, 0, 0);
        $bema->FormataTX("Cred-cheque n: ".$l->current()->id_cred_cheque."              Emissao: ".date('d/m/Y H:i:s')."\n", 1, 0, 0, 0, 0);
        $bema->FormataTX("================================================ ", 2, 0, 0, 0, 0);
        $bema->FormataTX("             IDENTIFICACAO \n", 3, 0, 0, 0, 0);
        $bema->FormataTX("================================================", 2, 0, 0, 0, 0);
        $bema->FormataTX("[Socio] - ".$l->current()->nome_socio." \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("[Convenio] - ".$l->current()->nome_empresa." \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("[valor da Compra] - R$ ".$l->current()->valor." \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("[Parcela] - ".$l->current()->parcela."/".$l->current()->qtd_parcelas." \n", 2, 0, 0, 0, 0);
		$bema->FormataTX("[Mes de Desconto] - ".$l->current()->data_desc." \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("[Valor da Parcela] - R$ ".$l->current()->valor_parc." \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("================================================ \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("     ____________________________________        ", 2, 0, 0, 0, 0);
        $bema->FormataTX("      Socio: ".$l->current()->nome_socio."       \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);

		$bema->FormataTX(" Carinbo e Assinatura do Operador\n", 2, 0, 1, 0, 0);
		$bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
        $bema->FormataTX("================================================ ", 2, 0, 0, 0, 0);
        $bema->FormataTX("GEC DEVELOPE v1.0 14/03/2017 \n", 1, 0, 1, 0, 0);
        $bema->FormataTX("================================================ \n", 2, 0, 0, 0, 0);
		$bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
		$bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
		$bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
		$bema->FormataTX("                                                 \n", 2, 0, 0, 0, 0);
        $l->next();
    endwhile;
	
echo "Impressão efetuada com sucesso!"; 
endif;
//fecha a porta de impressao
$bema->FechaPorta();   

?>

