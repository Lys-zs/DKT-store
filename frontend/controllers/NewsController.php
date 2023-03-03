<?php 
	include "models/NewsModel.php";
	class NewsController extends Controller{
		//ke thua class NewsModel
		use NewsModel;
		//danh sach tin tuc
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
		//chi tiet tin tuc
		public function detail(){
			$id = isset($_GET['newsId']) ? $_GET['newsId'] : 0;
			$record = $this->modelGetRecord($id);
			$this->loadView("NewsDetailView.php",["record"=>$record,"id"=>$id]);
		}
	}
 ?>