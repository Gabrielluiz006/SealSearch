<!doctype html>

<html>   
<head>
       
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                 <!-- link para a página onde fica o css-->
                 <link rel="stylesheet" type="text/css" href="estiloapolo.css">
            
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
            
                <title>Cadastroreal</title>

            </head>

            <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

            <body>

<!-- nav bar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="starter.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
       
        <a class="nav-item nav-link" href="psicologos.php">Perfil</a>
        <a class="nav-item nav-link" href="Consulta.php">Produtos</a>
       
        <a class="nav-item nav-link disabled" href="cadastro.php">Cadastro</a>
      </div>
    </div>
  
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Login
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Entre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
  
              
              <!-- formulario de login-->
             
  <form class="text-center border border-light p-5">
  
          <p class="h4 mb-4">Registre-se</p>
      
          <!-- Email -->
          <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
      
          <!-- Password -->
          <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
      
          <div class="d-flex justify-content-around">
              <div>
                  <!-- Remember me -->
                  <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                      <label class="custom-control-label" for="defaultLoginFormRemember">Lembrar-me</label>
                  </div>
              </div>
              <div>
                  <!-- Forgot password -->
                  <a href="">Esqueceu a sua senha?</a>
              </div>
          </div>
      
          <!-- Sign in button -->
          <button class="btn btn-info btn-block my-4" type="submit">Login</button>
      
          <!-- Register -->
          <p>Ainda não se cadastrou?
          <a href = "cadastro.php">Cadastre-se</a>
          </p>
      
          
          
      
      </form>
      <!-- Fim do formulario de login -->
          
  
          </div>
          
          
          </div>
        </div>
      </div>
    </div>
  
  
  
  
  
  
  
  </nav>
  <!-- fim do nav-->



<!-- inicio do formulário-->

<div class="jumbotron">
        <form class="text-center border border-light p-5">
        
            <p class="h4 mb-4">Cadastro</p>
        
            <div class="form-row mb-4">
                <div class="col">
                    <!-- Nome -->
                    <input type="text" id="nome" class="form-control" placeholder="Seu nome">
                </div>
                <div class="col">
                 
                </div>
            </div>
        
            <!-- E-mail -->
            <input type="email" id="email" class="form-control mb-4" placeholder="E-mail">
        
            <!-- Senha -->
            <input type="password" id="senha" class="form-control" placeholder="Sua senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                
            </small>
        
            <!-- Endereço -->
            <input type="text" id="endereco" class="form-control" placeholder="Endereço" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
               
            </small>
        
        
        
           <!-- estado -->
            <input type="text" id="estado" class="form-control" placeholder="Estado" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
               
            </small>
        
             <!-- idade -->
             <input type="text" id="idade" class="form-control" placeholder="Idade" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
               
            </small>
        
        
         <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Registre-se</button>
        
            <hr>
        
          
        </form>
        </div>
        
              <!-- fim do formulário-->
        

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

<!-- início do footer-->
<footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                     
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
    
                    
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                      
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                     
                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    
                        
    
                        <h3> Newsletter </h3>
                        <ul>
                            <li>
                                <div class="input-append newsletter-box text-center">
                                    <input type="text" class="full text-center" placeholder="Email ">
                                    <button class="btn  bg-gray" type="button"> Enviar<i class="fa fa-long-arrow-right"> </i> </button>
                                </div>
                            </li>
                        </ul>
                        <ul class="social">
                            <li> <a href="https://www.facebook.com"> <i class=" fa fa-facebook"> <img href="#!" src="img/face.PNG">   </i> </a> </li>
                            <li> <a href="https://twitter.com"> <i class="fa fa-twitter">  <img href="#!" src="img/twitter.png">   </i> </a> </li>
                            
                            
                            <li> <a href="https://www.youtube.com"> <i class="fa fa-youtube"> <img href="#!" src="img/youtube.png">   </i> </a> </li>
                        </ul>
                    </div>
                </div>
                <!--/.row--> 
            </div>
            <!--/.container--> 
        </div>
        <!--/.footer-->
        
        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left"> Copyright © - Equipe Foca 2018. All right reserved. </p>
                <div class="pull-right">
                    <ul class="nav nav-pills payments">
                      <li><i class="fa fa-cc-visa"></i></li>
                        <li><i class="fa fa-cc-mastercard"></i></li>
                        <li><i class="fa fa-cc-amex"></i></li>
                        <li><i class="fa fa-cc-paypal"></i></li>
                    </ul> 
                </div>
            </div>
        </div>
        <!--/.footer-bottom--> 
    </footer>
    <!-- final do footer-->

</body>

</html>