<?php session_start();

require_once "models/model_dto/ClientDto.php";
require_once "models/model_dao/ClientDao.php";
require_once "models/model_dto/UserDto.php";
require_once "models/model_dao/UserDao.php";


class Sales
{
    private $clientDao;
    private $module;

    public function __construct()
    {
        $this->clientDao = new ClientDao();
        /* $this->saleDao = new SaleDao(); */
        // Se recomienda también crear una instancia para $this->saleDao si se va a utilizar en el futuro.
        $this->module = $_SESSION['module'];
    }

    public function index()
    {
        header("Location: ?c=Dashboard");
    }

    // Crear Cliente
    public function createClient(){
        $userDto = unserialize($_SESSION['userDto']);
        if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 2)) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once 'views/roles/'.$this->module.'/header.php';
                require_once "views/modules/4_sales/client_create.view.php";
                require_once "views/roles/admin/footer.php";
            }

            elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $clientDto = new ClientDto(
                    $_POST['documento'], 
                    $_POST['nombres'],
                    $_POST['apellidos'],
                    $_POST['email'],
                    $_POST['direccion'],
                    $_POST['telefono']
                );    

                        $this->clientDao->createClientDao($clientDto);
                        header("Location: ?c=Sales&a=readClient");
            }
        }
        else {
                header("location:?");
        }
    }

        
    // Consultar Clientes
    public function readClient(){
        $userDto = unserialize($_SESSION['userDto']);
        if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 2)) {
        $clients = $this->clientDao->readClientDao();
            require_once 'views/roles/'.$this->module.'/header.php';
            require_once "views/modules/4_sales/client_read.view.php";
            require_once "views/roles/admin/footer.php";
        }
    }

    // Actualizar Clientes
    public function updateClient() {
        $userDto = unserialize($_SESSION['userDto']);
        if (isset($_SESSION['userDto']) && ($userDto->getIdRol() == 1 || $userDto->getIdRol() == 2)) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $clients = $this->clientDao->getById($_GET['documento']);
                require_once 'views/roles/'.$this->module.'/header.php';
                require_once "views/modules/4_sales/client_update.view.php";
                require_once "views/roles/admin/footer.php";
            }

            elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $clientDto = new ClientDto(
                    $_POST['documento'], 
                    $_POST['apellidos'],
                    $_POST['nombres'],
                    $_POST['email'],
                    $_POST['direccion'],
                    $_POST['telefono']
                );
                $this->clientDao->updateclientDao($clientDto);
                header("Location: ?c=Sales&a=readClient");
            }
        }
        else {
                header("location:?");
        }
    }

    // Eliminar Cliente
    public function deleteClient()
    {
        $this->clientDao->deleteClientDao($_GET['documento']);
        header('Location: ?c=Sales&a=readClient');
    }
}
