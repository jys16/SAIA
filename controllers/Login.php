<?php session_start(); 
    require_once "models/model_dto/UserDto.php";    
    require_once "models/model_dao/UserDao.php";

    class Login{        
        private $userDao;
        public function __construct(){            
            $this->userDao = new UserDao;
        }
        public function index(){
            // Cargar la Vista del Formulario
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/business/login.view.php";
            }
            // Capturar los Datos del Formulario
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Validar los Datos
                // Crear el Objeto
                $userDto = new UserDto(
                    $_POST['email'], 
                    $_POST['pass']
                );                
                print_r($_POST);
                // Comprobar en la base de datos
                $userDto = $this->userDao->login($userDto);                
                if ($userDto) {
                    // Validar si es un Administrador Activo
                    if ($userDto->getUserStatus() == 1) {                        
                        // Redireccionar al Dashboard
                        $userDto = serialize($userDto);
                        $_SESSION['userDto'] = $userDto;
                        header('Location: ?c=Dashboard');
                    } else {                        
                        // header('Location: ?');
                        echo "Error usuario inhabilitado para el login";
                        header('Location: ?c=login');
                    }
                } else {                    
                    echo "Error usuario o contraseña invalidos";
                    header('Location: ?c=login');
                }
            }
        }
    }
?>