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
    
    <!-- FOOTER -->
    <?php include '../parts/footer.php';?>
</body>
</html>