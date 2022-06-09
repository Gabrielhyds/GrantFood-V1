<?php
	require_once "../../Banco/Conexao.php";
	session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Recuperar Senha</title>
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
	echo "<script>dados incorretor</script>";
	?>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5" style="background-color: 3D5A80;">
					<h3 class="text-center mb-0"><b style="font-size: 20px">Recupere a senha</b></h3><br>
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(assetsLogin/images/bg.jpg);"></div>
		      	<p class="text-center" style="color: white">Insira o usuário para redefinir a senha</p>
						<form  class="login-form" method="POST">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="number" name="cpf" class="form-control" placeholder="Digite seu CPF" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btnRecuperar" class="btn form-control rounded submit px-3" style="background-color: FF3A0B; font-size: 20px">Gerar Nova Senha</button>
	            </div>
				<div class="text-center">
					<?php
						    if(isset($_POST['btnRecuperar'])){
								$usuario = $_POST['usuario'];
								$cpf = $_POST['cpf'];
								$_SESSION['usuario'] = $_POST['usuario'];
								$_SESSION['cpf'] = $_POST['cpf'];
								$sql = $connection->query("SELECT * FROM usuario WHERE usuario = '$usuario' && cpf = '$cpf'");	
								if($row=$sql->fetch_assoc()){
									header("Location:recuperarSenha.php");
								}else{
									echo "<script>window.alert('Dados incorretos tente novamente!');window.location.href='esqueceuSenha.php?erro';</script>";
								}
											
								}
								
								
					
					?>
				</div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../view/js/jquery.min.js"></script>
  <script src="../view/js/popper.js"></script>
  <script src="../view/js/bootstrap.min.js"></script>
  <script src="../view/js/main.js"></script>

	</body>
</html>

