<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

                    <form method="POST" action="pesquisa.php">

                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="pesquisa.php?id=1&pagina=1">Ver Cadastrados</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Digite Nome ou Email" name="val" aria-label="Pesquisar">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                            </form>

                        </nav>


                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>