
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