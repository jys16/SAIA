<?php
    class Purchases{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Proveedor
        public function createSupplier(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/supplier_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Proveedores
        public function readSupplier(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/supplier_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Proveedor
        public function updateSupplier(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/supplier_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Proveedor
        public function deleteSupplier(){
            // Programar            
        }
        // Crear Compra
        public function createBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Compras
        public function readBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Compra
        public function updateBuy(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Compra
        public function deleteBuy(){
            // Programar            
        }
    }
?>