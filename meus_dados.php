<?php
require_once 'DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once 'DAO/UsuarioDAO.php';

// Objeto Global.
$objdao = new UsuarioDAO();

if (isset($_POST['btnGravar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $ret = $objdao->GravarMeusDados($nome, $email, $senha);
}

// Essa variável se torna um Array automaticamente quando recebe a consulta montada em um primeiro Array via POST.
$dados = $objdao->CarregarMeusDados();
// echo '<pre>';
// print_r($dados);
// echo '</pre>';
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

                        <h2>Meus Dados</h2>
                        <h5>Nesta página, você poderá alterar seus dados </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <form action="meus_dados.php" method="POST">
                    <hr />

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" placeholder="Digite seu Nome..." name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" maxlength="50" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" placeholder="Digite seu E-mail..." name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" maxlength="50">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alterar senha</label>
                            <div class="alignSenha">
                                <input type="password" class="form-control" placeholder="Digite uma nova Senha..." name="senha" id="senha" value="<?= $dados[0]['senha_usuario'] ?>" maxlength="8">
                                <img src="/ControleFinanceiroEAD/assets/img/olhoSenha.jpeg" id="olho" class="viewSenha" alt="Ver sua Senha!" title="Ver sua Senha!">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" onclick="return ValidarMeusDados()" class="btn btn-success" name="btnGravar">Gravar</button>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <script>
        var senha = $("#senha");
        var olho = $("#olho");

        olho.mousedown(function() {
            senha.attr("type", "text");
        });

        olho.mouseup(function() {
            senha.attr("type", "password");
        });

        $("#olho").mouseout(function() {
            $("#senha").attr("type", "password");
        });
    </script>

</body>

</html>