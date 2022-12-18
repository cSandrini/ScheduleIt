function redirectSala(idSala) {
    window.location.href = "/sala/"+idSala;
}

function fixar(element) {
    if (element.innerHTML == "<i class=\"bi bi-pin-angle\"></i>") {
        element.innerHTML = "<i class='bi bi-pin-angle-fill'></i>";
    } else {
        element.innerHTML = "<i class='bi bi-pin-angle'></i>";
    }
}