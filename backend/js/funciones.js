//-----------------------------------------------------------------------------------------------------------------   
function valida_envia(){
            if((document.form.nombreContacto.value == "") || (document.form.nombreContacto.value == " ")) {
                alert("Por favor indique Su Nombre");
                document.form.nombreContacto.focus();
                return 0;
            }

            if(document.form.nifContacto.value == "" || document.form.nifContacto.value == " ") {
                alert("Por favor indica su NIF");
                document.form.nifContacto.focus();
                return 0;
            }    
                
            if(document.form.direccionContacto.value == "" || document.form.direccionContacto.value == " ") {
                alert("Por favor indica su Direccion");
                document.form.direccionContacto.focus();
                return 0;
            }                 
                
            if(document.form.ciudadContacto.value == "" || document.form.ciudadContacto.value == " ") {
                alert("Por favor indique Su Ciudad");
                document.form.ciudadContacto.focus();
                return 0;
            }

         
            if(document.form.telefonoContacto.value == "" || document.form.telefonoContacto.value == " ") {
                alert("Por favor indica un Telefono");
                document.form.telefonoContacto.focus();
                return 0;
            }     
                
            if(document.form.postalContacto.value == "" || document.form.postalContacto.value == " ") {
                alert("Por favor indica un Codigo Postal");
                document.form.postalContacto.focus();
                return 0;
            }                
            
            if(document.form.provinciaContacto.value == "" || document.form.provinciaContacto.value == " ") {
                alert("Por favor indica una Provincia");
                document.form.provinciaContacto.focus();
                return 0;
            }
                
            if(document.form.pais.value == "") {
                alert("Por favor indica un Pais");
                document.form.pais.focus();
                return 0;
            }     
                
                
                alert("Contacto Añadido");
                document.form.submit(); 
                return true;

}
//--------------------------------------------------------------------------------------------------------------------------------