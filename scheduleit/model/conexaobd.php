<?php

function conectarBD() {
    $conexao = mysqli_connect("scheduleit.ccncbadv3wa7.sa-east-1.rds.amazonaws.com:3306", "root", "zhkZLfX77ryErzc", "scheduleit" ) 
                 or die ("Erro ao conectar no banco de dados");


    // PARA RESOLVER PROBLEMAS DE ACENTUAÇÃO 
    // Converte CODIFICAÇÃO para UTF-8
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, "SET character_set_connection=utf8");
    mysqli_query($conexao, "SET character_set_client=utf8");
    mysqli_query($conexao, "SET character_set_results=utf8");
    
    return $conexao;    
}

function conectarBDPDO() { 
    $con = new PDO("mysql:host=scheduleit.ccncbadv3wa7.sa-east-1.rds.amazonaws.com:3306;dbname=scheduleit",'root','zhkZLfX77ryErzc');
    return $con;
}

?>

