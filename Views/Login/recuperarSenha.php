<?php
// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//inclui a foto do usuário
include_once "../Funcionario/foto.php";

?>
<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Recuperação de senha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
					<h3 class="text-center mb-0"><b style="font-size: 25px">Nova Senha</b></h3><br>
					<img  class="img d-flex align-items-center justify-content-center" src="../Funcionario/assets/images/FotoPerfil/<?php echo $foto?>" alt="">
		      	<p class="text-center" style="color: white">Digite a nova senha</p>
						<form class="login-form" method="POST" name="formulario">
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="senha" class="form-control" placeholder="Senha" required>
	            </div>
                <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-check-circle"></span></div>
	              <input type="password" name="confirma_senha" class="form-control" placeholder="Confirma Senha" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit"  onClick="validarSenha()" name="btnNovaSenha" class="btn form-control rounded submit px-3" style="background-color: FF3A0B; font-size: 20px">Alterar Senha</button>
	            </div>
                <div class="form-group">
                    <?php
                       if(isset($_POST['btnNovaSenha'])){
                            $senha = md5($_POST['senha']);
							$confirmaSenha = md5($_POST['confirma_senha']);
							if($senha == $confirmaSenha){
								$sessionUsuario = $_SESSION['usuario'];
								$usuario = mysqli_real_escape_string($connection,$sessionUsuario);
															
								$sql = "UPDATE usuario SET senha ='$senha' WHERE usuario= '".$usuario."'";
								if (mysqli_query($connection, $sql)) {
									
									echo "<script>window.alert('senha alterada com sucesso');window.location.href='index.php';</script>";
								} else {
									echo "<script>window.alert('Erro ao atualizar a senha');window.location.href='recuperarSenha.php?erro';</script>";
								
								}
							}else{
								echo "<script>window.alert('Senhas diferentes');window.location.href='recuperarSenha.php?erro';</script>";
								
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
	<script src="assetsLogin/js/jquery.min.js"></script>
  <script src="assetsLogin/js/popper.js"></script>
  <script src="assetsLogin/js/bootstrap.min.js"></script>
  <script src="assetsLogin/js/main.js"></script>

	</body>
</html>

