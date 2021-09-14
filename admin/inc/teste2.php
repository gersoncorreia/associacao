<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once "../config.php";
        
        $conv = new Convenio();
        $conv->setNomeEmpresa($_POST['nome-empresa']);

        $list = $conv->DetalhamentoConvenio();
        $l = new ArrayIterator($list);
        
        while ($l->valid()):
           echo  $codConv = $l->current()->cod_convenio;
            
            $l->next();
        endwhile;
        
        
        
        
        $dataI = $_POST['data-ini'];
        $dataF = $_POST['data-fim'];

        $credRel = new CredCheque();
        $credRel->setCodConvenio($codConv);
        $credRel->setDataInicio($dataI);
        $credRel->setDataFim($dataF);
        $l = $credRel->relatorioCredCheque();
        if (empty($l)):
            echo "sem dados";
        else:
            $l2 = new ArrayIterator($l);
            while ($l2->valid()):
                echo $l2->current()->nome."<br>";
                echo $l2->current()->valor."<br>";
                echo $l2->current()->qtd_parcelas."<br>";
                echo $l2->current()->parcela;


                $l2->next();
            endwhile;
        endif;
        ?>
    </body>
</html>
