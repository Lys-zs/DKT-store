<?php 	
	class Connection{
		//ham su dung de ket noi csdl, tra ve bien ket noi
		public static function getInstance(){
			$server_name = "localhost";
			$database_name = "php62_project1";
			$username = "root";
			$password = "";
			//ket noi csdl, tra ket qua ve bien ket noi
			$conn = new PDO("mysql:host=$server_name;dbname=$database_name",$username,$password);
			//neu muon lay duoc tieng viet de hien thi len web thi can co dong lenh sau
			$conn->exec("set names utf8");
			//tra ket qua de su dung cho ben ngoai khi goi ham nay
			return $conn;
		}
	}
 ?>