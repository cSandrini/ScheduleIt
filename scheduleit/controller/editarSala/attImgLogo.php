<?php
    include(__DIR__.'/../../controller/protect.php');
    require_once __DIR__.'/../funcoesUteis.php';
    require_once __DIR__.'/../../model/conexaobd.php';
    require_once __DIR__.'/../../model/salasDAO.php';

    if(isset($_FILES["imgLogo"])){
        $imgLogo = $_FILES["imgLogo"];
        
    }

    if($_FILES['imgLogo']['size'] > 0 ) {
        $imgLogo = $_FILES['imgLogo'];
        $msgErro = validarImg($imagem);
    } 
    $msgErro = validarImg($imgLogo);

    if (empty($msgErro)) {            
        // CONECTAR
        require_once __DIR__.'/../../model/conexaobd.php';
        $conexao=conectarBD();
        editarImgLogo($conexao, $imgLogo);
        header("Location:/sala/$idSala?msg=0&msgType=1");
    } else {
        header("Location:/sala/$idSala?msg=$msgErro&msgType=3");
    }
?>