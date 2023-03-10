<?php 
	class CategoryDao{
		private $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		# Registrar o Crear Categoria.
		public function createCategory($categoryDto){
			try {
				// Crear la Consulta
				$sql = 'INSERT INTO categorias VALUES (
							:idCategoria,
							:nombreCategoria
						)';
				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);
				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('idCategoria',$categoryDto->getCodigoCategoria());			
				$dbh->bindValue('nombreCategoria',$categoryDto->getNombreCategoria());
				// Ejecutar la consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}

		# Consultar Categorias
		public function readCategoryDao(){
			try {
				// Crear un Arreglo Vacío
				$categoryList = [];
				// Asignar una consulta al atributo $sql
				$sql = 'SELECT * FROM categorias';
				// Creamos las variable $dbh y le asignamos la conexión y la consulta $sql
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $category) {
					$categoryList[] = new CategoryDto(
						$category['id'],
						$category['Nombre']						
					);
				}
				return $categoryList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		# Obtener IdRol
		public function getById($idRol){
			try {
				# Consulta
				$sql = "SELECT * FROM ROLES WHERE id=:idRol";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('idRol', $idRol);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$rolDb = $dbh->fetch();
				# Crear el objeto del modelo
				$rol = new RolDto(
					$rolDb['id'],
					$rolDb['Nombre'],					
				);
				return $rol;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		# Actualizar un Rol
        public function updateRolDao($userDto){
            try {
				// Crear la Consulta
				$sql = 'UPDATE ROLES SET
							id = :idRol,
							Nombre = :nombreRol
						WHERE id = :idRol';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('idRol', $userDto->getCodigoRol());			
				$dbh->bindValue('nombreRol', $userDto->getNombreRol());

				// Ejecutar la consulta
				$dbh->execute();
                
			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un Rol
		public function deleteRolDao($idRol){
			try {
				$sql = 'DELETE FROM ROLES WHERE id = :idRol';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('idRol', $idRol);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		
	}
?>