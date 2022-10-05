<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/perfilDAO.php';
    
    $id = $_POST["idUsuarioImagem"];

    if(isset($_FILES["imgUsuario"])){
        $imagem = $_FILES["imgUsuario"];
        
    }

    //$msgErro = validarImgLogo($imagem);

    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        $conexao=conectarBD();
        editarImgUsuario($conexao, $imagem, $id);
        header("Location:../../view/pages/config/config.php?id=$id&msg=0.");
    } else {
        header("Location:../../view/pages/config/config.php?id=$id&msg=$msgErro");
    }
?>