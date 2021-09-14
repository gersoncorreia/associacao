<?php

class Socio extends Abstrata {

    public function getCodSocio() {
        return $this->codSocio;
    }

    public function setCodSocio($codSocio) {
        $this->codSocio = $codSocio;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getCredUtil() {
        return $this->credUtil;
    }

    public function getCreSaldo() {
        return $this->creSaldo;
    }

    public function setCredUtil($credUtil) {
        $this->credUtil = $credUtil;
    }

    public function setCreSaldo($creSaldo) {
        $this->creSaldo = $creSaldo;
    }

    public function getCodMatricula() {
        return $this->codMatricula;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getOrgaoContrat() {
        return $this->orgaoContrat;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getDataNasc() {
        return $this->dataNasc;
    }

    public function getNaturali() {
        return $this->naturali;
    }

    public function getNascionali() {
        return $this->nascionali;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEnde() {
        return $this->ende;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLotacao() {
        return $this->lotacao;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getLimiteCred() {
        return $this->limiteCred;
    }

    public function setCodMatricula($codMatricula) {
        $this->codMatricula = $codMatricula;
    }

    public function setOrgaoContrat($orgaoContrat) {
        $this->orgaoContrat = $orgaoContrat;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    public function setNaturali($naturali) {
        $this->naturali = $naturali;
    }

    public function setNascionali($nascionali) {
        $this->nascionali = $nascionali;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEnde($ende) {
        $this->ende = $ende;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLotacao($lotacao) {
        $this->lotacao = $lotacao;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setLimiteCred($limiteCred) {
        $this->limiteCred = $limiteCred;
    }

    public function listar() {
        $id = $this->getCodSocio();
        parent::$tabela = "tb_socio";
        parent::$campoTabela = "cod_socio";
        parent::$campoEscolhido = "$id";
        return parent::listar3();
    }
    
    public function alterar() {
        $pdo = parent::getDB();
        try {

            $alterar = $pdo->prepare("UPDATE tb_socio SET 
                
                                        cod_matri  = :mat,
                                        orgao_contrat  = :orgao,
                                        nome  = :nome,
                                        sexo  = :sexo,
                                        data_nasc  = :dat,
                                        naturalidade  = :nat,
                                        nacionalidade  = :nac,
                                        rg  = :rg,
                                        cpf = :cpf,
                                        endereco = :end, 
                                        bairro = :bar,
                                        cep = :cep,                                        
                                        cidade = :cidade,
                                        uf = :uf,
                                        telefone = :tel,
                                        celular = :cel,
                                        email = :email,
                                        lotacao = :lot,
                                        cargo = :carg,
                                        limite_cred = :limite
                                        
                                      WHERE cod_socio = :id");

            $alterar->bindValue(":mat", $this->getCodMatricula());
            $alterar->bindValue(":orgao", $this->getOrgaoContrat());
            $alterar->bindValue(":nome", $this->getNome());
            $alterar->bindValue(":sexo", $this->getSexo());
            $alterar->bindValue(":dat", $this->getDataNasc());
            $alterar->bindValue(":nat", $this->getNaturali());
            $alterar->bindValue(":nac", $this->getNascionali());
            $alterar->bindValue(":rg", $this->getRg());
            $alterar->bindValue(":cpf", $this->getCpf());
            $alterar->bindValue(":end", $this->getEnde());
            $alterar->bindValue(":bar", $this->getBairro());
            $alterar->bindValue(":cep", $this->getCep());
            $alterar->bindValue(":cidade", $this->getCidade());
            $alterar->bindValue(":uf", $this->getUf());
            $alterar->bindValue(":tel", $this->getTelefone());
            $alterar->bindValue(":cel", $this->getCelular());
            $alterar->bindValue(":email", $this->getEmail());
            $alterar->bindValue(":lot", $this->getLotacao());
            $alterar->bindValue(":carg", $this->getCargo());
            $alterar->bindValue(":limite", $this->getLimiteCred());
            $alterar->bindValue(":id", $this->getCodSocio());
            $alterar->execute();

            if ($alterar->rowCount() == 1):
                return true;
            else:
                $this->setErro("Erro ao alterar o SOCIO !");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function cadastrar() {
        $pdo = parent::getDB();

        try {

            parent::$tabela = "tb_socio";
            parent::$campoTabela = "nome";
            parent::$campoEscolhido = $this->getNome();

            if (parent::existeCadastro()):
                $this->setErro("Ja existe esse nome !");
            else:
                parent::$tabela = "tb_socio";
                parent::$campoTabela = "cod_matri";
                parent::$campoEscolhido = $this->getCodMatricula();
                if (parent::existeCadastro()):
                    $this->setErro("Ja existe alguem com essa matricula cadastrado !");
                else:
                    $cadastrar = $pdo->prepare("INSERT INTO tb_socio
                                                    (cod_matri, 
                                                     orgao_contrat, 
                                                     nome,
                                                     sexo,
                                                     data_nasc,
                                                     naturalidade,
                                                     nacionalidade,
                                                     rg,
                                                     cpf,
                                                     endereco,
                                                     bairro,
                                                     cep,
                                                     cidade,
                                                     uf,
                                                     telefone,
                                                     celular,
                                                     email,
                                                     lotacao,
                                                     cargo,
                                                     limite_cred,
                                                     cred_saldo
                                                     )
                                                 VALUES
                                                     (:matri, 
                                                      :orgao,
                                                      :nome,
                                                      :sexo,
                                                      :data_nasc,
                                                      :natu,
                                                      :naci,
                                                      :rg,
                                                      :cpf,
                                                      :end,
                                                      :bair,
                                                      :cep,
                                                      :cidade,
                                                      :uf,
                                                      :tel,
                                                      :cel,
                                                      :email,
                                                      :lota,
                                                      :cargo,
                                                      :limitCred,
                                                      :saldo
                                                        )");
                    $cadastrar->bindValue(":matri", $this->getCodMatricula());
                    $cadastrar->bindValue(":orgao", $this->getOrgaoContrat());
                    $cadastrar->bindValue(":nome", $this->getNome());
                    $cadastrar->bindValue(":sexo", $this->getSexo());
                    $cadastrar->bindValue(":data_nasc", $this->getDataNasc());
                    $cadastrar->bindValue(":natu", $this->getNaturali());
                    $cadastrar->bindValue(":naci", $this->getNascionali());
                    $cadastrar->bindValue(":rg", $this->getRg());
                    $cadastrar->bindValue(":cpf", $this->getCpf());
                    $cadastrar->bindValue(":end", $this->getEnde());
                    $cadastrar->bindValue(":bair", $this->getBairro());
                    $cadastrar->bindValue(":cep", $this->getCep());
                    $cadastrar->bindValue(":cidade", $this->getCidade());
                    $cadastrar->bindValue(":uf", $this->getUf());
                    $cadastrar->bindValue(":tel", $this->getTelefone());
                    $cadastrar->bindValue(":cel", $this->getCelular());
                    $cadastrar->bindValue(":email", $this->getEmail());
                    $cadastrar->bindValue(":lota", $this->getLotacao());
                    $cadastrar->bindValue(":cargo", $this->getCargo());
                    $cadastrar->bindValue(":limitCred", $this->getLimiteCred());
                    $cadastrar->bindValue(":saldo", $this->getLimiteCred());
                    $cadastrar->execute();

                    if ($cadastrar->rowCount() == 1):
                        return true;
                    else:
                        $this->setErro("Erro ao cadastrar Coordenador !");
                    endif;

                endif; //EXISTE CADASTRO USUARIO

            endif; //EXISTE CADASTRO NOME
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function pegarId() {
        $pdo = parent::getDB();
        try {
            $list = $pdo->prepare("select * from tb_socio  where nome = :nome;");
            $list->bindValue(":nome", $this->getNome());
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

    public function alterarSaldo() {
        $vl = $this->getValor();
        $pdo = parent::getDB();
        try {

            $alterar = $pdo->prepare("UPDATE tb_socio "
                    . "SET cred_utilizado = (cred_utilizado + :vl), "
                    . "cred_saldo = (cred_saldo - :vp)"
                    . "WHERE cod_socio = :id;");

            $alterar->bindValue(":id", $this->getCodSocio());
            $alterar->bindValue(":vl", $this->getValor());
            $alterar->bindValue(":vp", $this->getCreSaldo());
            $alterar->execute();

            if ($alterar->rowCount() == 1):
                return true;
            else:
                $this->setErro("Erro ao alterar Coordenador !");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

}
