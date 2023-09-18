CREATE VIEW vw_usuarios
AS SELECT * FROM roles
INNER JOIN usuarios ON roles.id = usuarios.id_rol;

CREATE VIEW vw_productos
AS SELECT 

productos.codigo,
productos.nombre,
productos.marca,
productos.referencia,
productos.tipo,
productos.numero_factura,
productos.id_estado_producto,
productos.id_categoria,
productos.documento_usuario,
categorias.id,
categorias.nombre AS nombre_categoria,
estados_del_producto.id AS id_estado,
estados_del_producto.nombre AS nombre_estado,
usuarios.documento,
usuarios.apellidos,
usuarios.nombres

FROM productos
INNER JOIN categorias ON productos.id_categoria = categorias.id
INNER JOIN estados_del_producto ON productos.id_estado_producto = estados_del_producto.id
INNER JOIN usuarios ON productos.documento_usuario = usuarios.documento;


CREATE VIEW vw_proveedores
AS SELECT * FROM proveedores;

CREATE VIEW vw_facturas_de_compra
AS SELECT * FROM facturas_de_compra;

CREATE VIEW vw_clientes
AS SELECT * FROM clientes;

CREATE VIEW vw_estados_del_producto
AS SELECT * FROM estados_del_producto;