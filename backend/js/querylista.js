$(".dropdown-menu .menu li").click(function() {
    var url = this.value.toString();
    var aux = this.id;    
    window.location = url + '?bim=' +aux;

});