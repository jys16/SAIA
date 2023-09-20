<?php session_start();
    require_once "models/DataBase.php";
    require_once "models/model_dto/UserDto.php";    
    require_once "models/model_dao/UserDao.php";

    class Login{        
        private $userDao;
        public function __construct(){            
            $this->userDao = new UserDao;
        }
        public function index(){
            $mensaje = "";
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
                // Comprobar en la base de datos
                $userDto = $this->userDao->login($userDto);                
                if ($userDto) {
                    // Validar si es un Administrador Activo
                    if ($userDto->getUserStatus() == 1) {
                        
                        if ($userDto->getIdRol() == 1) {

                            $_SESSION['module'] = "admin";                            
                            $_SESSION['rol'] = $userDto;
                        

                    // Validar si es un Vendedor Activo
                        } elseif ($userDto->getIdRol() ==2) {

                            $_SESSION['module'] = "seller";                            
                            $_SESSION['rol'] = $userDto;

                        }

                        elseif ($userDto->getIdRol() ==3) {

                            $_SESSION['module'] = "purchases";                            
                            $_SESSION['rol'] = $userDto;

                        }

                        elseif ($userDto->getIdRol() ==4) {

                            $_SESSION['module'] = "admin_users";                            
                            $_SESSION['rol'] = $userDto;

                        }

                        elseif ($userDto->getIdRol() ==5) {

                            $_SESSION['module'] = "admin_roles";                            
                            $_SESSION['rol'] = $userDto;

                        }

                        // Redireccionar al Dashboard
                        $userDto = serialize($userDto);
                        $_SESSION['userDto'] = $userDto;
                        // // echo "Aquí toy verdad";
                        // print_r($userDto);                        
                        echo '<script type="text/javascript">                        
                            window.location.assign("?c=Dashboard");
                        </script>';
                        
                    } else {                        
                        header('Location: ?');
                        // echo "Aquí toy falso";
                        $mensaje = "Error usuario inhabilitado para el login";
                        header('Location: ?c=login');
                    }
                } else {                    
                    // echo "Aquí toy falso falso";
                    $mensaje = "Error usuario o contraseña invalidos";
                    header('Location: ?c=login');
                }
            }
        }
    }
?>