CREATE TABLE `lord_of_the_table` (
  `GUID` char(36) NOT NULL,
  `TIPO` int(8) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR

CREATE TRIGGER `lord_GUID` BEFORE INSERT ON `lord_of_the_table` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR 

CREATE TABLE `contactos` (
  `GUID` char(36) NOT NULL,
  `NOMBRE` varchar(80) NOT NULL,
  `FOTO` varchar(45) DEFAULT NULL,
  `TIPO` char(36) NOT NULL,
  `CIF` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR 

CREATE TRIGGER `contactos_GUID` BEFORE INSERT ON `contactos` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE TABLE `proyectos` (
  `GUID` char(36) NOT NULL,
  `NOMBRE` varchar(45) NOT NULL,
  `TIPO` char(36) NOT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR


CREATE TRIGGER `proyectos_GUID` BEFORE INSERT ON `proyectos` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;
-- DELIMITADOR


CREATE TABLE `categoria` (
  `GUID` char(36) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `IDPROYECTO` char(36) DEFAULT NULL,
  `IDPADRE` char(36) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
); 

-- DELIMITADOR

CREATE TRIGGER `categoria_GUID` BEFORE INSERT ON `categoria` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;
-- DELIMITADOR


CREATE TABLE `contacto_usuario` (
  `GUID` char(36) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `IDCONTACTO` char(36) NOT NULL,
  `HABILITADO` tinyint(4) NOT NULL,
  `PERMISOS` int(11) NOT NULL,
  `LOSTPASSWORD` varchar(45) DEFAULT NULL,
  `DATELOST` datetime DEFAULT NULL,
  `ULTIMACONEXION` datetime DEFAULT NULL,
  `FOTO` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);


-- DELIMITADOR 

CREATE TRIGGER `contacto_usuario_GUID` BEFORE INSERT ON `contacto_usuario` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE TABLE `claves` (
  `GUID` char(36) NOT NULL,
  `CONTRA` varchar(80) NOT NULL,
  `SEMILLA` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR 


CREATE TABLE `direcciones` (
  `GUID` char(36) NOT NULL,
  `TIPO` int(8) NOT NULL,
  `IDASOCIADO` char(36) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `DIRECCION` varchar(40) NOT NULL,
  `CODPOS` varchar(5) NOT NULL,
  `POBLACION` varchar(40) NOT NULL,
  `PROVINCIA` varchar(40) NOT NULL,
  `IDTIPO` char(36) DEFAULT NULL,
  `IDPAIS` char(2) NOT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR 


CREATE TRIGGER `direcciones_GUID` BEFORE INSERT ON `direcciones` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR


CREATE TABLE `documentos` (
  `GUID` char(36) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `IDPROYECTO` char(36) NOT NULL,
  `IDCATEGORIA` char(36) NOT NULL,
  `DATOS` varchar(10000) NOT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR


CREATE  TRIGGER `documentos_GUID` BEFORE INSERT ON `documentos` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE TABLE `extendido` (
  `GUID` char(36) NOT NULL,
  `IDCONTACTO` char(36) NOT NULL,
  `NOMBRE` varchar(80) NOT NULL,
  `VALOR` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR


CREATE TRIGGER `extendido_GUID` BEFORE INSERT ON `extendido` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END

-- DELIMITADOR

CREATE TABLE `notas` (
  `GUID` char(36) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `IDASOCIADO` char(36) NOT NULL,
  `FECHA` datetime NOT NULL,
  `TEXTO` varchar(15000) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
); 

-- DELIMITADOR


CREATE TRIGGER `notas_GUID` BEFORE INSERT ON `notas` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE TABLE `permisos` (
  `GUID` char(36) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `NIVEL` int(11) NOT NULL,
  `IDASOCIADO` char(36) DEFAULT NULL,
  `IDDOCUMENTO` char(36) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR

CREATE TRIGGER `permisos_GUID` BEFORE INSERT ON `permisos` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE TABLE `telefonos` (
  `GUID` char(36) NOT NULL,
  `TIPO` int(8) NOT NULL,
  `IDASOCIADO` char(36) DEFAULT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `NUMERO` varchar(40) NOT NULL,
  `IDTIPO` char(36) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR

CREATE TRIGGER `telefonos_GUID` BEFORE INSERT ON `telefonos` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END

-- DELIMITADOR


CREATE TABLE `personal` (
  `GUID` char(36) NOT NULL,
  `IDCONTACTO` char(36) DEFAULT NULL,
  `NOMBRE` varchar(60) NOT NULL,
  `TIPO` char(36) DEFAULT NULL,
  `FOTO` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`GUID`)
);

-- DELIMITADOR

CREATE TRIGGER `personal_GUID` BEFORE INSERT ON `personal` FOR EACH ROW
BEGIN
  IF new.GUID IS NULL THEN
    SET new.GUID = uuid();
  END IF;
END;

-- DELIMITADOR

CREATE PROCEDURE `delete_categoria`(id char(36))
BEGIN
  delete from categoria where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_contactos`(id char(36))
BEGIN
  delete from contactos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_contactos_usuarios`(id char(36))
BEGIN
  delete from contacto_usuario where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_direcciones`(id char(36))
BEGIN
  delete from direcciones where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_documentos`(id char(36))
BEGIN
  delete from documentos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_extendido`(id char(36))
BEGIN
  delete from extendido where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_notas`(id char(36))
BEGIN
  delete from notas where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_permisos`(id char(36))
BEGIN
  delete from permisos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_personal`(id char(36))
BEGIN
  delete from personal where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_proyectos`(id char(36))
BEGIN
  delete from proyectos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `delete_telefonos`(id char(36))
BEGIN
  delete from telefonos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_categorias`(nombre varchar(50), idpro char(36), idpa char(36))
BEGIN
    if (idpa = "") then
		insert into categoria (NOMBRE, IDPROYECTO) values(nombre,idpro);
    else 
		insert into categoria (NOMBRE, IDPROYECTO, IDPADRE)values(nombre,idpro,idpa);
    END IF;
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_contacto`(nombre varchar(80), tipoC varchar(40))
BEGIN
insert into contactos (NOMBRE,TIPO,CIF)values(nombre,"f06ccb7e-5ce2-11e8-94d5-f8a9638b2565",cif);   
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_contacto_usuario`(username varchar(100),asociado char(36), habilitado tinyint(4), permisos int(11))
BEGIN
  declare id char(36);
  declare sem1 varchar(3);
  declare sem2 varchar(3);
  declare semi varchar(12);
  declare aux varchar(80);
    
  set sem1 =substring(rand(),-3);
  set sem2 =substring(rand(),-3);
    set id= uuid();
    SET aux = concat(sem1, md5(pass) , sem2);
  set semi = concat(sem1 , sem2);
    
    insert into contacto_usuario (GUID, USERNAME, IDCONTACTO, HABILITADO, PERMISOS) values(id, username, asociado ,habilitado, permisos);
    Insert into claves (GUID, CONTRA,SEMILLA) Values(id,aux,semi);

END;
-- DELIMITADOR
CREATE PROCEDURE `INSERT_DIRECCIONES`(id char(36), nom varchar(40), dire varchar(40), cdp varchar(5), pobla varchar(40), prov varchar(40), pais char(2))
BEGIN
    
    INSERT INTO DIRECCIONES (TIPO,IDASOCIADO,NOMBRE,DIRECCION,CODPOS,POBLACION,PROVINCIA,IDTIPO,IDPAIS) VALUES (2,id,nom,dire,cdp,pobla,prov,'437fe7cb-5d94-11e8-94d5-f8a9638b2565',pais);
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_documentos`(nombre varchar(50), idpro char(36), idca char(36), datos varchar(10000))
BEGIN
    insert into documentos values(nombre,idpro,idca,datos);
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_extendido`(asociado char(36), nombre varchar(80), valor varchar(80))
BEGIN
  insert into extendido(IDASOCIADO, NOMBRE) values(asociado,nombre, valor);
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_lord`(tipo int(8), nombre varchar(40))
BEGIN
  insert into lord_of_the_table (TIPO,NOMBRE)values(tipo,nombre);         
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_notas`(tipo int(11), idasociado char(36), fecha datetime, texto varchar(15000))
BEGIN
    insert into notas (TIPO,IDASOCIADO,FECHA,TEXTO) values(tipo,idasociado,fecha,texto);
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_permisos`(tipo int(11), nivel int(11), id char(36), iddocu char(36))
BEGIN
    insert into permisos(TIPO,NIVEL,IDASOCIADO,IDDOCUMENTO) values(tipo,nivel,id,iddocu);
END;
-- DELIMITADOR
CREATE PROCEDURE `insert_personal`(id char(36), nombre varchar(60), tipo char(36))
BEGIN
    insert into personal(IDASOCIADO,NOMBRE, TIPO) values(id,nombre,tipo);

END;
-- DELIMITADOR
CREATE PROCEDURE `insert_proyectos`(nombre varchar(45), tipo char(36))
BEGIN
    insert into proyectos values(nombre,tipo);
END;
-- DELIMITADOR
CREATE  PROCEDURE `INSERT_TELEFONOS`(tipo int(8), asociado char(36), nom varchar(40), numero varchar(40), tid char(36))
BEGIN
    INSERT INTO TELEFONOS(TIPO,IDASOCIADO ,NOMBRE,NUMERO,IDTIPO) VALUES (3, asociado,nom,numero,'7f3be94c-5d9a-11e8-94d5-f8a9638b2565'); 

END;
-- DELIMITADOR
CREATE PROCEDURE `select_categoria`(id char(36))
BEGIN
  select * from categoria where IDPROYECTO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_categoria_padre`(id char(36))
BEGIN
  select * from categoria where IDPADRE=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_contactos`(id char(36))
BEGIN
  select * from contactos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_contactos_usuarios`(id char(36))
BEGIN
  select * from contacto_usuario where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_direcciones`(id char(36))
BEGIN
  select * from direcciones where IDASOCIADO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_documentos_categoria`(id char(36))
BEGIN
  select * from documentos where IDCATEGORIA=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_documentos_proyecto`(id char(36))
BEGIN
  select * from documentos where IDPROYECTO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_extendido`(id char(36))
BEGIN
  select * from extendido where IDCONTACTO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_lord`(t int(8))
BEGIN
  select * from lord_of_the_table where TIPO=t;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_notas`(id char(36))
BEGIN
  select * from notas where IDASOCIADO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_permisos_documento`(id char(36))
BEGIN
  select * from permisos where IDDOCUMENTO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_permisos_nivel`(per int(11))
BEGIN
  select * from permisos where NIVEL=per;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_permisos_tipo`(tipo int(11))
BEGIN
  select * from permisos where TIPO=tipo;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_permisos_usuario`(id char(36))
BEGIN
  select * from permisos where IDASOCIADO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_personal`(id char(36))
BEGIN
  select * from personal where IDCONTACTO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_proyecto`(id char(36))
BEGIN
  select * from proyectos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_telefonos`(id char(36))
BEGIN
  select * from telefonos where IDASOCIADO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_tipos_proyectos`(id char(36))
BEGIN
  select * from proyectos where TIPO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_usuarios`(id char(36))
BEGIN
  select * from contacto_usuario where IDASOCIADO=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_usuarios_deshab`()
BEGIN
  select * from contacto_usuario where HABILITADO=1;
END;
-- DELIMITADOR
CREATE PROCEDURE `select_usuarios_hab`()
BEGIN
  select * from contacto_usuario where HABILITADO=0;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_categorias`(id char(36), nombre varchar(50))
BEGIN
  update categorias set NOMBRE=nombre where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_contacto_usuario`(id char(36), user varchar(100), permisos int(11))
BEGIN
  update contacto_usuario set USERNAME=user, PERMISOS=permisos where guid=id; 
END;
-- DELIMITADOR
CREATE PROCEDURE `update_contactos`(id char(36), nombre varchar(80), cif varchar(80))
BEGIN

  update contactos set NOMBRE=nombre, CIF=cif where guid=id; 
END;
-- DELIMITADOR
CREATE PROCEDURE `update_direcciones`(id char(36), t int(8), nom varchar(40), dire varchar(40), cdp varchar(5), pobla varchar(40), prov varchar(40))
BEGIN
  update DIRECCIONES set TIPO=t, NOMBRE=nom, DIRECCION=dire, CODPOS=cdp, POBLACION=pobla, PROVINCIA=prov where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_documentos`(id char(36), nombre varchar(50), datos varchar(10000))
BEGIN
  update documentos set NOMBRE=nombre, DATOS=datos where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_extendido`(id char(36), nombre varchar(80), valor varchar(80))
BEGIN
  update extendido set NOMBRE=nombre, VALOR=valor where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_notas`(id char(36), tipo int(11), fecha datetime, texto varchar(15000))
BEGIN
  update notas set TIPO=tipo, FECHA=fecha, TEXTO=texto where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_permisos`(id char(36), tipo int(11), nivel int(11))
BEGIN
  update permisos set TIPO=tipo, NIVEL=nivel where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_personal`(id char(36), nombre varchar(60))
BEGIN
  update personal set NOMBRE=nombre where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_proyectos`(id char(36), nombre varchar(45))
BEGIN
 update proyectos set NOMBRE=nombre where GUID=id;
END;
-- DELIMITADOR
CREATE PROCEDURE `update_telefonos`(id char(36), t int(8), nom varchar(40), num varchar(40))
BEGIN
  update TELEFONOS set TIPO=t, NOMBRE=nom, NUMERO=num where GUID=id;
END;
-- DELIMITADOR
CREATE FUNCTION `deshabilitar_usuario`(id char(36)) RETURNS int(11)
BEGIN
  update contacto_usuario set HABILITADO=1 where GUID=id;
RETURN 1;
END;
-- DELIMITADOR
CREATE FUNCTION `habilitar_usuario`(id char(36)) RETURNS int(11)
BEGIN
  update contacto_usuario set HABILITADO=0 where GUID=id;
    
RETURN 1;
END;