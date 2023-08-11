
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

DELIMITER $$
CREATE PROCEDURE pa_registrar_proveedor(
    IN nit VARCHAR(50),
	IN nombre VARCHAR(50),
    IN direccion VARCHAR(80),
    IN email VARCHAR(100),
    IN telefono VARCHAR(50)
	)
BEGIN
    INSERT INTO proveedores VALUES (nit, nombre, direccion, email, telefono); 
END$$ 

DELIMITER $$
CREATE PROCEDURE pa_registrar_factura_compra(
    IN codigo_factura VARCHAR(15),
	IN fecha DATE,
    IN factura LONGBLOB,
    IN Valor DOUBLE,
    IN nit_proveedor VARCHAR(50)
	)
BEGIN
    INSERT INTO facturas_de_compra VALUES (codigo_factura, fecha, factura, Valor, nit_proveedor); 
END$$ 

DELIMITER $$
CREATE PROCEDURE pa_registrar_clientes(
    IN documento VARCHAR(30),
    IN nombres VARCHAR(100),
	IN apellidos VARCHAR(100),
    IN email VARCHAR(80),
    IN direccion VARCHAR(50),
    IN telefono VARCHAR(25)
	)
BEGIN
    INSERT INTO clientes (documento, nombres, apellidos, email, direccion, telefono)
    VALUES (documento, nombres, apellidos, email, direccion, telefono);
END$$