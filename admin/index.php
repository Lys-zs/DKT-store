<?php 
	//start session
	session_start();
	//load file Connection.php de ket noi csdl
	// ../ co nghia la nhay len cha 1 cap
	include "../application/Connection.php";
	//load file Controller.php
	include "../application/Controller.php";
 ?>
 <?php 
 	//load dong MVC dua vao tham so controller truyen len url
 	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
 	$action = isset($_GET["action"]) ? $_GET["action"] : "index";
 	//tao duong dan vat ky cua file controller trong MVC. VD: controllers/PhongBanController.php
 	//ham ucfirst viet hoa ky tu dau tien 	
 	$controllerFile = "controllers/".ucfirst($controller)."Controller.php";
 	//echo $controllerFile;
 	if(file_exists($controllerFile)){
 		include $controllerFile;
 		$controllerClass = ucfirst($controller)."Controller";
 		//khoi tao object cua class
 		$obj = new $controllerClass();
 		//goi den action
 		$obj->$action();
 	}else die("file $controllerFile không tồn tại");
  ?>