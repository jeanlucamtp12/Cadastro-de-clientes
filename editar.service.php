<?php

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Segue a mesma linha de raciocinio utilizada na pagina de cadastro, substituindo o insert por update para atualizar a informação já existente no banco 
$nome = $_POST['nome'];
$email = $_POST['email'];
$nasc = $_POST['nasc'];
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$cel = $_POST['celular'];
$endereco = $_POST['endereco'];
$obs = $_POST['observacao'];

//dbname
//host
//user e senha 
try {
    $pdo = new PDO("mysql:dbname=registros; host=localhost", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $ex) {
    echo ("Erro na conexão: $ex");
}

$verificaDados = $pdo->prepare("SELECT CPF, Email FROM clientes WHERE CPF = ? OR Email = ?");
$verificaDados->execute([$cpf, $email]);

if ($row = $verificaDados->fetch()) {


    echo ("CPF/Email já cadastrado! Redirecionando... ");
    header("Refresh: 3; url=editar.php?id=$id");      //exibi o erro e retorna a pagina anterior após 3 segundos

    exit();
}
//realiza update no banco com as novas informações
$resposta = $pdo->prepare("UPDATE clientes                
                           SET Nome = :nome, Nascimento = :nasc, CPF = :cpf, Email = :email, Celular = :cel, Endereco = :endereco, Obs = :obs
                           WHERE ID = :id");

$resposta->bindValue(":nome", $nome);
$resposta->bindValue(":nasc", $nasc);
$resposta->bindValue(":cpf", $cpf);
$resposta->bindValue(":email", $email);
$resposta->bindValue(":cel", $cel, PDO::PARAM_INT);
$resposta->bindValue(":endereco", $endereco);
$resposta->bindValue(":obs", $obs);
$resposta->bindValue(":id", $id);

if ($resposta->execute()) {
    echo "Alteração realizada com sucesso";
} else {
    echo "Erro na alteração";
}


header("Refresh: 0; url=pesquisa.php?id=-2&valor=$nome");     //retorna a pagina anterior após a alteração
