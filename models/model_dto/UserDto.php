<?php

    class UserDto{
        
        /* ATRIBUTOS */        
        private $documento;
        private $apellidosUser;
        private $nombresUser;
        private $correoUser;
        private $pass;
        private $telefono;
        private $foto;
        private $id_rol;
        private $nombre_rol;



        
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

        // Constructor: Usuarios
        public function __construct8($documento,$apellidosUser,$nombresUser,$correoUser,$pass,$telefono,$foto,$id_rol){
			$this->documento = $documento;
            $this->apellidosUser = $apellidosUser;
			$this->nombresUser = $nombresUser;
			$this->correoUser = $correoUser;			
            $this->pass = $pass;
            $this->telefono = $telefono;
            $this->foto = $foto;
            $this->id_rol = $id_rol;
            // $this->nombre_rol = $nombre_rol;

		}

        public function __construct9($documento,$apellidosUser,$nombresUser,$correoUser,$pass,$telefono,$foto,$id_rol, $nombre_rol){
			$this->documento = $documento;
            $this->apellidosUser = $apellidosUser;
			$this->nombresUser = $nombresUser;
			$this->correoUser = $correoUser;			
            $this->pass = $pass;
            $this->telefono = $telefono;
            $this->foto = $foto;
            $this->id_rol = $id_rol;
            $this->nombre_rol = $nombre_rol;

		}


        

        // Documento Usuario
        public function setDocumento($documento){
            $this->documento = $documento;
        }
        public function getDocumento(){
            return $this->documento;
        }

        // Apellidos Usuario
        public function setApellidosUser($apellidosUser){
            $this->apellidosUser = $apellidosUser;
        }
        public function getApellidosUser(){
            return $this->apellidosUser;
        }

        // Nombres Usuario
        public function setNombresUser($nombresUser){
            $this->nombresUser = $nombresUser;
        }
        public function getNombresUser(){
            return $this->nombresUser;
        }


        // Correo Usuario
        public function setCorreoUser($correoUser){
            $this->correoUser = $correoUser;
        }
        public function getCorreoUser(){
            return $this->correoUser;
        }

        // Password Usuario
        public function setPass($pass){
            $this->pass = $pass;
        }
        public function getPass(){
            return $this->pass;
        }

        // Telefono Usuario
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getTelefono(){
            return $this->telefono;
        }

        // Foto Usuario
        public function setFoto($foto){
            $this->foto = $foto;
        }
        public function getFoto(){
            return $this->foto;
        }

         // id rol
         public function setIdRol($id_rol){
            $this->id_rol = $id_rol;
        }
        public function getIdRol(){
            return $this->id_rol;
        }
        
          // Nombre rol
        public function setNombreRol($nombre_rol){
            $this->id_rol = $id_rol;
        }
        
        public function getNombreRol(){
            return $this->nombre_rol;
        }
    }

?>

