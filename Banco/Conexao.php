<?php
$host = "sql549.main-hosting.eu";
$user = "u738986880_geral";
$pass = "Teste1234";
$dbname = "u738986880_grantFood";
try{
    $connPDO = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    $connection = mysqli_connect($host, $user, $pass, $dbname);
    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}