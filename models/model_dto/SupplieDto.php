<?php

    class SupplieDto{
        
        /* ATRIBUTOS */        
        private $codigo;
        private $nombre;
        private $marca;
        private $referencia;
        private $tipo;
        private $factura_compra;
        private $estado_producto;
        private $id_categoria;
        private $quien_registra;
        private $id;
        private $nombre_categoria;
        private $id_estado;
        private $nombre_estado;
        private $documento;
        private $apellidos;
        private $nombres;



        
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
        public function __construct2($id_estado,$nombre_estado){
            $this->id_estado = $id_estado;
            $this->nombre_estado = $nombre_estado;
        }


        // Constructor: con todos los elementos de la tabla
        public function __construct9($codigo,$nombre,$marca,$referencia,$tipo,$factura_compra,$estado_producto,$id_categoria,$quien_registra){
			$this->codigo = $codigo;
            $this->nombre = $nombre;
			$this->marca = $marca;
			$this->referencia = $referencia;			
            $this->tipo = $tipo;
            $this->factura_compra = $factura_compra;
            $this->estado_producto = $estado_producto;
            $this->id_categoria = $id_categoria;
            $this->quien_registra = $quien_registra;
		}

                // Constructor: join para la opción consultar
        public function __construct16($codigo,$nombre,$marca,$referencia,$tipo,$factura_compra,$estado_producto,$id_categoria,$quien_registra,$id,$nombre_categoria,$id_estado,$nombre_estado,$documento,$apellidos,$nombres){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->marca = $marca;
            $this->referencia = $referencia;            
            $this->tipo = $tipo;
            $this->factura_compra = $factura_compra;
            $this->estado_producto = $estado_producto;
            $this->id_categoria = $id_categoria;
            $this->quien_registra = $quien_registra;
            $this->id = $id;
            $this->nombre_categoria = $nombre_categoria;
            $this->id_estado = $id_estado;
            $this->nombre_estado = $nombre_estado;
            $this->documento = $documento;
            $this->apellidos = $apellidos;
            $this->nombres = $nombres;
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
        public function setFacturaCompra($factura_compra){
            $this->factura_compra = $factura_compra;
        }
        public function getFacturaCompra(){
            return $this->factura_compra;
        }

        // Estado
        public function setEstadoProducto($estado_producto){
            $this->estado_producto = $estado_producto;
        }
        public function getEstadoProducto(){
            return $this->estado_producto;
        }

         // id_categoria
         public function setIdCategoria($id_categoria){
            $this->id_categoria = $id_categoria;
        }
        public function getIdCategoria(){
            return $this->id_categoria;
        }

         // Quien_registra
         public function setQuienRegistra($quien_registra){
            $this->quien_registra = $quien_registra;
        }
        public function getQuienRegistra(){
            return $this->quien_registra;
        }

        // id categoria
         public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }        

         // Nombre Categoría
         public function setNombreCategoria($nombre_categoria){
            $this->nombre_categoria = $nombre_categoria;
        }
        public function getNombreCategoria(){
            return $this->nombre_categoria;
        }

        // Id estado del producto
        public function setIdEstado($id_estado){
            $this->id_estado = $id_estado;
        }
        public function getIdEstado(){
            return $this->id_estado;
        }

         // Nombre estado del producto
        public function setNombreEstado($nombre_estado){
            $this->nombre_estado = $nombre_estado;
        }
        public function getNombreEstado(){
            return $this->nombre_estado;
        }

          // Documento de quien registra
        public function setDocumento($documento){
            $this->documento = $documento;
        }
        public function getDocumento(){
            return $this->documento;
        }

          // Apellidos de quien registra
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function getApellidos(){
            return $this->apellidos;
        }

          // Nombres de quien registra
        public function setNombres($nombres){
            $this->nombres = $nombres;
        }
        public function getNombres(){
            return $this->nombres;
        }

    }

?>
