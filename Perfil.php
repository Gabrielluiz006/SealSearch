<?php
require_once '../login_cadastro_usuario/seguranca_usuario.php';

if(empty($_SESSION['email']) || !hash_equals($tokenSessao, $_SESSION['tokenUsuarioLogado'])) {
    header('Location: ../login_cadastro_usuario/logout_usuario.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seal search</title>
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
   /*inicio do css do footer*/
   
   
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
            <?php if(isset($_SESSION['tokenUsuarioLogado'])) : ?>
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
            <?php if(empty($_SESSION['tokenUsuarioLogado'])) : ?>
                <li><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Login</button></li> 
            <?php else : ?>
                <li><a href="<?php echo '../login_cadastro_usuario/logout_usuario.php'; ?>"><button type="button" class="btn btn-warning" data-target="#exampleModalCenter">Logout</button></a></li>
            <?php endif; ?>               
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
                            <input type="email" id="defaultLoginFormEmail" name="email-login" class="form-control mb-4" placeholder="E-mail" style="width:450px;font-size: 13px" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; }else { echo ''; } ?>">
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
	  <div class="container">
			<div class="row">
			   <div class="col-md-7 ">
		<div class="panel panel-default">
		  <div class="panel-heading">  <h4 >Perfil do usuário</h4></div>
		   <div class="panel-body">
			<div class="box box-info">
					<div class="box-body">
							 <div class="col-sm-6">
							 <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
						
						<input id="profile-image-upload" class="hidden" type="file">
		<div style="color:#999;" >click here to change profile image</div>
						<!--Upload Image Js And Css-->
							 </div>
					  <br>
					  <!-- /input-group -->
					</div>
					<div class="col-sm-6">
					<h4 style="color:#E0851D"> O nome dela Ã© Jeniffer </h4></span>
                      <span><p>Compradora Ã¡vida.</p></span> 
                      <button class="btn btn-warning">Editar</button>           
					</div>
					<div class="clearfix"></div>
					<hr style="margin:5px 0 5px 0;">
		<div class="col-sm-5 col-xs-6 tital " >Primeiro nome:</div><div class="col-sm-7 col-xs-6 "><?php echo $_SESSION['nome']; ?></div>
			 <div class="clearfix"></div>
		<div class="bot-border"></div>
		<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $_SESSION['email']; ?></div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		<div class="col-sm-5 col-xs-6 tital " >CPF:</div><div class="col-sm-7"><?php echo $_SESSION['cpf']; ?></div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
                <div class="col-sm-5 col-xs-6 tital " >Data de inscrição:</div><div class="col-sm-7"><?php echo date("Y/m/d"); ?></div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		<div class="col-sm-5 col-xs-6 tital " >Data de nascimento:</div><div class="col-sm-7"><?php echo $_SESSION['dataNasc']; ?></div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		<div class="col-sm-5 col-xs-6 tital " >Lugar de nascimento:</div><div class="col-sm-7">Pernambuco</div>
		 <div class="clearfix"></div>
		<div class="bot-border"></div>
        <div class="col-sm-5 col-xs-6 tital " >Nacionalidade:</div><div class="col-sm-7">Brasileira</div> <br>
		 <div class="clearfix"></div>
		<div class="bot-border"></div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				</div>	
			</div> 
			</div>
		</div>  
			<script>
					  $(function() {
			$('#profile-image1').on('click', function() {
				$('#profile-image-upload').click();
			});
		});       
					  </script> 
		   </div>
		</div>
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
    </div>
</body>
</html>



