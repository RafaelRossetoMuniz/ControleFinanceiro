<?php

require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once 'DAO/MovimentoDAO.php';
require_once 'DAO/CategoriaDAO.php';
require_once 'DAO/EmpresaDAO.php';
require_once 'DAO/ContaDAO.php';

$dao_cat = new CategoriaDAO();
$dao_emp = new EmpresaDAO();
$dao_con = new ContaDAO();

$tipo = '';
$categoria = '';
$empresa = '';
$conta = '';

if(isset($_POST['btnGravar'])){

    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $obs = $_POST['obs'];
    $categoria = $_POST['categoria'];
    $empresa = $_POST['empresa'];
    $conta = $_POST['conta'];
    
    $objdao = new MovimentoDAO();

    $ret = $objdao->RealizarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta);

}

    $categorias = $dao_cat->ConsultarCategoria();
    $empresas = $dao_emp->ConsultarEmpresa();
    $contas = $dao_con->ConsultarConta();


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

                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você poderá realizar seus movimentos de entrada ou saída. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="realizar_movimento.php" method="POST">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo de Movimento*:</label>
                        <select class="form-control" name="tipo" id="tipo" >
                            <option value="">Selecione</option>
                            <option value="1"<?= $tipo == 1 ? 'selected' : '' ?>>Entrada</option>
                            <option value="2"<?= $tipo == 2 ? 'selected' : '' ?>>Saída</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data*</label>
                        <input type="date" class="form-control" placeholder="Coloque a data do movimento" name="data" id="data" value="<?= isset($data) ? $data : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Valor*</label>
                        <input class="form-control" placeholder="Digite o valor do movimento" name="valor" id="valor" value="<?= isset($valor) ? $valor : '' ?>">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Categoria*:</label>
                        <select class="form-control" name="categoria" id="categoria" >
                            <option value="">Selecione</option>
                            <?php foreach($categorias as $item) { ?>
                                <option value="<?= $item['id_categoria'] ?>"
                                <?= $categoria == $item['id_categoria'] ? 'selected' : ''?>>
                                <?= $item['nome_categoria']?>
                                </option>     
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Empresa*:</label>
                        <select class="form-control" name="empresa" id="empresa" >
                            <option value="">Selecione</option>
                            <?php foreach($empresas as $item) { ?>
                                <option value="<?= $item['id_empresa'] ?>"
                                <?= $empresa == $item['id_empresa'] ? 'selected' : '' ?>>
                                <?= $item['nome_empresa'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Conta*:</label>
                        <select class="form-control" name="conta" id="conta" >
                            <option value="">Selecione</option>
                            <?php foreach($contas as $item) { ?>
                                <option value="<?= $item['id_conta'] ?>"
                                <?= $conta == $item['id_conta'] ? 'selected' : ''?>>
                                <?= 'Banco: ' . $item['banco_conta'] . ', Agência / Número: ' . $item['agencia_conta'] . ' / ' . $item['numero_conta'] . ' | R$ '.number_format($item['saldo_conta'], 2, ',', '.')?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group">
                        <label>Observação (Opcional)</label>
                        <textarea class="form-control" rows="3" name="obs" id="obs" ></textarea>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarMovimento()" >Finalizar movimento</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>