
<div class="col-xs-7 col-sm-7 col-md-7 col-sm-offset-3 col-md-offset-3">
    <!-- Mensagens de Erros que aparecem quando o cadastro não foi efetuado -->
    <?php //echo isset($msg) ? '<div class="alert alert-success" role="alert">' . $msg . '</div>' : ""; ?>
    <?php //echo isset($erro) ? '<div class="alert alert-danger" role="alert">' . $erro . '</div>' : ""; ?>
    <!-- FIM da Mensagens de Erros que aparecem quando o cadastro não foi efetuado -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-1x"></i>  Emissão de CredCheque</h3>
        </div>
        <div class="panel-body">
            <form role="form" action="?p=emissao-credcheque" method="post">
                <legend><h4>Informações para emissão de credcheque</h4></legend>
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <label class="control-label">Nome Socio*</label>
                        <input class="form-control border-input" name="nome" id="busca" placeholder="Informe o nome da empresa" type="text" required />

                    </div>
                    <!--
                    <div class=" col-md-12" style="padding-bottom: 10px;">
                        <div class="well ">
                            <label class="control-label"> Orgão contratante: <strong id="orgao"></strong> </label> <label class="control-label pull-right text-left"> RG: <strong id="rg"></strong> </label><br>
                            <label class="control-label"> Cargo: <strong id="cargo"></strong></label> <label class="control-label pull-right text-left"> CPF: <strong id="cpf"></strong></label><br>
                            <label class="control-label"> Lotação: <strong id="lota"></strong></label> <label class="control-label pull-right text-left"> Limite de Credito: R$ <strong id="limite"></strong></label><br>
                        </div>
                    </div>
                    -->
                </div>
                <legend><h4>CRED-CHEQUE</h4></legend>
                <div class="row">
                    <input type="text" id="idS" name="idS" hidden="" >                   
                    <input type="text" name="idU" hidden="" value="<?php echo $_SESSION['cod_usuario'] ?>">
                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-bottom: 10px;">
                        <label class="control-label">Convênio *</label>
                        <select class="form-control border-input" name="conve">
                            <option>Selecionar...</option>
                            <?php
                            $conv = new Convenio();
                            $dados = $conv->listar();

                            if (empty($dados)):
                                echo "<option>Não há convênios cadastrados</option>";
                            else:
                                $c = new ArrayIterator($dados);
                                while ($c->valid()):
                                    ?>
                                    <option value="<?php echo $c->current()->cod_convenio; ?>"><?php echo $c->current()->nome_empresa; ?></option>
                                    <?php
                                    $c->next();
                                endwhile;
                            endif;
                            ?>  

                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="padding-bottom: 10px;">                 
                        <label class="control-label">Valor *</label>
                        <input class="form-control border-input" id="valor" name="valor"  type="text" required />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label">Qtd de parcelas *</label>
                        <input class="form-control border-input" id="customer_phone" name="qtd"  type="text" required />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label">Data de Vencimento * </label>
                        <input class="form-control border-input" id="customer_phone1" name="data-venc"  type="date" required />
                    </div>

                </div>

                <hr/>

                <center>
                    <button  type="submit" class="btn btn-success next-step" name="cadastrar">
                        <i class="ti-save"></i> Gerar cred-cheque
                    </button>
                    <a class="btn btn-danger" href="painel.php"><i class="ti-arrow-left"></i> Voltar</a>
                </center>
            </form>
        </div>
    </div>
</div>
