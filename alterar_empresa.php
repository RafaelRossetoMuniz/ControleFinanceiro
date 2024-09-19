<?php

require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once 'DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $idEmpresa = $_GET['cod'];
    $dados = $dao->DetalharEmpresa($idEmpresa);

    if (count($dados) == 0) {
        header('location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btnSalvar'])) {

    $idEmpresa = $_POST['cod'];
    $nomeempresa = $_POST['nomeempresa'];
    $telefoneempresa = $_POST['telefoneempresa'];
    $enderecoempresa = $_POST['enderecoempresa'];

    $ret = $dao->AlterarEmpresa($nomeempresa, $telefoneempresa, $enderecoempresa, $idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
} else if (isset($_POST['btnExcluir'])) {

    $idEmpresa = $_POST['cod'];

    $ret = $dao->ExcluirEmpresa($idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_empresa.php');
    exit;
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
                        <h2>Alterar ou Excluir empresa</h2>
                        <h5>Aqui você podera Alterar ou excluir sua Empresa</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_empresa.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa, Exemplo: Casas Bahia..." id="nomeempresa" name="nomeempresa" value="<?= $dados[0]['nome_empresa'] ?>" maxlength="50"/>
                    </div>
                    <div class="form-group">
                        <label>Telefone/Whatsapp:</label>
                        <input type="number" class="form-control" placeholder="Digite Telefone/Whatsapp da Empresa (Opcional)." name="telefoneempresa" value="<?= $dados[0]['telefone_empresa'] ?>" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite Endereço da Empresa (Opcional)." name="enderecoempresa" value="<?= $dados[0]['endereco_empresa'] ?>" maxlength="100">
                    </div>
                    <button type="submit" class="btn btn-success" onclick="return ValidarEmpresa()" name="btnSalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a empresa: <b><?= $dados[0]['nome_empresa'] ?>?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>