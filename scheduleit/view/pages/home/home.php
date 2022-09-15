<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Home</title>
    <link href="../../styles/css/cover.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- HEADER -->
    <?php 
        include '../parts/header.php';
        require_once '../../../model/conexaobd.php';
        $con = conectarBDPDO();
        ?>

    <div class="container pt-3">
        <div class="row justify-content-center">

            <?php
                //Conexao no método PDO (?)
                try {

                    $sth = $con->prepare("SELECT * FROM Sala;");
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();

                    if ($sth->rowCount() > 0) {
                        $i=1;
                        while($row=$sth->fetch()) {
                            $img = base64_encode($row->imgLogo);
                            echo    "<div style='width: 22rem; height: 15rem;' class='gallery_product border rounded bg-white mr-2 mb-2'>
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
            ?>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>