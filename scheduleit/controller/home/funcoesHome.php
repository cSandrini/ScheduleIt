<?php
    function carregarSalas() {
        require_once '../../../model/conexaobd.php';
        try {
            $con = conectarBDPDO();
            $sth = $con->prepare("SELECT * FROM Sala;");
            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();

            if ($sth->rowCount() > 0) {
                while($row=$sth->fetch()) {
                    $img = base64_encode($row->imgLogo);
                    echo    "<div style='padding: 0!important; width: 22rem; height: 15rem;' class='gallery_product border rounded bg-white me-2 mb-2'>
                                <a href='../sala/sala.php?idSala=$row->idSala'><img class='rounded imgsala' src='data:imgLogo/jpeg;base64,$img'></a>
                                <p class='title'>$row->nomeFantasia <small>$row->cidade - $row->estado</small></p>
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
