<?php 
	//load file model
	include "models/NewsModel.php";
	class newsController extends Controller{
		//ke thua class NewsModel
		use NewsModel;
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
			$this->loadView("NewsView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//sua ban ghi - GET
		//url: index.php?controller=news&action=update&id=number
		public function update(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=news&action=updatePost&id=$id";
			//lay mot ban ghi
			$record = $this->modelGetRecord($id);
			//print_r($record);
			$this->loadView("newsFormView.php",["action"=>$action,"record"=>$record]);
		}
		//sua ban ghi - POST -> khi an nut submit
		//url: index.php?controller=news&action=updatePost&id=number
		public function updatePost(){
			//lay id truyen tu url
			$id = isset($_GET["id"]) ? $_GET['id'] : 0;
			//goi ham modelUpdate de update ban ghi
			$this->modelUpdate($id);
			//quay tro lai trang news
			header("location:index.php?controller=news");
		}
		//them ban ghi - GET
		//url: index.php?controller=news&action=create
		public function create(){
			//tao bien $action de gan vao thuoc tinh action cua the form
			$action = "index.php?controller=news&action=createPost";
			//print_r($record);
			$this->loadView("newsFormView.php",["action"=>$action]);
		}
		//them ban ghi - POST
		//url: index.php?controller=news&action=createPost
		public function createPost(){
			//goi ham modelUpdate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang news
			header("location:index.php?controller=news");
		}
		//xoa ban ghi - GET
		public function delete(){
			//goi ham modelDelete
			$this->modelDelete();
			header("location:index.php?controller=news");
		}
	}
 ?>