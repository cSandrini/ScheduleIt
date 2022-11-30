<?php

include('../../../controller/protect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ScheduleIt - Comprar Sala</title>
  <link href="assets/style.css" rel="stylesheet">
  <script src="assets/js.js"></script>
</head>

<body class="bg-light">
<?php include "../parts/header.php"; ?>
  <div class="container border rounded bg-white">
    <div>
      <h4 class="my-2 text-center pb-2 border-bottom">
        Publicar Sala
      </h4>
      <div class="mt-5 row mx-3 mb-4">
        <div class="col-7">
          <form class="needs-validation" method="post" name="formPublicar" action='../../../controller/editarSala/publicarSala.php?idSala=<?php echo $_GET['idSala']?>' enctype="multipart/form-data">
            <h4 class="label2">
              Plano
            </h4>
            <div>
            <div class="my-3">
                <div class="form-check">
                  <input id="mensal" name="plano" type="radio" class="form-check-input" checked="" required="" value="1">
                  <label class="label2" for="mensal">
                    Mensal
                  </label>
              </div>
              <div class="form-check">
                <input id="trimestral" name="plano" type="radio" class="form-check-input" value="2">
                <label class="label2" for="trimestral">
                  Trimestral
                </label>
              </div>
              <div class="form-check">
                <input id="semestral" name="plano" type="radio" class="form-check-input" value="3">
                <label class="label2" for="semestral">
                  Semestral
                </label>
              </div>
              <div class="form-check">
                <input id="anual" name="plano" type="radio" class="form-check-input" value="4">
                <label class="label2" for="anual">
                  Anual
                </label>
              </div>
              <script type="text/javascript">
                document.querySelector('input[name="plano"]:checked').value;
              </script>
            </div>
            </div>
              <h4 class="label2">
                Pagamento
              </h4>
              <div class="my-3">
                <div class="form-check">
                  <input id="credito" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                  <label class="label2" for="credito">
                    Cartão de crédito
                  </label>
              </div>
              <div class="form-check">
                <input id="debito" name="paymentMethod" type="radio" class="form-check-input" required="">
                <label class="label2" for="debito">
                  Cartão de débito
                </label>
              </div>
              <div class="form-check">
                <input id="pix" name="paymentMethod" type="radio" class="form-check-input">
                <label class="label2" for="pix">
                  Pix
                </label>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="cc-name" class="label2">
                  Nome do cartão
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="cc-number" class="label2">
                  Número do cartão
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label for="cc-expiration" class="label2">
                  Vencimento
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label for="cc-cvv" class="label2">CVV</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar</button>
          </form>
        </div>
        
        <div class="col-5 px-3">
        
          <ul class="list-group mb-3">
            <div id="MS" style="display:none">
            <li class="list-group-item d-flex justify-content-between lh-sm">

            </li>
          </div>
          
            <li class="list-group-item d-flex justify-content-between">
              <span>
                Total (BRL)
              </span>
              <script type="text/javascript">
                document.getElementById("Total").textContent=valor;
              </script>
              <span id="Total">
                R$ 0
              </span>
            </li>
          </ul>
          <form class="card p-2">
            <div class="input-group">
              <input type="text" id="PromoTXT" class="form-control" placeholder="Promo code">
              <button type="radio" id="ButtonPC" class="btn btn-secondary" onclick="PromoCode()">
                Enviar
              </button>
            </div>
          </form>
        </div>
      </div> 
    </div>
  </div>
  <?php include "../parts/footer.php"; ?>  
</body>
</html>