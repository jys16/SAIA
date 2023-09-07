<?php
    class Logout{
        public function __construct(){}
        public function index(){
            session_destroy();
            header("Location: ?");
        }
    }
?>