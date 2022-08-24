<?php
    require_once '../funcoesUteis.php';

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    $nome = $_POST["txtNome"];
    $numero = converterNumerico($_POST["txtNumero"]);
    $email = $_POST["txtEmail"];
    $endereco = $_POST["txtEndereco"];
    $idProprietario = $_POST["idProprietario"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDadosSala($nome, $numero, $email, $endereco);
    
    if ( empty($msgErro) ) {            
        
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/cadastrosDAO.php';
        $conexao = conectarBD();
        cadastrarSala($conexao, $nome, $numero, $email, $endereco, $idProprietario);
        header("Location:../../view/pages/cadastroSala/cadastroSala.php?msg=Enviado com sucesso.");
    } else {
        header("Location:../../view/pages/cadastroSala/cadastroSala.php?msg=$msgErro");
    }

?>
