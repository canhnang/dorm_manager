<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include("../../config/head.php") ?>
    <title>Nhóm 12 - Quản lý hợp đồng</title>
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
                            <h4>Danh sách hợp đồng</h4>
                            <div class="row">
                            	<div class="breadcome-heading col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<form method="GET" class="sr-input-func">
                                    	<input type="text" placeholder="name..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                	</form>
                            	</div>
                            	<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<a class="btn btn-primary" style="float: right;" href="./add_contract.php">Thêm hợp đồng</a>
                            	</div>
                            	<div class="asset-inner col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                	<table>
                                    <tr>
                                        <th class="col-lg-1">#</th>
                                        <th class="col-lg-2">Tên Học Sinh</th>
                                        <th class="col-lg-1">Tên Phòng</th>
                                        <th class="col-lg-2">Tên Nhân Viên</th>
                                        <th class="col-lg-2">Ngày Tạo</th>
                                        <th class="col-lg-3">Ghi Chú</th>
                                        <th class="col-lg-1"></th>
                                    </tr>
                                    <?php 
                                        require_once "../../config/connectDB.php";
                                        $sql_select = "SELECT student_name, room_name, staff_name, contract_id, created_at, ctr.note FROM `contract` ctr JOIN dorm_room dr ON dr.room_id = ctr.room_id JOIN staffs stf ON stf.staff_id = ctr.staff_id JOIN students std ON std.student_id = ctr.student_id";
                                        $result = executeResult($sql_select);
                                            foreach ($result as $key => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key + 1 ?> 
                                                </td>
                                                <td><?php echo $value['student_name'] ?></td>
                                                <td><?php echo $value['room_name'] ?></td>
                                                <td><?php echo $value['staff_name'] ?></td>
                                                <td><?php echo $value['created_at'] ?></td>
                                                <td><?php echo $value['note'] ?></td>
                                                <td>
                                                    
                                                    <form method="POST">
                                                        <?php 
                                                        echo '
                                                            <a title="Sửa" class="btn btn-info" href="/dorm_manager/page/contracts/edit_contract.php?id='.$value['contract_id'].'">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                             </a>
                                                            <input value="'.$value['contract_id'].'" type="hidden" name="contractID" >
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
                                            $contractID = $_POST['contractID'];
                                      
                                            
                                            if(isset($_POST['form_delete'])){
                                                $sql = 'DELETE FROM contract where contract_id = "'.$contractID.'"';
                                                execute($sql);
                                                echo '<script>location.href = "/dorm_manager/page/contracts";</script>';
                                                die();
                                            }

                                        }
                                    ?>

                                    
                                    
                                	</table>
                            	</div>
                            </div>
                            
                            
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
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