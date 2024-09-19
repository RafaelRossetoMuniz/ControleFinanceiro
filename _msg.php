<?php

// Caso exista na aplicação, a chave ret na URL, essa condição lógica executa a verificação.
if(isset($_GET['ret'])){

    $ret = $_GET['ret'];

}

// Caso não existe na URL, a chave ret, ele vai pular a condição anterior e verificar o valor de ret, para emitir a mensagem!
if(isset($ret)){
    switch($ret){
        case 2:
            echo '<div class="alert alert-success"> Cadastro realizado com sucesso. Faça seu login!</div>';
        break;
        case 1:
            echo '<div class="alert alert-success"> Ação realizada com Sucesso!</div>';
        break;
        case 0:
            echo '<div class="alert alert-warning"> Preencha todos os campos obrigatórios!</div>';
        break;
        case -1:
            echo '<div class="alert alert-danger"> Ocorreu um erro na operação. Tente mais tarde!</div>';
        break;
        case -2:
            echo '<div class="alert alert-warning"> A senha deve conter entre 6 e 8 caracteres</div>';
        break;
        case -3:
            echo '<div class="alert alert-danger"> A senha e o Repetir senha não conferem!</div>';
        break;
        case -4:
            echo '<div class="alert alert-danger"> O registro não poderá ser excluido, pos está em uso!</div>';
        break;
        case -5:
            echo '<div class="alert alert-danger"> E-mail já cadastrado, insira um novo E-mail!</div>';
        break;
        case -6:
            echo '<div class="alert alert-danger"> Usuario não encontrado!</div>';
        break;
        case -7:
            echo '<div class="alert alert-danger"> Email invalido, por favor digite novamente.</div>';
        break;
    }
}