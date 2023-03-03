<?php 
	//load file model
	include "models/UsersModel.php";
	class UsersController extends Controller{
		//ke thua class UsersModel
		use UsersModel;
		//hien thi danh sach
		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 4;
			//lay tong so ban ghi 
			$totalRecord = $this->modelTotalRecord();
			//tinh so trang
			//ceil(so) se lay tran. VD: ceil(3.6) = 4
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("UsersView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//sua ban ghi - GET
		//url: index.php?controller=users&action=update&id=number
		public function update(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=users&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			//print_r($record);
			$this->loadView("UsersFormView.php",["action"=>$action,"record"=>$record]);
		}
		//sua ban ghi - POST -> khi an nut submit
		//url: index.php?controller=users&action=updatePost&id=number
		public function updatePost(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate($id);
			//quay tro lai trang users
			header("location:index.php?controller=users");
		}
		//them ban ghi - GET
		//url: index.php?controller=users&action=create
		public function create(){
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=users&action=createPost";
			//print_r($record);
			$this->loadView("UsersFormView.php",["action"=>$action]);
		}
		//them ban ghi - POST
		//url: index.php?controller=users&action=createPost
		public function createPost(){
			//goi ham modelUpdate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang users
			header("location:index.php?controller=users");
		}
		//xoa ban ghi - GET
		public function delete(){
			//goi ham modelDelete
			$this->modelDelete();
			header("location:index.php?controller=users");
		}
	}
 ?>