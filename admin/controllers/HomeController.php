<?php 
	class HomeController extends Controller{
		//ham tao la ham mac dinh duoc goi dau tien
		public function __construct(){
			//goi ham xac thuc vien dang nhap
			$this->authentication();
		}
		public function index(){
			//load view
			$this->loadView('HomeView.php');
		}
	}
 ?>