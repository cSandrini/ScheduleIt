<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';

    $idSala = $_GET["idSala"];

    $conexao = conectarBD();
    $dados = carregarMinhasSalas($conexao, $_SESSION['id']);


    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    if(!empty($_POST["txtEmail"])){
        $email = $_POST["txtEmail"];
    }  else {
        $email = $dados['email'];
    }
    if(!empty($_POST["txtCNPJ"])){
        $cnpj = $_POST["txtCNPJ"];
    }  else {
        $cnpj = $dados['cnpj'];
    }
    if(!empty($_POST["txtNome"])){
        $nomeFantasia = $_POST["txtNome"];
    }  else {
        $nomeFantasia = $dados['nomeFantasia'];
    }
    if(!empty($_POST["txtCEP"])){
        $cep = $_POST["txtCEP"];
    }  else {
        $cep = $dados['cep'];
    }
    if(!empty($_POST["txtEstado"])){
        $estado = $_POST["txtEstado"];
    }  else {
        $estado = $dados['estado'];
    }
    if(!empty($_POST["txtCidade"])){
        $cidade = $_POST["txtCidade"];
    }  else {
        $cidade = $dados['cidade'];
    }
    if(!empty($_POST["txtBairro"])){
        $bairro = $_POST["txtBairro"];
    }  else {
        $bairro = $dados['bairro'];
    }
    if(!empty($_POST["txtRua"])){
        $rua = $_POST["txtRua"];
    } else {
        $rua = $dados['rua'];
    }
    if(!empty($_POST["txtNumero"])){
        $numero = $_POST["txtNumero"];
    }  else {
        $numero = $dados['numero'];
    }
    if(!empty($_POST["txtComplemento"])){
        $complemento = $_POST["txtComplemento"];
    } else {
        $complemento = $dados['complemento'];
    }
    if(!empty($_POST["txtTelefone"])){
        $telefone = $_POST["txtTelefone"];
    }  else {
        $telefone = $dados['telefone'];
    }
    if(!empty($_POST["txtDescricao"])){
        $descricao = $_POST["txtDescricao"];
    }  else {
        $descricao = $dados['descricao'];
    }


    $senha = $_POST["senhaModal"];
    $id = $_POST["idProprietario"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDadosSala($email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao);

    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/salasDAO.php';
        
        $conexao=conectarBD();
        editarSala($conexao, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $idSala);
        header("Location:../../view/pages/editarSala/editarSala.php?idSala=$idSala&msg=0&msgType=1");
    } else {
        header("Location:../../view/pages/editarSala/editarSala.php?idSala=$idSala&msg=$msgErro&msgType=3");
    }

?>