$(".menu li").click(function() {
    var use = "<?php use" + this.id + "; ?>";
});
$(".dropdown").hover(
    function() {
        var use1 = "<?php use" + "empresa" + this.id + "; ?>";
        $(this).append($("<span>" + use1 + "</span>"));
    }
);