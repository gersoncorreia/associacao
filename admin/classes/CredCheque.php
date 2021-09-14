<?php

class CredCheque extends Abstrata {
    public function getCodCredCheque() {
        return $this->codCredCheque;
    }

    public function setCodCredCheque($codCredCheque) {
        $this->codCredCheque = $codCredCheque;
    }

        public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function getCodSocio() {
        return $this->codSocio;
    }

    public function getCodConvenio() {
        return $this->codConvenio;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getMesDesconto() {
        return $this->mesDesconto;
    }

    public function getQtdParcelas() {
        return $this->qtdParcelas;
    }

    public function getCredUtilizado() {
        return $this->credUtilizado;
    }

    public function getCreSaldo() {
        return $this->creSaldo;
    }

    public function getParcela() {
        return $this->parcela;
    }

    public function setCodSocio($codSocio) {
        $this->codSocio = $codSocio;
    }

    public function setCodConvenio($codConvenio) {
        $this->codConvenio = $codConvenio;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setMesDesconto($mesDesconto) {
        $this->mesDesconto = $mesDesconto;
    }

    public function setQtdParcelas($qtdParcelas) {
        $this->qtdParcelas = $qtdParcelas;
    }

    public function setCredUtilizado($credUtilizado) {
        $this->credUtilizado = $credUtilizado;
    }

    public function setCreSaldo($creSaldo) {
        $this->creSaldo = $creSaldo;
    }

    public function setParcela($parcela) {
        $this->parcela = $parcela;
    }
    
    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataFim() {
        return $this->dataFim;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

        
    public function pegarId1() {
        $pdo = parent::getDB();
        try {
            $idS = $this->getCodSocio();
            $parc = $this->getParcela();
            $list = $pdo->prepare("select * from tb_cred_cheque  where cod_socio = ".$idS." order by id_cred_cheque desc limit ".$parc.";");
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
    
        public function montaCredCheque() {
        $pdo = parent::getDB();
        try {
            $list = $pdo->prepare("select 
                                        s.nome nome_socio, 
                                        c.nome_empresa, 
                                        u.nome,
                                        cre.id_cred_cheque,
                                        cre.data_cad, 
                                        cre.valor, 
                                        date_format(cre.mes_desc,'%d/%m/%Y') 'data_desc', 
                                        cre.qtd_parcelas, 
                                        cre.parcela, 
                                        cre.valor_parc
                                    from tb_cred_cheque cre
                                    inner join tb_socio s on
                                         s.cod_socio = cre.cod_socio
                                    inner join tb_convenio c on
                                         c.cod_convenio = cre.cod_convenio
                                    inner join tb_usuario u on
                                         u.cod_usuario = cre.cod_usuario
                                    where
                                         cre.id_cred_cheque = :id and
                                         cre.parcela = :p");
            $list->bindValue(":id", $this->getCodCredCheque());
            $list->bindValue(":p", $this->getParcela());
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
    
    public function relatorioCredCheque() {
        $pdo = parent::getDB();
        try {
            $dIni = $this->getDataInicio();
            $dFim = $this->getDataFim();
            $codCon = $this->getCodConvenio();
            $list = $pdo->prepare("
                select 
                    c.id_cred_cheque,
                    date_format(date_add(c.data_cad,interval -3 hour), '%d/%m/%Y') 'data_entrada',
                    us.nome 'nome_usuario',
                    s.nome, 
                    c.valor, 
                    c.qtd_parcelas, 
                    c.parcela,
                    c.valor_parc
                from tb_cred_cheque c
                inner join tb_socio s on
                    s.cod_socio = c.cod_socio
                inner join tb_usuario us on
                    us.cod_usuario = c.cod_usuario
               where
                    c.cod_convenio = '".$codCon."' and
                    c.data_cad BETWEEN '".$dIni."' AND '".$dFim."' and
                    c.valor > '1' and c.valor > 2 
                order by c.data_cad, c.parcela asc
                    
                    ;");
           // $list->bindValue(":id", $this->getCodConvenio());
            //$list->bindValue(":dataI", $this->getDataInicio());
            //$list->bindValue(":dataF", $this->getDataFim());
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

    public function cadastrar() {
        $pdo = parent::getDB();
        //Pega os valores vindos por requisição
       // $idCred = $this->getCodCredCheque();
        $idS = $this->getCodSocio();
        $idC = $this->getCodConvenio();
        $idU = $this->getCodUsuario();
        $dataC = $this->getDataCadastro();
        $v = $this->getValor();
        $qtdP = $this->getQtdParcelas();


        //faz a divisão da data em dia, mês e ano, para mudar o mês e ano do vencimento
        $dataDes = $this->getMesDesconto();
        $data_partes = explode("-", $dataDes);
        $ano = $data_partes[0];
        $mes = $data_partes[1];
        $dia = $data_partes[2];


        //divide o valor da compra pelo numero de parcelas
        $valor_parcelas = $v / $qtdP;

        $parcela = 1;
        $datav = $ano . "-" . $mes . "-" . $dia."<br>";
        try {
            while ($parcela <= $qtdP):
              $dataVenc = $ano . "-" . $mes . "-" . $dia;

                $cadastrar = $pdo->prepare("
                    INSERT INTO tb_cred_cheque (cod_socio, cod_convenio, cod_usuario, data_cad, valor, mes_desc, qtd_parcelas, parcela, valor_parc)
                    VALUES($idS,$idC,$idU,'$dataC',$v,'$dataVenc',$qtdP,$parcela, $valor_parcelas);");

                //$cadastrar->bindValue(":codS", 1);
                //$cadastrar->bindValue(":codC", 1);
                //$cadastrar->bindValue(":ccodU", 1);
               //$cadastrar->bindValue(":data", $this->getDataCadastro());
                //$cadastrar->bindValue(":valor", 100);
               // $cadastrar->bindValue(":mes", '2017-04-08');
                //$cadastrar->bindValue(":qtd", 1);
                //$cadastrar->bindValue(":parc", 1);
                $cadastrar->execute();

                $parcela++;
                if ($mes <= 12):
                    $mes++; // adiciona +1 a variavel mes
                else:
                    $mes = 1;
                    $ano++;
                endif;
            endwhile;


            if ($cadastrar->rowCount() >= 1):
                return true;
            else:
                $this->setErro("Erro ao cadastrar Coordenador !");
            endif;
        } catch (PDOException $e) {
            echo "Erro1: " . $e->getMessage();
        }
    }
    
    
}
