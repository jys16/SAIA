<?php 
	class SuppliesDao{
		
		protected $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		# Registrar o Crear Insumo
		public function createSuppliesDao($suppliesDto){
			try {
				// Crear la Consulta
				$sql = 'CALL pa_registrar_insumo (
							:codigo,
							:nombre,
							:marca,							
							:referencia,
							:tipo,
							:numero_factura,
							:id_estado_producto,
							:id_categoria
                            :documento_usuario
						)';
                // Hasta aquí llegue hay que realizar el procedimiento almacenado a la base de datos,revisar tabla estados para crear un foreach
				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);
				// Vincular los datos del objeto a la consulta de Inserción			
				$dbh->bindValue('documento',$userDto->getDocumento());
				$dbh->bindValue('apellidos',$userDto->getApellidosUser());
				$dbh->bindValue('nombres',$userDto->getNombresUser());
				$dbh->bindValue('email',$userDto->getCorreoUser());
				$dbh->bindValue('pass',$userDto->getPass());
				$dbh->bindValue('telefono',$userDto->getTelefono());
				$dbh->bindValue('foto',$userDto->getFoto());
				$dbh->bindValue('id_rol',$userDto->getIdRol());
				// Ejecutar la consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		
		# Consultar Usuarios
		public function readUserDao(){
			try {
				// Crear un Arreglo Vacío
				$userList = [];
				// Asignar una consulta al atributo $sql
				$sql = 'SELECT * FROM VW_USUARIOS;';
				// Creamos las variable $dbh y le asignamos la conexión y la consulta $sql
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new UserDto(
						$user['documento'],
						$user['apellidos'],
						$user['nombres'],
						$user['email'],
						$user['pass'],
						$user['telefono'],
						$user['foto'],
						$user['id_rol']
						
					);
				}
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		
		# Obtener Documento
		public function getById($documento){
			try {
				# Consulta
				$sql = "SELECT * FROM usuarios WHERE documento=:documento";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('documento', $documento);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$UserDb = $dbh->fetch();
				# Crear el objeto del modelo
				$User = new UserDto(
					$UserDb['documento'],
					$UserDb['apellidos'],
					$UserDb['nombres'],
					$UserDb['email'],
					$UserDb['pass'],
					$UserDb['telefono'],
					$UserDb['foto'],
					$UserDb['id_rol'],					
				);
				return $User;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}


		# Actualizar un User
        public function updateUserDao($userDto){
            try {
				// Crear la Consulta
				$sql = 'UPDATE usuarios SET
							documento = :documento,
							apellidos = :apellidos,
							nombres = :nombres,
							email = :email,
							pass = :pass,
							telefono = :telefono,
							foto = :foto,
							id_rol = :id_rol

						WHERE documento = :documento';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('documento', $userDto->getDocumento());			
				$dbh->bindValue('apellidos', $userDto->getApellidosUser());
				$dbh->bindValue('nombres', $userDto->getNombresUser());			
				$dbh->bindValue('email', $userDto->getCorreoUser());
				$dbh->bindValue('pass', $userDto->getPass());			
				$dbh->bindValue('telefono', $userDto->getTelefono());
				$dbh->bindValue('foto', $userDto->getFoto());			
				$dbh->bindValue('id_rol', $userDto->getIdRol());
				// Ejecutar la consulta
				$dbh->execute();
                
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un User
		public function deleteUserDao($documento){
			try {
				$sql = 'DELETE FROM usuarios WHERE documento = :documento';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('documento', $documento);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>