<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$result_produto = "DELETE FROM produtos WHERE id ='$id'";
	$resultado_produto = mysqli_query($connection, $result_produto);
	mysqli_affected_rows($connection);
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Produto Excluido com sucesso &#128516</div>';
    header("Location:../../views/Funcionario/ListarCad.php");
}
else{	
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao excluir o Funcionário &#128542</div>';
	header("Location:../../views/Funcionario/ListarCad.php");
}
