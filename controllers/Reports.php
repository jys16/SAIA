<?php session_start();

require_once "models/model_dto/UserDto.php";
require_once "models/model_dao/UserDao.php";

    class Reports{
        public function __construct(){
            $this->module = $_SESSION['module'];
        }
        public function index(){
            header("Location: ?c=Dashboard");
        }        
        
        // Consultar stock
        public function reportGraphics(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() <= 6)) {
                // Programar
                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/6_reports/report_graph.view.php";
                // require_once "views/roles/admin/footer.php";
            }
             else {
                header("location:?");
            }
        }
       
        // Consultar Historia
        public function reportPrinted(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() <= 6)) {
                // Programar
                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/6_reports/report_print.view.php";
                require_once "views/roles/admin/footer.php";
            }
             else {
                header("location:?");
            }
        }
    }
?>