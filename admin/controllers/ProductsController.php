<?php 
	//load file model
	include "models/productsModel.php";
	class ProductsController extends Controller{
		//ke thua class productsModel
		use productsModel;
		//hien thi danh sach
		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//lay tong so ban ghi 
			$totalRecord = $this->modelTotalRecord();
			//tinh so trang
			//ceil(so) se lay tran. VD: ceil(3.6) = 4
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//sua ban ghi - GET
		//url: index.php?controller=products&action=update&id=number
		public function update(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=products&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			//print_r($record);
			$this->loadView("productsFormView.php",["action"=>$action,"record"=>$record]);
		}
		//sua ban ghi - POST -> khi an nut submit
		//url: index.php?controller=products&action=updatePost&id=number
		public function updatePost(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate($id);
			//quay tro lai trang products
			header("location:index.php?controller=products");
		}
		//them ban ghi - GET
		//url: index.php?controller=products&action=create
		public function create(){
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=products&action=createPost";
			//print_r($record);
			$this->loadView("productsFormView.php",["action"=>$action]);
		}
		//them ban ghi - POST
		//url: index.php?controller=products&action=createPost
		public function createPost(){
			//goi ham modelUpdate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang products
			header("location:index.php?controller=products");
		}
		//xoa ban ghi - GET
		public function delete(){
			//goi ham modelDelete
			$this->modelDelete();
			header("location:index.php?controller=products");
		}
	}
 ?>