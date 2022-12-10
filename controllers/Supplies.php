<?php
    class Supplies{
        public function __construct(){}
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Categoría
        public function createCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_supplies/category_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Categorías
        public function readCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_supplies/category_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Categoría
        public function updateCategory(){
            // Programar
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/2_supplies/category_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Categoría
        public function deleteCategory(){
            // Programar            
        }        
        // Crear Producto
        public function createSupplie(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_supplies/supplies_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Consultar Productos
        public function readSupplie(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_supplies/supplies_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Producto
        public function updateSupplie(){
            // Programar
            require_once "views/roles/admin/header.php";
            require_once "views/modules/2_supplies/supplies_update.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Eliminar Producto
        public function deleteSupplie(){
            // Programar            
        }
    }
?>