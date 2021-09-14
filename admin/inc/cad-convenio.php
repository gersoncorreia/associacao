<?php
if (isset($_POST['cadastrar'])):
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





        if ($conve->cadastrar()):
            $msg = "";
            $msg = "Cadastrado com sucesso !";

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
            <h3 class="panel-title"><i class="fa fa-user fa-1x"></i>  Cadastrar Convênio</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="" method="post">
                <legend><h4>Informações da Empresa</h4></legend>
                <div class="row">

                    <div class="col-lg-5 col-md-5 col-sm-5" style="padding-bottom: 10px;">
                        <label class="control-label">Nome *</label>
                        <input class="form-control border-input" name="nome" id="busca" placeholder="Informe o nome da empresa" type="text" required />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label"> CNPJ *</label>
                        <input class="form-control border-input" id="cnpj" name="cnpj" placeholder="Informe CNPJ"  type="text"  />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                        <label class="control-label"> CPF *</label>
                        <input class="form-control border-input" id="cpf" name="cpf" placeholder="Informe CPF" type="text"  />
                    </div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                        <label class="control-label"> OUTRO DOC *</label>
                        <input class="form-control border-input" id="doc" name="doc" type="text"  />
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-7 col-md-7 col-sm-7" style="padding-bottom: 10px;">                 
                        <label class="control-label">Endereço *</label>
                        <input class="form-control border-input" id="customer_phone" name="endereco"  type="text" required />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                        <label class="control-label">CEP *</label>
                        <input class="form-control border-input" id="cep" name="cep"  type="text" required />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label"> Cidade * </label>
                        <input class="form-control border-input" id="customer_phone1" name="cidade"  type="text" required />
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                        <label class="control-label"> Contato *</label>
                        <input class="form-control border-input" id="customer_phone1" name="contato"  type="text" required />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">                 
                        <label class="control-label">Telefone *</label>
                        <input class="form-control border-input" id="telefone" name="telefone"  type="text" required />
                    </div>
                </div>
                <hr/>
                
                <center>
                    <button  type="submit" class="btn btn-success next-step" name="cadastrar">
                        <i class="ti-save"></i> Salvar
                    </button>
                    <a class="btn btn-danger" href="?p=convenio&pg="><i class="ti-arrow-left"></i> Voltar</a>
                </center>
            </form>
        </div>
    </div>
</div>
