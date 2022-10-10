<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    $nomeFantasia = $_POST["txtNome"];
    $cnpj = $_POST["txtCNPJ"];
    $telefone = converterNumerico($_POST["txtTelefone"]);
    $cep = $_POST["txtCEP"];
    $estado = $_POST["txtEstado"];
    $cidade = $_POST["txtCidade"];
    $bairro = $_POST["txtBairro"];
    $rua = $_POST["txtRua"];
    $numero = $_POST["txtNumero"];
    $complemento = $_POST["txtComplemento"];
    $email = $_POST["txtEmail"];
    $descricao = $_POST["txtDescricao"];
    $imagem = $_FILES["fileLogo"];
    $idProprietario = $_POST["idProprietario"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDadosSala($nomeFantasia, $telefone, $email);
    
    if ($imagem["error"]!=0) {
        $msgErro = $msgErro . "Erro ao fazer upload da imagem! <BR>";
    } else if ($imagem["size"]>65000) {
        $msgErro = $msgErro . "Imagem maior que 65Kb! <BR>";
    } else if(($imagem["type"]!="image/gif") &&
        ($imagem["type"]!="image/jpeg") &&
        ($imagem["type"]!="image/pjpeg") &&
        ($imagem["type"]!="image/png") &&
        ($imagem["type"]!="image/x-png") &&
        ($imagem["type"]!="image/bmp")  ) {
            $msgErro= $imagem["type"];
    }

    if ( empty($msgErro) ) {            
        
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/usuarioDAO.php';
        require_once '../../model/salasDAO.php';
        $tamanhoImg = $imagem["size"];
        $arqAberto = fopen($imagem["tmp_name"], "r");
        $imagem = addslashes(fread($arqAberto,$tamanhoImg));

        $conexao = conectarBD();
        cadastrarSala($conexao, $idProprietario, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $imagem);
        header("Location:../../view/pages/cadastroSala/cadastroSala.php?msg=Enviado com sucesso.");
    } else {
        header("Location:../../view/pages/cadastroSala/cadastroSala.php?msg=$msgErro");
    }

?>
