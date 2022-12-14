<?php
    require_once '../../../model/conexaobd.php';
    require_once '../../../model/salasDAO.php';

    if(isset($_SESSION['id'])) {
        $session = $_SESSION['id'];
    }

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
                $visibilidade = $row->visibilidade;
                $assinatura = $row->assinatura;
                $plano = $row->plano;
            }
            if ($plano == 1){
                $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 month"));
            } elseif ($plano == 2){
                $dataExpiracao = date("Y-m-d", strtotime($assinatura." +3 month"));
            } elseif ($plano == 3){
                $dataExpiracao = date("Y-m-d", strtotime($assinatura." +6 month"));
            } elseif ($plano == 4){
                $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 year"));
            } 

            $dataAtual = date("Y-m-d");
            if (isset($dataExpiracao) && $dataExpiracao <= $dataAtual){
                $conexao = conectarBD();
                expirarSala($conexao, $_GET["idSala"]);
            }

            if (isset($_SESSION["id"])) {
                $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION["id"]);
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();
                $row=$sth->fetch();
                $permissao = $row->permissao;
            } else {
                $permissao = 0;
            }
        } else {
                header("Location:naoencontrada.php");
        exit;
        }
        if (($permissao != 9 || $session != $idProprietario) && $visibilidade == 0 ) {
            header("Location:naoencontrada.php");
        exit;
        }

    } catch(PDOException $e) {
        echo "Error: ". $e->getMessage();
    }

    function interfaceEditarSala($img, $idProprietario, $idSala) {
        try {
            $con = conectarBDPDO();
            if (isset($_GET["idSala"])){
                $sth = $con->prepare("SELECT idProprietario FROM sala WHERE idSala=".$_GET["idSala"].";");
            }
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                while($row=$sth->fetch()) {
                    $idProprietario = $row->idProprietario;
                }
            } else {
                header("Location:naoencontrada.php");
                exit;
            }
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
        try {
            $con = conectarBDPDO();
            if (isset($_GET["idSala"])){
                $sth = $con->prepare("SELECT * FROM sala WHERE idSala=".$_GET["idSala"].";");
            }
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                while($row=$sth->fetch()) {
                    $visibilidade = $row->visibilidade;
                    $assinatura = $row->assinatura;
                    $assinaturaConv = date("d/m/Y", strtotime($assinatura));
                    $plano = $row->plano;
                }
                if ($plano == 1){
                    $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 month"));
                    $expiracaoConv = date("d/m/Y", strtotime($dataExpiracao));
                } elseif ($plano == 2){
                    $dataExpiracao = date("Y-m-d", strtotime($assinatura." +3 month"));
                    $expiracaoConv = date("d/m/Y", strtotime($dataExpiracao));
                } elseif ($plano == 3){
                    $dataExpiracao = date("Y-m-d", strtotime($assinatura." +6 month"));
                    $expiracaoConv = date("d/m/Y", strtotime($dataExpiracao));
                } elseif ($plano == 4){
                    $dataExpiracao = date("Y-m-d", strtotime($assinatura." +1 year"));
                    $expiracaoConv = date("d/m/Y", strtotime($dataExpiracao));
                } 
            } else {
                header("Location:naoencontrada.php");
                exit;
            }
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
        if($img) {
            echo "<img id='imgShow' class='rounded' src='data:image/jpeg;base64,$img' alt='' width='160' height='160'>";
        } else {
            echo "<img id='imgShow' class='rounded' src='../../styles/blank.png' alt='' width='160' height='160'>";
        }
        if (isset($_SESSION["id"])) {
            try {
                $con = conectarBDPDO();
                $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION["id"].";");
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();
                $row=$sth->fetch();
                $permissao = $row->permissao;

            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
            if ($_SESSION["id"] == $idProprietario || $permissao == 9) {
                if ($visibilidade == 0 && $plano == null){
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
                        </div>
                    </div>";
                } elseif ($visibilidade == 0 && $plano != null){
                    echo "<div class='lh-100 me-auto ms-2'>
                            <a href='../editarSala/editarSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-pen'></i> Editar</button></a>
                        <div class='d-flex'>
                            <a href='../../../controller/editarSala/publicarSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-send'></i> Publicar</button></a>
                            <p class='ms-2 rounded bg-light text-dark mb-2 px-2 py-1 fst-normal'>Assinado em: $assinaturaConv - Expira em: $expiracaoConv</p>
                        </div>
                            <form method='post' name='FormEditarImgLogo' action='../../../controller/editarSala/attImgLogo.php?idSala=$idSala' enctype='multipart/form-data'>
                            <div class='d-inline-flex'>
                                <input name='imgLogo' class='col form-control form-control-sm mb-2' id='imgLogo' type='file' required=''>
                                <button type='submit' class='ms-2 btn btn-sm btn-light mb-2'>
                                <i class='bi bi-file-earmark-arrow-up'></i>
                                </button>
                            </div>
                            <div class=''>
                                <a href='../../../controller/editarSala/excluirSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light'><i class='bi bi-trash'></i> Excluir</button></a>
                            </div>
                            </form>
                        </div>
                    </div>";

                } else {
                    echo "<div class='lh-100 me-auto ms-2'>
                            <a href='../editarSala/editarSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-pen'></i> Editar</button></a>
                        <div class='d-flex'>
                            <a href='../../../controller/editarSala/privarSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light mb-2'><i class='bi bi-send'></i> Privar</button></a>
                            <p class='ms-2 rounded bg-light text-dark mb-2 px-2 py-1 fst-normal'>Assinado em: $assinaturaConv - Expira em: $expiracaoConv</p>
                        </div>
                            <form method='post' name='FormEditarImgLogo' action='../../../controller/editarSala/attImgLogo.php?idSala=$idSala' enctype='multipart/form-data'>
                            <div class='d-inline-flex'>
                                <input name='imgLogo' class='col form-control form-control-sm mb-2' id='imgLogo' type='file' required=''>
                                <button type='submit' class='ms-2 btn btn-sm btn-light mb-2'>
                                <i class='bi bi-file-earmark-arrow-up'></i>
                                </button>
                            </div>
                            <div class=''>
                                <a href='../../../controller/editarSala/excluirSala.php?idSala=$idSala'><button type='button' class='btn btn-sm btn-light'><i class='bi bi-trash'></i> Excluir</button></a>
                            </div>
                            </form>
                        </div>
                    </div>";

                }
            }
        }
    }
    function editarFuncionario($idProprietario, $idSala) {
        if (isset($_SESSION["id"])) {
            try {
                $con = conectarBDPDO();
                $sth = $con->prepare("SELECT * FROM usuario, sala WHERE id=".$_SESSION["id"]." AND idSala=".$_GET['idSala']." AND idProprietario=".$_SESSION['id']." AND sala.idProprietario = usuario.id;");
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();
                $row=$sth->fetch();
                if ($sth->rowCount() > 0) {
                    $permissao = $row->permissao;
                    $idProprietario = $row->idProprietario;
                }
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
            if (isset($_SESSION["id"]) && $_SESSION["id"] == $idProprietario || isset($permissao) && $permissao == 9 || isset($_SESSION["id"]) && $_SESSION["id"] == 1) {
                echo    "<div class='dropdown'>
                            <button class='btn btn-outline-secondary dropdown' id='buttonAddFuncionario' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>+ Adicionar funcionário</button>
                            <div class='dropdown-menu' aria-labelledby='buttonAddFuncionario'>
                                <form class='needs-validation' method='post' name='formEditarSala' action='../../../controller/funcionario/adicionarFuncionario.php?idSala=$idSala' enctype='multipart/form-data'>
                                    <input type='text' name='cpf' class='dropdown-item dropdownColor' placeholder='CPF' required=''>
                                    <button type='submit' class='dropdown-item dropdownColor'>Adicionar</button>
                                </form> 
                            </div>
                        </div>";
            }
        }
    }
?>