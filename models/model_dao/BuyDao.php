<?php 
	class BuyDao{
		
		protected $pdo;
		public function __construct(){
			try {
				$this->pdo = DataBase::connection();				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}		

		# Registrar o Crear Proveedor
		public function createBuyDao($buyDto){
			try {
				// Crear la Consulta
				$sql = 'CALL pa_registrar_factura_compra (
							:codigo_factura,
							:fecha,
							:factura,							
							:valor,
							:nit_proveedor
						)';
				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);
				// Vincular los datos del objeto a la consulta de Inserción			
				$dbh->bindValue('codigo_factura',$buyDto->getCodigoFactura());
				$dbh->bindValue('fecha',$buyDto->getFecha());
				$dbh->bindValue('factura',$buyDto->getDocFactura());
				$dbh->bindValue('valor',$buyDto->getValor());
				$dbh->bindValue('nit_proveedor',$buyDto->getNitPro());
				// Ejecutar la consulta
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		
		# Consultar Usuarios
		public function readBuyDao(){
			try {
				// Crear un Arreglo Vacío
				$BuyList = [];
				// Asignar una consulta al atributo $sql
				$sql = 'SELECT * FROM VW_FACTURAS_DE_COMPRA;';
				// Creamos las variable $dbh y le asignamos la conexión y la consulta $sql
				$dbh = $this->pdo->query($sql);
				foreach ($dbh->fetchAll() as $buy) {
					$buyList[] = new BuyDto(
						$buy['codigo_factura'],
						$buy['fecha'],
						$buy['factura'],
						$buy['valor'],
						$buy['nit_proveedor']
						
					);
				}
				return $buyList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		
		# Obtener Nit
		public function getById($codigo_factura){
			try {
				# Consulta
				$sql = "SELECT * FROM facturas_de_compra WHERE codigo_factura=:codigo_factura";
				# Preparar la BBDD
				$dbh = $this->pdo->prepare($sql);
				# Vincular los datos
				$dbh->bindValue('codigo_factura', $codigo_factura);
				# Ejecutar la consulta
				$dbh->execute();
				# Crear un objeto del registro la BBDD
				$BuyDb = $dbh->fetch();
				# Crear el objeto del modelo
				$Buy = new BuyDto(
					$BuyDb['codigo_factura'],
					$BuyDb['fecha'],
					$BuyDb['factura'],
					$BuyDb['valor'],
					$BuyDb['nit_proveedor'],					
				);
				return $Buy;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}


		# Actualizar un Proveedor
        public function updateBuyDao($buyDto){
            try {
				// Crear la Consulta
				$sql = 'UPDATE facturas_de_compra SET
							codigo_factura = :codigo_factura,
							fecha = :fecha,
							factura = :factura,
							Valor = :Valor,
							nit_proveedor = :nit_proveedor

						WHERE codigo_factura = :codigo_factura';

				// Preparar la BBDD para la consulta
				$dbh = $this->pdo->prepare($sql);		 

				// Vincular los datos del objeto a la consulta de Inserción
				$dbh->bindValue('codigo_factura',$buyDto->getCodigoFactura());
				$dbh->bindValue('fecha',$buyDto->getFecha());
				$dbh->bindValue('factura',$buyDto->getDocFactura());
				$dbh->bindValue('valor',$buyDto->getValor());
				$dbh->bindValue('nit_proveedor',$buyDto->getNitPro());
				// Ejecutar la consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());	
			}
        }

		# Eliminar un proveedor
		public function deleteBuyDao($codigo_factura){
			try {
				$sql = 'DELETE FROM facturas_de_compra WHERE codigo_factura = :codigo_factura';
				$dbh = $this->pdo->prepare($sql);
				$dbh->bindValue('codigo_factura', $codigo_factura);
				$dbh->execute();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>