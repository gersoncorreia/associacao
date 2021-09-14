<?php

session_start();
require_once "config.php";


LoginUser::verificaLogado();

if (isset($_GET['ac'])):
    /* DESLOGAR DO SISTEMA */
    if ($_GET['ac'] == 'sair'):
        if (isset($_SESSION['logado'])):
            session_destroy();
            header("Location:../index.php");
        endif;
    endif; /* DESLOGAR DO SISTEMA */
endif; /* GET[AC] */
?>
<html>
    
    <?php include_once 'estrutura/header.php'; ?>

    <?php include_once 'estrutura/navbar.php'; ?>
    <?php include_once 'estrutura/body.php'; ?>
    <?php include_once 'estrutura/footer.php'; ?>

</html>
