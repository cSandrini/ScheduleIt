
function agendar(idSala, idUsuario, dataDia, horario) {
    let data = {idSala : idSala, idUsuario : idUsuario, dataDia : dataDia, horario : horario};

    fetch("agendaController.php", {
    method: "POST",
    headers: {"Content-Type": "application/json; charset=UTF-8"}, 
    body: JSON.stringify(data)
    }).then(res => {
        location.reload();
    });
}
