<?php

require_once "../config.php";
if (isset($_POST['buscar'])):

    try {
        $conv = new Convenio();
        $conv->setCodConvenio($_POST['conve']);
        
        $list = $conv->DetalhamentoConvenio();
        $l = new ArrayIterator($list);
        $html = '
                        <header class="clearfix">
                        <div id="company">
                        ' . date("d/m/Y - H:i:s") . '
                        </div>
                        <hr/>
                          <div id="logo">
                            <img src="../img/logo.jpg" width="99" height="99">
                          </div>
                          <h1>RELATÓRIO DE MOVIMENTO</h1>
                          ';
        while ($l->valid()):
            $codConv = $l->current()->cod_convenio;
            $html .= '
                          <div id="project">
                            <div><span>NOME: </span> ' . $l->current()->nome_empresa . ' </div>
                            ';

            $html .= ' </div>
                            <div><span>TELEFONE:</span> ' . $l->current()->telefone . '</div>
                            <div><span>Endereço:</span> <a href=""> ' . $l->current()->endereco . '</a></div>
                          </div>
                          <br/>
                        </header>
                         ';
            $l->next();
        endwhile;
        $html .= '
                        <main>
                          <table>
                          
                            <thead>
                              <tr>
                                <th>Nº CredCheque</th>
                                <th>Data de Emissão</th>
                                <th>NOME</th>
                                <th>VALOR</th>
                                <th>QTD PARC</th>
                                <th>VL PARC</th>
                                <th>PARC</th>
                                <th>OPERADOR</th>
                              </tr>
                            </thead>
                            <tbody>';

        $dataI = $_POST['data-ini'];
        $dataF = $_POST['data-fim'];

        $credRel = new CredCheque();
        $credRel->setCodConvenio($codConv);
        $credRel->setDataInicio($dataI);
        $credRel->setDataFim($dataF);
        $l = $credRel->relatorioCredCheque();
        if (empty($l)):

            $html .= '
                              <tr>
                                <td> - </td>
                                <td> - </td> 
                                <td> - </td>
                                <td> - </td> 
                                <td> - </td> 
                                <td> - </td> 
                              </tr>
                              ';
        else:
            $l2 = new ArrayIterator($l);
            while ($l2->valid()):
                $html .= '
                              <tr>
                                <td>' . $l2->current()->id_cred_cheque . '</td>
                                <td>' . $l2->current()->data_entrada . '</td>
                                <td>' . $l2->current()->nome . '</td>
                                <td> R$ ' . $l2->current()->valor . '</td> 
                                <td>' . $l2->current()->qtd_parcelas . '</td>
                                <td> R$ ' . $l2->current()->valor_parc . '</td> 
                                <td>' . $l2->current()->parcela . '</td>
                                <td>' . $l2->current()->nome_usuario . '</td> 
                              </tr>
                              ';
                $valor = $l2->current()->valor_parc;
                $totalValor = ($totalValor + $valor);
                $l2->next();
            endwhile;
            $html .= '<tr>
                        <td class="total"> Valor Total</td> 
                        <td class="total"> R$ ' . $totalValor . '</td> 
                        
                    '
                    . '</tr>';
        endif;

        $html .= '
                            </tbody>
                          </table>
                          
                        </main>
                        <footer>
                          Coordenação Geral da Associação dos Tecnicos em Radiologia, Lab. e Auxi. do estado do Acre - ATRLASAC.
                        </footer>
                        ';

        include("../lib/mpdf60/mpdf.php");

        $mpdf = new mPDF('c', 'A4', '', '', 12, 15, 17, 15, 16, 13);

        $mpdf->SetDisplayMode('fullpage');

        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
        // LOAD a stylesheet
        $stylesheet = file_get_contents('../css/estilo-relatorio.css');
        $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text

        $mpdf->WriteHTML($html, 2);

        $mpdf->Output('relatorio-historico.pdf', 'I');
        exit;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

endif;
?>
