<?php 
	//load model
	include "models/SearchModel.php";
	class SearchController extends Controller{
		use SearchModel;
		//tim kiem theo ten san pham
		public function name(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//lay tong so ban ghi 
			$totalRecord = $this->modelTotalRecordSearchName($key);
			//tinh so trang
			//ceil(so) se lay tran. VD: ceil(3.6) = 4
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu
			$data = $this->modelReadSearchName($recordPerPage,$key);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchNameView.php",["data"=>$data,"numPage"=>$numPage,"key"=>$key]);
		}
		//tim kiem theo gia san pham
		public function price(){
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 20;
			//lay tong so ban ghi 
			$totalRecord = $this->modelTotalRecordSearchPrice($fromPrice,$toPrice);
			//tinh so trang
			//ceil(so) se lay tran. VD: ceil(3.6) = 4
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay du lieu
			$data = $this->modelReadSearchPrice($recordPerPage,$fromPrice,$toPrice);
			//goi view, truyen du lieu ra view
			$this->loadView("SearchNameView.php",["data"=>$data,"numPage"=>$numPage,"fromPrice"=>$fromPrice,"toPrice"=>$toPrice]);
		}
		//ajax search
		public function ajax(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			$data = $this->modelReadSearchAjax($key);
			$result = "";
			foreach ($data as $rows) {
				$result = $result."<li><img src='../assets/upload/products/{$rows->photo}'> <a href='index.php?controller=products&action=detail&id={$rows->id}'>{$rows->name}</a></li>";
			}
			echo $result;
		}
	}
 ?>