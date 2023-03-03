<?php 
	trait AccountModel{
		//dang ky
		public function modelRegister(){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			//ma hoa password
			$password = md5($password);
			//kiem tra xem email nay da ton tai trong csdl chua, neu chua thi insert
			$conn = Connection::getInstance();
			$check = $conn->prepare("select email from customers where email=:var_email");
			$check->execute(["var_email"=>$email]);
			if($check->rowCount() == 0){
				//insert du lieu vao table customer
				$query = $conn->prepare("insert into customers(name,email,address,phone,password) values(:var_name,:var_email,:var_address,:var_phone,:var_password)");
				$query->execute(["var_name"=>$name,"var_email"=>$email,"var_address"=>$address,"var_phone"=>$phone,"var_password"=>$password]);
			}else
				header("location:index.php?controller=account&action=register&notify=error");
		}
		//dang nhap
		public function modelLogin(){
			$email = $_POST['email'];
			$password = $_POST['password'];
			//ma hoa password
			$password = md5($password);
			//kiem tra xem email nay da ton tai trong csdl chua, neu chua thi insert
			$conn = Connection::getInstance();
			$check = $conn->prepare("select id,email,password from customers where email=:var_email");
			$check->execute(["var_email"=>$email]);
			if($check->rowCount() > 0){
				//lay mot ban ghi
				$record = $check->fetch(PDO::FETCH_OBJ);
				if($record->password == $password){
					//dang nhap thanh cong
					$_SESSION['customer_id'] = $record->id;
					$_SESSION['customer_email'] = $record->email;
					header("location:index.php");
				}else
					header("location:index.php?controller=account&action=login&notify=error");
			}else
				header("location:index.php?controller=account&action=login&notify=error");
		}
	}
 ?>