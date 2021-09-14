<?php

class LoginUser extends Usuario{

    public function deslogar() {
        
    }


    public function logarUsuario() {
        $pdo = parent::getDB();

        try {

            $logar1 = $pdo->prepare("SELECT status FROM tb_usuario WHERE nome = :nome 
                                   ");
            $logar1->bindValue(":nome", $this->getNomeUsuario());
            $logar1->execute();

            if ($logar1->rowCount() == 1):
                $dado1 = $logar1->fetch(PDO::FETCH_ASSOC);
                if ($dado1['status'] === 'A'):

                    $logar = $pdo->prepare("SELECT * FROM tb_usuario WHERE nome = :nome 
                                   AND senha = :senha");
                    $logar->bindValue(":nome", $this->getNomeUsuario());
                    $logar->bindValue(":senha", $this->getSenhaUsuario());
                    $logar->execute();

                    if ($logar->rowCount() == 1):
                        $dados = $logar->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['logado'] = true;
                        $_SESSION['nome_usuario'] = $dados['nome'];
                        $_SESSION['cod_usuario'] = $dados['cod_usuario'];
                        $_SESSION['nivel_acesso'] = $dados['nivel'];
                    else:
                        $this->setErro("Erro ao logar, usuário ou senha inválidos!");
                    endif;
                else:
                    $this->setErro("Erro ao logar, usuário não tem permissão para acessar o sistema!");
                endif;
            else:
                $this->setErro("Erro ao logar, usuário inválido!");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public static function verificaLogado() {
        if (!isset($_SESSION['logado'])):
            header("Location: ../index.php");
        endif;
    }

}
