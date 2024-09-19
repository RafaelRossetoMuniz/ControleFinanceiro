function ValidarMeusDados(){

    // Validando campos com JavaScript nativo:

    var nome = document.getElementById("nome").value;

    // Validando usando Jquery:

    var email = $("#email").val();

    var senha = $("#senha").val();

    if(nome.trim() == ''){
        alert("Preencher o campo NOME");
        $("#nome").focus();
        return false;
    }

    if(email.trim() == ''){
        alert("Preencher o campo EMAIL");
        $("#email").focus();
        return false;
    }

    if(senha.trim() == ''){
        alert("Preencher o campo SENHA");
        $("#senha").focus();
        return false;
    }

    if( $("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert("A senha deverá conter entre 6 e 8 caracteres.")
        $("#senha").focus();
        return false;
    }

}

function ValidarCategoria(){

    if( $("#nomecategoria").val().trim() == ''){
        alert("Preencher o campo NOME DA CATEGORIA");
        $("#nomedacategoria").focus();
        return false;
    }

}
function ValidarEmpresa(){

    if( $("#nomeempresa").val().trim() == ''){
        alert("Preencher o campo NOME DA EMPRESA");
        $("#nomeempresa").focus();
        return false;
    }

}

function ValidarConta(){

    if( $("#banco").val().trim() == ''){
        alert("Preencher o campo BANCO");
        $("#banco").focus();
        return false;
    }

    if( $("#agencia").val().trim() == ''){
        alert("Preencher o campo AGENCIA");
        $("#agencia").focus();
        return false;
    }

    if( $("#numero").val().trim() == ''){
        alert("Preencher o campo NUMERO");
        $("#numero").focus();
        return false;
    }

    if( $("#saldo").val().trim() == ''){
        alert("Preencher o campo SALDO (R$)");
        $("#saldo").focus();
        return false;
    }
}

function ValidarMovimento(){

    if( $("#tipo").val() == ''){
        alert("Selecione o TIPO DE MOVIMENTO");
        $("#tipo").focus();
        return false;
    }

    if( $("#data").val().trim() == ''){
        alert("Preencher o campo DATA");
        $("#data").focus();
        return false;
    }

    if( $("#valor").val().trim() == ''){
        alert("Preencher o campo VALOR (R$)");
        $("#valor").focus();
        return false;
    }

    if( $("#categoria").val() == ''){
        alert("Selecione a CATEGORIA");
        $("#categoria").focus();
        return false;
    }

    if( $("#empresa").val() == ''){
        alert("Selecione a EMPRESA");
        $("#empresa").focus();
        return false;
    }

    if( $("#conta").val() == ''){
        alert("Selecione a CONTA");
        $("#conta").focus();
        return false;
    }
}

function ValidarConsultarPeriodo(){

    if( $("#tipomov").val() == ''){
        alert("Selecione o campo TIPO DE MOVIMENTO");
        $("#tipomov").focus();
        return false;
    }

    if( $("#data_inicial").val().trim() == ''){
        alert("Preencher o campo DATA INICIAL");
        $("#data_inicial").focus();
        return false;
    }

    if( $("#data_final").val().trim() == ''){
        alert("Preencher o campo DATA FINAL");
        $("#data_final").focus();
        return false;
    }
}

function ValidarLogin(){

    if( $("#email").val().trim() == ''){
        alert("Preencher o campo E-MAIL");
        $("#email").focus();
        return false;
    }

    if( $("#senha").val().trim() == ''){
        alert("Preencher o campo SENHA");
        $("#senha").focus();
        return false;
    }

    if( $ ("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert("A senha deve conter entre 6 e 8 caracteres");
        $("#senha").focus();
        return false;
    }
}

function ValidarCadastro(){

    if( $("#nome").val().trim() == ''){
        alert("Preencher o campo NOME");
        $("#nome").focus();
        return false;
    }

    if( $("#email").val().trim() == ''){
        alert("Preencher o campo E-MAIL");
        $("#email").focus();
        return false;
    }

    if( $("#senha").val().trim() == ''){
        alert("Preencher o campo SENHA");
        $("#senha").focus();
        return false;
    }

    if( $("#rsenha").val().trim() == ''){
        alert("Preencher o campo REPETIR SENHA");
        $("#rsenha").focus();
        return false;
    }

    if( $("#senha").val() !=  $("#rsenha").val()){
        alert("O campo SENHA e REPETIR SENHA deverão ser iguais!");
        $("#rsenha").focus();
        return false;
    }

    if( $("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8){
        alert("A senha deverá conter entre 6 e 8 caracteres.")
        $("#senha").focus();
        return false;
    }
}