<?php

require_once 'DAO/UsuarioDAO.php';

if(isset($_POST['btnFinalizar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rsenha = $_POST['rsenha'];

    $objdao = new UsuarioDAO();

    $ret = $objdao->CriarCadastro($nome, $email, $senha, $rsenha);

    if($ret == 2){
        header("location: index.php?ret=$ret");
        exit;
    }
    
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

include_once '_head.php';

?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />

                <?php include_once '_msg.php' ?>

                <h2> Controle Financeiro : CADASTRO</h2>
               
                <h5>( Faça seu cadastro )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Preencha todos os campos </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="cadastro.php" method="POST">
                                        <br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                            <input type="text" class="form-control" placeholder="Seu nome"  name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>" maxlength="50"/>
                                        </div>
                                     
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Seu e-mail" name="email" id="email" value="<?= isset($email) ? $email : '' ?>" maxlength="50"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Crie uma senha (mínimo 6 caracteres)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>" maxlength="8"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Repita a senha criada" name="rsenha" id="rsenha" value="<?= isset($rsenha) ? $rsenha : '' ?>" maxlength="8"/>
                                        </div>
                                     
                                     <button name="btnFinalizar" onclick="return ValidarCadastro()" class="btn btn-success ">Finalizar cadastro</button>
                                        </form>
                                    <hr />
                                    <spam>Ja possui cadastro ?</spam>  <a href="index.php" >Clique aqui!</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
   
</body>
</html>
