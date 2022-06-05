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
          color:#ff3a0b;
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
	  			  <img  class="img" src="assets/images/FotoPerfil/<?php  echo $foto?>" alt="">
	  				<h3>Gerente: <?php echo @$_SESSION['usuario']?></h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
        <li >
            <a href="statusMesa.php"><span class="fa fa-table mr-3"></span>Status das Mesas</a>
          </li>
          <li class="active">
              <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span>Gerenciar Funcionários<i class="icofont-rounded-down text-white"></i></a>
              <ul class="collapse list-unstyled" id="userSubmenu">
                  <li>
                      <a href="cadastrarFunc.php"><span class="fa fa-user-plus mr-3"></span>Cadastrar Funcionário</a>
                  </li>
                  <li>
                      <a href="ListarFunc.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Funcionário</a>
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
            <a href="#"><span class="fa fa-plus-circle mr-3"></span>Inserir</a>
          </li>
          <li>
            <a href="../../Controller/Funcionario/sair.php"><span class="fa fa-sign-out mr-3"></span>Sair</a>
          </li><br>
        </ul>
    	</nav>

        <!-- Pagina principal -->
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; max-width:109%;overflow-x:hidden">
          <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">GERENCIAR USUÁRIOS</label>
          <form method="POST">
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
                    <td colspan="6"><h4 class="alert-heading">Funcionários cadastrados no sistema</h4><hr></td>
                  </tr>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Salário</th>
                    <th scope="col">Permissão</th>
                    <th scope="col">Ações</th>
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
                    <td> 
                      <a href="editarFunc.php?id=<?php echo $row['idFunc']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
                      </a> 
                      <a href="../../Model/Funcionario/excluirFunc.php?id=<?php echo  $row['idFunc']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                      </a> 
                    </td> 
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
