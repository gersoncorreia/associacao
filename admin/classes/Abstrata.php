<?php

abstract class Abstrata extends Conexao {

    protected static $tabela;
    protected static $campoTabela;
    protected static $campoEscolhido;
    protected static $existeParametros = false;
    private $parametros;
    private $erro;
    private $id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setErro($erro) {
        $this->erro = $erro;
    }

    public function getErro() {
        return $this->erro;
    }

    public function getParametros() {
        return $this->parametros;
    }

    public function setParametros($parametros) {
        $this->parametros = $parametros;
    }

    protected function listar() {
        $pdo = parent::getDB();
        try {
            if (self::$existeParametros):
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . $this->getParametros());
            else:
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . " order by " . self::$campoEscolhido . " asc");
            endif;

            $listar->execute();

            if ($listar->rowCount() > 0):
                return $listar->fetchAll(PDO::FETCH_OBJ);
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    protected function listar2() {
        $pdo = parent::getDB();
        try {
            if (self::$existeParametros):
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . $this->getParametros());
            else:
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . " WHERE cod_convenio = " . self::$campoEscolhido);
            endif;

            $listar->execute();

            if ($listar->rowCount() > 0):
                return $listar->fetchAll(PDO::FETCH_OBJ);
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    protected function listar3() {
        $pdo = parent::getDB();
        try {
            if (self::$existeParametros):
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . $this->getParametros());
            else:
                $listar = $pdo->prepare("SELECT * FROM " . self::$tabela . " WHERE cod_socio = " . self::$campoEscolhido);
            endif;

            $listar->execute();

            if ($listar->rowCount() > 0):
                return $listar->fetchAll(PDO::FETCH_OBJ);
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    protected function deletar() {
        $pdo = parent::getDB();

        try {
            $deletar = $pdo->prepare("DELETE FROM " . self::$tabela . " WHERE " .
                    self::$campoTabela . " = :id");
            $deletar->bindValue(":id", $this->getId());
            $deletar->execute();

            if ($deletar->rowCount() == 1):
                return true;
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    protected function existeCadastro() {
        $pdo = parent::getDB();

        try {
            $verifica = $pdo->prepare("SELECT * FROM " . self::$tabela . " WHERE " . self::$campoTabela .
                    " = :campoescolhido");
            $verifica->bindValue(":campoescolhido", self::$campoEscolhido);
            $verifica->execute();

            if ($verifica->rowCount() > 0):
                return true;
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function obrigatorio($nome, $valor) {
        if (empty($valor)):
            $this->setErro("Campo " . $nome . " é obrigatório !");
        endif;
    }

    protected function pegarId() {
        $pdo = parent::getDB();
        try {
            $pegarId = $pdo->prepare("SELECT * FROM " . self::$tabela . " WHERE " . self::$campoTabela . "= :campoEscolhido");
            $pegarId->bindValue(":campoEscolhido", self::$campoEscolhido);
            $pegarId->execute();

            if ($pegarId->rowCount() == 1):
                $dados = $pegarId->fetch(PDO::FETCH_OBJ);
                return $dados;
            else:
                return false;
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}
