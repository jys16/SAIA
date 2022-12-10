
DELIMITER $$
CREATE PROCEDURE pa_registrar_usuario(
    IN documento VARCHAR(30),
	IN apellidos VARCHAR(100),
    IN nombres VARCHAR(100),
    IN email VARCHAR(80),
    IN pass VARCHAR(50),
    IN telefono VARCHAR(25),
    IN foto LONGBLOB,
    IN id_rol INT(10)
	)
BEGIN
    INSERT INTO usuarios VALUES (documento, apellidos, nombres, email, pass, telefono, foto, id_rol); 
END$$ 
DELIMITER

