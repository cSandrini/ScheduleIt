<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';
    
    $idSala = $_GET["idSala"];

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
        require_once '../../model/conexaobd.php';
        $conexao=conectarBD();
        editarImgLogo($conexao, $imgLogo);
        header("Location:../../view/pages/sala/sala.php?idSala=$idSala&msg=Editado com sucesso.");
    } else {
        header("Location:../../view/pages/sala/sala.php?idSala=$idSala&msg=$msgErro");
    }
?>