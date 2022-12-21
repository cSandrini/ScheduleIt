function redirect(dataDMA, idFuncionario) {
    window.location.href = "/agenda/"+idFuncionario+"/"+dataDMA;
}

function ignorar(idUsuario, idSala) {
    window.location.href = "/ignorar/"+idUsuario+"/"+idSala;
}

function aceitar(idUsuario, idSala) {
    window.location.href = "/aceitar/"+idUsuario+"/"+idSala;
}