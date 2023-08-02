<?php

    class SupplierDto{
        
        /* ATRIBUTOS */        
        private $nit;
        private $nombreSupplier;
        private $direccionSupplier;
        private $correoSupplier;
        private $telefonoSupplier;


        /* SOBRECARGA DE CONSTRUCTORES */
        
        // Constructor de Constructores
		public function __construct(){
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
		}
        // Constructor: Vacío
        public function __construct0(){}

        // Constructor: proveedores
        public function __construct5($nit,$nombreSupplier,$direccionSupplier,$correoSupplier,$telefonoSupplier){
			$this->nit = $nit;
			$this->nombreSupplier = $nombreSupplier;
			$this->direccionSupplier = $direccionSupplier;
            $this->correoSupplier = $correoSupplier;			
            $this->telefonoSupplier = $telefonoSupplier;
		}

        // Nit Proveedor
        public function setNit($nit){
            $this->nit = $nit;
        }
        public function getNit(){
            return $this->nit;
        }

        // Nombre Proveedor
        public function setNombreSupplier($nombreSupplier){
            $this->nombreSupplier = $nombreSupplier;
        }
        public function getNombreSupplier(){
            return $this->nombreSupplier;
        }

        // Dirección proveedor
        public function setDireccionSupplier($direccionSupplier){
            $this->direccionSupplier = $direccionSupplier;
        }
        public function getDireccionSupplier(){
            return $this->direccionSupplier;
        }


        // Correo Proveedor
        public function setCorreoSupplier($correoSupplier){
            $this->correoSupplier = $correoSupplier;
        }
        public function getCorreoSupplier(){
            return $this->correoSupplier;
        }

        // Telefono Usuario
        public function setTelefonoSupplier($telefonoSupplier){
            $this->telefonoSupplier = $telefonoSupplier;
        }
        public function getTelefonoSupplier(){
            return $this->telefonoSupplier;
        }

    }

?>

