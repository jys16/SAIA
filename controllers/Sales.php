<?php
    class Sales{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Cliente
        public function createClient(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/client_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Clientes
        public function readClient(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/client_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Clientes
        public function updateClient(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/client_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Cliente
        public function deleteClient(){
            // Programar            
        }
        // Crear Venta
        public function createSale(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/sale_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Ventas
        public function readSale(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/sale_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Venta
        public function updateSale(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/4_sales/sale_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Venta
        public function deleteSale(){
            // Programar            
        }
    }
?>