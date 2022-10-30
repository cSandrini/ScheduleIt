<?php
    require_once '../../../controller/salaDisplay.php';
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
                    $salaDisplay = salaDisplay($row->idSala, $img, $row->nomeFantasia, $row->cidade, $row->estado, $row->classificacao);
                    echo $salaDisplay;
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