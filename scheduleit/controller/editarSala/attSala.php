<?php
    include('../../controller/protect.php');
    require_once '../funcoesUteis.php';
    require_once '../../model/conexaobd.php';
    require_once '../../model/salasDAO.php';

    $idSala = $_GET["idSala"];

    $conexao = conectarBD();
    $dados = carregarMinhasSalas($conexao, $_SESSION['id']);


    // PASSO 1 - RECEBER OS DADOS DO FORMULARIO
    if(isset($_POST["txtEmail"])){
        $email = $_POST["txtEmail"];
    } 
    if(isset($_POST["txtCNPJ"])){
        $cnpj = $_POST["txtCNPJ"];
    } 
    if(isset($_POST["txtNome"])){
        $nomeFantasia = $_POST["txtNome"];
    } 
    if(isset($_POST["txtCEP"])){
        $cep = $_POST["txtCEP"];
    } 
    if(isset($_POST["txtEstado"])){
        $estado = $_POST["txtEstado"];
    } 
    if(isset($_POST["txtCidade"])){
        $cidade = $_POST["txtCidade"];
    } 
    if(isset($_POST["txtBairro"])){
        $bairro = $_POST["txtBairro"];
    } 
    if(isset($_POST["txtRua"])){
        $rua = $_POST["txtRua"];
    }
    if(isset($_POST["txtNumero"])){
        $numero = $_POST["txtNumero"];
    } 
    if(isset($_POST["txtComplemento"])){
        $complemento = $_POST["txtComplemento"];
    } else {
    }
    if(isset($_POST["txtTelefone"])){
        $telefone = $_POST["txtTelefone"];
    } 
    if(isset($_POST["txtDescricao"])){
        $descricao = $_POST["txtDescricao"];
    } 
    $senha = $_POST["senhaModal"];
    $id = $_POST["idProprietario"];

    // PASSO 2 - VALIDAR OS DADOS
    $msgErro = validarDadosSala($email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao);
    //validarDadosSala($nomeFantasia, $telefone, $email);
    
    if (empty($msgErro)) {            
        // CONECTAR
        require_once '../../model/conexaobd.php';
        require_once '../../model/cadastroSalaDAO.php';
        
        $conexao=conectarBD();
        editarSala($conexao, $email, $cnpj, $nomeFantasia, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $telefone, $descricao, $idSala);
        header("Location:../../view/pages/editarSala/editarSala.php?idSala=$idSala&msg=Editado com sucesso.");
    } else {
        header("Location:../../view/pages/editarSala/editarSala.php?idSala=$idSala&msg=$msgErro");
    }

?>