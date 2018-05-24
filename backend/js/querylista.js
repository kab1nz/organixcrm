<<<<<<< HEAD
$(".dropdown-menu .menu li").click(function() {
    var use = "<?php use empresa" + this.id + "; ?>";
    alert("esto es una prueba");
});
=======

$("#menu li").click(function() {
    var use = "<?php use" + this.id + "; ?>";
    alert('Clicked list. ' + this.id);
});

$("#liEmpresa").hover(
    function() {
        $(this).append($("<span>" + "</span>"));
    },
    function() {
        $(this).find("span:last").remove();

$(".menu li").click(function() {
    var use = "<?php use" + this.id + "; ?>";
});
        
$(".dropdown").hover(
    function() {
        var use1 = "<?php use" + "empresa" + this.id + "; ?>";
        $(this).append($("<span>" + use1 + "</span>"));

    }
);
>>>>>>> 301a1ca71ff9e4bb261b0d0a3e6a5238d57a94ad
