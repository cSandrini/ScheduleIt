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
    <?php   include '../parts/header.php';
            require_once '../../../model/conexaobd.php';
            $con = conectarBDPDO();?>

    <div class="container pt-3">
        <div class="row justify-content-center">
            <?php
                if(isset($_POST["submit"])) {
                    try {
                        $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');
                        $str = $_POST["busca"];

                        $search_string = "SELECT * FROM sala WHERE ";
                        $display_words = "";
                                            
                        // format each of search keywords into the db query to be run
                        $keywords = explode(' ', $str);
                        $multiple = FALSE;
                        foreach ($keywords as $word){
                            if (strlen($word) > 2){
                                $search_string .= "nomeFantasia LIKE '%".$word."%' OR ";
                                $display_words .= $word.' ';
                                $multiple = TRUE;
                            }
                        };

                        if ($multiple == TRUE){
                            $search_string = substr($search_string, 0, strlen($search_string)-4);
                            $display_words = substr($display_words, 0, strlen($display_words)-1);

                            $sth = $con->prepare("$search_string");

                            $sth->setFetchMode(PDO:: FETCH_OBJ);
                            $sth->execute();
                        
                            if ($sth->rowCount() > 0) {
                                $i=1;
                                while($row=$sth->fetch()) {
                                    $img = base64_encode($row->imgLogo);
                                    echo    "<div onmouseover='this.style.cursor=pointer' style='padding: 8px!important; width: 355px; height: 130px;' class='overflow-auto d-flex align-items-center gallery_product border rounded bg-white me-3 mb-3' onclick='redirectSala($row->idSala)'>
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
                                    echo    "<br><div class='alert alert-danger col-md-3 text-center mx-auto' role='alert'>
                                                Nenhum resultado encontrado.
                                            </div>";
                                }
                        
                        } 
                    } catch(PDOException $e) {
                            echo "Error: ". $e->getMessage();
                    }
                } 
                    
                if ($multiple == FALSE) {
                    echo    "<br><div class='alert alert-danger col-md-3 text-center mx-auto' role='alert'>
                                Nenhum resultado encontrado.
                            </div>";
                }            
            ?>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>