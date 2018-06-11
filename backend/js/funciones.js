//-----------------------------------------------------------------------------------------------------------------   
function valida_enviaContactos() {
    if ((document.form.nombreContacto.value == "") || (document.form.nombreContacto.value == " ")) {
        alert("Por favor indique Su Nombre");
        document.form.nombreContacto.focus();
        return 0;
    }

    if (document.form.nifContacto.value == "" || document.form.nifContacto.value == " ") {
        alert("Por favor indica su NIF");
        document.form.nifContacto.focus();
        return 0;
    }

    if (document.form.direccionContacto.value == "" || document.form.direccionContacto.value == " ") {
        alert("Por favor indica su Direccion");
        document.form.direccionContacto.focus();
        return 0;
    }

    if (document.form.ciudadContacto.value == "" || document.form.ciudadContacto.value == " ") {
        alert("Por favor indique Su Ciudad");
        document.form.ciudadContacto.focus();
        return 0;
    }


    if (document.form.telefonoContacto.value == "" || document.form.telefonoContacto.value == " ") {
        alert("Por favor indica un Telefono");
        document.form.telefonoContacto.focus();
        return 0;
    }

    if (document.form.postalContacto.value == "" || document.form.postalContacto.value == " ") {
        alert("Por favor indica un Codigo Postal");
        document.form.postalContacto.focus();
        return 0;
    }

    if (document.form.provinciaContacto.value == "" || document.form.provinciaContacto.value == " ") {
        alert("Por favor indica una Provincia");
        document.form.provinciaContacto.focus();
        return 0;
    }

    if (document.form.pais.value == "") {
        alert("Por favor indica un Pais");
        document.form.pais.focus();
        return 0;
    }


    alert("Contacto Añadido");
    document.form.submit();
    return true;

}
//--------------------------------------------------------------------------------------------------------------------------------
function valida_enviaEmpresas() {
    if ((document.form.nombreEmpresa.value == "") || (document.form.nombreEmpresa.value == " ")) {
        alert("Por favor indique Su Nombre");
        document.form.nombreEmpresa.focus();
        return 0;
    }

    if (document.form.nifEmpresa.value == "" || document.form.nifEmpresa.value == " ") {
        alert("Por favor indica su NIF");
        document.form.nifEmpresa.focus();
        return 0;
    }

    if (document.form.direccionEmpresa.value == "" || document.form.direccionEmpresa.value == " ") {
        alert("Por favor indica su Direccion");
        document.form.direccionEmpresa.focus();
        return 0;
    }

    if (document.form.ciudadEmpresa.value == "" || document.form.ciudadEmpresa.value == " ") {
        alert("Por favor indique Su Ciudad");
        document.form.ciudadEmpresa.focus();
        return 0;
    }



    if (document.form.provinciaEmpresa.value == "" || document.form.provinciaEmpresa.value == " ") {
        alert("Por favor indica una Provincia");
        document.form.provinciaEmpresa.focus();
        return 0;
    }

    if (document.form.postalEmpresa.value == "" || document.form.postalEmpresa.value == " ") {
        alert("Por favor indica un Codigo Postal");
        document.form.postalEmpresa.focus();
        return 0;
    }

    if (document.form.telefonoEmpresa.value == "" || document.form.telefonoEmpresa.value == " ") {
        alert("Por favor indica un Telefono");
        document.form.telefonoEmpresa.focus();
        return 0;
    }

    if (document.form.paisEmpresa.value == "") {
        alert("Por favor indica un Pais");
        document.form.paisEmpresa.focus();
        return 0;
    }


    //alert("Direccion Añadida");
    document.form.submit();
    return true;

}

function validaDocumento() {
    if (document.form.nombreDocumento.value == "") {
        document.form.nombreDocumento.focus();
        return 0;
    } else {
        document.form.submit();
        return true;
    }
}
//----------------------------------------------------------------------------------------------------------------------------------