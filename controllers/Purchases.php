<?php

require_once "models/model_dto/SupplierDto.php";    
require_once "models/model_dao/SupplierDao.php";
require_once "models/model_dto/BuyDto.php";
require_once "models/model_dao/BuyDao.php";


    class Purchases{

        private $supplierDao;
        private $buyDao;

        public function __construct(){
            $this->supplierDao = new SupplierDao;
            $this->buyDao = new BuyDao;
        }
        
        public function index(){
            require_once "views/roles/admin/header.php";
            require_once "views/roles/admin/admin_main.view.php";
            require_once "views/roles/admin/footer.php";
        }        
        // Crear Proveedor
        public function createSupplier(){
            // Muestra el formulario
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.php";            
                require_once "views/modules/3_purchases/supplier_create.view.php";
                require_once "views/roles/admin/footer.php";
        }
        // Captura los datos
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $supplierDto = new SupplierDto(
                $_POST['nit'], 
                $_POST['nombre'],
                $_POST['direccion'],
                $_POST['email'],
                $_POST['telefono']
            );
            $this->supplierDao->createSupplierDao($supplierDto);
            header("Location: ?c=Purchases&a=readSupplier");
        }
    }
        // Consultar Proveedores
        public function readSupplier(){
                $suppliers = $this->supplierDao->readSupplierDao();
                require_once "views/roles/admin/header.php";            
                require_once "views/modules/3_purchases/supplier_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
        // Actualizar Proveedor
        public function updateSupplier(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $suppliers = $this->supplierDao->getById($_GET['nit']);
                require_once "views/roles/admin/header.php";            
                require_once "views/modules/3_purchases/supplier_update.view.php";
                require_once "views/roles/admin/footer.php";
             }
            // Método Post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $supplierDto = new SupplierDto(
                    $_POST['nit'], 
                    $_POST['nombre'],
                    $_POST['direccion'],
                    $_POST['email'],
                    $_POST['telefono']
                );
                $this->supplierDao->updateSupplierDao($supplierDto);
                header("Location: ?c=Purchases&a=readSupplier");
            }
        }
        // Eliminar Proveedor
        public function deleteSupplier(){
            $this->supplierDao->deleteSupplierDao($_GET['nit']);
			header('Location: ?c=Purchases&a=readSupplier');	             
        }
        // Crear Compra
        public function createBuy(){
            // Muestra el Formulario
            $suppliers = new SupplierDao;
            $suppliers = $suppliers->readSupplierDao();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_create.view.php";
            require_once "views/roles/admin/footer.php";
        }
         // Captura los Datos
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $buyDto = new BuyDto(
                $_POST['codigo_factura'], 
                $_POST['fecha'],
                $_POST['factura'],
                $_POST['Valor'],
                $_POST['nit_proveedor']
            );                

                    $this->buyDao->createBuyDao($buyDto);
                    header("Location: ?c=Purchases&a=readBuy");
                }
            }

        // Consultar Compras
        public function readBuy(){
            $buys = $this->buyDao->readBuyDao();
            require_once "views/roles/admin/header.php";            
            require_once "views/modules/3_purchases/buy_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
        // Actualizar Compra
        public function updateBuy(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $buys = $this->buyDao->getById($_GET['codigo_factura']);
                require_once "views/roles/admin/header.php";            
                require_once "views/modules/3_purchases/buy_update.view.php";
                require_once "views/roles/admin/footer.php";
            }
        // Método Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $buyDto = new BuyDto(
                $_POST['codigo_factura'],
                $_POST['fecha'],
                $_POST['factura'],
                $_POST['Valor'],
                $_POST['nit_proveedor']

            );
            $this->buyDao->updateBuyDao($buyDto);
            header("Location: ?c=Purchases&a=readBuy");
            }
        }
        // Eliminar Compra
        public function deleteBuy(){
            $this->buyDao->deleteBuyDao($_GET['codigo_factura']);
			header('Location: ?c=Purchases&a=readBuy');	            
        }
    }
?>