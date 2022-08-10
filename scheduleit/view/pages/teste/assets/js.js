valor = 0;
contagem = 0;
usado = false;
function Atualização(){
  var total = 0
  if (valor < 0 ){
    total= 0;
  }
  else{
    total= valor;
  }
  document.getElementById("Total").textContent="R$ " +total;
  document.getElementById("Contador").textContent=contagem;
}
function FunMS() {
  var checkBox = document.getElementById("CheckMS");
  var text = document.getElementById("MS");
  if (checkBox.checked == true){
    text.style.display = "block";
    contagem = contagem + 1;
    valor = valor+12;
  } else {
    text.style.display = "none";
    contagem = contagem - 1;
    valor = valor -12;
  }
  Atualização();
}
function FunMF() {
  checkBox = document.getElementById("CheckMF");
  text = document.getElementById("MF");
  if (checkBox.checked == true){
    text.style.display = "block";
    contagem = contagem + 1;
    valor = valor+8;
  } else {
    text.style.display = "none";
    contagem = contagem - 1;
    valor = valor -8;
  }
  Atualização();
}

function FunAF() {
  var checkBox = document.getElementById("CheckAF");
  var text = document.getElementById("AF");
  if (checkBox.checked == true){
    text.style.display = "block";
    contagem = contagem + 1;
    valor = valor+5;
  } else {
    text.style.display = "none";
    contagem = contagem - 1;
    valor = valor -5;
  }
  Atualização();
         
}
function PromoCode(){
  var botao = document.getElementById("ButtonPC");
  var promo = document.getElementById("PC");
  var txt = document.getElementById("PromoTXT").value;
  var promoccode = txt.toLowerCase()
  if (usado == false){
    if (promoccode == "scheduleit"){
      promo.style.display = "block";
      usado = true;
      valor = valor -5;
    } 
  }
  document.getElementById("PromoTXT").value="";
  Atualização();
}