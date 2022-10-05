<?php
    include('../../controller/protect.php');
    require_once '../../model/conexaobd.php';
    require_once '../../model/perfilDAO.php';
    require_once '../funcoesUteis.php';

    $id = $_POST["idUsuario"];
    $conexao = conectarBD();
    $dados = carregarConfig($conexao, $id);

    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO

    if(isset($_POST["txtEmail"])){
        $email = $_POST["txtEmail"];
    }
    if(isset($_POST["txtTelefone"])){
        $telefone = converterNumerico($_POST["txtTelefone"]);
    }
    if(!empty($_POST["txtSenha"])){
        $senhaNova = $_POST["txtSenha"];
    } else {
        $senhaNova = $dados['senha'];
    }
    if(isset($_POST["txtNome"])){
        $nome = $_POST["txtNome"];
    }
    if(isset($_POST["txtSobrenome"])){
        $sobrenome = $_POST["txtSobrenome"];
    }
    if(isset($_POST["txtCpf"])){
        $cpf = converterNumerico($_POST["txtCpf"]);
    }
    if($_FILES['imgPerfil']['size'] > 0 ) {
        $imagem = $_FILES['imgPerfil'];
    }
    $senha = $_POST["senhaModal"];

    // PASSO 2 - VALIDAR OS DADOS
    //$msgErro = validarDadosAttUsuario($id, $imagemPerfil, $senha);
    
    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/cadastroUsuarioDAO.php';
        $conexao=conectarBD();
        editarImgUsuario($conexao, $imagem, $id);
        editarUsuario($conexao, $id, $nome, $sobrenome, $cpf, $telefone, $email, $senhaNova);
        header("Location:../../view/pages/config/config.php?msg=0&img=");
    } else {
        header("Location:../../view/pages/config/config.php?msg=$msgErro");
    }

?>
