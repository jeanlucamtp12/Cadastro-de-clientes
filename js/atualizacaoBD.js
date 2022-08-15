function TestaCPF(strCPF) {  //função que valida o CPF informado pelo usuario
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000") {
        alert("CPF Invalido");
        document.getElementById("cpf").focus();
        return false;
    }

    for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) {
        alert("CPF Invalido");
        document.getElementById("cpf").focus();
        return false;
    }

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) {
        alert("CPF Invalido");
        document.getElementById("cpf").focus();
        return false;
    }
    return true;
}


function validar() {     //função utilizada para verificar se os campos informados no form não estão em branco 
    if (nome.value == "") {
        alert("Dados obrigatorios não infomados");
        document.getElementById("nome").focus();
        return false;
    }
    if (nome.value == "" || nasc.value == "" || celular.value == "" || email.value == "" || endereco.value == "" || cpf.value == "") {
        alert("Dados obrigatorios não infomados");
        return false;
    }
}
