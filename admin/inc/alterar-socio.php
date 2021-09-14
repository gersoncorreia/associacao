<?php
if (isset($_POST['alterar'])):
    $socio = new Socio();
    $erro = $socio->getErro();

    $limit = $_POST['limite'];
    $valor2 = str_replace(",", ".", $limit);
    $dataNasc = $_POST['data-nasc'];
    $dataEUA = implode("-", array_reverse(explode("/", $dataNasc)));

    if (!isset($erro)):

        $socio->setCodMatricula(trim($_POST['mat']));
        $socio->setOrgaoContrat(trim($_POST['orgao']));
        $socio->setNome(trim($_POST['nome']));
        $socio->setSexo(trim($_POST['sexo']));
        $socio->setDataNasc($dataEUA);
        $socio->setNaturali(trim($_POST['natural']));
        $socio->setNascionali(trim($_POST['nascional']));
        $socio->setRg(trim($_POST['rg']));
        $socio->setCpf(trim($_POST['cpf']));
        $socio->setEnde(trim($_POST['endereco']));
        $socio->setBairro(trim($_POST['bairro']));
        $socio->setCep(trim($_POST['cep']));
        $socio->setCidade(trim($_POST['cidade']));
        $socio->setUf(trim($_POST['uf']));
        $socio->setTelefone(trim($_POST['telefone']));
        $socio->setCelular(trim($_POST['celular']));
        $socio->setLotacao(trim($_POST['lotacao']));
        $socio->setCargo(trim($_POST['cargo']));
        $socio->setEmail(trim($_POST['email']));
        $socio->setLimiteCred($valor2);
        $socio->setCodSocio($_POST['id']);



        if ($socio->alterar()):
            $msg = "";
            $msg = "Cadastrado com sucesso !";
             echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=http://localhost/associacao/admin/painel.php?p=socio&pg=">';


        else:
            $erro = $socio->getErro();
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
            <h3 class="panel-title"><i class="fa fa-user fa-1x"></i>  Alterar dados do Socio</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="" method="post">
                <?php
                try {
                    if (isset($_POST['id-socio'])):
                        $socio = new Socio();
                        $socio->setCodSocio($_POST['id-socio']);
                        $dados = $socio->listar();

                        $c = new ArrayIterator($dados);
                        ?>


                        <legend><h4>Informações Pessoais</h4></legend>
                        <?php
                        while ($c->valid()):
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-7" style="padding-bottom: 10px;">
                                    <input  name="id" type="text" value="<?php echo $c->current()->cod_socio ?>" hidden="" />
                                    <label class="control-label">Nome *</label>
                                    <input class="form-control border-input" name="nome" placeholder="Informe o nome do socio" type="text" value="<?php echo $c->current()->nome ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label"> RG *</label>
                                    <input class="form-control border-input" name="rg" placeholder="Informe RG"  type="text" value="<?php echo $c->current()->rg ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> CPF *</label>
                                    <input class="form-control border-input" id="cpf" name="cpf" placeholder="Informe CPF" type="text" value="<?php echo $c->current()->cpf ?>" />
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label">Sexo *</label>
                                    <select class="form-control border-input" id="sel1" name="sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label">Data de Nascimento *</label>
                                    <input class="form-control border-input" id="customer_phone" name="data-nasc"  type="date" value="<?php echo $c->current()->data_nasc ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Naturalidade * </label>
                                    <input class="form-control border-input" id="customer_phone1" name="natural"  type="text" value="<?php echo $c->current()->naturalidade ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Nascionalidade *</label>
                                    <input class="form-control border-input" id="customer_phone1" name="nascional"  type="text" value="<?php echo $c->current()->nacionalidade ?>" />
                                </div>

                            </div>
                            <hr/>
                            <legend><h4>Informações de Endereço</h4></legend>
                            <div class="row">

                                <div class="col-lg-7 col-md-7 col-sm-7" style="padding-bottom: 10px;">
                                    <label class="control-label">Endereço *</label>
                                    <input class="form-control border-input" name="endereco" placeholder="Informe o endereço" type="text" value="<?php echo $c->current()->endereco ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Bairro *</label>
                                    <input class="form-control border-input" name="bairro" placeholder="Informe bairro"  type="text" value="<?php echo $c->current()->bairro ?>" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label"> CEP *</label>
                                    <input class="form-control border-input" id="cep" name="cep" placeholder="Informe CEP" type="text" value="<?php echo $c->current()->cep ?>"/>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                    <label class="control-label">Municipio *</label>
                                    <select class="form-control border-input" id="sel1" name="cidade">
                                        <option value="RB">Rio Branco</option>
                                        <option value="PV">Porto velho</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">
                                    <label class="control-label">UF</label>
                                    <input class="form-control border-input" id="customer_phone" name="uf"  type="text" value="<?php echo $c->current()->uf ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Telefone </label>
                                    <input class="form-control" id="telefone" name="telefone"  type="text" value="<?php echo $c->current()->telefone ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Celular * </label>
                                    <input class="form-control border-input" id="celular" name="celular"  type="text" value="<?php echo $c->current()->celular ?>"/>
                                </div>

                            </div>
                            <hr/>
                            <legend><h4>Outras Informações</h4></legend>
                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label">Orgão Contratante *</label>
                                    <input class="form-control border-input" name="orgao" placeholder="Informe o Orgão contratante" type="text" value="<?php echo $c->current()->orgao_contrat ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Matricula *</label>
                                    <input class="form-control border-input" name="mat" placeholder="Informe matricula"  type="text" value="<?php echo $c->current()->cod_matri ?>"/>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Lotação *</label>
                                    <input class="form-control border-input" name="lotacao" placeholder="Informe Lotação" type="text" value="<?php echo $c->current()->lotacao ?>" />
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                                    <label class="control-label"> Cargo *</label>
                                    <input class="form-control border-input" name="cargo" placeholder="Informe Cargo" type="text" value="<?php echo $c->current()->cargo ?>" />
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-8 col-md-8 col-sm-8" style="padding-bottom: 10px;">
                                    <label class="control-label">E-mail *</label>
                                    <input class="form-control border-input" name="email" placeholder="Informe o e-mail" type="email" value="<?php echo $c->current()->email ?>" />
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                                    <label class="control-label"> Limite de credito *</label>
                                    <input class="form-control border-input" name="limite" id="valor" placeholder="R$ "  type="text" value="<?php echo $c->current()->limite_cred ?>" />
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
                            <a class="btn btn-danger" href="?p=socio&pg="><i class="ti-arrow-left"></i> Voltar</a>
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
