<?php

    class BuyDto{
        
        /* ATRIBUTOS */        
        private $codigo_factura;
        private $fecha;
        private $doc_factura;
        private $valor;
        private $nit_pro;


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

        // Constructor: Facturas de compra
        public function __construct5($codigo_factura,$fecha,$doc_factura,$valor,$nit_pro){
			$this->codigo_factura = $codigo_factura;
			$this->fecha = $fecha;
			$this->doc_factura = $doc_factura;
            $this->valor = $valor;			
            $this->nit_pro = $nit_pro;
		}

        // Codigo de la factura
        public function setCodigoFactura($codigo_factura){
            $this->codigo_factura = $codigo_factura;
        }
        public function getCodigoFactura(){
            return $this->codigo_factura;
        }

        // Fecha de registro factura
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        public function getFecha(){
            return $this->fecha;
        }

        // Factura entregada por el proveedor
        public function setDocFactura($doc_factura){
            $this->$doc_factura = $doc_factura;
        }
        public function getDocFactura(){
            return $this->doc_factura;
        }


        // Valor de la factura
        public function setValor($valor){
            $this->valor = $valor;
        }
        public function getValor(){
            return $this->valor;
        }

        // Nit del proveedor
        public function setNitPro($nit_pro){
            $this->$nit_pro = $nit_pro;
        }
        public function getNitPro(){
            return $this->nit_pro;
        }

    }

?>

