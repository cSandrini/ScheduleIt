function adicionarf(){
  var Add = document.getElementById("codigod");
    Add.style.display = "flex";
  }
  function validarf(){
    var Add = document.getElementById("codigod");
    var Text = document.getElementById("codigo").value;
    var Fun1 = document.getElementById("func1");
    var Fun2 = document.getElementById("func2");
    if (Text == "123"){
      Fun1.style.display = "block";
      }
      if (Text == "000"){
        Fun2.style.display = "block";
        }
      Add.style.display = "none";
      document.getElementById("codigo").value="";
    }