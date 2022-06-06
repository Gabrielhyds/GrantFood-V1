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

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// query select que retorna todos os dados do usuario onde o idfunc for igual a $id
$result_usuario = "SELECT * FROM usuario WHERE idFunc = '$id'";
$resultado_usuario = mysqli_query($connection, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

// query select que retorna todos os dados referente o endereco do usuario onde o codEndereco for igual a $id
$result_endereco = "SELECT * FROM endereco WHERE codEndereco = '$id'";
$resultado_endereco = mysqli_query($connection, $result_endereco);
$row_endereco = mysqli_fetch_assoc($resultado_endereco);

// query select que retorna todos os dados referente o telefone do usuario onde o codTelefone for igual a $id
$result_telefone = "SELECT * FROM telefone WHERE codTelefone = '$id'";
$resultado_telefone = mysqli_query($connection, $result_telefone);
$row_telefone = mysqli_fetch_assoc($resultado_telefone);

//inclui a foto de perfil do usuário
include 'foto.php';


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
			<nav id="sidebar" style="background-color:#3D5A80" >
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
          <li class="active">
              <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span>Gerenciar Funcionários<i class="icofont-rounded-down text-white"></i></a>
              <ul class="collapse list-unstyled" id="userSubmenu">
                  <li >
                      <a href="cadastrarFunc.php"><span class="fa fa-user-plus mr-3"></span>Cadastrar Funcionário</a>
                  </li>
                  <li >
                      <a href="ListarFunc.php"><span class="fa fa-eye mr-3" aria-hidden="true"></span>Consultar Funcionário</a>
                  </li>
              </ul>
          </li>
          <li>
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
          <label class="mb-4" style="font-size: 40px; color: white; font-weight: bold; font-family: arial; background-color: #3D5A80; width: 109.9%; position: relative; bottom: 50px; right: 65px; padding-left: 70px; padding-top: 18px; padding-bottom: 18px; margin-right: -70px;">GERENCIAR USUÁRIOS</label>
          <form method="POST" action="../../Model/Funcionario/editarFunc.php" enctype="multipart/form-data">
            <div>
              <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
              ?>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                  <h2>Novo usuário</h2><hr>
              </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $row_usuario['idFunc']; ?>">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Nome completo</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="<?php echo $row_usuario['nome'];?>" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="<?php echo $row_usuario['usuario'];?>" required>
              </div>
              <div class="form-group col-md-4">
              <label for="inputAddress">CPF</label>
              <input type="number" class="form-control" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="<?php echo $row_usuario['cpf'];?>" required>
            </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress2">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required >
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress2">Confirma Senha</label>
                <input type="password" class="form-control" name="Confirmasenha" id="Confirmasenha"  placeholder="Confirme a senha" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="dica">Dica</label>
                <input type="text" class="form-control" name="dica" id="dica" placeholder="Qual nome do meio da sua mãe?" value="<?php echo $row_usuario['dica'];?>" required>
              </div>

              <div class="form-group col-md-4">
                <label for="dica">Foto de perfil</label>
                <input type="file" class="form-control" name="imagem" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"   aria-label="Upload">
              </div>

              <div class="form-group col-md-4">
              <label for="genero">Genêro</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="genero" id="genero" <?php echo $row_usuario['genero'] == "Feminino" ? "checked" : "";?> required value="Feminino">
                <label class="form-check-label" for="Feminino" style="color:black">
                  Feminino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="genero" id="genero" <?php echo $row_usuario['genero'] == "Masculino" ? "checked" : "";?> required value="Masculino">
                <label class="form-check-label" for="Masculino" style="color:black">
                  Masculino
                </label>
              </div>
              </div>
              
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="ddd">DDD</label>
                <input type="number" class="form-control" name="ddd" id="ddd" value="<?php echo $row_telefone['ddd'];?>" placeholder="ddd" min="1" required>
              </div>
              <div class="form-group col-md-5">
                <label for="telefone">telefone</label>
                <input type="number" class="form-control" name="telefone" id="telefone" value="<?php echo $row_telefone['telefone'];?>" placeholder="telefone" min="1" required>
              </div>
              <div class="form-group col-md-5">
                <label for="telefone">Tipo do telefone</label>
                <select name="tipoTelefone" id="" class="form-control" required>
                  <option value="0" desabled selected>Selecione</option>
                  <option value="Comercial" >Comercial</option>
                  <option value="Residêncial" >Residencial</option>
                </select>
              </div>
            </div>
            <br><br>
            <fieldset>
                <div class="row">
                <div class="form-group col-md-3">
                  <h2>Endereço</h2><hr>
              </div>
                </div>
                <div class="row">
                  <div class="col-4 alert alert-danger d-none" role="alert">
                    <span></span>
                  </div>                
                </div>
                <div class="row">
                  <div class="col-2 mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $row_endereco['cep'];?>" placeholder="CEP" required>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $row_endereco['logradouro'];?>" placeholder="Rua" required>
                  </div>
                  <div class="col-2 mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $row_endereco['numero'];?>" placeholder="número" required>
                  </div>
                  <div class="col-6 mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $row_endereco['complemento'];?>" placeholder="Andar,bloco,nº">
                  </div>
                  <div class="col-6 mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $row_endereco['bairro'];?>" placeholder="ex. jardim das pedras" required>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $row_endereco['cidade'];?>" placeholder="ex. sumaré" required>
                  </div>
                  <div class="col-4 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" name="estado" id="estado" value="<?php echo $row_endereco['estado'];?>" required>
                      <option value="">Selecione</option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espirito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraíba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                    </select>                  
                  </div>
                </div>
              </fieldset>
              <br><br>

              <fieldset>
                <div class="row">
                <div class="form-group col-md-5">
                  <h2>Dados da Empresa</h2><hr>
                </div>
                </div>
                <div class="row">
                  <div class="col mb-5">
                    <label for="permissao" class="form-label" >Permissão</label>
                    <select name="permissao" class="form-control" required>
                      <option value="0" disabled selected>Selecione</option>
                      <option value="1">Gerente</option>
                      <option value="2">Garçom</option>
                      <option value="3">Cozinha</option>
                    </select>
                  </div>
                  <div class="col mb-5">
                    <label for="salario" class="form-label">salario</label>
                    <input type="number" class="form-control" name="salario" value="<?php echo $row_usuario['salario'];?>" id="salario" min="1" required>
                  </div>
                  <div class="col mb-5">
                    <label for="cargaHoraria" class="form-label">carga Horaria</label>
                    <input type="number" class="form-control" name="cargaHoraria" id="cargaHoraria" value="<?php echo $row_usuario['cargaHoraria'];?>" min="1" required>
                  </div>
                </div>
                <div style="margin-left: -20px;">
                  <button type="submit" class="btn btn-success" name="btnAtualizar">Atualizar</button>
                </div>
              </fieldset>
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
    <script src="../../Model/Funcionario/cepFunc.js"></script>
  </body>
</html>