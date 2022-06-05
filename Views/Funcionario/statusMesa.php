<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  


if(!isset($_SESSION['usuario']))
  {
    //se não houver sessão ele redireciona para tela de login
    header("Location: ../Login/index.php");
    exit;
}

//inclui a foto do usuário
include_once "foto.php";

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Painel de controle Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cards.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
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
            <img  class="img" src="assets/images/FotoPerfil/<?php  echo $foto?>" alt="foto">
	  				<h3>Gerente: <?php echo @$_SESSION['usuario']?></h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="statusMesa.php"><span class="fa fa-table mr-3"></span>Status das Mesas</a>
          </li>
          <li>
              <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span>Gerenciar Funcionários<i class="icofont-rounded-down text-white"></i></a>
              <ul class="collapse list-unstyled" id="userSubmenu">
                  <li>
                      <a href="cadastrarFunc.php"><span class="fa fa-user-plus mr-3"></span>Cadastrar Funcionário</a>
                  </li>
                  <li>
                      <a href="ListarFunc.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Funcionário</a></a>
                  </li>
              </ul>
          </li>
          <li>
            <a href="relatorioVendas.php"><span class="fa fa-file-text-o mr-3"></span>Relatorio de Vendas</a>
          </li>
          <li class="">
                    <a href="#cardapioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-cart-plus mr-3"></span>Cardápio<i class="icofont-rounded-down text-white"></i></a>
                    <ul class="collapse list-unstyled" id="cardapioSubmenu">
                        <li>
                            <a href="cardapio.php"><span class="fa fa-apple mr-3" aria-hidden="true"></span>Cadastrar Produto</a>
                        </li>
                        <li>
                            <a href="listarCad.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Produto</a>
                        </li>
                    </ul>
                </li>
          <li>
            <a href="#"><span class="fa fa-plus-circle mr-3"></span> Inserir</a>
          </li>
          <li>
            <a href="../../Controller/Funcionario/sair.php"><span class="fa fa-sign-out mr-3"></span> Sair</a>
          </li><br>
        </ul>
    	</nav>

        <!-- Pagina principal -->        
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; overflow-x:hidden">
      <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">STATUS DAS MESAS</label>
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
            if($_GET["telas"] == "removemesa"){
              require_once ('includes/removemesa.php');
            }
            if($_GET["telas"] == "baixarQR"){
              require_once ('includes/baixarQR.php');
            }
          }else{
            require_once ('includes/principal.php');
          }
        ?>

        
      </div>
  </div>
    <?php
      include 'footer.php';    
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="cadastrar/cep.js"></script>
  </body>
</html>