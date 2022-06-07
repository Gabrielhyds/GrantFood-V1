<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  
require_once('includes/sessao.php');

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
    <style>
        input[type=text]::placeholder {
          color: black;
        }
        
        input[type=password]::placeholder {
          color: black;
        }
        
        input[type=number]::placeholder {
          color: black;
        }
        label{
          color:darkgreen;
        }
    </style>
  </head>
  <body>
	<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" style="background-color:#3D5A80">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary" style="position: relative; top: 80px; background-color: #3D5A80">
	        </button>
        </div>
        <div class="imagem"> 
          <img src="assets/images/Logo.png" alt="" style="margin-top:-10px;margin-bottom:5px;width:185px;height:130px;margin-left:55px"> 
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_1.jpg);">
	  			<div class="user-logo">
          <?php
					if (!is_null($foto)){ ?>
					<img  class="img d-flex align-items-center justify-content-center" src="assets/images/FotoPerfil/<?php echo $foto ?>" alt="">
					<?php }else{ ?>
						<img  class="img d-flex align-items-center justify-content-center" src="assets/images/bg.jpg" alt="">
					<?php }?>
	  				<h3>Gerente: <?php echo @$_SESSION['usuario']?></h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
        <li >
            <a href="statusMesa.php"><span class="fa fa-table mr-3"></span>Status das Mesas</a>
          </li>
          <li class="">
              <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span>Gerenciar Funcionários<i class="icofont-rounded-down text-white"></i></a>
              <ul class="collapse list-unstyled" id="userSubmenu">
                  <li>
                      <a href="cadastrarFunc.php"><span class="fa fa-user-plus mr-3"></span>Cadastrar Funcionário</a>
                  </li>
                  <li>
                      <a href="ListarFunc.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Funcionário</a>                  </li>
              </ul>
          </li>
          <li class="active">
            <a href="relatorioVendas.php"><span class="fa fa-file-text-o mr-3"></span> Relatorio de Vendas</a>
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
                        <li>
                            <a href="listarCateg.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Categoria</a>
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
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; max-width:109%;overflow-x:hidden">
          <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">RELATÓRIO DE VENDAS</label>
          <form method="POST" action="includes/gerarPdf.php">
            <div>
              <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
              ?>
            </div>
              <div>
              <?php $sql = "SELECT * FROM usuario"; $result = $connection->query($sql);?>
              <table class="table alert alert-primary">
                <thead>
                  <tr>
                    <td colspan="3"><h4 class="alert-heading">Funcionários cadastrados no sistema</h4><hr></td>
                    <td><button type="submit" class="btn btn-success">Gerar PDF</button></td>
                  </tr>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Salário</th>
                    <th scope="col">Permissão</th>
                    </tr>
                </thead>
                <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?> 
                <tbody>
                    <tr>
                      <th scope="row"><?php echo $row["idFunc"]; ?></th>
                      <td><?php echo $row["nome"]; ?></td>
                      <td><?php echo $row["usuario"]; ?></td>
                      <td><?php echo $row["salario"]; ?></td>
                      <?php
                      
                        switch($row['tipo']){
                          case 1:
                            $tipo = 'Gerente';
                            break;
                          case 2:
                            $tipo = "Garçom";
                            break;
                          case 3:
                            $tipo = "Cozinha";
                            break;
                        }
                      ?>
                      <td><?php echo $tipo;?></td>
                    </tr>
                </tbody>
                <?php   }}else{echo '<div class="alert alert-danger" role="alert">
                                        &#128552 nenhum usuário cadastrado!
                                      </div>';} ?> 
                </table>
              </div>
            </form>
        </div>
      </div>
    </div>
    <?php
      include 'footer.php';
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="cep.js"></script>
  </body>
</html>