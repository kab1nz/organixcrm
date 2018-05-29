$(".dropdown-menu .menu li").click(function() {
    var aux = this.id;    
    window.location = 'http://localhost/organixcrm/backend/index_contactos.php?bim=' +aux;

});

$("#btngestionar").click(function() {
        document.location.href = "http://localhost/organixcrm/backend/index_gestionarempresa.php";

});
