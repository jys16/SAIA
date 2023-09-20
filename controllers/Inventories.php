<?php session_start();

require_once "models/model_dto/UserDto.php";
require_once "models/model_dao/UserDao.php";

    class Inventories{

        private $module;

        public function __construct(){
            $this->module = $_SESSION['module'];
        }
        public function index(){
            header("Location: ?c=Dashboard");
        }        
        
        // Consultar stock
        public function readStock(){
            // Programar
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() <= 3 || $userDto->getIdRol() == 6)) {
                require_once 'views/roles/'.$this->module.'/header.php';
                require_once "views/modules/5_Inventory/stock_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
             else {
                header("location:?");
            }
       }
        // Consultar Historia
        public function readHistory(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() <= 3 || $userDto->getIdRol() == 6)) {
                // Programar
                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/5_Inventory/history_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
             else {
            header("location:?");
            }
        }    
    }
?>