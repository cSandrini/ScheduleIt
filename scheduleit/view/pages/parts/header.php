<script src="/scheduleit/resources/libraries/jquery-3.6.3/jquery-3.6.3.min.js"></script>
<script src="/scheduleit/resources/libraries/popperjs-2.11.6/popper.min.js"></script>
<link rel="stylesheet" href="/scheduleit/resources/libraries/bootstrap-5.2.3/css/bootstrap.min.css">
<script src="/scheduleit/resources/libraries/bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
<link href="/scheduleit/resources/libraries/bootstrap-icons-1.10.2/bootstrap-icons.css" rel="stylesheet">
<link href="/scheduleit/resources/libraries/fontawesome-6.2.1/css/fontawesome.css" rel="stylesheet">
<link href="/scheduleit/resources/libraries/fontawesome-6.2.1/css/brands.css" rel="stylesheet">
<link href="/scheduleit/resources/libraries/fontawesome-6.2.1/css/solid.css" rel="stylesheet">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    function paginaLogin() {
        window.location.href = "/login";
    }
    function paginaHome() {
        window.location.href = "/";
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@500&display=swap');
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    li {
        font-weight: 500;
        font-size: 16px;
        color: black;
        text-decoration: none!important;
    }

    span {
        font-weight: 500;
        font-size: 22px;
        text-decoration: none!important;
    }
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 10%;
        height: 100px;
    }

    .translate {
        transform: translate(-15.5%);
    }

    .logo {
        cursor: pointer;
    }

    .nav-links {
        list-style: none;
    }

    .nav-links li {
        display: inline-block;
        padding: 0px 20px;
    }

    .nav-links li a {
        transition: all 0.3s ease 0s;
    }

    .nav-links li a:hover {
        color: #0088a9
    }

    .hbutton {
        padding: 9px 25px;
        background-color: rgba(0,136,169,1);
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }

    .hbutton:hover {
        background-color:  rgba(0,136,169,0.75);
    }
</style>
<header class="border-bottom bg-white mb-4">
    <span class="logo" style="cursor:pointer;" onclick="paginaHome()" style="color: rgb(102, 0, 102);"><strong>SCHEDULE</strong><span style="color: rgb(187, 10, 187);"><strong>IT</strong></span></span>
    <nav class="translate">
        <form class="form-inline my-2 my-lg-0" method="post" name="pesquisar" action="/pesquisa">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Pesquisar" required="" name="busca" >
                <button class="btn btn-outline-info" type="submit" name="submit"><i class='bi bi-search'></i></button>
            </div>
        </form>
    </nav>
    
    <?php
        if(isset($_SESSION['id'])){
            require_once __DIR__ . '/../../../model/conexaobd.php';
            try {
                $con = conectarBDPDO();
                $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION['id'].";");
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();

                if ($sth->rowCount() > 0) {
                    $i=1;
                    while($row=$sth->fetch()) {
                        $nome = $row->nome;
                        if(isset($row->foto)) {
                            $imgPerfilHeader = base64_encode($row->foto);
                        }
                    }
                }
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
            }

            echo "<div id='perfil' class='dropdown perfil'>
                    <button style='padding: 0;' class='btn btn-default dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>";
                    if(isset($imgPerfilHeader)) {
                        echo "<img class='border rounded' src='data:foto/jpeg;base64,$imgPerfilHeader' width='50' height='50'>";
                    } else {
                        echo "<img class='border rounded' src='/scheduleit/view/styles/blank.png' width='50' height='50'>";
                    }
            echo "</button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <p class='dropdown-header'>Logado como $nome</p>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='/notificacoes'>Notificações</a>
                        <a class='dropdown-item' href='/minhasSalas'>Minhas Salas</a>
                        <a class='dropdown-item' href='/meusServicos'>Meus Serviços</a>
                        <a class='dropdown-item' href='/agenda/".$_SESSION['id']."'>Agenda</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='/perfil'>Perfil</a>
                        <a style='color: red;' class='dropdown-item' href='/logout'>Sair</a>
                    </div>";
        } else {
            echo "<button class='hbutton' style='color: white;' onclick='paginaLogin()'>Login</button>";
        }
    ?>
<script src="/scheduleit/view/pages/parts/script.js"></script>
</header>