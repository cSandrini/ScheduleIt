<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleIt - Home</title>
</head>
<body class="bg-light">
    <!-- HEADER -->
    <?php include '../parts/header.php';?>
    <?php include '../../../model/conexaobd';?>

    <?php
        // Exibir caso não ache nenhum departamento
        //if (isset($mensagem)) {  // Verifica se tem mensagem de ERRO
            echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
                    Nenhum departamento encontrado.
                </div>";
        //}
    ?>

    <!--
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div style="width: 22rem; height: 15rem;" class="d-flex border rounded bg-white mr-2 mb-2">
        </div>
        
    </div>
    -->
    
    <?php
    // Pega os termos pesquisados do URL (get)
    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    // Cria a Variável para pesquisar no banco
    $stringBusca = "SELECT * FROM search_engine WHERE ";
    $mostrarPalavra = "";
					
    // Coloca cada palavra pesquisada na variável de pesquisa
    $keywords = explode(' ', $busca);			
    foreach ($keywords as $palavra){
    	$stringBusca .= "keywords LIKE '%".$palavra."%' OR ";
    	$mostrarPalavra .= $palavra.' ';
    }
    $stringBusca = substr($stringBusca, 0, strlen($stringBusca)-4);
    $mostrarPalavra = substr($mostrarPalavra, 0, strlen($mostrarPalavra)-1);
    //echo $stringBusca
    echo $result_count;

    // connect to the database
    $conexao = conectarbd()

    // run the query in the db and search through each of the records returned
    $query = mysqli_query($conexao, $stringBusca);
    $result_count = mysqli_num_rows($query);

    // display a message to the user to display the keywords
    echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
    echo 'Your search for <i>"'.$mostrarPalavra.'"</i><hr />';
    ?>
    
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>