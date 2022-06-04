<?php
  include('config/db.php');
  session_start();
  /*
  if(!isset($_SESSION['usuario']))
  {
    header("location: assets"); //alterar isso aq
    exit;
  }*/
  ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Painel de controle Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <style>
    <?php include('includes/cards.php'); ?>
  </style>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background-color:#3D5A80">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary" style="position: relative; top: 80px; background-color: #3D5A80">
	        </button>
        </div>
        <div class="imagem"> 
          <img src="assets/images/LogoS.png" alt="">
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(assets/images/logo.jpeg);"></div>
	  				<h3>Garçom</h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.php"><span class="fa fa-user-plus mr-3"></span>Status das Mesas</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-tasks mr-3"></span> Cardápio</a>
          </li>
          <li>
            <a href="../../../login/index.php"><span class="fa fa-sign-out mr-3"></span> Sair</a>
          </li><br>
        </ul>
        
    	</nav>

        <!-- Pagina principal -->
        
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; overflow-x:hidden">
      <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">Status das Mesas</label>
        <?php
          if(isset($_GET["telas"])){
            if($_GET["telas"] == "vermesa"){
              require_once ('includes/vermesa.php');
            }
            if($_GET["telas"] == "pagarindi"){
              require_once ('includes/pagarindi.php');
            }
            if($_GET["telas"] == "pagartudo"){
              require_once ('includes/pagartudo.php');
            }
            if($_GET["telas"] == "addmesa"){
              require_once ('includes/addmesa.php');
            }
          }else{
            require_once ('includes/principal.php');
          }
        ?>

        
      </div>

      
      
      

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>