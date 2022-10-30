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
                        $salaDisplay = salaDisplay($row->idSala, $img, $row->nomeFantasia, $row->cidade, $row->estado, $row->classificacao, "");
                        echo $salaDisplay;
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