<?php 
	include "models/productsModel.php";
	class ProductsController extends Controller{
		use productsModel;
		//danh sach cac san pham hien thi theo id danh muc
		public function category(){
			$categoryId = isset($_GET["catId"]) ? $_GET["catId"] : 0;
			//so ban ghi tren mot trang
			$recordPerPage = 20;
			//tong so trang
			$numPage = ceil($this->modelTotalRecord($categoryId)/$recordPerPage);
			$data = $this->modelRead($recordPerPage,$categoryId);
			$this->loadView("ProductsCategoryView.php",["data"=>$data,"numPage"=>$numPage]);
		}
		//chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$record = $this->modelGetRecord($id);
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsDetailView.php",["record"=>$record,"id"=>$id]);
		}
		//danh gia so sao san pham
		public function rating(){
			$productId = isset($_GET["productId"]) ? $_GET["productId"] : 0;
			$this->modelRating();
			//den trang chi tiet san pham
			header("location:index.php?controller=products&action=detail&id=$productId");
		}
	}
 ?>