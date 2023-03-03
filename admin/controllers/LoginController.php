<?php 
	//load file model
	include "models/LoginModel.php";
	class LoginController extends Controller{
		//ke thua class LoginModel
		use LoginModel;
		//url: index.php?controller=login -> action mac dinh la index
		public function index(){
			//load view
			$this->loadView("LoginView.php");
		}
		//khi an nut submit o form login thi se den ham sau
		//url: index.php?controller=login&aciton=loginPost
		public function doLogin(){
			//goi ham modelLogin de kiem tra viec dang nhap
			$this->modelLogin();
		}
		//dang xuat
		//url: index.php?controller=login&action=login
		public function logout(){
			//huy bien session
			unset($_SESSION['email']);
			header("location:index.php");
		}
	}
 ?>