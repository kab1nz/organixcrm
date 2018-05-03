CREATE DEFINER=`root`@`localhost` PROCEDURE `copiar_fk`(nombreBD int(11))
BEGIN
         -- FOREIGN KEY CATEGORIA
 
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`categoria`ADD CONSTRAINT `categoria_categoria` 
                      FOREIGN KEY (`IDPADRE`)
                      REFERENCES `empresa',nombreBD,'`.`categoria` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`categoria`ADD CONSTRAINT `categoria_proyectos` 
                      FOREIGN KEY (`IDPROYECTO`)
                      REFERENCES `empresa',nombreBD,'`.`proyectos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent; 
                
        -- FOREIGN KEY CLAVE
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`claves`ADD CONSTRAINT `claves_contacto_usuario` 
                      FOREIGN KEY (`GUID`)
                      REFERENCES `empresa',nombreBD,'`.`contacto_usuario` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
                
        -- FOREIGN KEY CONTACTO_USUARIO
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`contacto_usuario`ADD CONSTRAINT `contacto_usuario_contactos` 
                      FOREIGN KEY (`IDCONTACTO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent; 
 -- FOREIGN KEY CONTACTOS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`contactos`ADD CONSTRAINT `contactos_lott` 
                      FOREIGN KEY (`TIPO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
       -- FOREIGN KEY DIRECCIONES
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`direcciones`ADD CONSTRAINT `direcciones_contacto` 
                      FOREIGN KEY (`IDASOCIADO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
                
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`direcciones`ADD CONSTRAINT `direcciones_lord` 
                      FOREIGN KEY (`IDTIPO`)
                      REFERENCES `empresa',nombreBD,'`.`lord_of_the_table` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;             
                
    
    SET @snt =concat('ALTER TABLE `empresa',nombreBD,'`.`direcciones` ADD INDEX `direcciones_paises_empresa',nombreBD,'` (`IDPAIS` ASC);');
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`direcciones`ADD CONSTRAINT `direcciones_paises` 
                      FOREIGN KEY (`IDPAIS`)
                      REFERENCES `comun`.`paises` (`CODIGOISO`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;              

    -- FOREIGN KEY DOCUMENTOS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`documentos`ADD CONSTRAINT `documentos_proyectos` 
                      FOREIGN KEY (`IDPROYECTO`)
                      REFERENCES `empresa',nombreBD,'`.`proyectos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`documentos`ADD CONSTRAINT `documentos_categoria` 
                      FOREIGN KEY (`IDCATEGORIA`)
                      REFERENCES `empresa',nombreBD,'`.`categoria` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;   
      -- FOREIGN KEY EXTENDIDO
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`extendido`ADD CONSTRAINT `extendido_contactos` 
                      FOREIGN KEY (`IDCONTACTO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                
                
                
       -- FOREIGN KEY NOTAS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`notas`ADD CONSTRAINT `notas_contactos` 
                      FOREIGN KEY (`IDASOCIADO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent; 
                
       -- FOREIGN KEY PERMISOS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`permisos`ADD CONSTRAINT `contactos_permisos` 
                      FOREIGN KEY (`IDASOCIADO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                 
                
     SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`permisos`ADD CONSTRAINT `contactos_documentos` 
                      FOREIGN KEY (`IDDOCUMENTO`)
                      REFERENCES `empresa',nombreBD,'`.`documentos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;               
                
                
          -- FOREIGN KEY PERSONAL
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`personal`ADD CONSTRAINT `personal_contactos` 
                      FOREIGN KEY (`IDCONTACTO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`personal`ADD CONSTRAINT `personal_direcciones` 
                      FOREIGN KEY (`IDCONTACTO`)
                      REFERENCES `empresa',nombreBD,'`.`direcciones` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent; 
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`personal`ADD CONSTRAINT `personal_telefonos` 
                      FOREIGN KEY (`IDCONTACTO`)
                      REFERENCES `empresa',nombreBD,'`.`telefonos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                              
                
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`personal`ADD CONSTRAINT `personal_lord` 
                      FOREIGN KEY (`TIPO`)
                      REFERENCES `empresa',nombreBD,'`.`lord_of_the_table` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;                
                
                
           -- FOREIGN KEY PROYECTOS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`proyectos`ADD CONSTRAINT `proyectos_lord` 
                      FOREIGN KEY (`TIPO`)
                      REFERENCES `empresa',nombreBD,'`.`lord_of_the_table` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;
                
               -- FOREIGN KEY TELEFONOS
    
    SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`telefonos`ADD CONSTRAINT `telefonos_contactos` 
                      FOREIGN KEY (`IDASOCIADO`)
                      REFERENCES `empresa',nombreBD,'`.`contactos` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent; 
                
        SET @snt = CONCAT('ALTER TABLE `empresa',nombreBD,'`.`telefonos`ADD CONSTRAINT `telefonos_lord` 
                      FOREIGN KEY (`IDTIPO`)
                      REFERENCES `empresa',nombreBD,'`.`lord_of_the_table` (`GUID`)
                      ON DELETE NO ACTION
                      ON UPDATE NO ACTION;');   
                PREPARE sent FROM @snt;
                EXECUTE sent;
                DEALLOCATE PREPARE sent;            
END