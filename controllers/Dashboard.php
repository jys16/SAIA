<?php session_start();
	class Dashboard {
		private $module;
		public function __construct(){
			$this->module = $_SESSION['module'];
		}
		public function index(){			
			if (isset($_SESSION['userDto'])) {
				require_once 'views/roles/'.$this->module.'/header.php';
				require_once "views/roles/admin/admin.view.php";
				// require_once 'views/roles/'.$this->module.'/footer.php';				
			} else {
				header('Location: ?');
			}			
		}
	}
?>