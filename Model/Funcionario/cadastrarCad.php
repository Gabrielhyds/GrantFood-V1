<?php
    
 //Iniciar a sessao
 session_start();

 //Limpar o buffer de saida
 ob_start();

 //Incluir a conexao com BD
 include_once "../Conexao.php"; 
 
 //Receber os dados do formulario
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//var_dump($dados);

if(isset($dados['btnCadastrar'])){
    $foto = $_FILES['imagem'];
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Isso não é uma imagem &#128552;</b></div>';
        header("Location:../index.php");
    } 
    if (count($error) == 0) {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../assets/images/food/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            if(move_uploaded_file($foto["tmp_name"], $caminho_imagem)){
                $query_produto = "INSERT INTO produtos 
                (nome,descricao,image,preco,categoria) VALUES
                (:nome , :descricao, :image ,:preco, :categoria)";
                $cad_produto = $conn->prepare($query_produto);
                $cad_produto->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_produto->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
                $cad_produto->bindParam(':image', $nome_imagem, PDO::PARAM_STR);
                $cad_produto->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
                $cad_produto->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);
                $cad_produto->execute();
        
                $_SESSION['msg'] = '<div class="alert alert-success" role="alert"><b>Produto Cadastrado com sucesso &#128526;</b></div>';
                header("Location:../index.php");
            }else{
                    $result = false;
            }
    }
}



?>

