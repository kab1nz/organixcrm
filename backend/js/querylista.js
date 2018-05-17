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
    }
);