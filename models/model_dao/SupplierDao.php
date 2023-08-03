<?php 
	class SupplierDao{
		
		protected $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		# Registrar o Crear Proveedor
		public function createSupplierDao($supplierDto){
			try {
				// Crear la Consulta
				$sql = 'CALL pa_registrar_proveedor (
							:nit,
							:nombre,
							:direccion,							
							:email,
							:telefono
						)';
				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);
				// Vincular los datos del objeto a la consulta de Inserción			
				$dbh->bindValue('nit',$supplierDto->getNit());
				$dbh->bindValue('nombre',$supplierDto->getNombreSupplier());
				$dbh->bindValue('direccion',$supplierDto->getDireccionSupplier());
				$dbh->bindValue('email',$supplierDto->getCorreoSupplier());
				$dbh->bindValue('telefono',$supplierDto->getTelefonoSupplier());
				// Ejecutar la consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		
		# Consultar Usuarios
		public function readSupplierDao(){
			try {
				// Crear un Arreglo Vacío
				$SupplierList = [];
				// Asignar una consulta al atributo $sql
				$sql = 'SELECT * FROM VW_PROVEEDORES;';
				// Creamos las variable $dbh y le asignamos la conexión y la consulta $sql
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $supplier) {
					$supplierList[] = new SupplierDto(
						$supplier['nit'],
						$supplier['nombre'],
						$supplier['direccion'],
						$supplier['email'],
						$supplier['telefono']
						
					);
				}
				return $supplierList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		
		# Obtener Nit
		public function getById($nit){
			try {
				# Consulta
				$sql = "SELECT * FROM proveedores WHERE nit=:nit";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('nit', $nit);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$SupplierDb = $dbh->fetch();
				# Crear el objeto del modelo
				$Supplier = new SupplierDto(
					$SupplierDb['nit'],
					$SupplierDb['nombre'],
					$SupplierDb['direccion'],
					$SupplierDb['email'],
					$SupplierDb['telefono'],					
				);
				return $Supplier;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}


		# Actualizar un Proveedor
        public function updateSupplierDao($supplierDto){
            try {
				// Crear la Consulta
				$sql = 'UPDATE proveedores SET
							nit = :nit,
							nombre = :nombre,
							direccion = :direccion,
							email = :email,
							telefono = :telefono

						WHERE nit = :nit';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);		 

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('nit', $supplierDto->getNit());			
				$dbh->bindValue('nombre', $supplierDto->getNombreSupplier());			
				$dbh->bindValue('direccion', $supplierDto->getDireccionSupplier());
				$dbh->bindValue('email', $supplierDto->getCorreoSupplier());			
				$dbh->bindValue('telefono', $supplierDto->getTelefonoSupplier());
				// Ejecutar la consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un proveedor
		public function deleteSupplierDao($nit){
			try {
				$sql = 'DELETE FROM proveedores WHERE nit = :nit';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('nit', $nit);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>