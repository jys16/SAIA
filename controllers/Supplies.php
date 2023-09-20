<?php session_start();

    require_once "models/model_dto/CategoryDto.php";    
    require_once "models/model_dao/CategoryDao.php";
    require_once "models/model_dto/SupplieDto.php";    
    require_once "models/model_dao/SupplieDao.php";
    require_once "models/model_dto/BuyDto.php";
    require_once "models/model_dao/BuyDao.php";
    require_once "models/model_dto/UserDto.php";
    require_once "models/model_dao/UserDao.php";



    class Supplies{

        Private $categoryDao;
        Private $supplieDao;
        Private $buyDao;
        Private $userDao;
        private $module;

        public function __construct(){
            $this->categoryDao = new categoryDao;
            $this->supplieDao = new SupplieDao;
            $this->buyDao = new BuyDao;
            $this->buyDao = new UserDao;
            $this->module = $_SESSION['module'];

        }
        // Cargar pagina inicial
        public function index(){
            header("Location: ?c=Dashboard");
        }        
        // Crear Categoría
        public function createCategory(){
           // Muestra el Formulario
           $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    require_once 'views/roles/'.$this->module.'/header.php';
                    require_once "views/modules/2_supplies/category_create.view.php";
                    require_once "views/roles/admin/footer.php";
                }

                // Captura los Datos
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $CategoryDto = new CategoryDto(
                        $_POST['categoria_codigo'], 
                        $_POST['categoria_nombre']
                    );
                    $this->categoryDao->createCategory($CategoryDto);
                    header("Location: ?c=Supplies&a=readCategory");
                }
            }
            else {
                header("location:?");
            }    
        }   
        // Consultar Categorías
        public function readCategory(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
                $categorias = $this->categoryDao->readCategoryDao();
                require_once 'views/roles/'.$this->module.'/header.php';            
                require_once "views/modules/2_supplies/category_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }
        // Actualizar Categoría
        public function updateCategory(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categorias = $this->categoryDao->getById($_GET['idCategoria']);
            require_once 'views/roles/'.$this->module.'/header.php';            
            require_once "views/modules/2_supplies/category_update.view.php";
            require_once "views/roles/admin/footer.php";
        }

            // Método Post
            elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $categoryDto = new CategoryDto(
                    $_POST['categoria_codigo'],
                    $_POST['categoria_nombre']
                );
                $this->categoryDao->updateCategoryDao($categoryDto);
                header("Location: ?c=Supplies&a=readCategory");
            }
        }
        else {
                header("location:?");
        }

    }

         // Eliminar Categoria
         public function deleteCategory(){
			$this->categoryDao->deleteCategoryDao($_GET['idCategoria']);
			header('Location: ?c=Supplies&a=readCategory');			
		}
        // Crear Producto
        public function createSupplie(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $categorys = new CategoryDao;
                    $categorys = $categorys->readCategoryDao();
                    $bills = new BuyDao;
                    $bills = $bills->readBuyDao();
                    $stateSupplies = new SupplieDao();
                    $stateSupplies = $stateSupplies->readStateSupplieDao();
                    $users = new UserDao;
                    $users = $users->readUserDao();
                    require_once 'views/roles/'.$this->module.'/header.php';
                    require_once "views/modules/2_supplies/supplies_create.view.php";
                    require_once "views/roles/admin/footer.php";

                }

                // Captura los Datos
                elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $supplieDto = new SupplieDto(
                        $_POST['codigo'], 
                        $_POST['nombre'],
                        $_POST['marca'],
                        $_POST['referencia'],
                        $_POST['tipo'],
                        $_POST['factura_compra'],
                        $_POST['estado_producto'],
                        $_POST['id_categoria'],
                        $_POST['quien_registra']
                    );                
                            $this->supplieDao->createSupplieDao($supplieDto);
                            header("Location: ?c=Supplies&a=readSupplie");
                }
            }
            else {
                header("location:?");
            }     

        }
        // Consultar Productos
        public function readSupplie(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
                $supplies = $this->supplieDao->readSupplieDao();
                require_once 'views/roles/'.$this->module.'/header.php';
                require_once "views/modules/2_supplies/supplies_read.view.php";
                require_once "views/roles/admin/footer.php";
            }
            else {
                header("location:?");
            }
        }
        // Actualizar Producto
        public function updateSupplie(){
            $userDto = unserialize($_SESSION['userDto']);
            if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 6)) {
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $supplies = $this->supplieDao->getById($_GET['codigo']);
                $categorys = new CategoryDao;
                $categorys = $categorys->readCategoryDao();
                $bills = new BuyDao;
                $bills = $bills->readBuyDao();
                $stateSupplies = new SupplieDao();
                $stateSupplies = $stateSupplies->readStateSupplieDao();
                $users = new UserDao;
                $users = $users->readUserDao();            
                require_once 'views/roles/'.$this->module.'/header.php';
                require_once "views/modules/2_supplies/supplies_update.view.php";
                require_once "views/roles/admin/footer.php";
            }

            // Método Post
            elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $supplieDto = new SupplieDto(
					$_POST['codigo'],
					$_POST['nombre'],
					$_POST['marca'],
					$_POST['referencia'],
					$_POST['tipo'],
					$_POST['factura_compra'],
					$_POST['estado_producto'],
					$_POST['id_categoria'],
					$_POST['quien_registra']
                );
                $this->supplieDao->updateSupplieDao($supplieDto);
                header("Location: ?c=Supplies&a=readSupplie");
            }
        }
        else {
                header("location:?");
            }
    }        
        // Eliminar Producto
        public function deleteSupplie(){
			$this->supplieDao->deleteSupplieDao($_GET['codigo']);
			header('Location: ?c=Supplies&a=readSupplie');          
        }
    }
?>