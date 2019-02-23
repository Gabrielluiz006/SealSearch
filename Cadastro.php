<?php
require_once '../login_cadastro_usuario/seguranca_usuario.php';

if(isset($_SESSION['tokenUsuarioLogado'])) {
    if(!hash_equals($tokenSessao, $_SESSION['tokenUsuarioLogado'])) {
        if(isset($_SESSION['email'])) {
        $email_login = $_SESSION['email'];
        }
        $_SESSION = array();
        session_destroy();
    }
}
// preenche o form de login com o email setando um cookie
if(isset($_SESSION['email'])) {
    setcookie('email-login', $_SESSION['email']);
}else if(isset ($email_login)) {
    setcookie('email-login', $email_login);
}
?>
<!DOCTYPE html>
<html lang="en">      
<head>
<title>Cadastroreal</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    .footer-bs {
    background-color: #3c3d41;
	padding: 60px 40px;
	color: rgba(255,255,255,1.00);
	margin-bottom: 20px;
	border-bottom-right-radius: 6px;
	border-top-left-radius: 0px;
	border-bottom-left-radius: 6px;
}
.footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
.footer-bs .footer-brand h2 { margin:0px 0px 10px; }
.footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

.footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.pages li { padding:5px 0px;}
.footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
.footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
.footer-bs .footer-nav h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}

.footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.list li { padding:5px 0px;}
.footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
.footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

.footer-bs .footer-social ul { list-style:none; padding:0px; }
.footer-bs .footer-social h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
}
.footer-bs .footer-social li { padding:5px 4px;}
.footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
.footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

.footer-bs .footer-ns h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}
.footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

@media (min-width: 768px) {
	.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
}
/*fim do css do footer */
    
  </style>
            </head>
            <body>
                <div class="jumbotron" style="background-color: #E0851D">
                    <div class="container text-center">
                           <h1> <img src="seal1.png"> Seal Search </h1>      
                      <p>Pesquisa rápida & Inequívoca</p>
                    </div>
                  </div>
                  <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>                        
                        </button>
                      <!-- <a class="navbar-brand" href="#">Logo</a> --> 
                      <!-- inico do nav-->
                      </div>
                      <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="Home.php">Home</a></li>
                            <li><a href="Produtos.php">Produtos</a></li>
                            <?php if(isset($_SESSION['email']) && isset($_SESSION['senha'])) : ?>
                                <li><a href="Perfil.php">Perfil</a></li>
                            <?php else : ?>
                                <li><a href="Cadastro.php">Cadastro</a></li>
                            <?php endif; ?>
              <div class="input-group" style="width:200px;font-size: 13px">
                  <input type="text" class="form-control" >
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                             <li><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Login</button></li>     
                          <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Entre</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <!-- formulario de login-->
                                  <form class="text-center border border-light p-5" action="../login_cadastro_usuario/login_usuario.php" method="post">
                          <h3 class="h4 mb-4" >Registre-se</h3>
                                  <!-- Email -->
              <label>
                    <?php if(isset($_SESSION['msgLoginFalha'])) : ?>
                            <span style="color: red">* Email e/ou senha incorretos</span>
                    <?php unset($_SESSION['msgLoginFalha']);
                            endif; ?>
                        <input type="email" id="defaultLoginFormEmail" name="email-login" class="form-control mb-4" placeholder="E-mail" style="width:450px;font-size: 13px" value="<?php if(isset($_COOKIE['email-login'])) { echo $_COOKIE['email-login']; }else { echo ''; } ?>">
                </label> <br>
                  <!-- Password -->
                  <label>   
                      <input type="password" id="defaultLoginFormPassword" name="senha-login" class="form-control mb-4" placeholder="Password" style="width:450px;font-size: 13px">
                </label> <br>
                          <div class="d-flex justify-content-around">
                              <div>
                                  <!-- Remember me -->
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                      <label class="custom-control-label" for="defaultLoginFormRemember">Lembrar-me</label> <br>
                                  </div>
                              </div>
                              <div>
                                  <!-- Forgot password -->
                                  <a href="">Esqueceu a sua senha?</a><br>
                              </div>
                          </div>
                          <!-- Sign in button -->
                          <input class="btn btn-warning" name="login" type="submit" value="Login"><br>
                          <!-- Register -->
                          <p>Ainda nÃ£o se cadastrou?
                          <a href = "cadastro.php">Cadastre-se</a>
                          </p><br>
                      </form>
                      <!-- Fim do formulario de login -->
                      </div>
                      </div>
                      </div>
                      </nav>
                      <!-- fim do nav-->
