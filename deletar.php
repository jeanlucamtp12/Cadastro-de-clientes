<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //captura o id do cliente passado pelo href

    //dbname
    //host
    //user e senha 
    try {
        $pdo = new PDO("mysql:dbname=registros; host=localhost", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $ex) {
        echo ("Erro na conexão: $ex");
    }

    $resposta = ("DELETE  FROM clientes WHERE ID = $id");   //utiliza delete para deletar o cliente do banco 

    $result = $pdo->query($resposta);
    $result->execute();

    //utiliza header para retornar a pagina de pesquisa após a exclusão
    header("Refresh: 0; url=pesquisa.php?id=1");
?>