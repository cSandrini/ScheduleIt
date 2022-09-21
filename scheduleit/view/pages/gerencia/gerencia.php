<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleIt - Cadastro</title>
    
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../styles/css/cover.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css.css">
    <script src="assets/js.js">
    </script>
  </head>
  <body class="text-center bg-light p-0 m-0">
    <!-- HEADER -->
    <?php include '../parts/header.php';
    ?>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="tools" viewBox="0 0 16 16">
      <path d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
    </symbol>
    <symbol id="arrow" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
    </symbol>
    </svg>

    <div class="pt-5">
      <div style="width: 40rem;" class="pb-3 bg-white rounded container border">
        <div class="py-2 text-center">
          <h2>Gerencia de negócio</h2>
          <p class="lead"> Bem vindo, siga os passos para cadastrar seu negócio.</p>
        </div>
        <form class="needs-validation" method="post" name="formCadastro" action="../../../controller/cadastro/cadusuario.php" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nome" class="form-label mb-0">CNPJ</label>
              <input name="txtNome" type="text" class="form-control" id="nome" placeholder="CNPJ" value="" required="">
            </div>
            <div class="col-sm-6">
              <label for="sobrenome" class="form-label mb-0">Nome fantasia</label>
              <input name="txtSobrenome" type="text" class="form-control" id="sobrenome" placeholder="nome" value="" required="">
            </div>
            <div class="col-sm-6">
              <label for="nome" class="form-label mb-0">CEP</label>
              <input name="txtNome" type="text" class="form-control" id="nome" placeholder="CEP" value="" required="">
            </div>
            <div class="col-sm-12">
              <label for="cpf" class="form-label mb-0">Endereço</label>
              <input name="txtCpf" type="text" class="form-control" id="cpf" placeholder="Endereço" value="" required="">
            </div>
            <div class="col-sm-6">
            <label for="cpf" class="form-label mb-0">Escolha um banner</label>
              <input type="file" class="form-control mb-0" aria-label="Large file input example">
            </div>
            <div class="col-sm-6">
            <label for="cpf" class="form-label mb-0">Escolha uma logo</label>
              <input type="file" class="form-control mb-0" aria-label="Large file input example">
            </div>
          </div>
        </form>
        <div class="text-left" style="padding-top: 20px">
          <button type="button" class="btn btn-info my-2 my-sm-0 w-100" id="ButtonADD" onclick="adicionarf()">
            <p>
              Adicionar prestador de serviço
            </p>
          </button>
          
          <div id="codigod" class="input-group col-sm-3" style="padding-top: 20px; display:none">
            <input type="text" id="codigo" class="form-control" placeholder="---">
            <button type="button" id="codigob" class="btn btn-secondary" onclick="validarf()">
              Enviar
            </button>
          </div>
        </div>
        
        <hr class="my-3">
        <div class="text-right">
          <button style="background-color: transparent;" class="input1">
          <a href="../teste/comprarSala.php">
          <svg width="20px" height="20px">
              <use xlink:href="#arrow">
              </use>
            </svg>
          </a>
          </button>
        </div>

        <div style="display:none" id="func1">
          <label for="botaofunc" class="label1 borda mt-5">
            <img src="../../styles/blank.png" alt="" width="80" height="80" class="rounded-circle me-4">
            <div>
              <h4 class="fw-bold mb-0">
                Fulano
              </h4>
              <button style="background-color: white">
              <svg class="" width="20px" height="20px">
              <use xlink:href="#tools">
              </use>
            </svg>
              </button>
            </div>
          </label>  
        </div>
        <div style="display:none" id="func2">
          <label for="botaofunc" class="label1 borda mt-5">
            <img src="../../styles/blank.png" alt="" width="80" height="80" class="rounded-circle me-4">
            <div>
              <h4 class="fw-bold mb-0">
                Fulano
              </h4>
              <button style="background-color: white">
              <svg class="" width="20px" height="20px">
              <use xlink:href="#tools">
              </use>
            </svg>
              </button>
            </div>
          </label>  
        </div>
      </div>
    </div>
  </body>
</html>