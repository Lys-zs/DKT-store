<?php 
	class Controller{
		//ham hien thi view
		public function loadView($fileName, $data = NULL){
			//neu bien $data khong NULL thi extract de bien ten key thanh ten bien
			if($data != NULL)
				extract($data);
			//kiem tra xem duong dan file co ton tai khong, neu co ton tai thi load $fileName
			if(file_exists("views/$fileName")){
				//doc noi dung ben tron gduong dan $fileName de gan vao mot bien
				//tao bien de chuan bi lay du lieu phan view gan vao bien nay
				$view = NULL;
				$layout = NULL;
				ob_start();
					include "views/$fileName";
					$view = ob_get_contents();
				ob_get_clean();
				//kiem tra neu bien $layout khong NULL thi include no
				if($layout != NULL)
					include "views/$layout";
				else
					echo $view;
			}
		}
		//kiem tra, xac thuc viec dang nhap
		public function authentication(){
			//!isset($_SESSION["email"]) <=> $_SESSION["email"] == false
			//isset($_SESSION["email"]) <=> $_SESSION["email"] == true
			if(!isset($_SESSION["email"]))
				header("location:index.php?controller=login");
		}
	}
 ?>