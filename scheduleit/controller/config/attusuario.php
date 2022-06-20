<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    if(isset($_POST["numero"])){
        $numero = converterNumerico($_POST["numero"]);
    }
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["senhaNova"])){
        $senhaNova = $_POST["senhaNova"];
    }
    if(isset($_FILES["imagemPerfil"])){
        $imagemPerfil = $_FILES["imagemPerfil"];
    }
    $senha = $_POST["senhaModal"];
    $id = $_POST["id"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDadosAtt($id, $imagemPerfil, $senha);
    
    if (empty($msgErro)) {            
        // CONECTAR
        $conexao=conectarBD();
        inserirImagem($conexao, $imagemPerfil, $id);
        header("Location:../../view/pages/config/config.php?msg=0.");
    } else {
        header("Location:../../view/pages/config/config.php?msg=$msgErro");
    }

?>
