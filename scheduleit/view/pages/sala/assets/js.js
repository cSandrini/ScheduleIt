function cidades() {
    var combo = document.getElementById("combom");
    var func1 = document.getElementById("beto");
    var func2 = document.getElementById("joao");
    var func3 = document.getElementById("rafael");
    var inicio = document.getElementById("inicio");
    inicio.style.display="none";
    if(combo.selectedIndex == 1){
        func1.style.display="block";
    }
    else{
        func1.style.display="none";
    }
    if(combo.selectedIndex == 2){
        func2.style.display="block";
        func3.style.display="block";
    }
    else{
        func2.style.display="none";
        func3.style.display="none";
    }
  }