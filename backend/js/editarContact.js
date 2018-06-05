$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    var aux;
    $(".tablaperfil .col-md-4").on("click", funcVerificar);
}

function funcVerificar() {
    aux = this.id;
    alert("El id -->" + aux);
    $.get("index_editar_contactos.php?usuario=" + aux, function(data) {
        alert("Respuesta del servidor -->" + data);
    });
}