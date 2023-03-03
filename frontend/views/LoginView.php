<?php 
    //load file layout vao day
    $layout = "LayoutTrangTrong.php";
 ?>
 <div class="template-customer">
      <h1>Đăng nhập tài khoản</h1>
      <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
      <div class="row" style="margin-top:50px;">
        <div class="col-md-6">
          <div class="wrapper-form">
            <form method='post' action="index.php?controller=account&action=loginPost">              
              <p class="title"><span>Đăng nhập tài khoản</span></p>
              <div class="form-group">
                <label>Email:<b id="req">*</b></label>
                <input type="email" class="input-control" name="email" required="">
              </div>
              <div class="form-group">
                <label>Mật khẩu:<b id="req">*</b></label>
                <input type="password" class="input-control" name="password" required="">
              </div>
              <input type="submit" class="button" value="Đăng nhập">
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="wrapper-form">
            <p class="title"><span>Tạo tài khoản mới</span></p>
            <p>Đăng ký tài khoản để mua hàng nhanh hơn. Theo dõi đơn đặt hàng, vận chuyển. Cập nhật các sự kiện và chương trình giảm giá của chúng tôi.</p>
            <a href="index.php?controller=account&action=register" class="button">Đăng ký</a> </div>
        </div>
      </div>
    </div>