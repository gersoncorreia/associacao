<?php
if (isset($_POST['alterar'])):
    $conve = new Convenio();
    $erro = $conve->getErro();


    if (!isset($erro)):
        $conve->setNomeEmpresa(trim($_POST['nome']));
        $conve->setCnpj(trim($_POST['cnpj']));
        $conve->setCpf(trim($_POST['cpf']));
        $conve->setOutroDoc(trim($_POST['doc']));
        $conve->setEndereco(trim($_POST['endereco']));
        $conve->setCep(trim($_POST['cep']));
        $conve->setCidade(trim($_POST['cidade']));
        $conve->setContato(trim($_POST['contato']));
        $conve->setTelefone(trim($_POST['telefone']));
        $conve->setCodConvenio(trim($_POST['id']));

        if ($conve->alterar()):
            $msg = "";
            $msg = "Alteração efetuada com sucesso !";
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=http://localhost/associacao/admin/painel.php?p=convenio&pg=">';

        else:
            $erro = $conve->getErro();
        endif;

    endif;
else:
    $aviso = "Não foi possivel cadastrar as informações!";
endif; //ISSET
?>
<div class="col-xs-12 col-sm-9 col-md-9 col-sm-offset-2 col-md-offset-2">
    <!-- Mensagens de Erros que aparecem quando o cadastro não foi efetuado -->
    <?php echo isset($msg) ? '<div class="alert alert-success" role="alert">' . $msg . '</div>' : ""; ?>
    <?php echo isset($erro) ? '<div class="alert alert-danger" role="alert">' . $erro . '</div>' : ""; ?>
    <!-- FIM da Mensagens de Erros que aparecem quando o cadastro não foi efetuado -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user fa-1x"></i>  Alterar dados do Convênio</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="" method="post">
                <?php
                try {
                    if (isset($_POST['cod_convenio'])):
                        
                        $conv = new Convenio();
                        $conv->setCodConvenio($_POST['cod_convenio']);
                        $dados = $conv->listarConv();
                       
                        $c = new ArrayIterator($dados);
                        ?>


                        <legend><h4>Informações da Empresa</h4></legend>
                        <?php
                        while ($c->valid()):
                            ?>
                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-sm-5" style="padding-bottom: 10px;">
                                    <input  name="id" type="text" value="<?php echo $c->current()->cod_convenio ?>" hidden="" />
                                    <label class="control-label">Nome *</label>
                                    <input class="form-control border-input" name="nome" id="busca" placeholder="Informe o nome da empresa" type="text" value="<?php echo $c->current()->nome_empresa ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> CNPJ *</label>
                                    <input class="form-control border-input" id="cnpj" name="cnpj" placeholder="Informe CNPJ"  type="text" value="<?php echo $c->current()->cnpj ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label"> CPF *</label>
                                    <input class="form-control border-input" id="cpf" name="cpf" placeholder="Informe CPF" type="text" value="<?php echo $c->current()->cpf ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label"> OUTRO DOC *</label>
                                    <input class="form-control border-input" id="doc" name="doc" type="text" value="<?php echo $c->current()->outros_doc ?>" />
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-7 col-md-7 col-sm-7" style="padding-bottom: 10px;">                 
                                    <label class="control-label">Endereço *</label>
                                    <input class="form-control border-input" id="customer_phone" name="endereco"  type="text" value="<?php echo $c->current()->endereco ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label">CEP *</label>
                                    <input class="form-control border-input" id="cep" name="cep"  type="text" value="<?php echo $c->current()->cep ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Cidade * </label>
                                    <input class="form-control border-input" id="customer_phone1" name="cidade"  type="text" value="<?php echo $c->current()->cidade ?>" />
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                    <label class="control-label"> Contato *</label>
                                    <input class="form-control border-input" id="customer_phone1" name="contato"  type="text" value="<?php echo $c->current()->contato ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">                 
                                    <label class="control-label">Telefone *</label>
                                    <input class="form-control border-input" id="telefone" name="telefone"  type="text" value="<?php echo $c->current()->telefone ?>" />
                                </div>
                            </div>
                            <?php
                            $c->next();
                        endwhile;
                        ?>
                        <hr/>

                        <center>
                            <button  type="submit" class="btn btn-success next-step" name="alterar">
                                <i class="ti-save"></i> Alterar
                            </button>
                            <a class="btn btn-danger" href="?p=convenio&pg="><i class="ti-arrow-left"></i> Voltar</a>
                        </center>
                    </form>

                    <?php
                else:
                    echo "Você será redirecionado !!";
                //throw new Exception("Erro: Não foi possivel pegar o id!");
                endif;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
            ?>
        </div>
    </div>
</div>
