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

<<<<<<< HEAD
    <?php
        if(isset($_POST["submit"])) {
            try {
                $str = $_POST["busca"];
=======
    <div class="container pt-3">
        <div class="row justify-content-center">
            <?php
                if(isset($_POST["submit"])) {
                    try {
                        $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');
                        $str = $_POST["busca"];
>>>>>>> 743fa6325d57ea197d33ccbf3ba4519b697785c9

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
                                    echo "<div style='width: 22rem; height: 15rem;' class='gallery_product border rounded bg-white mr-2 mb-2'>
                                                <a href='#'><img class='rounded imgsala' src='data:imgLogo/jpeg;base64,$img'></a>
                                                <p class='title'>$row->nomeFantasia <small>$row->cidade - $row->estado</small></p>
                                            </div>";
                                
                                }
                            } else {
                                    echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                                        Nenhum resultado encontrado.
                                    </div>";
                                }
                        
                        } 
                    } catch(PDOException $e) {
                            echo "Error: ". $e->getMessage();
                        }

                    } 
                    
                    if ($multiple == FALSE) {
                        echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                        Nenhum resultado encontrado.
                    </div>";
                    }            
            ?>
        </div>
    </div>
<<<<<<< HEAD
    
    
=======

>>>>>>> 743fa6325d57ea197d33ccbf3ba4519b697785c9
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>