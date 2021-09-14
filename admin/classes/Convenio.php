<?php

class Convenio extends Abstrata {
    public function getCodConvenio() {
        return $this->codConvenio;
    }

    public function setCodConvenio($codConvenio) {
        $this->codConvenio = $codConvenio;
    }

    
    public function getOutroDoc() {
        return $this->outroDoc;
    }

    public function getNomeEmpresa() {
        return $this->nomeEmpresa;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getContato() {
        return $this->contato;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setOutroDoc($outroDoc) {
        $this->outroDoc = $outroDoc;
    }

    public function setNomeEmpresa($nomeEmpresa) {
        $this->nomeEmpresa = $nomeEmpresa;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

   /* public function listar() {
        $id = $this->getCodConvenio();
        parent::$tabela = "tb_convenio";
        parent::$campoTabela = "cod_convenio";
        parent::$campoEscolhido = "$id";
        return parent::listar2();
    }*/
    
    public function listar() {
        parent::$tabela = "tb_convenio";
        parent::$campoEscolhido = "nome_empresa";
        return parent::listar();
    }
    
    public function listarConv() {
        $pdo = parent::getDB();
        try {
            $list = $pdo->prepare("select * from tb_convenio where cod_convenio = :id
                    ;");
            $list->bindValue(":id", $this->getCodConvenio());
            $list->execute();

            if ($list->rowCount() > 0):
                return $list->fetchAll(PDO::FETCH_OBJ);
            else:
                return false;
            endif;
        } catch (Exception $e) {
            echo "Erro: " . $e = "Erro ao fazer listagem!";
        }
    }


    public function DetalhamentoConvenio() {
        $pdo = parent::getDB();
        try {
            $id = $this->getCodConvenio();
            $list = $pdo->prepare("select 
                    cod_convenio,
                    nome_empresa,
                    cnpj,
                    cpf,
                    endereco, 
                    contato,
                    telefone                    
                    from tb_convenio
                    where cod_convenio = '".$id."'
                    ;");
            //$list->bindValue(":nome", $this->getNomeEmpresa());
            $list->execute();

            if ($list->rowCount() > 0):
                return $list->fetchAll(PDO::FETCH_OBJ);
            else:
                return false;
            endif;
        } catch (Exception $e) {
            echo "Erro: " . $e = "Erro ao fazer listagem!";
        }
    }
    
    public function alterar() {
        $pdo = parent::getDB();
        try {

            $alterar = $pdo->prepare("UPDATE tb_convenio SET 
                
                                        nome_empresa  = :nome, 
                                        cnpj = :cnpj,
                                        cpf = :cpf, 
                                        outros_doc = :doc, 
                                        endereco = :end, 
                                        cep = :cep, 
                                        cidade = :cidade,
                                        contato = :contat,
                                        telefone = :tel
                                        
                                      WHERE cod_convenio = :id");

            $alterar->bindValue(":nome", $this->getNomeEmpresa());
            $alterar->bindValue(":cnpj", $this->getCnpj());
            $alterar->bindValue(":cpf", $this->getCpf());
            $alterar->bindValue(":doc", $this->getOutroDoc());
            $alterar->bindValue(":end", $this->getEndereco());
            $alterar->bindValue(":cep", $this->getCep());
            $alterar->bindValue(":cidade", $this->getCidade());
            $alterar->bindValue(":contat", $this->getContato());
            $alterar->bindValue(":tel", $this->getTelefone());
            $alterar->bindValue(":id", $this->getCodConvenio());
            $alterar->execute();

            if ($alterar->rowCount() == 1):
                return true;
            else:
                $this->setErro("Erro ao alterar o CONVENIO !");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function cadastrar() {
        $pdo = parent::getDB();

        try {

            parent::$tabela = "tb_convenio";
            parent::$campoTabela = "nome_empresa";
            parent::$campoEscolhido = $this->getNomeEmpresa();

            if (parent::existeCadastro()):
                $this->setErro("Ja existe esse nome !");
            else:

                $cadastrar = $pdo->prepare("INSERT INTO tb_convenio
                                                    ( 
                                                     nome_empresa,
                                                     cnpj,
                                                     cpf,
                                                     outros_doc,
                                                     endereco,
                                                     cep,
                                                     cidade,
                                                     contato,
                                                     telefone
                                                     )
                                                 VALUES
                                                     (
                                                      :nome,
                                                      :cnpj,
                                                      :cpf,
                                                      :doc,
                                                      :end,                                                      
                                                      :cep,                                                      
                                                      :cidade,
                                                      :contat,
                                                      :tel
                                                        )");

                $cadastrar->bindValue(":nome", $this->getNomeEmpresa());
                $cadastrar->bindValue(":cnpj", $this->getCnpj());
                $cadastrar->bindValue(":cpf", $this->getCpf());
                $cadastrar->bindValue(":doc", $this->getOutroDoc());
                $cadastrar->bindValue(":end", $this->getEndereco());
                $cadastrar->bindValue(":cep", $this->getCep());
                $cadastrar->bindValue(":cidade", $this->getCidade());
                $cadastrar->bindValue(":contat", $this->getContato());
                $cadastrar->bindValue(":tel", $this->getTelefone());
                $cadastrar->execute();

                if ($cadastrar->rowCount() == 1):
                    return true;
                else:
                    $this->setErro("Erro ao cadastrar Coordenador !");
                endif;



            endif; //EXISTE CADASTRO NOME
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}
