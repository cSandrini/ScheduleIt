<?php
    require_once '../../../model/conexaobd.php';
    function carregarMinhasSalas() {
        try {
            $con = conectarBDPDO();

            $sth = $con->prepare("SELECT * FROM sala WHERE idProprietario=".$_SESSION["id"]);
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();

            if ($sth->rowCount() > 0) {
                $i=1;
                while($row=$sth->fetch()) {
                    $img = base64_encode($row->imgLogo);
                    echo    "<div onmouseover='this.style.cursor=pointer' style='padding: 8px!important; width: 355px; height: 130px;' class='d-flex align-items-center gallery_product border rounded bg-white me-2 mb-2' onclick='redirectSala($row->idSala)'>
                                <div class='d-inline'>
                                    <img class='rounded imgsala me-2' style='padding: 0!important; width: 7rem; height: 7rem;'  src='data:imgLogo/jpeg;base64,$img'>
                                </div>
                                <div class='d-inline lh-1'>
                                    <p class='mb-1 fw-bold title-card'>$row->nomeFantasia</p>
                                    <p class='m-0'><small>$row->cidade - $row->estado</small></p>
                                    <p class='mt-3 stars'><i class='bi bi-star-fill'></i> 4,6</p>
                                </div>
                            </div>";
                }
            } else {
                echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                    Nenhum resultado encontrado.
                </div>";
            }
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }
?>