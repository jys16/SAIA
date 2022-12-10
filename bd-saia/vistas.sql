CREATE VIEW vw_usuarios
AS SELECT * FROM roles
INNER JOIN usuarios ON roles.id = usuarios.id_rol;