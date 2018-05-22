$("#id_saveperfil").click(function() {
    alert("Handler for .click() called.");
    var nombre = document.getElementById("idnombre").value;
    var nombreUsu = document.getElementById("nombreUsu").value;

    var usu = '<?php echo "Hola"; ?>';
    document.write("Usuario-->" + usu);

    var save = "update usuarios set nombre='" + nombre + "' where username='blanes@gmail.com';";
    var conex = "mysqli_query($conexion,$comprobacion)";
    var cont = "mysqli_num_rows(" + conex + ")";

});