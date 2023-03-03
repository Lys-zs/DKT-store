<?php 
  //load file LayoutTrangTrong.php vao day
  $layout = "LayoutTrangTrong.php";
 ?>
<div class="special-collection">
  <div class="tabs-container">
    <div class="row" style="margin-top:10px;">
      <div class="head-tabs head-tab1 col-lg-3">
        <h2>
          <?php 
            $categoryId = isset($_GET["catId"]) ? $_GET["catId"] : 0;
            $category = $this->modelGetCategory($categoryId);
            echo isset($category->name)?$category->name:"";
           ?>
        </h2>
      </div>
      <div class="col-lg-3 pull-right text-right">
        <select class="form-control" onchange="location.href = 'index.php?controller=products&action=category&catId=<?php echo $categoryId ?>&order='+this.value;">
          <option value="0">Sắp xếp</option>
          <option <?php if(isset($_GET["order"])&&$_GET["order"]=="priceAsc"): ?>  selected <?php endif; ?> value="priceAsc">Giá tăng dần</option>
          <option <?php if(isset($_GET["order"])&&$_GET["order"]=="priceDesc"): ?>  selected <?php endif; ?> value="priceDesc">Giá giảm dần</option>
          <option <?php if(isset($_GET["order"])&&$_GET["order"]=="nameAsc"): ?>  selected <?php endif; ?> value="nameAsc">Sắp xếp A-Z</option>
          <option <?php if(isset($_GET["order"])&&$_GET["order"]=="nameDesc"): ?>  selected <?php endif; ?> value="nameDesc">Sắp xếp Z-A</option>
        </select>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="tabs-content row">
    <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
      <div class="clearfix"> 
         
      <?php foreach($data as $rows): ?>
      <!-- box product -->
      <div class="col-xs-6 col-md-3 col-sm-6 ">
        <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
          <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="../assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
          <div class="info">
            <h3 class="name"><a href="index.php?controller=products&action=detail&productId=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
            <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($rows->price); ?></span> ₫ </span> </p>
            <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> </span>₫ </span> </p>
            <p class="price-box"> 
              <a href="index.php?controller=products&action=rating&productId=<?php echo $rows->id; ?>&star=1"><img src="../assets/frontend/images/star.jpg"></a> 
              <a href="index.php?controller=products&action=rating&productId=<?php echo $rows->id; ?>&star=2"><img src="../assets/frontend/images/star.jpg"></a> 
              <a href="index.php?controller=products&action=rating&productId=<?php echo $rows->id; ?>&star=3"><img src="../assets/frontend/images/star.jpg"></a> 
              <a href="index.php?controller=products&action=rating&productId=<?php echo $rows->id; ?>&star=4"><img src="../assets/frontend/images/star.jpg"></a> 
              <a href="index.php?controller=products&action=rating&productId=<?php echo $rows->id; ?>&star=5"><img src="../assets/frontend/images/star.jpg"></a> 
            </p>
            <div class="action-btn">
              <form>
                <a href="index.php?controller=cart&action=create&productId=<?php echo $rows->id; ?>" class="button">Add to Cart</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end box product -->  
      <?php endforeach; ?>
        
        <!-- paging -->
        <div style="clear: both;"></div>
        <div style="margin-top: -50px;"  class="&#x70;&#x61;&#x67;&#x69;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x2D;&#x63;&#x6F;&#x6E;&#x74;&#x61;&#x69;&#x6E;&#x65;&#x72;">
          <ul class="pagination">
            <li class="page-item"><span>Trang</span></li>
            <?php for($i = 1; $i <= $numPage; $i++): ?>
            <li class="page-item"><a class="page-link" href="index.php?controller=products&action=category&catId=<?php echo $categoryId; ?>&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
          </ul>
        </div>
        <!-- end paging --> 
      </div>
    </div>
  </div>
</div>