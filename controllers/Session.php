<?php
session_start();

class Session {
    protected $session;

    public function __construct() {
        if (isset($_SESSION['session'])) {
            $this->session = $_SESSION['session'];
        } else {
            header("Location:?");
            exit();
        }
    }
}
?>