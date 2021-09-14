<?php
session_start();
require_once 'config.php';

if (isset($_POST['logar'])):

    $senha = $_POST['senha'];
    $codificada = hash('sha512', $senha);


    $logar = new LoginUser();
    $logar->setNomeUsuario($_POST['nome']);
    $logar->setSenhaUsuario($codificada);
    $logar->logarUsuario();

    if ($logar->getErro()):
        $erro = $logar->getErro();
    else:
        header("Location:admin/painel.php");
    endif;
endif;
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <title>CREDCHEQUE</title>

        <link href="admin/css/bootstrap.min.css" rel="stylesheet" />
        <link href="admin/css/login-css.css" rel="stylesheet" />
        <link href="admin/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container" style="margin-top:40px">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <?php echo isset($erro) ? '<div class="alert alert-danger" role="alert">' . $erro . '</div>' : ""; ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong> Área de Acesso</strong>
                        </div>
                        <div class="panel-body">
                            <form action=""  method="POST" role="form" >
                                <fieldset>
                                    <div class="row">
                                        <div class="center-block">
                                            <img class="profile-img"
                                                 src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input class="form-control" placeholder="Usuário" name="nome" type="text" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                    <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-lg btn-primary btn-block" name="logar" value="Entrar">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="panel-footer ">
                            Esqueceu a senha?! <a href="#" onClick=""> Recuperar Senha </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="admin/js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="admin/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>