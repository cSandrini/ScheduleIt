<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    function paginaLogin() {
        window.location.href = "../login/login.php";
    }
    function paginaHome() {
        window.location.href = "../home/home.php";
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
<header class="border-bottom bg-white mb-3">
    <span style="cursor:pointer;" onclick="paginaHome()" style="color: rgb(102, 0, 102);"><strong>SCHEDULE</strong><span style="color: rgb(187, 10, 187);"><strong>IT</strong></span></span>
    <nav class="translate">
        <form class="form-inline my-2 my-lg-0" method="post" name="pesquisar" action="../pesquisa/pesquisa.php">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Pesquisar" required="" name="busca" >
                <button class="btn btn-outline-info" type="submit" name="submit"><i class='bi bi-search'></i></button>
            </div>
        </form>
    </nav>

    <?php
        if(isset($_SESSION['id'])){
            require_once '../../../model/conexaobd.php';
        
            try {
                $con = conectarBDPDO();
                $sth = $con->prepare("SELECT * FROM usuario WHERE id=".$_SESSION['id'].";");
                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();

                if ($sth->rowCount() > 0) {
                    $i=1;
                    while($row=$sth->fetch()) {
                        $nome = $row->nome;
                        $imgPerfilHeader = base64_encode($row->foto);
                    }
                }
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
            }

            echo "<div class='dropdown'>
                    <button style='padding: 0;' class='btn btn-default dropdown' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                    if($imgPerfilHeader) {
                        echo "<img class='border rounded' src='data:foto/jpeg;base64,$imgPerfilHeader' width='50' height='50'>";
                    } else {
                        echo "<img class='border rounded' src='../../styles/blank.png' width='50' height='50'>";
                    }
            echo "</button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <p class='dropdown-header'>Logado como $nome</p>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='../notificacoes/notificacoes.php'>Notificações</a>
                        <a class='dropdown-item' href='../minhasSalas/minhasSalas.php'>Minhas Salas</a>
                        <a class='dropdown-item' href='../agenda/agenda.php?id=".$_SESSION['id']."'>Agenda</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='../config/config.php'>Configurações</a>
                        <a style='color: red;' class='dropdown-item' href='../../../controller/logout.php'>Sair</a>
                    </div>";
        } else {
            echo "<button class='hbutton' style='color: white;' onclick='paginaLogin()'>Login</button>";
        }
    ?>
</header>