<?php

require_once("../../Banco/Conexao.php");

session_start();

if(isset($_POST['btnLogar'])){
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);
    $permissao = $_POST['permissao'];
    $login=mysqli_query($mysqli,"SELECT usuario , senha, tipo FROM usuario WHERE usuario='$usuario' AND senha='$senha' AND tipo='$permissao'");
    if(mysqli_num_rows($login) == 1){
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['permissao'] = $_POST['permissao'];
        switch($permissao){
            case 1:
                header("Location:../funcionario/gerente/index.php");
                break;
            case 2:
                header("Location:../funcionario/Cozinha/view/index.php");
                break;
            case 3:
                header("Location:../funcionario/Garcom/view/index.php");
                break;
            default:
                header('Location:../index.php?=erro');
                break;
        }
    }elseif(mysqli_num_rows($login) == 0){
        echo "<script>window.alert('Dados invalidos, tente novamente!');window.location.href='../index.php?=erro';</script>";
    
    }
    }




?>