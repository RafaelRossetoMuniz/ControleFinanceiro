<?php

require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once 'DAO/MovimentoDAO.php';

$tipoMov = '';

if(isset($_POST['btnPesquisar'])){

    $tipoMov = $_POST['tipomov'];
    $dtInicio = $_POST['data_inicial'];
    $dtFinal = $_POST['data_final'];

    $objdao = new MovimentoDAO();

    $movs = $objdao->ConsultarMovimento($tipoMov, $dtInicio, $dtFinal);
    
}
else if(isset($_POST['btnExcluir'])){
    
    $idMov = $_POST['idMov'];
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMov, $idConta, $valor, $tipo);
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <?php
    include_once '_topo.php';
    include_once '_menu.php';
    ?>
    <!-- /. NAV SIDE  -->
    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <?php include_once '_msg.php' ?>

                        <h2>Consultar Movimento</h2>
                        <h5>Consulte todos os movimentos em um determinado período </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="consultar_movimento.php" method="POST">
                    <div class="col-md-12">
                        <label>Tipo de Movimento</label>
                        <select class="form-control" name="tipomov" id="tipomov">
                            <option value="">Selecione</option>
                            <option value="0" <?= $tipoMov == 0 ? 'selected' : '' ?>>TODOS</option>
                            <option value="1" <?= $tipoMov == 1 ? 'selected' : '' ?>>Entrada</option>
                            <option value="2" <?= $tipoMov == 2 ? 'selected' : '' ?>>Saída</option>
                        </select>
                    </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data inicial*</label>
                        <input type="date" class="form-control" placeholder="Coloque a data do movimento" name="data_inicial" id="data_inicial" value="<?= isset($dtInicio) ? $dtInicio : '' ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data final*</label>
                        <input type="date" class="form-control" placeholder="Coloque a data do movimento" name="data_final" id="data_final" value="<?= isset($dtFinal) ? $dtFinal : '' ?>">
                    </div>
                </div>
                <center>
                    <button class="btn btn-info" name="btnPesquisar" onclick="return ValidarConsultarPeriodo()" >Pesquisar</button>
                </center>
                </form>
                <?php if(isset($movs)) { ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <spam>Resultado encontrado</spam>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Tipo</th>
                                                <th>Categoria</th>
                                                <th>Empresa</th>
                                                <th>Conta</th>
                                                <th>Valor</th>
                                                <th>Observação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $total = 0;
                                            for ($i = 0; $i <count($movs); $i++){ 
                                                if($movs[$i]['tipo_movimento'] == 1){
                                                $total = $total + $movs[$i]['valor_movimento'];
                                            }
                                            else{
                                                $total = $total - $movs[$i]['valor_movimento'];
                                            }
                                            ?>
                                            
                                            <tr class="odd gradeX">
                                                <td><?= $movs[$i]['data_movimento'] ?></td>
                                                <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                <td><?= $movs[$i]['banco_conta'] ?> / Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm. <?= $movs[$i]['numero_conta'] ?></td>
                                                <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.')?></td>
                                                <td><?= $movs[$i]['obs_movimento'] ?></td>
                                                <td>
                                                <a href="#"class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                <form action="consultar_movimento.php" method="POST">

                                                    <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento'] ?>">
                                                    <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                    <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                    <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento'] ?>">

                                                    <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center><b>Deseja excluir o Movimento:</b></center><br><br>
                                                                <span>Data do Movimento: </span><strong> <?= $movs[$i]['data_movimento'] ?><br></strong>
                                                                <span>Tipo do Movimento: </span><strong> <?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?><br></strong>
                                                                <span>Categoria: </span><strong> <?= $movs[$i]['nome_categoria'] ?><br></strong>
                                                                <span>Empresa: </span><strong> <?= $movs[$i]['nome_empresa'] ?><br></strong>
                                                                <span>Conta: </span><strong> <?= $movs[$i]['banco_conta'] ?> / Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm. <?= $movs[$i]['numero_conta'] ?><br></strong>
                                                                <span>Valor:</span><strong> R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.')?><br></strong>
                                                                <span>Observação Registrada: </span><strong> <?= isset($movs[$i]['obs_movimento']) ? $movs[$i]['obs_movimento'] : '' ?></strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger" name="btnExcluir">Sim</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <center>
                                        <span style="color: <?= $total < 0 ? 'red' : 'green' ?>"><strong>TOTAL: R$ <?=number_format($total, 2, ',', '.'); ?></strong></span>
                                    </center>

                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

</body>

</html>