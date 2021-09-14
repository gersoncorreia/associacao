<?php
if (isset($_POST['cadastrar'])):

    $cred = new CredCheque();
    $erro = $cred->getErro();

    $soc = new Socio();
    $soc->setNome($_POST['nome']);
    $dados1 = $soc->pegarId();
    
    $r = new ArrayIterator($dados1);
    while ($r->valid()):
        if ($r->current()->nome == $_POST['nome']):
           $id1 = $r->current()->cod_socio;
        endif;
        $r->next();
    endwhile;


    //$idC = $_POST['idCred'];
    $idS = $_POST['idS'];
    //echo $_POST['conve'] . "<br>";
    //echo $_POST['idU'] . "<br>";
    $valor2 =  str_replace(",",".",$_POST['valor']);
     //$valor = 57.67;
    //echo $_POST['data-venc'] . "<br>";
    //echo $_POST['qtd'] . "<br>";
   //$valorFormat = number_format($valor, 3, '.', ',');
    if (!isset($erro)):
        //$cred->setCodCredCheque($_POST['idCred']);
        $cred->setCodSocio($id1);
        $cred->setCodConvenio($_POST['conve']);
        $cred->setCodUsuario($_POST['idU']);
        $cred->setDataCadastro(date('Y-m-d'));
        $cred->setValor($valor2);
        $cred->setMesDesconto($_POST['data-venc']);
        $cred->setQtdParcelas($_POST['qtd']);

        if ($cred->cadastrar()):
            $msg = "";
            $msg = "Cadastrado com sucesso !";

        else:
            $erro = $cred->getErro();
        endif;
    endif;


    /////////////////////////////////////////////////////////// 

    $soc = new Socio();
    $erro2 = $soc->getErro();

    //$_POST['idS'];
    $valor1 = $_POST['valor'];
   //$vl = str_replace(",",".",$valor1);
    $qtdP = $_POST['qtd'];
    $vp = ($valor1 / $qtdP);

    if (!isset($erro2)):
        $soc->setCodSocio($id1);
        $soc->setValor($vl);
        $soc->setCreSaldo($vp);

        if ($soc->alterarSaldo()):
        //$msg = "";
        //$msg = "Cadastrado com sucesso !";
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/associacao/admin/painel.php?p=emissao-credcheque>';
        else:
            $erro = $soc->getErro();
        endif;
    endif;
else:
    $aviso = "Não foi possivel cadastrar as informações!";
endif; //ISSET
?>


<div id="page-wrapper">

    <!-- Tabela com as listagens das informações dos alunos vindas do banco de dados -->

    <div class="row">
        <div class="container-fluid">
            <div class=" col-md-4" style="padding-bottom: 10px;">
                <div class="well ">
                    <?php
                    $lista = new Socio();
                    $lista->setNome($_POST['nome']);
                    $dados = $lista->pegarId();
                    if (empty($dados)):
                        echo "";
                    else:
                        $l = new ArrayIterator($dados);
                        while ($l->valid()):
                            $id1 = $l->current()->cod_socio;
                            ?>
                            <label class="control-label"> Nome do Socio: <strong><?php echo $l->current()->nome; ?></strong> </label><br> 
                            <label class="control-label"> Limite de Credito: R$ <strong ><?php echo $l->current()->limite_cred; ?></strong></label><br>                            
                            <label class="control-label"> Saldo Disponível: R$ <strong ><?php echo $l->current()->cred_saldo; ?></strong></label><br>                            
                            <label class="control-label"> Valor Utilizado: R$ <strong ><?php echo $l->current()->cred_utilizado; ?></strong></label>
                            <?php
                            $l->next();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>
                                    <i class="ti-view-grid"></i>
                                    Emissão CredCheque
                                </h3>
                            </div>
                        </div>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Tabelas referente a Pré - pesquisa de alunos  -->
                        <div class="row">
                            <div class="col-md-12">

                                <table class="table table-condensed table-hover table-responsive" id="tab-geral">
                                    <thead>
                                        <tr>

                                            <th>
                                    <center>Nº CredCheque</center>
                                    </th>
                                    <th>
                                    <center>Valor Parcela</center>
                                    </th>
                                    <th>
                                    <center>Parcela</center>
                                    </th>
                                    <th>
                                    <center>Qtd Parcelas</center>
                                    </th>
                                    <th>
                                    <center>Valor Compra</center>
                                    </th>                                                      
                                    <th>
                                    <center><em class="fa fa-cog"></em></center>
                                    </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $lista1 = new CredCheque();
                                        $lista1->setCodSocio($id1);
                                        $lista1->setParcela($_POST['qtd']);
                                        $dados1 = $lista1->pegarId1();
                                        if (empty($dados1)):
                                            echo "";
                                        else:
                                            $l1 = new ArrayIterator($dados1);
                                            while ($l1->valid()):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $l1->current()->id_cred_cheque ?></td>
                                                    <td class="text-center"><?php echo $l1->current()->valor_parc ?></td>
                                                    <td class="text-center"><?php echo $l1->current()->parcela ?></td>
                                                    <td class="text-center"><?php echo $l1->current()->qtd_parcelas ?></td>
                                                    <td class="text-center"> <?php echo $l1->current()->valor ?></td>



                                                    <td>
                                            <center>
                                                <form target="_blank" action="http://localhost/associacao/admin/inc/imprimir.php" method="post" id="form-emitir">
                                                    <input type="text"  id="id" hidden="" name="id" value="<?php echo $l1->current()->id_cred_cheque ?>">
                                                    <input type="text"  id="p" hidden="" name="p" value="<?php echo $l1->current()->parcela ?>">
                                                    <button class="btn btn-info"  type="submit"><i class="glyphicon glyphicon-print"></i> Imprimir</button> 
                                                </form>
                                                <!--<a class="btn btn-info" href="?p=imprimir-credcheque&idC=<?php //echo $l1->current()->id_cred_cheque  ?>"><i class="fa fa-eye"></i></a>-->
                                            </center>
                                            </td>
                                            </tr>
                                            <?php
                                            $l1->next();
                                        endwhile;
                                    endif;
                                    ?>
                                    </tbody>
                                </table>
                                <br>
                                <legend></legend>
                                <center>                                    
                                    <a class="btn btn-danger" href="?p=cad-credcheque">
                                        <i class="ti-arrow-left"></i>  Finalizar
                                    </a>    <!-- Volta para pagina principal-->
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
    <!-- FIM da Tabela com as listagens das informações dos alunos vindas do banco de dados -->
    
</div>
<!-- /#page-wrapper -->