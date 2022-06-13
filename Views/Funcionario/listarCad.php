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
        <li>
            <a href="statusMesa.php"><span class="fa fa-table mr-3"></span>Status das Mesas</a>
        </li>
        <li >
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
        <li class="active">
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
              <a href="#"><span class="fa fa-plus-circle mr-3"></span>Inserir</a>
            </li>
            <li>
              <a href="../../Controller/Funcionario/sair.php"><span class="fa fa-sign-out mr-3"></span>Sair</a>
            </li><br>
        </li>
    	</nav>

        <!-- Pagina principal -->
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; max-width:109%;overflow-x:hidden">
          <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">CONSULTAR PRODUTOS</label>
            <div>
              <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
              ?>
            </div>
              <div>
              <?php $sql = "SELECT  prod.id, prod.nome, prod.descricao,prod.image,prod.preco,categ.nomeCat 
                    FROM produtos AS prod
                    LEFT JOIN categoria AS categ ON prod.categoria_id=categ.id;"; $result = $connection->query($sql);?>
              <table class="table alert alert-primary">
                <thead>
                  <tr>
                    <td colspan="7"><h4 class="alert-heading">Produtos cadastrados no sistema</h4><hr></td>
                  </tr>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">imagem</th>                 
                    <th scope="col">preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                    
                    </tr>
                </thead>
                <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?> 
                <tbody>
                    <tr>
                      <td><?php echo $row["nome"]; ?></td>
                      <td><?php echo $row["descricao"]; ?></td>
                      <td><img src="assets/images/food/<?php echo $row['image']; ?>" alt="" style="width:75px;height:75px;margin-top:10px"></td>
                      <td><?php echo $row["preco"]; ?></td>
                      <td><?php echo $row["nomeCat"]; ?></td>
                      <td> 
                        <button type="button" name="editar" class="btn btn-success" onclick="window.location.href='editarCad.php?id=<?php echo $row['id']; ?>'">
                              Editar
                        </button> 
                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal">
                        Excluir
                        </button>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Confirmação</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              
                              <!-- Modal body -->
                              <div class="modal-body">
                                <b>Tem certeza que deseja excluir o produto?</b>
                              </div>
                              
                              <!-- Modal footer -->
                              <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                              <button type="button" onclick="window.location.href='../../Model/funcionario/excluirCad.php?id=<?php echo $row['id']; ?>'" class="btn btn-danger" data-dismiss="modal">Excluir</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                      </td> 
                    </tr>
                </tbody>
                <?php   
                    }}else{echo '<div class="alert alert-danger" role="alert">
                                  &#128552 nenhum produto cadastrado!
                                </div>';
                    } 
                ?> 
                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="cep.js"></script>
    <script src="assets/js/modal.js"></script>
  </body>
</html>
