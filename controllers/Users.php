<?php session_start();  

    require_once "models/model_dto/RolDto.php";    
    require_once "models/model_dao/RolDao.php";
    require_once "models/model_dto/UserDto.php";
    require_once "models/model_dao/UserDao.php";
    

    class Users {
        
        private $rolDao;
        private $userDao;
        private $module;

        public function __construct(){
            $this->rolDao = new RolDao;
            $this->userDao = new UserDao;
            $this->module = $_SESSION['module'];
        }
        // Cargar página inicial (puede ser el módulo)
        public function index(){
            header("Location: ?c=Dashboard");
        }
        // Crear Rol
        public function createRol(){                        
            // Muestra el Formulario
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 5)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once 'views/roles/'.$this->module.'/header.php';
                    require_once "views/modules/1_users/rol_create.view.php";            
                    require_once "views/roles/admin/footer.php";
            }
            // Captura los Datos
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $rolDto = new RolDto(
                        $_POST['rol_codigo'], 
                        $_POST['rol_nombre']
                    );
                    $this->rolDao->createRol($rolDto);
                    header("Location: ?c=Users&a=readRol");
                    }
            }
            else {
                header("location:?");
            }
        }        
        // Consultar Roles
        public function readRol(){
            $roles = $this->rolDao->readRolDao();
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 5)) {
                    require_once 'views/roles/'.$this->module.'/header.php';           
                    require_once "views/modules/1_users/rol_read.view.php";            
                    require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }
        // Actualizar Rol
        public function updateRol(){
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 5)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $rol = $this->rolDao->getById($_GET['idRol']);
                    require_once 'views/roles/'.$this->module.'/header.php';                
                    require_once "views/modules/1_users/rol_update.view.php";
                    require_once "views/roles/admin/footer.php";
                }    
            // Método Post
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $rolDto = new RolDto(
                        $_POST['rol_codigo'],
                        $_POST['rol_nombre']
                    );
                    $this->rolDao->updateRolDao($rolDto);
                    header("Location: ?c=Users&a=readRol");
                }
            }
            else {
                header("location:?");
            }
        }   
        // Eliminar Rol
        public function deleteRol(){
			$this->rolDao->deleteRolDao($_GET['idRol']);
			header('Location: ?c=Users&a=readRol');			
		}
        
        // Crear Usuario
        public function createUser(){
            // Inicializar el arreglo de errores
            $errors = [];
        
            // Muestra el Formulario
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $roles = new RolDao;
                    $roles = $roles->readRolDao();
                    require_once 'views/roles/'.$this->module.'/header.php';
                    require_once "views/modules/1_users/user_create.view.php";            
                    require_once "views/roles/admin/footer.php";
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validar los datos antes de continuar
        
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "El correo electrónico no es válido";
                }
        
                //agregar más validaciones aquí para otros campos
        
                // Si hay errores, vuelve a mostrar la vista con los errores
                if (!empty($errors)) {
                    require_once 'views/roles/'.$this->module.'/header.php';
                    require_once "views/modules/1_users/user_create.view.php";            
                    require_once "views/roles/admin/footer.php";
                } else {
                    // Si no hay errores, procede con la inserción
                    $userDto = new UserDto(
                        $_POST['documento'], 
                        $_POST['apellidos'],
                        $_POST['nombres'],
                        $_POST['email'],
                        $_POST['pass'],
                        $_POST['telefono'],
                        $_POST['foto'],
                        $_POST['id_rol'],
                        $_POST['estado']
                    ); 
        
                    $this->userDao->createUserDao($userDto);
                    header("Location: ?c=Users&a=readUser");
                    }
                }
            }
            else {
                header("location:?");
            }        
        }

        // Consultar Usuarios
        public function readUser(){
            $users = $this->userDao->readUserDao();
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
                    require_once 'views/roles/'.$this->module.'/header.php';                        
                    require_once "views/modules/1_users/user_read.view.php";            
                    require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }  
            
        // Actualizar Usuario
        public function updateUser(){
            $userDto = unserialize($_SESSION['userDto']);
			if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 4)) {
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $users = $this->userDao->getById($_GET['documento']);
                    $roles = new RolDao;
                    $roles = $roles->readRolDao();
                    require_once 'views/roles/'.$this->module.'/header.php';                
                    require_once "views/modules/1_users/user_update.view.php";
                    require_once "views/roles/admin/footer.php";                }

            // Método Post
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userDto = new UserDto(
                        $_POST['documento'], 
                        $_POST['apellidos'],
                        $_POST['nombres'],
                        $_POST['email'],
                        $_POST['pass'],
                        $_POST['telefono'],
                        $_POST['foto'],
                        $_POST['id_rol'],
                        $_POST['estado']
                    );
                    $this->userDao->updateUserDao($userDto);
                    header("Location: ?c=Users&a=readUser");
                }
            }
            else {
                header("location:?");
            }
        }  
        // Eliminar Usuario
        public function deleteUser(){
			$this->userDao->deleteUserDao($_GET['documento']);
			header('Location: ?c=Users&a=readUser');			
		}
    
        
    }
?>