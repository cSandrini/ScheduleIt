<html lang="en"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sala de agendamento</title>

  <link href="../../styles/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../styles/css/cover.css" rel="stylesheet">
  <script src="assets/js.js"></script>
</head>

<body class="bg-light">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="arrow-left-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
  </symbol>
  
  <symbol id="arrow-right-short" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
  </symbol>
</svg>

<style>
.desabilitado{
  cursor: default;
}
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
</style>




<?php include "../parts/header.php"; ?>
<div class="container border rounded bg-white p-0 mt-5 rounded">
  <div>
    <div>
      <div class="w-100 rounded bg-info">
        <img src="assets/IMG/blank.png" alt="" width="180" height="180" class="rounded-circle me-2" style="padding: 15px;">
      </div>
      <div class="card-body p-0 pt-3">
        <h4 class="card-title text-center">Nome do estabelecimento</h4> 
        <hr>
        <div class="px-4 d-flex">
          <div class="col-2 border rounded p-2 mr-2 bg-light">
            <p class="card-text">Descrição do estabelecimento <br> Endereço <br> Horário de atendimento <br> telefone <br> etc </p> 
          </div>
          <div class="col-2 p-0 mr-2">
            <select class="form-select w-100" name="list" id="combom"  onclick="cidades()">
              <option value="0" selected="selected" id="inicio">Selecione a cidade</option>
              <option value="1">Colatina</option>
              <option value="2">Marilândia</option>
              <option value="3">Santa Teresa</option>
            </select>  
          </div>
        </div>
      </div>
    </div>
    <hr class="my-4">
    <div class="d-flex justify-content-around mb-3">
      <div class="dropdown" id="beto" style="display: none;">
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
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">31</button>
    
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
      <div  id="joao" class="dropdown" style="display:none">
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
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">31</button>
    
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

      <div class="dropdown" id="rafael" style="display: none;">
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
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">30</button>
            <button class="btn cal-btn desabilitado" disabled="" type="button" style="background-color: white;">31</button>
    
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