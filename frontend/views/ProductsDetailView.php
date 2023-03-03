<?php 
  //load file LayoutTrangTrong.php vao day
  $layout = "LayoutTrangTrong.php";
 ?>
<div class="top">
    <div class="row">
      <div class="col-xs-12 col-md-6 product-image">
        <div class="featured-image"> 
          <img src="../assets/upload/products/<?php echo $record->photo; ?>" style="width: 100%;" class="img-responsive"/>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 info">
        <h1 itemprop="name"><?php $record->name; ?></h1>
        <p class="vendor"> Category:&nbsp; <span> 
          <?php 
          $category = $this->modelGetCategory($record->category_id); 
          echo isset($category->name) ? $category->name : "";
        ?> </span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo number_format($record->price); ?>₫ </span></span></p>
        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - ($record->price * $record->discount)/100); ?>₫ </span></span></p>
      </p>
      <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn btn-primary">Cho vào giỏ hàng</a>
      <!-- rating -->
      <div style="border:1px solid #dddddd; margin-top: 15px;">
        <h4 style="padding-left: 10px;">Rating</h4>
        <table style="width: 100%;">
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"></td>
            <td><span class="label label-primary"><?php echo $this->modelGetStar($id,1); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
            <td><span class="label label-warning"><?php echo $this->modelGetStar($id,2); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
            <td><span class="label label-danger"><?php echo $this->modelGetStar($id,3); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
            <td><span class="label label-info"><?php echo $this->modelGetStar($id,4); ?> vote</span></td>
          </tr>
          <tr>
            <td style="width: 80%; padding-left: 10px;"><img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"> <img src="../assets/frontend/images/star.jpg"></td>
            <td><span class="label label-success">1 vote</span></td>
          </tr>
        </table>
        <br>
      </div>
      <!-- /rating -->
    </div>
  </div>
</div>
<div class="middle" style="margin-top:20px;">
  <!-- chi tiet -->
  <p>Trong khu&ocirc;n khổ Vietnam Motor Show 2019 diễn ra v&agrave;o cuối th&aacute;ng 10 vừa qua. Lexus giới thiệu đến 4 phi&ecirc;n bản kh&aacute;c nhau bao gồm RX 300, RX 350, RX 350L v&agrave; RX 450h đi c&ugrave;ng gi&aacute; b&aacute;n từ 3,18 - 4,64 tỷ đồng.</p>
  <p>Trong số 4 phi&ecirc;n bản tr&ecirc;n, người ti&ecirc;u d&ugrave;ng tại Việt Nam thường quen thuộc với RX 350 bởi đ&acirc;y ch&iacute;nh l&agrave; phi&ecirc;n bản RX đang lăn b&aacute;nh nhiều nhất tại Việt Nam</p>
  <p>Về thiết kế, ngoại thất của RX 350 phi&ecirc;n bản 2020 vẫn duy tr&igrave; vẻ mạnh mẽ v&agrave; thể thao trong khi đường g&acirc;n dọc h&ocirc;ng xe sẽ được t&aacute;i thiết kế mang đến cho RX một vẻ ngo&agrave;i mượt m&agrave; v&agrave; thống nhất hơn, nhấn mạnh ng&ocirc;n ngữ thiết kế mới của Lexus.</p>
  <p>M&acirc;m xe của RX 350 phi&ecirc;n bản 2020 với thiết kế c&aacute; t&iacute;nh, trẻ trung, mang lại vẻ thanh lịch v&agrave; quyến rũ trong từng chuyển động.</p>
  <!-- chi tiet -->
</div>