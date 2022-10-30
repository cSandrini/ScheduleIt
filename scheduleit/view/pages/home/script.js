function redirectSala(idSala) {
    window.location.href = "../sala/sala.php?idSala="+idSala;
}

function fixar() {
    let v = document.getElementById('salaFixa');
    if (v.innerHTML == "<i class=\"bi bi-pin-angle\"></i>") {
        v.innerHTML = "<i class='bi bi-pin-angle-fill'></i>";
    } else {
        v.innerHTML = "<i class='bi bi-pin-angle'></i>";
    }
}