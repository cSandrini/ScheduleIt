$('document').ready(function () {
    $("#imgLogo").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function redirectAgenda(idFuncionario) {
    window.location.href = "../agenda/agenda.php?id="+idFuncionario;
}