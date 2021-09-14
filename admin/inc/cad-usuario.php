<?php
if (isset($_POST['cadastrar'])):
    $usuario = new Usuario();
    $erro = $usuario->getErro();
    
    $senha = $_POST['senha'];
    $codificada = hash('sha512', $senha);

    if (!isset($erro)):

        $usuario->setNomeUsuario(trim($_POST['nome']));
        $usuario->setSenhaUsuario($codificada);
        $usuario->setNivelUsuario(trim($_POST['nivel']));
        $usuario->setDataCadastro(date('Y-m-d'));
        
        if ($usuario->cadastrar()):
            $msg = "";
            $msg = "Cadastrado com sucesso !";

        else:
            $erro = $usuario->getErro();
        endif;

    endif;
else:
    $aviso = "Não foi possivel cadastrar as informações!";
endif; //ISSET
?>
<div class="col-xs-7 col-sm-7 col-md-7 col-sm-offset-3 col-md-offset-3">
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
                        <input class="form-control border-input" name="nome" placeholder="Informe nome de usuário" type="text" required autofocus/>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label"> Senha *</label>
                        <input class="form-control border-input" name="senha" placeholder="Informe uma senha"  type="password" required  />
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-bottom: 10px;">
                        <label class="control-label"> Nivel de Acesso *</label>
                        <input class="form-control border-input" name="nivel" placeholder="Informe o nivél" type="text" required />
                    </div>
                </div>

                
                <hr/>
                
                <center>
                    <button  type="submit" class="btn btn-success next-step" name="cadastrar">
                        <i class="ti-save"></i> Salvar
                    </button>
                    <a class="btn btn-danger" href="painel.php"><i class="ti-arrow-left"></i> Voltar</a>
                </center>
            </form>
        </div>
    </div>
</div>
