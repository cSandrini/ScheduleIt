<?php
    require_once '../../model/conexaobd.php';
    try {
        $con = conectarBDPDO();
        $sth = $con->prepare("SELECT * FROM Usuario WHERE id=".$_POST['id'].";");
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        $row=$sth->fetch();
        $senha = $row->senha;
    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
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
    $senhaModal = $_POST["senhaModal"];
    $id = $_POST["id"];

    // PASSO 2 - VALIDAR OS DADOS
    if(isset($_FILES["imagemPerfil"])){
        echo $senha;
        echo $senhaModal;
        $msgErro = validarDadosAtt($id, $imagemPerfil, $senha, $senhaModal);
    }
    
    if (empty($msgErro)) {          
            // CONECTAR
            $conexao=conectarBD();
            inserirImagem($conexao, $imagemPerfil, $id);
            header("Location:../../view/pages/config/config.php?msg=0.");
        
    } else {
        header("Location:../../view/pages/config/config.php?msg=$msgErro");
    }

?>
