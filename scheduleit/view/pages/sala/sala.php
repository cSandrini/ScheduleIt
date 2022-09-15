<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<html lang="pt-BR"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de agendamento</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <script src="assets/js.js"></script>

</head>

<body class="bg-light">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="arrow-left-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
  </symbol>
  <symbol id="star" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
  </symbol>
  <symbol id="arrow-right-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
  </symbol>
</svg>

<style>
  
  .dropdown {
    position: relative;
    display: inline-block;
    margin-right: 10px;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    padding: 12px 16px;
    z-index: 1;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }

  fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 40px;
  font-family: FontAwesome;
  display: inline-block;
  content: "★";
}



.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>




<?php include "../parts/header.php"; 

//Conexao no método PDO (?)
  try {
      $con = new PDO("mysql:host=localhost;dbname=scheduleit",'root','');

      $sth = $con->prepare("SELECT * FROM Sala WHERE idSala=".$_GET["idSala"]);
      $sth->setFetchMode(PDO:: FETCH_OBJ);
      $sth->execute();

      if ($sth->rowCount() > 0) {
        $row=$sth->fetch();
      } else {
          echo "<br><div class='alert alert-danger col-md-2 text-center mx-auto' role='alert'>
              Nenhuma sala encontrada.
          </div>";
      }
  } catch(PDOException $e) {
      echo "Error: ". $e->getMessage();
  }
?>

