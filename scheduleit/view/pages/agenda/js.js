function post(idFuncionario, idUsuario, dataDMA, idHorario, type) {
    let data = [{idFuncionario : idFuncionario, idUsuario : idUsuario, dataDMA : dataDMA, idHorario : idHorario, type : type}];

    fetch("agendaController.php", {
    method: "POST",
    headers: {"Content-Type": "application/json; charset=UTF-8"}, 
    body: JSON.stringify(data)
    }).then(res => {
        location.reload();
    });
}