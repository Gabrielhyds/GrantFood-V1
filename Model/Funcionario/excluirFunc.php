<?php

session_start();
ob_start();
include_once '../../conexao2.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$result_usuario = "DELETE FROM endereco WHERE codEndereco ='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	mysqli_affected_rows($conn);
}if(!empty($id)){
	$result_usuario = "DELETE FROM telefone WHERE codTelefone ='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	mysqli_affected_rows($conn);
}if(!empty($id)){
	$result_usuario = "DELETE FROM usuario WHERE idFunc ='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	mysqli_affected_rows($conn);
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Funcionário Excluido com sucesso &#128516</div>';
    header("Location:../listar/index.php");
}
else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location:../listar/index.php");
}
