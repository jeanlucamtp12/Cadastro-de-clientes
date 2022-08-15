<?php 
//Utiliza metodo POST para capturar os valores passados pelo form
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$nasc = $_POST['Nascimento'];
$cpf = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_NUMBER_INT);
$cel = $_POST['Celular'];
$endereco = $_POST['Endereco'];
$obs = $_POST['Observacao'];

if($nome == "" || $email == "" || $nasc  == "" || $cpf  == "" || $cel  == "" || $endereco == "" ){  //verifica se os campos foram passados sem nenhum dado
    echo ("Vazio");
    exit();
}

//dbname
//host
//user e senha     |    Realiza a conexão com o banco utilizando PDO
try {
$pdo = new PDO("mysql:dbname=registros; host=localhost", "root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (PDOException $ex){                  //Exceção para caso ocorra algum erro com a conexão
    echo("Erro na conexão: $ex");
}
//Utiliza PDO para preparar uma consulta ao banco 
$resposta = $pdo->prepare("INSERT INTO clientes (Nome, Nascimento, CPF, Email, Celular, Endereco, Obs) VALUES (:nome, :nasc, :cpf, :email, :cel, :endereco, :obs)");

$verificaDados = $pdo->prepare("SELECT CPF, Email FROM clientes WHERE CPF = ? OR Email = ?");         //Select que verifica se Email e CPF informados já estão cadastrados no banco
$verificaDados->execute([$cpf, $email]); 

if ($row = $verificaDados->fetch()) {    //Caso o Email/CPF já esteja no banco retorna essa informação 
    echo ("Email, CPF");
    exit();
}

//atribui os valores a consulta realizada no banco 
$resposta->bindValue(":nome", $nome);          
$resposta->bindValue(":nasc", $nasc);
$resposta->bindValue(":cpf", $cpf);
$resposta->bindValue(":email", $email);
$resposta->bindValue(":cel", $cel, PDO::PARAM_INT);
$resposta->bindValue(":endereco", $endereco);
$resposta->bindValue(":obs", $obs);

if ($resposta->execute()) {           //verifica se a adição ao banco foi efetuada com sucesso
    echo "Cliente Adicionado com Sucesso";
  } else {
    echo "Não foi possivel adicionar";
  }

?>