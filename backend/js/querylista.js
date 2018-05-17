$(".menu li").click(function() {
    var use = "<?php use" + this.id + "; ?>";
    alert('Clicked list. ' + this.id);
});
$(".dropdown").hover(
    function() {
        var use = "<?php use" + "empresa" + this.id + "; ?>";

        $(this).append($("<span>" + use + "</span>"));
    },
    function() {
        //   $(this).find("span:last").remove();
    }
);