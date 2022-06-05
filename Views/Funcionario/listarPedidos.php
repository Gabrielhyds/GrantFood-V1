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
		<?php
    if(!isset($_GET['telas'])){
      echo "<meta HTTP-EQUIV='refresh' CONTENT='20'>";
    }
      
    ?>
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
          <img src="assets/images/Logo.png" alt="" style="margin-top:-10px;margin-bottom:5px;width:185px;height:130px;margin-left:55px"> 
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_2.jpg);">
	  			<div class="user-logo">
            <img  class="img" src="assets/images/FotoPerfil/<?php  echo $foto?>" alt="foto">
	  				<h3>Cozinha: <?php echo @$_SESSION['usuario']?></h3>
	  			</div>
	  		</div><br>
        <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="listarPedidos.php"><span class="fa fa-user-plus mr-3"></span>Listar pedidos</a>
        </li>
          <li>
            <a href="../../Controller/Funcionario/sair.php"><span class="fa fa-sign-out mr-3"></span> Sair</a>
          </li><br>
        </ul>
    	</nav>

        <!-- Pagina principal -->        
      <div id="content" class="p-4 p-md-5 pt-5" style="background-color:#98C1D9; overflow-x:hidden">
      <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">Listar pedidos</label>

      
    <?php
            $sql = "SELECT * FROM pedido WHERE status = 'Enviado' OR status = 'Preparo' ORDER BY id asc";
            
            $result = mysqli_query($connection, $sql);
            
            if(@mysqli_num_rows($result) > 0)
            {
              $linhas = mysqli_num_rows($result);

    ?>

    <div class="container">
      <div class="row">
        <b style="font-size: 20px">Nº de pedidos: <span style="color: blue; font-size: 25px"><?php echo $linhas;?></span></b> 
      </div>
      <div class="text-end">
        <button type="button"  onclick="window.location.href='listarPedidos.php?telas=pedidosPreparar'" class="btn btn-success">Pedidos em preparo</button>
      </div>
      <br>
    </div>
    <div class="card  text-bg-info" style="padding: 20px;">
        <div class="card-header text-center text-white">
            <h5 class="card-title">Pedidos</h5>
        </div>
        <br>
        <?php
              while($row = mysqli_fetch_array($result))
              {
                switch($row['status']){
                  case 'Enviado':
                      $classe = 'primary';
                      break;
                  case 'Preparo':
                      $classe = 'info';
                      break;
                  case 'Caminho':
                      $classe = 'success';
                      break;
                  case 'Pagar':
                      $classe = 'warning';
                      break;
                  case 'Finalizado':
                      $classe = 'dark';
                      break;
                }

              
            if(!isset($_GET['telas']) && $classe == 'primary'){
            ?>

            <div class="card">
              <div class="card-header">
                <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                   <span class="badge text-bg-<?php echo $classe;?>"><?php echo $row['status'];?></span> 
                  
              </div>
              <div class="card-body">
                <?php
                    $total = 0;
                    $numero = $row['id'];
                    $sql2 = "SELECT pi.id, pi.item, pi.quantidade, pi.preco, pi.total FROM pedidoitem as pi 
                             INNER JOIN pedido as p on p.id = pi.codPedido WHERE pi.codPedido = '$numero'";

                             $gotResuslts2 = mysqli_query($connection,$sql2);
                                if($gotResuslts2){
                                    if(mysqli_num_rows($gotResuslts2)>0){
                                       while($values = mysqli_fetch_array($gotResuslts2)){
                ?>
                <div class="row border-top border-bottom" style="margin:10px; padding: 10px;">
                    <div class="col"><b>#<?php echo $values['id']?></b></div>
                    <div class="col"><?php echo $values['item']?></div>
                    <div class="col"><?php echo $values['quantidade']?></div>
                    <div class="col">R$ <?php echo $values['total']?></div>
                </div>
                <?php
                              }
                           }
                       }
                ?>

                <div class="row">
                    <p><b>Observação:</b> <?php echo $row['observacao']?></p>
                </div>
              </div>
              <div class="card-footer text-muted text-end">
                <div class="text-left">
                     <?php
                        if($classe != 'dark'){
                   ?>
                        <form action="../../Model/Funcionario/alterarStPedido.php" method="POST">
                            <select name="status" class="form-select-sm">
                              <option value="Enviado" <?php echo $classe == 'primary'?'selected':'' ?>>Enviado</option>
                              <option value="Preparo" <?php echo $classe == 'info'?'selected':'' ?>>Em preparo</option>
                              <option value="Caminho" <?php echo $classe == 'success'?'selected':'' ?>>A Caminho</option>
                            </select>
                            <input type="hidden" name="pedido" value="<?php echo $row['id'];?>">
                            <button type="submit" name="alterar" class="btn btn-primary btn-sm">Alterar</button>
                        </form>
                    <?php
                        }
                    ?>
                </div>
              </div>
            </div>
            <br>
            <?php
                } else if(isset($_GET['telas']) == 'pedidosPreparar' && $classe == 'info'){
                  include ('includes/pedidosPreparar.php');
                }
              ?>
            
          <?php
              }
            }else{
              ?>
                <h3>Nenhum pedido.</h3>
              <?php
            }
          ?>
          
    </div>


      </div>
  </div>
    <?php
      include 'footer.php';    
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="cadastrar/cep.js"></script>
  </body>
</html>