<!DOCTYPE html>
<html>
<head>
    <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
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

        li, a, button, input {
            font-family: "Montserrat", sans-serif;
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

        button {
            padding: 9px 25px;
            background-color: rgba(0,136,169,1);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }

        button:hover {
            background-color:  rgba(0,136,169,0.75);
        }
    </style>
<body>
    <header class="border-bottom bg-white">
        <span style="cursor:pointer;" onclick="paginaHome()" style="color: rgb(102, 0, 102);"><strong>SCHEDULE</strong><span style="color: rgb(187, 10, 187);"><strong>IT</strong></span></span>
        <nav>
            <form class="form-inline my-2 my-lg-0" method="post" name="pesquisar" action="../pesquisa/pesquisa.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" required="" name="busca" >
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="submit">Pesquisar</button>
            </form>
        </nav>
        <?php
            if(isset($_SESSION['id'])){
                echo "<a href='../../../controller/logout.php'>Logout</a>";
            } else {
                echo "<button style='color: white;' onclick='paginaLogin()'>Login</button>";
            }
        ?>
    </header>
</body>
</html>