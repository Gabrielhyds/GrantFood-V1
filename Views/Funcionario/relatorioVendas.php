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
              <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9">
            <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.8%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">RELATÓRIO DE VENDAS</label>
            <div class=" mb-4 row">
                <div class="container" style="color: white; font-family: arial; font-size: 20px; background: #3D5A80; border-radius: 4px">
                    <div class="row">
                        <div class="col-sm-9">Descrição de Vendas - MÊS</div>
                        <div class="col">JANEIRO</div>
                        <div class="w-100"></div>
                    </div>
                </div>
                
                <div class="container" style="color: white; font-family: arial; font-size: 20px; background: #3D5A80; position: relative; top: 10px; border-radius: 4px">
                    <div class="row">
                        <div class="col-sm-5">Lucro</div>
                        <div class="col-sm-5">Valor</div>
                        <div class="col-sm-2"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; right: 250px; border-radius: 4px"/></div>
                        <div class="w-100"></div>
                    </div>
                </div>

                <div class="container" style="color: white; font-family: arial; font-size: 20px; background: #3D5A80; position: relative; top: 20px; padding-bottom: 50px; border-radius: 4px">
                    <div class="row">
                        <!--Total de Vendas-->
                        <div class="col-sm-12" style="background:">Total de Vendas</div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 10px">Quantidade de itens</div>
                        <div class="col-sm-4" style="position: relative; left: 395px">Valor</div>
                        <div class="col-sm-4" style="position: relative; left: 300px">Qtd</div>
                        <div class="col-sm-4" style="position: relative; left: 150px">Total</div>
                        <div class="col-sm-3"><input type="text" style="width: 200px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; left: 105px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 100px; height: 40px; background: #3D5A80; color: white; position: relative; left: 110px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 30px; border-radius: 4px"/></div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 20px">Total</div>
                        <div class="col-sm-12"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="w-100"></div>
                    </div>
                </div>

                <div class="container" style="color: white; font-family: arial; font-size: 20px; background: #3D5A80; position: relative; top: 40px; padding-bottom: 50px; border-radius: 4px">
                    <div class="row">
                        <!--Gastos Mensais-->
                        <div class="col-sm-12">Gastos Mensais</div>
                        
                        <!--Salário dos Funcionários-->
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 10px">Salário dos funcionários</div>
                        <div class="col-sm-12" style="position: relative; left: 395px">Valor</div>
                        <div class="col-sm-6"><input type="text" style="width: 200px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="col-sm-6"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; right: 132px; border-radius: 4px"/></div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 20px">Total</div>
                        <div class="col-sm-12"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <!--LINHA-->
                        <div style="background: white; width: 80%; height: 1px; font-size: 1px; position: relative; top: 30px; left: 90px;">LINHA</div>
                        <!--LINHA-->
                        
                        <!--Utensílios-->
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 60px">Utensílios</div>
                        <div class="col-sm-4" style="position: relative; left: 395px">Valor</div>
                        <div class="col-sm-4" style="position: relative; left: 300px">Qtd</div>
                        <div class="col-sm-4" style="position: relative; left: 150px">Total</div>
                        <div class="col-sm-3"><input type="text" style="width: 200px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; left: 105px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 100px; height: 40px; background: #3D5A80; color: white; position: relative; left: 110px; border-radius: 4px"/></div>
                        <div class="col-sm-3"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 30px; border-radius: 4px"/></div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 20px">Total</div>
                        <div class="col-sm-12"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="w-100"></div>
                        <!--LINHA-->
                         <div style="background: white; width: 80%; height: 1px; font-size: 1px; position: relative; top: 30px; left: 90px;">LINHA</div>
                        <!--LINHA-->
                        
                        <!--Contas-->
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 60px">Contas</div>
                        <div class="col-sm-12" style="position: relative; left: 395px">Valor</div>
                        <div class="col-sm-6"><input type="text" style="width: 200px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="col-sm-6"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; right: 132px; border-radius: 4px"/></div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 20px">Total</div>
                        <div class="col-sm-12"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <!--LINHA-->
                        <div style="background: white; width: 80%; height: 1px; font-size: 1px; position: relative; top: 30px; left: 90px;">LINHA</div>
                        <!--LINHA-->

                        <!--Manutenção Geral-->
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 60px">Manutenção Geral</div>
                        <div class="col-sm-12" style="position: relative; left: 395px">Valor</div>
                        <div class="col-sm-6"><input type="text" disabled style="width: 200px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <div class="col-sm-6"><input type="number" style="width: 150px; height: 40px; background: #3D5A80; color: white; position: relative; right: 132px; border-radius: 4px"/></div>
                        <div class="col-sm-12" style="position: relative; left: 20px; padding-top: 20px">Total</div>
                        <div class="col-sm-12"><input type="number" style="width: 130px; height: 40px; background: #3D5A80; color: white; position: relative; left: 20px; border-radius: 4px"/></div>
                        <button type="submit" class="btn btn-success1" name="btnPdf" style="position: relative; left: 16px; top: 30px; width: 145px; height: 50px; font-size: 20px; border-radius: 4px">Gerar PDF</button>
                    </div>
                </div>
            
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