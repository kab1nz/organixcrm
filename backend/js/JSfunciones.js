$('#bajaEmpresa').click(function(event){
    
    var bandera = true;
    var move = false;
    var nombre_checkbox ="checkEmpresa_";
    var aux = [];
     $("input:checkbox[name^='"+nombre_checkbox+"']").each(function(index,e){ // Al menos un checkbox en true

    
         var $this = $(this);
         
            if($this.is(":checked")){
                bandera=false;
                var g = $this.attr("value");
                var guid = $this.attr("id");
                    event.preventDefault();
                    if (confirm("¿Realmente desea dar de baja esta empresa " + g + "?")){
                            aux.push(guid);
                            move = true;
                    }
            }
            
        });
    
        
        if(bandera){
            alert("Selecciona una empresa");
            bandera=true;
        }
    
        if(move){
            window.location = 'http://localhost/organixcrm/backend/index_gestionarempresa.php?bim=' +aux;
        }
    
    
    
    

});