<?php
	require_once "../../Banco/Conexao.php";

?>
<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Fazer Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assetsLogin/images/favicon.png" type="image/x-icon" style="font-size:100px"/>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assetsLogin/css/style.css">

	</head>
	<body style="background-image: url('assetsLogin/images/fundo1.jpg');background-repeat: no-repeat;background-size:cover;">
	<?php
	if(isset($_GET['erro'])){
		echo $_GET['erro'];
	}
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5" style="background-color: 3D5A80;">
					<h3 class="text-center mb-0"><b style="font-size: 25px">Login</b></h3><br>
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(assetsLogin/images/bg.jpg);"></div>
		      	<p class="text-center" style="color: white">Insira os dados abaixo</p>
						<form action="../../Controller/Funcionario/logarFunc.php" class="login-form" method="POST">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="senha" class="form-control" placeholder="Senha" required>
	            </div>
				<div class="form-group" >
				<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-id-badge"></span></div>
	              	<select name="permissao" class="form-control" style="color:black">
						  <option value="0" style="color:black" disabled selected>Selecione</option>
						  <option value="1" style="color:black">Gerente</option>
						  <option value="2" style="color:black">Garçom</option>
						  <option value="3" style="color:black">Cozinha</option>
					  </select>
	            </div>
	            <div class="form-group d-md-flex">
					<div class="w-100 text-md-right">
						<a href="esqueceuSenha.php" style="color: white">Esqueçeu a senha?</a>
					</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btnLogar" class="btn form-control rounded submit px-3" style="background-color: FF3A0B; font-size: 20px"><span class="fa fa-sign-in mr-2" aria-hidden="true"></span>Entrar</button>
	            </div>

	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assetsLogin/js/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="assetsLogin/js/popper.js"></script>
  	<script src="assetsLogin/js/bootstrap.min.js"></script>
  	<script src="assetsLogin/js/main.js"></script>

	</body>
</html>

