<?php

class Usuario extends Abstrata{

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function getNivelUsuario() {
        return $this->nivelUsuario;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function setNivelUsuario($nivelUsuario) {
        $this->nivelUsuario = $nivelUsuario;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function cadastrar() {
        $pdo = parent::getDB();

        try {

            parent::$tabela = "tb_usuario";
            parent::$campoTabela = "nome";
            parent::$campoEscolhido = $this->getNomeUsuario();

            if (parent::existeCadastro()):
                $this->setErro("Ja existe esse nome !");

            else:
                $cadastrar = $pdo->prepare("INSERT INTO tb_usuario
                                                    (nome, 
                                                     senha,                                                     
                                                     nivel,
                                                     data_cad
                                                     )
                                                 VALUES
                                                     (:nome,
                                                      :senha,
                                                      :nivel,
                                                      :data_cad
                                                        )");
                $cadastrar->bindValue(":nome", $this->getNomeUsuario());
               
                $cadastrar->bindValue(":senha", $this->getSenhaUsuario());
               
                $cadastrar->bindValue(":nivel", $this->getNivelUsuario());
                
                $cadastrar->bindValue(":data_cad", $this->getDataCadastro());
                $cadastrar->execute();

                if ($cadastrar->rowCount() == 1):
                    return true;
                else:
                    $this->setErro("Erro ao cadastrar Coordenador !");
                endif;

            endif; //EXISTE CADASTRO USUARIO
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}
