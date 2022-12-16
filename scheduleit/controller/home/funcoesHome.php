<?php
    function carregarSalas() {
        require_once '../../../model/conexaobd.php';
        try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM sala ORDER BY classificacao DESC;");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();

            if ($sth->rowCount() > 0) {
                while($row=$sth->fetch()) {
                    if ($row->visibilidade==1) {
                        $img = base64_encode($row->imgLogo);
                        echo    "<div class='salaDisplay border rounded bg-white mb-3 p-0'>
                                    <div class='m-0 p-2 d-flex align-items-center gallery_product' onclick='redirectSala($row->idSala)'>
                                        <div class='d-inline'>
                                            <img class='rounded imgsala me-2' style='padding: 0!important; width: 7rem; height: 7rem;'  src='data:imgLogo/jpeg;base64,$img'>
                                        </div>
                                        <div class='d-inline lh-1'>
                                            <span class='widthspan d-inline-block text-truncate mb-1 fw-bold title-card'>$row->nomeFantasia</span>
                                            <p class='m-0'><small>$row->cidade - $row->estado</small></p>
                                            <p class='mt-3 stars'><i class='bi bi-star-fill'></i> $row->classificacao</p>
                                        </div>
                                    </div>
                                </div>";
                    }
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
