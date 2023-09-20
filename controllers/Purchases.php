<?php session_start();

require_once "models/model_dto/SupplierDto.php";    
require_once "models/model_dao/SupplierDao.php";
require_once "models/model_dto/BuyDto.php";
require_once "models/model_dao/BuyDao.php";
require_once "models/model_dto/UserDto.php";
require_once "models/model_dao/UserDao.php";


    class Purchases{

        private $supplierDao;
        private $buyDao;
        private $module;

        public function __construct(){
            $this->supplierDao = new SupplierDao;
            $this->buyDao = new BuyDao;
            $this->module = $_SESSION['module'];
        }
        
        public function index(){
            header("Location: ?c=Dashboard");
        }        
        // Crear Proveedor
        public function createSupplier(){
                // Muestra el formulario
             $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once 'views/roles/'.$this->module.'/header.php';            
                    require_once "views/modules/3_purchases/supplier_create.view.php";
                    require_once "views/roles/admin/footer.php";
                }
                // Captura los datos
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            else {
                header("location:?");
            }
        }
        // Consultar Proveedores
        public function readSupplier(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                $suppliers = $this->supplierDao->readSupplierDao();
                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/3_purchases/supplier_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }
        // Actualizar Proveedor
        public function updateSupplier(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $suppliers = $this->supplierDao->getById($_GET['nit']);
                    require_once 'views/roles/'.$this->module.'/header.php';            
                    require_once "views/modules/3_purchases/supplier_update.view.php";
                    require_once "views/roles/admin/footer.php";
                    }
                // Método Post
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            else {
                header("location:?");
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
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                $suppliers = new SupplierDao;
                $suppliers = $suppliers->readSupplierDao();
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once 'views/roles/'.$this->module.'/header.php';            
                    require_once "views/modules/3_purchases/buy_create.view.php";
                    require_once "views/roles/admin/footer.php";
                }
                 // Captura los Datos
                 elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

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
            else {
                header("location:?");
            }
        }

        // Consultar Compras
        public function readBuy(){
            $suppliers = new SupplierDao;
            $suppliers = $suppliers->readSupplierDao();
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                $buys = $this->buyDao->readBuyDao();

                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/3_purchases/buy_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }
        // Actualizar Compra
        public function updateBuy(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 3)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $buys = $this->buyDao->getById($_GET['codigo_factura']);
                    $suppliers = new SupplierDao;
                    $suppliers = $suppliers->readSupplierDao();
                    require_once 'views/roles/'.$this->module.'/header.php';            
                    require_once "views/modules/3_purchases/buy_update.view.php";
                    require_once "views/roles/admin/footer.php";
                }
                // Método Post
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            else {
                header("location:?");
            }
        }
        // Eliminar Compra
        public function deleteBuy(){
            $this->buyDao->deleteBuyDao($_GET['codigo_factura']);
			header('Location: ?c=Purchases&a=readBuy');	            
        }
    }
?>