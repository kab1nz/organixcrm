$(".menu li").click(function() {
    var use = "<?php use" + this.id + "; ?>";
});
$(".dropdown").hover(
    function() {
        var use1 = "<?php use" + "empresa" + this.id + "; ?>";
        $(this).append($("<span>" + use1 + "</span>"));
    }
);
$("#id_saveperfil").click(function() {
    var nombre = document.getElementById("idnombre").value;
    var save = "update usuarios set nombre='" + nombre + "' where username='<?php $_SESSION['usuario']'";
    var conex = "mysqli_query($conexion,$comprobacion)";
    var cont = "mysqli_num_rows(" + conex + ")";
});