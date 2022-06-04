<?php
session_start();
if(!isset($_SESSION['usuario']))
  {
    header("Location: ../../../index.php"); //alterar isso aq
    exit;
  }

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Cardápio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
    <style>
      fieldset.scheduler-border {
        border: 1px black #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
      }

      legend.scheduler-border {
          font-size: 25px !important;
          font-weight: bold !important;
          text-align: left !important;
          color: white;
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
          <img src="assets/images/LogoS.png" alt="">
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_1.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(assets/images/bg.jpg);"></div>
	  				<h3>Gerente</h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="../index.php"><span class="fa fa-user-plus mr-3"></span>Status das Mesas</a>
          </li>

          <li class="">
              <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-user-plus mr-3"></span>Gerenciar Funcionários<i class="icofont-rounded-down text-white"></i></a>
              <ul class="collapse list-unstyled" id="userSubmenu">
                  <li>
                      <a href="../GerenciarUsuario/index.php">Cadastrar Funcionário</a>
                  </li>
                  <li>
                      <a href="../GerenciarUsuario/listar/index.php">Consultar Funcionário</a>
                  </li>
              </ul>
          </li>

          <li>
            <a href="../RelatorioVendas/index.php"><span class="fa fa-file-text-o mr-3"></span>Relatório de Vendas</a>
          </li>
          <li class="active">
                    <a href="#cardapioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-tasks mr-3"></span>Cardápio<i class="icofont-rounded-down text-white"></i></a>
                    <ul class="collapse list-unstyled" id="cardapioSubmenu">
                        <li>
                            <a href="index.php">Cadastrar Produto</a>
                        </li>
                        <!--criar cadastrar categoria no cadastrar produto-->
                        <li>
                            <a href="#">Cadastrar Categoria</a>
                        </li>
                        <li>
                            <a href="#">Consultar Produto</a>
                        </li>
                    </ul>
                </li>

          <li>
            <a href="#"><span class="fa fa-plus-circle mr-3"></span>Inserir</a>
          </li>


          <li>
            <a href="../sair.php"><span class="fa fa-sign-out mr-3"></span>Sair</a>
          </li><br>

        </ul>
    	</nav>

        <!-- Pagina principal -->
        <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9;overflow-x:hidden">
          <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.8%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">CARDÁPIO</label>
          <div class="container">
            
            <!--MENU-->
            <div style="position: relative; left: 12px">
            <div>
                      <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                      ?>
                    </div>
              <form action="cadastrar/cadastrar.php" method="POST" enctype="multipart/form-data">
                <fieldset class="scheduler-border" style="border: 1px solid #3D5A80; border-radius: 4px;">
                  <legend class="scheduler-border" style="background: #3D5A80; border-radius: 4px"><span style="padding-left: 21px">Adicionar ao cardápio</span></legend>
                    <div class="control-group">
                        <table style="position: relative; bottom: 70px;">
                        <!--Produto-->
                        
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 150px" disabled><span class="texto">Produto</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" name="nome" aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px; width: 420px" required></td>
                        </div>
                        </tr>

                        <!--Descrição-->
                        <tr>
                        <div class="input-group mb-3"> 
                            <td><button class="btn btn-secondary" type="button" id="button-addon1"style="width: 150px" disabled><span class="texto">Descrição</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" name="descricao"  aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px"  required></td>
                            <td></td>
                        </div>
                        </tr>

                        <!--Categoria-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1" style="background: red; border: 1px solid red; color: white; width: 150px" disabled><span class="texto">Categoria</span></button></td>
                            <td><input type="text" class="form-control"  name="categoria" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" style=" position: relative; top: 5px; left: 5px"  required></td>
                            <td></td>
                        </div>
                        </tr>

                         <!--Inserir Imagem-->
                         <tr>
                            <div class="input-group mb-3">
                              <td><button class="btn btn-warning" type="button" id="button-addon1" style=" color: white; width: 150px;" disabled><span class="texto">Insira a imagem</span></button></tc>
                              <td><input type="file" class="form-control" id="inputGroupFile03" name="imagem" aria-describedby="inputGroupFileAddon03" aria-label="Upload" style="margin-left:5px;margin-top:8px"  required></div></td>
                            </div>
                         </tr>

                        <!--Preço-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1"  style="background-color: green; color: white; width: 150px" disabled><span class="texto">Preço</span></button></td>
                            <td><input type="number" class="form-control" placeholder="" name="preco" aria-label="Example text with button addon" aria-describedby="button-addon1" style="width: 150px; position: relative; top: 5px; left: 5px"  required></td>
                            <td style="position: relative; top: 5px; right: 300px; color: black;">R$</td>
                        </div>
                        </tr>

                          <!--Inserir e Remover-->
                          <tr>
                            <div class="btn" >
                              <td style="position: relative;  top: 20px"><button type="submit" name="btnCadastrar" class="btn btn-success" style="font-family: arial; font-weight: bold"><span class="fa fa-plus mr-1"></span>Adicionar</button>
                            </div>
                            <div class="btnExcluir" style="position: relative; left: 150px; bottom: 58px">
                              <button type="reset" name="btnLimpar" class="btn btn-danger" style="font-family: arial; font-weight: bold"><span class="fa fa-trash mr-1"></span>Limpar</button></td>
                            </div>
                          </tr>
                        </table>
                    </div>
                </fieldset>
              </form>
            </div>
          </div>
          
        </div>
    </div>
    <?php
      include "../footer.php";
    
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>