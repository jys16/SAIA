CREATE VIEW vw_usuarios
AS SELECT * FROM roles
INNER JOIN usuarios ON roles.id = usuarios.id_rol;

CREATE VIEW vw_productos
AS SELECT * FROM productos;

CREATE VIEW vw_proveedores
AS SELECT * FROM proveedores;

CREATE VIEW vw_facturas_de_compra
AS SELECT * FROM facturas_de_compra;

CREATE VIEW vw_clientes
AS SELECT * FROM clientes;