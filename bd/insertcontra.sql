CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_contrasenas`(id char(36),tipe int(8), pass varchar(80))
BEGIN

			declare sem1 varchar(3);
			declare sem2 varchar(3);
			declare semi varchar(12);
    
			declare aux varchar(80);

    
			set sem1 =substring(rand(),-3);
			set sem2 =substring(rand(),-3);

			SET aux = concat(sem1, md5(pass) , sem2);
			set semi = concat(sem1 , sem2);

			Insert into CONTRASENAS (GUID,TIPO, CONTRA,SEMILLA) Values(id,tipe,aux,semi);

END