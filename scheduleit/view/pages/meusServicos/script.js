function visitar(idSala) {
    window.location.href = "/sala/"+idSala;
}

function largar(idSala, idUsuario) {
    window.location.href = "/removerFuncionario/"+idSala+"/"+idUsuario;
}
