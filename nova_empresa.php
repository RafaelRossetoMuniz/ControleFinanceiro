<?php

require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once 'DAO/EmpresaDAO.php';

if(isset($_POST['btnGravar'])){

    $nome = $_POST['nome'];
    $tel = $_POST['telefone'];
    $end = $_POST['endereco'];

    $objdao = new EmpresaDAO();

    $ret = $objdao->CadastrarEmpresa($nome, $tel, $end);

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

                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá Cadastrar todas as suas Empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_empresa.php" method="POST"> 
                <div class="form-group">
                    <label>Nome da Empresa*:</label>
                    <input class="form-control" placeholder="Digite o nome da Empresa, Exemplo: Casas Bahia..." name="nome" id="nomeempresa" value="<?= isset($nome) ? $nome : '' ?>" maxlength="50"/>
                </div>
                <div class="form-group">
                    <label>Telefone/Whatsapp:</label>
                    <input type="number" class="form-control" placeholder="Digite Telefone/Whatsapp da Empresa (Opcional)." name="telefone" value="<?= isset($tel) ? $tel : '' ?>" maxlength="11">
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input class="form-control" placeholder="Digite Endereço da Empresa (Opcional)." name="endereco" value="<?= isset($end) ? $end : '' ?>" maxlength="100">
                </div>
                <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()">Salvar</button>
                </form>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>