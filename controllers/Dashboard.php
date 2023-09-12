<?php session_start();
    require_once "models/model_dto/UserDto.php";    
    require_once "models/model_dao/UserDao.php";
    class Dashboard{
        public function __construct(){
            if (empty($_SESSION['profile'])) {
                $_SESSION['profile'] = null;
                $_SESSION['session'] = null;
            }
        }
        public function index(){
                $session = $_SESSION['session'];                
                $userDto = unserialize($_SESSION['profile']);                
                require_once "views/roles/" . $session . "/header.php";               
                require_once "views/roles/admin/admin.view.php";
                print_r($userDto);

            // if (isset($_SESSION['session'])) {
            //     $session = $_SESSION['session'];                
            //     $userDto = unserialize($_SESSION['profile']);                
            //     require_once "views/roles/" . $session . "/header.php";               
            //     require_once "views/roles/admin/admin.view.php";
            //     // require_once "views/roles/admin/footer.php";
            // } else {                
            //     header("Location:?");
            // }
        }
    }
?>