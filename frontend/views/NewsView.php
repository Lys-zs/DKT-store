<?php 
  //load file LayoutTrangTrong.php vao day
  $layout = "LayoutTrangTrong.php";
 ?>
<h1>Tin tức</h1>
  <div class="wrapper-blog">     
    <!-- list news -->
    <div class="row">
    <?php foreach($data as $rows): ?>  
      <div class="col-md-6 article"> <a href="index.php?controller=news&action=detail&newsId=<?php echo $rows->id; ?>" class="image"> <img src="../assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive"> </a>
        <h3><a href="index.php?controller=news&action=detail&newsId=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
        <p class="desc"><?php echo $rows->description; ?></p>
      </div>
    <?php endforeach; ?> 
    </div>
    <!-- end list news -->
    <ul class="pagination pull-right" style="margin-top: 0px !important">
      <li><a href="#">Trang</a></li>
      <?php for($i = 1; $i <= $numPage; $i++): ?>
      <li><a href="index.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    </ul>
  </div>