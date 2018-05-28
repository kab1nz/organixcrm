$(".dropdown-menu .menu li").click(function() {
    var aux = this.id;    
    window.location = 'http://localhost/organixcrm/backend/index_backend.php?bim=' +aux;

});