<!-- inicio do formulÃ¡rio-->
<div class="jumbotron">
    <form class="text-center border border-light p-5" action="../login_cadastro_usuario/cadastro_usuario.php" method="post">
            <p class="h4 mb-4">Cadastro</p>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- Nome -->
                    <label>
                        <?php if(isset($_SESSION['msgDeVerificacao'])) : ?>
                            <span style="color: red; font-family: Couriew;"><?php echo $_SESSION['msgDeVerificacao']; ?></span>
                        <?php unset($_SESSION['msgDeVerificacao']); endif; ?>
                        <?php if(isset($_SESSION['msgDeVerificacaoNome'])) : ?>
                            <span style="color: red; font-family: Couriew;"><?php echo $_SESSION['msgDeVerificacaoNome']; ?></span>
                        <?php unset($_SESSION['msgDeVerificacaoNome']);
                            endif; ?>
                            <input type="text" id="nome" name="nome" class="form-control" maxlength="30" placeholder="Seu nome" style="width:500px;font-size: 13px" value="<?php if(!empty($_SESSION['nomeForm'])) { echo $_SESSION['nomeForm']; }else { echo ''; } ?>">
                    </label> <br>
                </div>
                <div class="col">
                </div>
            </div>
            <!-- E-mail -->
            <label>
                <?php if(isset($_SESSION['msgDeVerificacaoEmail'])) : ?>
                        <span style="color: red; font-family: Couriew;"><?php echo $_SESSION['msgDeVerificacaoEmail']; ?></span>
                <?php unset($_SESSION['msgDeVerificacaoEmail']);
                    endif; ?>
                        <input type="email" id="email" name="email" class="form-control mb-4" maxlength="30" placeholder="E-mail" style="width:500px;font-size: 13px" value="<?php if(!empty($_SESSION['emailForm'])) { echo $_SESSION['emailForm']; }else { echo ''; } ?>">
            </label><br>
            <!-- Senha -->
            <label>
                <?php if(isset($_SESSION['msgDeVerificacaoSenha'])) : ?>
                        <span style="color: red; font-family: Couriew;"><?php echo $_SESSION['msgDeVerificacaoSenha']; ?></span>
                <?php unset($_SESSION['msgDeVerificacaoSenha']);
                    endif; ?>
                        <input type="password" id="senha" name="senha" class="form-control" maxlength="10" placeholder="Sua senha" aria-describedby="defaultRegisterFormPasswordHelpBlock" style="width:500px;font-size: 13px" value="">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4"></small>
          </label> <br>
            <!-- cpf -->
            <label> 
                <input type="text" id="cpf" name="cpf" class="form-control" maxlength="11" placeholder="Seu cpf" aria-describedby="defaultRegisterFormPhoneHelpBlock" style="width:500px;font-size: 13px" value="<?php if(!empty($_SESSION['cpfForm'])) { echo $_SESSION['cpfForm']; }else { echo ''; } ?>">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4"></small>
          </label> <br>
             <!-- data de nascimento -->
             <label>  
                 <input type="text" id="data_nasc" name="data_nasc" class="form-control" maxlength="10" placeholder="data de nascimento" aria-describedby="defaultRegisterFormPhoneHelpBlock" style="width:500px;font-size: 13px" value="<?php if(!empty($_SESSION['dataNascForm'])) { echo $_SESSION['dataNascForm']; }else { echo ''; } ?>">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4"></small>
          </label> <br>
         <!-- Sign up button -->
         <input class="btn btn-warning" type="submit" name="cadastrar" style="width:500px;font-size: 13px;" value="Cadastro">
            <hr> 
        </form>
        </div>
              <!-- fim do formulÃ¡rio-->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<!-- inicio do footer-->
<footer class="footer-bs" style="background-color:#191814">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <img src="seal.png" width="250" class="img-circle" height="250">
            <p style="color: #E0851D">Seal search Ã© um site de busca rÃ¡pida e com a melhor precisÃ£o em preÃ§o para o seu bolso.</p>
            <p style="color: #E0851D">Â© 2019 Equipe foca, All rights reserved</p>
        </div>
        <div class="col-md-4 footer-nav animated fadeInUp">
            <div class="col-md-6">
                <ul class="list">
                    <li><a href="#" style="color: #E0851D">Sobre nÃ³s</a></li>
                    <li><a href="#" style="color: #E0851D">Contatos</a></li>
                    <li><a href="#" style="color: #E0851D">Termos & condiÃ§Ãµes</a></li>
                    <li><a href="#" style="color: #E0851D">Politica de privacidade</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 footer-social animated fadeInDown">
            <h4 style="color: #E0851D">Siga-nos</h4>
            <ul>
                <li><a href="#" style="color: #E0851D">Facebook</a></li>
                <li><a href="#" style="color: #E0851D">Twitter</a></li>
                <li><a href="#" style="color: #E0851D">Instagram</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-ns animated fadeInRight">
            <h4 style="color: #E0851D">Newsletter</h4>
            <p style="color: #E0851D">DÃª o seu feedback</p>
            <p>
                <div class="input-group">
                  <input type="text" class="form-control" >
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                  </span>
                </div><!-- /input-group -->
             </p>
        </div>
    </div>
</footer>
<!-- fim do footer-->
</body>
</html>