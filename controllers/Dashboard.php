<?php
    class Dashboard{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            // require_once "views/roles/admin/footer.php";
        }
        public function email(){
            require_once "views/roles/admin/header.php";
            require_once "views/modules/7_others/email.view.php";
            require_once "views/roles/admin/footer.php";
        }
        public function calendar(){
            require_once "views/roles/admin/header.php";
            require_once "views/modules/7_others/calendar.view.php";
            require_once "views/roles/admin/footer.php";
        }
        public function activities(){
            require_once "views/roles/admin/header.php";
            require_once "views/modules/7_others/activities.view.php";
            require_once "views/roles/admin/footer.php";
        }
    }
?>