<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styleService.css">
</head>

</html>

<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);   //pega a informação do id passada pelo form em listagem.php
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);    //pega a informação da pagina passada pelo form em listagem.php

if ($id == 1) {   //Caso o id seja 1, simboliza que o usuario selecionou a opção de visualizar todos os cadastros no banco 

    //paginação
    //estabelece quantos itens serão exibidos por pagina
    $itens_pagina = 10;

    //Atribui o id da pagina a variavel contadora de pagina
    if (!$pagina) {
        $page_cont = "1";
    } else {
        $page_cont = $pagina;
    }

    //estabelece a condição (dado de incio) que será o primeiro a ser exibido pela pagina
    $inicio = $page_cont - 1;
    $inicio = $inicio * $itens_pagina;


    //dbname
    //host
    //user e senha 
    try {
        $pdo = new PDO("mysql:dbname=registros; host=localhost", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $ex) {
        echo ("Erro na conexão: $ex");
    }


    $resposta = ("SELECT * FROM clientes LIMIT $inicio, $itens_pagina");   //Consulta ao banco que utiliza LIMIT para capturar a faixa correta de dados de clientes a serem exibidos na pagina
    $result = $pdo->query($resposta); 
    $rows = $result->fetchAll();

    
    $respostaCount = ("SELECT * FROM clientes");   //seleciona todos os clientes da tabela
    $res = $pdo->query($respostaCount);
    $count = $res->rowCount();  //pega o numero de clientes na tabela

    $num_final = ceil($count  / $itens_pagina);       //arrendoda o valor 
   
   
    foreach ($rows as $i) {    //for para exibir os dados dos clientes na tela

        $idC = $i['ID'];
        $nome = $i['Nome'];
        $nasc = $i['Nascimento'];
        $cpf = $i['CPF'];
        $email = $i['Email'];
        $cel = $i['Celular'];
        $endereco = $i['Endereco'];
        $obs = $i['Obs'];
        //echo com dados e opções de deletar e editar clientes 
        echo ("<div class='d-flex justify-content-center'> <div class='w-50 p-5' > <div class='card'> <div class='card-body'>  <p id='print' <br> Nome: $nome <br> Nascimento: $nasc <br> CPF: $cpf <br> Email: $email <br> Celular: $cel <br> Endereço: $endereco <br><br> Observação: $obs  </p></div></div></div></div>");
        echo "<a href='editar.php?id=$idC' >Editar</a> <a href='deletar.php?id=$idC' >Deletar</a><br><br><br>";

    }

    $qnts_antes = 2;
  
        if ($page_cont != 1) {        //configura a exbição da opção 'Primeira' para ir a primeira pagina 
            echo "<a href='pesquisa.php?id=1&pagina=1'> <- Primeira </a>";
        }
    
        for ($page_ant = $page_cont - $qnts_antes; $page_ant <= $page_cont - 1; $page_ant++) {   //printa o link das paginas anteriores a atual
    
            if ($page_ant >= 1) {
                echo "<a href='?id=1&pagina=$page_ant'> $page_ant  </a>";
            }
        }
    
        echo " <a <font face=\"Verdana\" \">$page_cont</font> </a>";   //identifica a pagina atual 
    
    
        for ($page_prox = $page_cont + 1; $page_prox <= $page_cont + $qnts_antes; $page_prox++) { //printa o link das paginas posteriores a atual
    
            if ($page_prox <= $num_final) {
                echo "<a href='?id=1&pagina=$page_prox'> $page_prox  </a>";
            }
        }
    
        if ($page_cont != $num_final) {   //configura a exbição da opção 'Ultima' para ir a ultima pagina 
            echo " <a href='pesquisa.php?id=1&pagina=$num_final'> Ultima -> </a> ";
        }
    
    
} else {  //Caso o id seja diferente de 1, significa que o usuario optou por pesquisar pelo campo de busca (Nome ou Email)
    if ($id == -2) {   //id -2 indica que o usuario acabou de editar dados do cliente e retornou a pagina de pesquisa.php automaticamente pelo header()
        $valor = filter_input(INPUT_GET, "valor", FILTER_DEFAULT);
    } else {
        $valor = $_POST['val'];
    }


    //dbname
    //host
    //user e senha 
    try {
        $pdo = new PDO("mysql:dbname=registros; host=localhost", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $ex) {
        echo ("Erro na conexão: $ex");
    }

    $resposta = ("SELECT * FROM clientes WHERE Nome = '$valor' || Email = '$valor'");   //select no banco para verificar se os dados informados no campo de busca correspondem aos emails/nomes cadastrados 

    $result = $pdo->query($resposta);
    $rows = $result->fetchAll();

    if ($rows) {                      //exibi os resultados se eles forem encontrados
        foreach ($rows as $i) {
            $idC = $i['ID'];
            $nome = $i['Nome'];
            $nasc = $i['Nascimento'];
            $cpf = $i['CPF'];
            $email = $i['Email'];
            $cel = $i['Celular'];
            $endereco = $i['Endereco'];
            $obs = $i['Obs'];
            echo ("<div class='d-flex justify-content-center'> <div class='w-50 p-5' > <div class='card'> <div class='card-body'>  <p id='print' <br> Nome: $nome <br> Nascimento: $nasc <br> CPF: $cpf <br> Email: $email <br> Celular: $cel <br> Endereço: $endereco <br><br> Observação: $obs </p></div></div></div></div>");
            echo "<a href='editar.php?id=$idC&valor=$valor' >Editar</a> <a href='deletar.php?id=$idC' >Deletar</a><br><br><br>";
        }
    } else {                        //printa a informação se nada for encontrado no banco 
        echo ("<p  <br> Registro não está na base de dados. </p>");
    }
}


echo "<br><a href='listagem.php'>Voltar</a> <br><br><br><br>";        //opção de retornar a pagina anterior 

?>