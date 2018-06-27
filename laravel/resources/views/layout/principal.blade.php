<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <title>NORTHWIND</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">
                            NORTHWIND
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/funcionarios">Funcionários</a></li>
                        <li><a href="/funcionarios/novo">Novo Funcionário</a></li>
                        <li><a href="/regioes">Regiões</a></li>
                        <li><a href="/regioes/novo">Nova Região</a></li>
                        <li><a href="/territorios">Territórios</a></li>
                        <li><a href="/territorios/novo">Novo Território</a></li>
                        <li><a href="/funcionario-territorio">Funcionário Território</a></li>
                        <li><a href="/funcionario-territorio/novo">Novo Funcionário Território</a></li>
                    </ul>
                </div>
            </nav>
            @yield('conteudo')
            <footer class="footer">
                <p>© Leonardo Maciel Deschamps</p>
            </footer>
        </div>
    </body>
</html>