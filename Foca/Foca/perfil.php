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
            
                <title>Perfil</title>


     <script>
	 $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
	 </script>


            
            
              
            </head>

            <link rel="stylesheet" href="node_modules/bootstrap/compiler/style.css">

            <body background="http://poaodontologia.com/wp-content/uploads/2016/01/Background-cinza-sobre-nost-1-300x261.jpg">

<!-- nav bar-->

	<div class="menu">
		<div class="barra-pesquisa">
			
			<form action="/action_page.php">
				<input type="text" placeholder="Pesquisar..." name="pesquisar">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div class="item-menu">
				<a class="active" href="home.html">Home</a>
			<a class="active" href="perfil.html">Perfil</a>
			<a class="active" href="Cadastro.html">Cadastro</a>
			<a class="active" href="Produtos.html">Produtos</a>
			<div class="login">
				<a href="#">Login</a>
			</div>
		</div>
	</div>

      <!-- fim do nav-->



	  <div class="container">
			<div class="row">
				
				
				
			   <div class="col-md-7 ">
		
		<div class="panel panel-default">
		  <div class="panel-heading">  <h4 >User Profile</h4></div>
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
					<h4 style="color:#00b1b1;"> O nome dela é Jeniffer </h4></span>
					  <span><p>Compradora ávida</p></span>            
					</div>
					<div class="clearfix"></div>
					<hr style="margin:5px 0 5px 0;">
			
					  
		<div class="col-sm-5 col-xs-6 tital " >Primeiro nome:</div><div class="col-sm-7 col-xs-6 ">Jeniffer</div>
			 <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Nome do meio:</div><div class="col-sm-7"> Shankar</div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Último nome:</div><div class="col-sm-7"> GD</div>
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Data de inscrição:</div><div class="col-sm-7">15 Jun 2016</div>
		
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Data de nascimento:</div><div class="col-sm-7">11 Jun 1998</div>
		
		  <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Lugar de nascimento:</div><div class="col-sm-7">Pernambuco</div>
		
		 <div class="clearfix"></div>
		<div class="bot-border"></div>
		
		<div class="col-sm-5 col-xs-6 tital " >Nacionalidade:</div><div class="col-sm-7">Brasileira</div>
		
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




















	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
	

    <?php
    
    header('Content-type: text/html; charset=ISO-8859-1');
    $codigo = file_get_contents("https://www.kabum.com.br/hardware/placa-de-video-vga"); // PEGA O SITE QUE EU QUERO ROUBAR
   
    
    $array1 = explode('<div class="listagem-box"', $codigo); // MARCA UM LOCAL ONDE QUERO PEGAR NO TEXTO

    $regex = "/<li\s[a-z]*(.*)\s+<[a-z]*\s[a-z]*(.){2}[A-Z].[a-z]+\s[a-z0-5]{2}.{2}\s+.{2}[a-z]{3}.\s+.[0-9]*\s.{11}.+/"; // REGEX PARA
    $regex2 = '/<div(\s)[a-z]{5}="[a-z]{5}:[a-z]+(.){3}(\s)+(.)+(\s)+<!(.)*(\s)+<[a-z]{3}(\s)[a-z]{5}=(.)*(\s)+<\/[a-z]+>(\s)+(.)+(\s)*<\/div>(\s)+(.)+/';
    $regex3 = "/<div(\s){1}[a-z]{5}(.){2}[A-Z]-[a-z0-9]*(.){1}(\s)[a-z]*(.){2}(.)+/";
    $regex4 = '/<div(\s){1}[a-z]{5}(.){2}[a-z]+-[a-z]*"><[a-z]{1}>(.)+/';
    $regex5 = '/[a-z]{1};">(.*)</';
    $regex6 = '/<img(\s)[a-z]{3}="[a-z]{5}:(.){2}[a-z]{6}.[a-z]{5}.(.){6}\/(.){26}\/[a-z]{6}\/[a-z]{7}.[a-z]{3}"(\s)width="[0-9]{3}" (.){6}="28"\s\/>/';
    $regex7 = '/b[a-z]{5}="0"(\s)h[a-z]{5}="90"(\s)[a-z]{5}="90"(.){2}\/a>/';

    $regex8 = '/<span(\s)[a-z]{5}(.){4}s[a-z]{8}"/'; // Regex para capturar o começo de um span
                                                     // $regex9 = '//';
    $regex9 = '/[.][.]<(.){5}><[a-z]{2}(.)+/'; // Regex para capturar o fim de um span

    foreach ($array1 as $idArray => $array) {

        if ($idArray > 0) {
            $img = explode('style="width: 770px;">', $array);
            $img = explode(' /></a>', $img[1]);
            $propaganda = '<div class="listagem-box"' . $img[0] . " /></a>";
            $resultRegex1 = preg_replace($regex, "", $propaganda);
            $resultRegex2 = preg_replace($regex2, "", $resultRegex1);
            $resultRegex3 = preg_replace($regex3, "", $resultRegex2);
            $resultRegex4 = preg_replace($regex4, "", $resultRegex3);
            $resultRegex5 = preg_replace($regex5, "", $resultRegex4);
            $resultRegex6 = preg_replace($regex6, "", $resultRegex5);
            $resultRegex7 = preg_replace($regex7, 'border="0" height="80" width="80"></a>', $resultRegex6);

            $resultRegex8 = preg_replace($regex8, '<div class ="H-subtitulo-Troca"><span class="H-subtitulo"', $resultRegex7);
            $resultRexgex9 = preg_replace($regex9, "..</span><br /></div>", $resultRegex8);

            echo $resultRexgex9 . '<hr align="left">';
        }
    }
    ?>



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