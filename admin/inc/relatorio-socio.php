
<div class="well col-md-10 col-md-push-1">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <h2 class="page-header text-center"><i class="ti-layers-alt"></i> Histórico de Movimento </h2>
                <br/>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8  col-md-offset-2">
                        <div class="card">                            
                            <div class="content">
                                <form  target="_blank" action="http://localhost/associacao/admin/inc/gera-relatorio-socio.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nome do Socio</label>
                                                    <input type="text" name="nome" class="form-control border-input" placeholder="Nome da Empresa" required="">
                                                </div>
                                            </div>   

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Período Inicial</label>
                                                    <input type="date" name="data-ini" class="form-control border-input" required="Informe Uma data de Entrada">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Período Final</label>
                                                    <input type="date" name="data-fim" class="form-control border-input" required="Informe uma data de Saída">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="buscar" value="buscar">  
                                            <i class="ti-filter"></i> Gerar Relatório
                                        </button>

                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>