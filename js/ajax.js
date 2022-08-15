$('#form').submit(function (evento) {  //utilização de ajax para realizar o envio do form sem atualizar a pagina 

    evento.preventDefault();

    var nome = $('#nome').val();
    var email = $('#email').val();
    var nascimento = $('#nasc').val();
    var cpf = $('#cpf').val();
    var celular = $('#celular').val();
    var endereco = $('#endereco').val();
    var observacao = $('#observacao').val();


    $.ajax({
        url: 'registroBanco.php',
        method: 'POST',
        data: {
            Nome: nome,
            Email: email,
            Nascimento: nascimento,
            CPF: cpf,
            Celular: celular,
            Endereco: endereco,
            Observacao: observacao
        }


    }).done(function (result) {

        if (result != 'Vazio' && result != 'Email, CPF') {    //laço de decisão utilizado para verificar se todos os requisitos para cadastro do cliente foram preenchidos corretamente
            alert("Cadastro Realizado com Sucesso!!");
        }
        if (result == 'Email, CPF') {                          //If que indica se Email e CPF já estão cadastrados no banco de dados
            alert("CPF/Email já cadastrado!");
        }
        console.log(result);

    });
});
