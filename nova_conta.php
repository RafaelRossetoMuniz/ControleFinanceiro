<?php

require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once 'DAO/ContaDAO.php';

if(isset($_POST['btnGravar'])){

    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];

    $objdao = new ContaDAO();

    $ret = $objdao->CadastrarConta($banco, $agencia, $numero, $saldo);

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';

        include_once '_menu.php'
        ?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <?php include_once '_msg.php' ?>

                        <h2>Cadastrar conta bancária</h2>
                        <h5>Aqui você poderá Cadastrar todas as suas contas bancárias. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_conta.php" method="POST"> 
                <div class="form-group">
                    <label>Nome do Banco*:</label>
                    <input class="form-control" placeholder="Digite o nome do Banco aqui..." name="banco" id="banco" value="<?= isset($banco) ? $banco : '' ?>" maxlength="20"/>
                </div>
                <div class="form-group">
                    <label>Digite a Agência*:</label>
                    <input type="number" class="form-control" placeholder="Digite a Agência aqui..." name="agencia" id="agencia" value="<?= isset($agencia) ? $agencia : '' ?>" maxlength="8">
                </div>
                <div class="form-group">
                    <label>Digite o Número da Conta*:</label>
                    <input class="form-control" placeholder="Digite o Número da conta aqui..." name="numero" id="numero" value="<?= isset($numero) ? $numero : '' ?>" maxlength="12">
                </div>
                <div class="form-group">
                    <label>Digite o Saldo Bancário*:</label>
                    <input class="form-control" placeholder="Digite o Saldo Bancário aqui..." name="saldo" id="saldo" value="<?= isset($saldo) ? $saldo : '' ?>">
                </div>
                <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarConta()" >Salvar</button>
                </form>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>