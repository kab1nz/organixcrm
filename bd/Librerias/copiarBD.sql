CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_BDEMPRESA`(nombreBD int(11))
BEGIN
	
    SET @snt = CONCAT('Create DATABASE EMPRESA' ,nombreBD,';');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
    
    
    SET @snt = concat('create table empresa',nombreBD,'.contactos like esqueleto.contactos;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
                      
    SET @snt = concat('create table empresa',nombreBD,'.lord_of_the_table like esqueleto.lord_of_the_table;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;                   
                      
    SET @snt = concat('create table empresa',nombreBD,'.contacto_usuario like esqueleto.contacto_usuario;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;                  
        
      
    SET @snt = concat('create table empresa',nombreBD,'.claves like esqueleto.claves;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;

    SET @snt = concat('create table empresa',nombreBD,'.extendido like esqueleto.extendido;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;

    SET @snt = concat('create table empresa',nombreBD,'.notas like esqueleto.notas;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
                      
    SET @snt = concat('create table empresa',nombreBD,'.direcciones like esqueleto.direcciones;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent; 
                      
    SET @snt = concat('create table empresa',nombreBD,'.telefonos like esqueleto.telefonos;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent; 
                      
    SET @snt = concat('create table empresa',nombreBD,'.personal like esqueleto.personal;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
                      
    SET @snt = concat('create table empresa',nombreBD,'.proyectos like esqueleto.proyectos;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
                      
    SET @snt = concat('create table empresa',nombreBD,'.categoria like esqueleto.categoria;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;
                      
    SET @snt = concat('create table empresa',nombreBD,'.permisos like esqueleto.permisos;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent; 
                      
    SET @snt = concat('create table empresa',nombreBD,'.documentos like esqueleto.documentos;');
                      PREPARE sent FROM @snt;
                      EXECUTE sent;
                      DEALLOCATE PREPARE sent;

	call copiar_fk(nombreBD);
END