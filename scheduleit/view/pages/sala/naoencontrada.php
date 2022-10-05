<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Not Found</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="../../styles/css/cover.css" rel="stylesheet">
    </head>
    <body class="bg-light"> 
        <?php include "../parts/header.php"; ?>
        <div class="container border rounded bg-white p-0 mt-3 rounded">   
            <div style='margin-bottom:0!important' class='alert alert-danger text-center' role='alert'>
                Essa sala não existe.
            </div>
        </div>
        <?php include "../parts/footer.php"; ?>
    </body>
</html>