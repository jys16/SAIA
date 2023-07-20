
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

DELIMITER $$
CREATE PROCEDURE pa_registrar_insumo(
    IN codigo VARCHAR(10),
	IN nombre VARCHAR(100),
    IN marca VARCHAR(100),
    IN referencia VARCHAR(50),
    IN tipo VARCHAR(50),
    IN numero_factura VARCHAR(15),
    IN id_estado_producto INT(10),
    IN id_categoria INT(10),
    IN documento_usuario VARCHAR(30)
	)
BEGIN
    INSERT INTO productos VALUES (codigo, nombre, marca, referencia, tipo, numero_factura, id_estado_producto, id_categoria, documento_usuario); 
END$$ 
DELIMITER