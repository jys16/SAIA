<?php 
	class UserDao{
		
		protected $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		# Registrar o Crear User
		public function createUserDao($userDto){
			try {
				// Crear la Consulta
				$sql = 'CALL pa_registrar_usuario (
							:documento,
							:apellidos,
							:nombres,							
							:email,
							:pass,
							:telefono,
							:foto,
							:id_rol
						)';
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

		/*
		# Obtener IdUser
		public function getById($idUser){
			try {
				# Consulta
				$sql = "SELECT * FROM UserES WHERE codigo_User=:idUser";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('idUser', $idUser);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$UserDb = $dbh->fetch();
				# Crear el objeto del modelo
				$User = new UserDto(
					$UserDb['codigo_User'],
					$UserDb['nombre_User'],					
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
				$sql = 'UPDATE UserES SET
							codigo_User = :idUser,
							nombre_User = :nombreUser
						WHERE codigo_User = :idUser';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('idUser', $userDto->getCodigoUser());			
				$dbh->bindValue('nombreUser', $userDto->getNombreUser());

				// Ejecutar la consulta
				$dbh->execute();
                
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un User
		public function deleteUserDao($idUser){
			try {
				$sql = 'DELETE FROM UserES WHERE codigo_User = :idUser';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('idUser', $idUser);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		*/
	}
?>