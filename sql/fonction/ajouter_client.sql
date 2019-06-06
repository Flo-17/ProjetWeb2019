  DECLARE f_nom ALIAS FOR $1;
  DECLARE f_prenom ALIAS FOR $2;
  DECLARE f_cp ALIAS FOR $3;
  DECLARE f_localite ALIAS FOR $4;
  DECLARE f_rue ALIAS FOR $5;
  DECLARE f_num ALIAS FOR $6;
  DECLARE f_tel ALIAS FOR $7;
  DECLARE f_email ALIAS FOR $8;
  DECLARE f_password ALIAS FOR $9;
  DECLARE id integer;
  DECLARE retour integer;
  
BEGIN
  SELECT idclient into id FROM api_client WHERE email = f_email and password = f_password;
  IF NOT FOUND
  THEN
    retour=-1;
	insert into api_client(nom,prenom,cp,localite,rue,num,tel,email,password) values 
	(f_nom,f_prenom,f_cp,f_localite,f_rue,f_num,f_tel,f_email,f_password);
	SELECT idclient into id FROM api_client WHERE email = f_email and password = f_password;
	IF NOT FOUND
	THEN
	  retour=0;
	ELSE
	  retour=1;
	END IF;
  ELSE
    retour=2;
  END IF;
    
  
  return retour; 
  END; 
