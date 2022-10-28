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
                    $visibilidade = '';
                    $img = base64_encode($row->imgLogo);
                    if ($row->visibilidade==0) {
                        $visibilidade = "<i class='bi bi-eye-slash text-danger'></i> Página não publicada";
                    }
                    echo    "<div onmouseover='this.style.cursor=pointer' style='padding: 8px!important; width: 355px; height: 130px;' class='d-flex align-items-center gallery_product border rounded bg-white me-3 mb-3' onclick='redirectSala($row->idSala)'>
                                <div class='d-inline'>
                                    <img class='rounded imgsala me-2' style='padding: 0!important; width: 7rem; height: 7rem;'  src='data:imgLogo/jpeg;base64,$img'>
                                </div>
                                <div class='d-inline lh-1'>
                                    <span style='max-width: 220px;' class='d-inline-block text-truncate mb-1 fw-bold title-card'>$row->nomeFantasia</span>
                                    <p class='m-0'><small>$row->cidade - $row->estado</small></p>
                                    <p class='mt-3 stars'><i class='bi bi-star-fill'></i> 4,6</p>
                                    <p class='m-0 text-danger'>$visibilidade</p>
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