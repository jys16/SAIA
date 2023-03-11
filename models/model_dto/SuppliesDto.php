<?php

    class SuppliesDto{
        
        /* ATRIBUTOS */        
        private $codigo;
        private $nombre;
        private $marca;
        private $referencia;
        private $tipo;
        private $factura;
        private $estado;
        private $quien_registra;
        private $id_categoria



        
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

        // Constructor: con todos los elementos de la tabla
        public function __construct9($codigo,$nombre,$marca,$referencia,$tipo,$factura,$estado,$quien_registra,$id_categoria){
			$this->codigo = $codigo;
            $this->nombre = $nombre;
			$this->marca = $marca;
			$this->referencia = $referencia;			
            $this->tipo = $tipo;
            $this->factura = $factura;
            $this->estado = $estado;
            $this->quien_registra = $quien_registra;
            $this->id_categoria = $id_categoria;
		}

        /* MÉTODOS DE ACCESO: SETTER Y GETTERS*/
        
        // Codigo Insumo
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function getCodigo(){
            return $this->codigo;
        }

        // Nombre Insumo
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }

        // Marca Insumo
        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function getMarca(){
            return $this->marca;
        }


        // Referencia
        public function setReferencia($referencia){
            $this->referencia = $referencia;
        }
        public function getReferencia(){
            return $this->referencia;
        }

        // Tipo
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        public function getTipo(){
            return $this->tipo;
        }

        // Factura
        public function setFactura($factura){
            $this->factura = $factura;
        }
        public function getFactura(){
            return $this->factura;
        }

        // Estado
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function getEstado(){
            return $this->estado;
        }

         // Quien_registra
         public function setQuienRegistra($quien_registra){
            $this->quien_registra = $quien_registra;
        }
        public function getQuienRegistra(){
            return $this->quien_registra;
        }

         // id_categoria
         public function setIdCategoria($id_categoria){
            $this->id_categoria = $id_categoria;
        }
        public function getIdCategoria(){
            return $this->id_categoria;
        }
    }

?>
