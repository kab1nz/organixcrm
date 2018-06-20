$(".dropdown-menu .menu li").click(function() {
    var aux = this.id;
    window.location = 'http://localhost/organixcrm/backend/index_contactos.php?bim=' + aux;

});
$("#volver").click(function() {
    window.location = 'http://localhost/organixcrm/backend/index_backend.php';
});

$("#volverpro").click(function() {
    window.location = 'http://localhost/organixcrm/backend/index_proyectos.php';
});
$("#volvercat").click(function() {
    window.location = 'http://localhost/organixcrm/backend/index_categorias.php';
});
$("#volverdoc").click(function() {
    window.location = 'http://localhost/organixcrm/backend/index_documentos.php';
});