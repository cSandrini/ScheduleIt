<?php
    require_once __DIR__.'/../../controller/salaDisplay.php';
    require_once __DIR__.'/../../model/conexaobd.php';
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
                        $visibilidade = "<p class='bottomMsg text-danger m-0 p-0'><i class='bi bi-eye-slash text-danger'></i> Página não publicada</p>";
                    }
                    $salaDisplay = salaDisplay($row->idSala, $img, $row->nomeFantasia, $row->cidade, $row->estado, $row->classificacao, $visibilidade);
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