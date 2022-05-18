<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include("../../config/head.php") ?>
    <title>Nhóm 12 - Quản lý hóa đơn</title>
</head>

<body>
   <?php 
     include("../../layout/sidebar.php"); ?>
     <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
     
      
     <?php include("../../layout/header.php"); ?>

     
     <div class="product-status mg-b-15">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách hóa đơn</h4>
                            <div class="row">
                            	<div class="breadcome-heading col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<form method="GET" class="sr-input-func">
                                    	<input type="text" placeholder="name..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                	</form>
                            	</div>
                            	<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<a class="btn btn-primary" style="float: right;" href="./add_bill.php">Thêm hóa đơn</a>
                            	</div>
                            	<div class="asset-inner col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                	<table class="center">
                                    <tr>
                                        <th class="col-lg-1">#</th>
                                        <th class="col-lg-2">Tên Nhân viên</th>
                                        <th class="col-lg-1">Tên Phòng</th>
                                        <th class="col-lg-3">Thông Tin</th>
                                        <th class="col-lg-1">Tháng</th>
                                        <th class="col-lg-3">Ghi Chú</th>
                                        <th class="col-lg-1"></th>
                                    </tr>
                                    <?php 
                                        require_once "../../config/connectDB.php";
                                        $sql_select = "SELECT dr.room_rate,bill_id,staff_name, electric_consume, electric_price, water_consume, water_price, room_name, student_name, bill.created_at, bill.note, month_of FROM `room_bill` bill JOIN students std ON bill.student_id = std.student_id JOIN staffs stf ON stf.staff_id = bill.staff_id JOIN dorm_room dr on dr.room_id = bill.room_id;";
                                        $result = executeResult($sql_select);
                                            foreach ($result as $key => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key + 1 ?> 
                                                </td>
                                                <td><?php echo $value['staff_name'] ?></td>
                                                <td><?php echo $value['room_name'] ?></td>
                                                <td>
                                                    <table class="table table-bordered">
                                                      <tbody>
                                                        <tr>
                                                          <td>Số điện</td>
                                                          <td><?php echo $value['electric_consume'] ?> kg</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Giá điện</td>
                                                          <td><?php echo $value['electric_price'] ?> k/kg</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Số nước</td>
                                                          <td><?php echo $value['water_consume'] ?> khối</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Giá nước</td>
                                                          <td><?php echo $value['water_price'] ?> k/khối</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Giá phòng</td>
                                                          <td><?php echo $value['room_rate'] ?> k</td>
                                                        </tr>
                                                        <tr>
                                                            <?php $total = $value['room_rate'] + $value['water_consume'] * $value['water_price'] + $value['electric_consume'] * $value['electric_price'] ?>
                                                          <td>Tổng cộng</td>
                                                          <td><?php echo $total ?> k</td>
                                                        </tr>
                                                        <tr>
                                                          <td>Người thanh toán</td>
                                                          <td><?php echo $value['student_name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Tạo ngày</td>
                                                          <td><?php echo $value['created_at'] ?></td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                </td>
                                                <td><?php echo $value['month_of'] ?></td>
                                                <td><?php echo $value['note'] ?></td>
                                                <td>
                                                    
                                                    <form method="POST">
                                                        <?php 
                                                        echo '
                                                            <a title="Sửa" class="btn btn-info" href="/dorm_manager/page/bill/edit_bill.php?id='.$value['bill_id'].'">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                             </a>
                                                            <input value="'.$value['bill_id'].'" type="hidden" name="contractID" >
                                                        '
                                                         ?>
                                                        
                                                        <button title="Xóa" class="btn btn-danger" disabled type="submit" name="form_delete">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form> 
                                                </td>
                                            </tr>
                                    <?php } 

                                        if(!empty($_POST)){
                                            $billID = $_POST['bill_id'];
                                      
                                            
                                            if(isset($_POST['form_delete'])){
                                                $sql = 'DELETE FROM room_bill where bill_id = "'.$billID.'"';
                                                execute($sql);
                                                echo '<script>location.href = "/dorm_manager/page/bill";</script>';
                                                die();
                                            }

                                        }
                                    ?>

                                    
                                    
                                	</table>
                            	</div>
                            </div>
                            
                            
                            <!-- <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>