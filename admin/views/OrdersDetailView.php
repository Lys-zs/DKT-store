<?php 
    //load file layout vao day
    $layout = "Layout.php";
 ?>
 <?php 
    $conn = Connection::getInstance();
    $query = $conn->query("select * from customers where id = (select customer_id from orders where id=$id limit 0,1)");
    $customer = $query->fetch(PDO::FETCH_OBJ);
  ?>
<div class="col-md-12">
    <div class="panel panel-default" style="margin-bottom:5px;">
        <div class="panel-heading">Thông tin đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width:150px;">Họ tên</th>
                    <th><?php echo $customer->name; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Email</th>
                    <th><?php echo $customer->email; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Địa chỉ</th>
                    <th><?php echo $customer->address; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Điện thoại</th>
                    <th><?php echo $customer->phone; ?></th>
                </tr>
            </table>            
        </div>
        <div class="panel-footer"><a href="#" onclick="history.go(-1);" class="btn btn-primary">Quay lại</a></div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List products</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:100px;">Photo</th>
                    <th>Name</th>
                    <th style="width:80px;">Price</th>
                    <th style="width:80px;">Discount</th>
                </tr>
                <?php foreach($data as $rows): ?>
                    <?php $product = (new OrdersController())->modelGetProduct($rows->product_id); ?>
                <tr>
                    <td>
                        <?php if($product->photo != "" && file_exists("../assets/upload/products/".$product->photo)): ?>
                            <img src="../assets/upload/products/<?php echo $product->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo number_format($product->price); ?></td>
                    <td style="text-align:center;"><?php echo $product->discount; ?> %</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>