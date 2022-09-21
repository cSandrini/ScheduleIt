<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["cnpj"])){
        $cnpj = $_POST["cnpj"]];
    }
    if(isset($_POST["nomeFantasia"])){
        $senhaNova = $_POST["nomeFantasia"];
    }
    if(isset($_POST["cep"])){
        $cep = $_POST["cep"]);
    }
    if(isset($_POST["estado"])){
        $estado = $_POST["estado"];
    }
    if(isset($_POST["cidade"])){
        $cidade = $_POST["cidade"];
    }
    if(isset($_POST["bairro"])){
        $bairro = $_POST["bairro"];
    }
    if(isset($_POST["rua"])){
        $rua = $_POST["rua"];
    }
    if(isset($_POST["numero"])){
        $numero = $_POST["numero"];
    }
    if(isset($_POST["telefone"])){
        $telefone = $_POST["telefone"];
    }
    if(isset($_POST["descricao"])){
        $descricao = $_POST["descricao"];
    }
    if(isset($_FILES["imgLogo"])){
        $imgLogo = $_FILES["cep"]);
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