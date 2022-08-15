<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Cadastro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-item nav-link" href="index.php">Pagina Inicial</a>
                </li>
            </ul>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-item nav-link" href="listagem.php">Listar Clientes</a>
                </li>
            </ul>
    </nav>
    </div>

    |<div class="d-flex justify-content-center">
        <div class="w-50 p-3" justify-content-center>

            <div class="card" text-align: center>
                <div class="card-body" text-align: center>

                    <form id="form" onsubmit="return validar(this)">
                        <h3>Cadastro de Clientes</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome " id="nome" placeholder="Nome" pattern="[A-Za-zÀ-ú ']{4,}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nasc">Nascimento</label>
                                <input type="date" class="form-control" id="nasc" placeholder="nasc">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="CPF" onchange="TestaCPF(this.value)" pattern="[0-9]{11,11}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" placeholder="Celular" pattern="^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" placeholder="Endereço">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="observacao"></label>
                                <textarea class="form-control" id="observacao" placeholder="Observação" data-ls-module="charCounter" maxlength="300"></textarea> <br>

                                <button type="submit" form="form" class="btn btn-primary">Cadastrar</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<script src="js/ajax.js"></script>
<script src="js/atualizacaoBD.js"></script>

</body>

</html>