<div class="container border rounded bg-white p-0 mt-5 rounded">
  <div>
    <div>
      <div class="w-100 rounded bg-info">
        <?php
          echo "<img src='data:imgLogo/jpeg;base64,".base64_encode($row->imgLogo)."' width='180' height='180' class='rounded p-3'>";
        ?>
      </div>
      <div class="card-body p-0 pt-3">
        <h4 class="card-title text-center"><?php echo $row->nomeFantasia ?></h4> 
        <hr>
        <div class="px-4 d-flex justify-content-between">
          <div class="col-3 border rounded p-2 mr-2 bg-light">
            <p class="card-text"> <?php echo $row->descricao ?> <br><br> <?php echo "CEP: $row->cep. $row->cidade - $row->estado. $row->bairro, $row->rua, $row->numero, $row->complemento."?> <br><br> Horário de atendimento <br><br> <?php echo "Email: $row->email" ?> <br> <?php echo "Telefone: $row->telefone" ?> </p> 
          </div>
          <div>
            <div class="pt-5">
              <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
              </fieldset>
            </div>
          </div>
          <iframe class="border rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1880.3365441818912!2d-40.6202736947007!3d-19.51269574405797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb7a90cf2f75401%3A0xb0adb4b9ee222958!2sBarbearia%20Vieira!5e0!3m2!1spt-BR!2sbr!4v1655906175079!5m2!1spt-BR!2sbr"
           width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        
      </div>
    </div>
    <hr class="my-4">
    <div class="d-flex justify-content-around mb-3">
      <div class="dropdown" id="func1">
        <button class="botaofunc">
          <p>Funcionário 1</p>
        </button>

        <label for="botaofunc" class="align-items-center borda border rounded pr-2 bg-light">
          <img src="assets/IMG/blank.png" alt="" width="80" height="80" class="rounded mr-2">
          <div class="">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
            <p class="mb-0">
              Função do funcionário
            </p>
          </div>
        </label>
        
        <div class="cal dropdown-content rounded border">
          <div class="d-flex flex-nowrap">
            <img src="assets/IMG/blank.png" alt="" width="40" height="40" class="rounded me-2 mb-2 mr-2">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
          </div>
          <div class="cal-month">
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"></use></svg>
            </button>
            <strong class="cal-month-name">Junho</strong>
            <select class="form-select cal-month-name d-none">
              <option value="January">Janeiro</option>
              <option value="February">Fevereiro</option>
              <option value="March">Março</option>
              <option value="April">Abril</option>
              <option value="May">Maio</option>
              <option selected="" value="June">Junho</option>
              <option value="July">Julho</option>
              <option value="August">Agosto</option>
              <option value="September">Setembro</option>
              <option value="October">Outubro</option>
              <option value="November">Novembro</option>
              <option value="December">Dezembro</option>
            </select>
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"></use></svg>
            </button>
          </div>
          <div class="cal-weekdays text-muted">
            <div class="cal-weekday">Dom</div>
            <div class="cal-weekday">Seg</div>
            <div class="cal-weekday">Ter</div>
            <div class="cal-weekday">Qua</div>
            <div class="cal-weekday">Qui</div>
            <div class="cal-weekday">Sex</div>
            <div class="cal-weekday">Sab</div>
          </div>
          <div class="cal-days">
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">31</button>
    
            <button class="btn cal-btn" type="button" style="background-color: red;">1</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">2</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">3</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">4</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">5</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">6</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">7</button>
    
            <button class="btn cal-btn" type="button" style="background-color: red;">8</button>
            <button class="btn cal-btn" type="button" style="background-color: white;"><a href="../reserva/reserva.php">9</a></button>
            <button class="btn cal-btn" type="button" style="background-color: white;">10</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">11</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">12</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">13</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">14</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">15</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">16</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">17</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">18</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">19</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">20</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">21</button>
    
            <button class="btn cal-btn" type="button" style="background-color: red;">22</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">23</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">24</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">25</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">26</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">27</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">28</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">29</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">31</button>
          </div>
        </div>
      </div>
      <div  id="func2" class="dropdown">
        <button class="botaofunc">
          <p>Funcionário 1</p>
        </button>

        <label for="botaofunc" class="align-items-center borda border rounded pr-2 bg-light">
          <img src="assets/IMG/blank.png" alt="" width="80" height="80" class="rounded mr-2">
          <div class="">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
            <p class="mb-0">
              Função do funcionário
            </p>
          </div>
        </label>

        <div class="cal dropdown-content rounded border">
          <div class="d-flex flex-nowrap">
            <img src="assets/IMG/blank.png" alt="" width="40" height="40" class="rounded me-2 mb-2 mr-2">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
          </div>
          <div class="cal-month">
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"></use></svg>
            </button>
            <strong class="cal-month-name">Junho</strong>
            <select class="form-select cal-month-name d-none">
              <option value="January">Janeiro</option>
              <option value="February">Fevereiro</option>
              <option value="March">Março</option>
              <option value="April">Abril</option>
              <option value="May">Maio</option>
              <option selected="" value="June">Junho</option>
              <option value="July">Julho</option>
              <option value="August">Agosto</option>
              <option value="September">Setembro</option>
              <option value="October">Outubro</option>
              <option value="November">Novembro</option>
              <option value="December">Dezembro</option>
            </select>
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"></use></svg>
            </button>
          </div>
          <div class="cal-weekdays text-muted">
            <div class="cal-weekday">Dom</div>
            <div class="cal-weekday">Seg</div>
            <div class="cal-weekday">Ter</div>
            <div class="cal-weekday">Qua</div>
            <div class="cal-weekday">Qui</div>
            <div class="cal-weekday">Sex</div>
            <div class="cal-weekday">Sab</div>
          </div>
          <div class="cal-days">
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">31</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">1</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">2</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">3</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">4</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">5</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">6</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">7</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">8</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">9</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">10</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">11</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">12</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">13</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">14</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">15</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">16</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">17</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">18</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">19</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">20</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">21</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">22</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">23</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">24</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">25</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">26</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">27</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">28</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">29</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">31</button>
          </div>
        </div>
      </div>

      <div class="dropdown" id="func3">
        <button class="botaofunc"><p>Funcionário 1</p>
        </button>

        <label for="botaofunc" class="align-items-center borda border rounded pr-2 bg-light">
          <img src="assets/IMG/blank.png" alt="" width="80" height="80" class="rounded mr-2">
          <div class="">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
            <p class="mb-0">
              Função do funcionário
            </p>
          </div>
        </label>

        <div class="cal dropdown-content rounded border">
          <div class="d-flex flex-nowrap">
            <img src="assets/IMG/blank.png" alt="" width="40" height="40" class="rounded me-2 mb-2 mr-2">
            <h4 class="fw-bold mb-0">
              Nome do Funcionário
            </h4>
          </div>
          <div class="cal-month">
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-left-short"></use></svg>
            </button>
            <strong class="cal-month-name">Junho</strong>
            <select class="form-select cal-month-name d-none">
              <option value="January">Janeiro</option>
              <option value="February">Fevereiro</option>
              <option value="March">Março</option>
              <option value="April">Abril</option>
              <option value="May">Maio</option>
              <option selected="" value="June">Junho</option>
              <option value="July">Julho</option>
              <option value="August">Agosto</option>
              <option value="September">Setembro</option>
              <option value="October">Outubro</option>
              <option value="November">Novembro</option>
              <option value="December">Dezembro</option>
            </select>
            <button class="btn cal-btn" type="button" style="background-color: white;">
              <svg class="bi" width="16" height="16"><use xlink:href="#arrow-right-short"></use></svg>
            </button>
          </div>
          <div class="cal-weekdays text-muted">
            <div class="cal-weekday">Dom</div>
            <div class="cal-weekday">Seg</div>
            <div class="cal-weekday">Ter</div>
            <div class="cal-weekday">Qua</div>
            <div class="cal-weekday">Qui</div>
            <div class="cal-weekday">Sex</div>
            <div class="cal-weekday">Sab</div>
          </div>
          <div class="cal-days">
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn " disabled="" type="button" style="background-color: white;">31</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">1</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">2</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">3</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">4</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">5</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">6</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">7</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">8</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">9</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">10</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">11</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">12</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">13</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">14</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">15</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">16</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">17</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">18</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">19</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">20</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">21</button>
    
            <button class="btn cal-btn" type="button" style="background-color: red;">22</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">23</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">24</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">25</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">26</button>
            <button class="btn cal-btn" type="button" style="background-color: red;">27</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">28</button>
    
            <button class="btn cal-btn" type="button" style="background-color: white;">29</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn" type="button" style="background-color: white;">31</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
  

    <?php include "../parts/footer.php"; ?>
  </body>
</html>