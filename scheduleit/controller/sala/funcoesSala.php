<?php
    require_once '../../../model/conexaobd.php';
    try {
        $con = conectarBDPDO();
        if (isset($_GET["idSala"])){
            $sth = $con->prepare("SELECT * FROM sala WHERE idSala=".$_GET["idSala"].";");
        } else {
            header("Location:naoencontrada.php");
        }
        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth->execute();
        if ($sth->rowCount() > 0) {
        $i=1;
        while($row=$sth->fetch()) {
            $img = base64_encode($row->imgLogo);
            $nomeFantasia = $row->nomeFantasia;
            $idSala = $row->idSala;
            $descricao = $row->descricao;
            $cep = $row->cep;
            $cidade = $row->cidade;
            $estado = $row->estado;
            $bairro = $row->bairro;
            $rua = $row->rua;
            $numero = $row->numero;
            $complemento = $row->complemento;
            $email = $row->email;
            $telefone = $row->telefone;
            $idProprietario = $row->idProprietario;
        }
        } else {
            header("Location:naoencontrada.php");
        exit;
        }
    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }

    function editarSala($img, $idProprietario, $idSala) {
        if($img) {
            echo "<img id='imgShow' class='rounded' src='data:image/jpeg;base64,$img' alt='' width='160' height='160'>";
        } else {
            echo "<img id='imgShow' class='rounded' src='../../styles/blank.png' alt='' width='160' height='160'>";
        }

        if (isset($_SESSION["id"])) {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION["id"].";");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            $row=$sth->fetch();
            $permissao = $row->permissao;
            if ($_SESSION["id"] == $idProprietario || $permissao == 9) {
                echo "<div class='lh-100 me-auto ms-2'>
                        <a href='../editarSala/editarSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-pen'></i> Editar</button></a>
                    <div class=''>
                        <a href='../publicar/publicar.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-send'></i> Publicar</button></a>
                    </div>
                        <form method='post' name='FormEditarImgLogo' action='../../../controller/editarSala/attImgLogo.php?idSala=$idSala' enctype='multipart/form-data'>
                        <div class='d-flex'>
                            <input name='imgLogo' class='form-control form-control-sm mb-2' id='imgLogo' type='file' required=''>
                            <button type='submit' class='ms-2 btn btn-sm btn-light mb-2'>
                            <i class='bi bi-file-earmark-arrow-up'></i>
                            </button>
                        </div>
                        <div class=''>
                            <a href='../../../controller/editarSala/excluirSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light'><i class='bi bi-trash'></i> Excluir</button></a>
                        </div>
                        </form>
                    </div>";
            }
        }
    }
    function editarFuncionario($idProprietario) {
        if (isset($_SESSION["id"])) {
            if ($_SESSION["id"] == $idProprietario) {
                echo "<div class='input-group'>

                <div>
                    <div class='input-group-prepend'>
                        <button class='btn btn-outline-secondary' type='button'>+ Adicionar funcionário</button>
                        </div>
                        <input type='text' class='form-control' placeholder='CPF'>
                        <input type='text' class='form-control' placeholder='Função'>
                    </div>
                </div>";
            }
        }
    }
?>