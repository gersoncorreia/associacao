<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="painel.php">ATRLASAC</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="?p=convenio&pg="><i class="fa fa-sitemap" aria-hidden="true"></i> Convênio</a></li>
            <li><a href="?p=socio&pg="><i class="fa fa-user-plus" aria-hidden="true"></i> Socio</a></li>

            
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money" aria-hidden="true"></i> Credcheque <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Cancelamento</a></li>
                    <li><a href="?p=cad-credcheque"> Emissão</a></li>                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i> Relatórios <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?p=relatorio">Movimento</a></li>
                    <li><a href="#">Devedores</a></li>                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i> Opções <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?p=cad-usuario">Usuário</a></li>
                    <li><a href="?ac=sair">Sair</a></li>                    
                </ul>
            </li>


        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>