<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Quản lý thông tin học sinh</title>
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
                            <h4>Danh sách học sinh</h4>
                            <div class="row">
                            	<div class="breadcome-heading col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<form method="GET" class="sr-input-func">
                                    	<input type="text" placeholder="name..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                	</form>
                            	</div>
                            	<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<a class="btn btn-primary" style="float: right;" href="./add_student.php">Thêm học sinh</a>
                            	</div>
                            	<div class="asset-inner col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                	<table>
                                    <tr>
                                        <th class="col-lg-1">#</th>
                                        <th class="col-lg-2">Mã Học Sinh</th>
                                        <th class="col-lg-2">Họ Và Tên</th>
                                        <th class="col-lg-1">Giới Tính</th>
                                        <th class="col-lg-3">Thông Tin</th>
                                        <th class="col-lg-2">Phòng</th>
                                        <th class="col-lg-1"></th>
                                    </tr>
                                    <?php 
                                        require_once "../../config/connectDB.php";
                                        $sql = "SELECT * FROM `students` LEFT JOIN dorm_room ON students.room_id = dorm_room.room_id";
                                        $result = executeResult($sql);
                                            foreach ($result as $key => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key + 1 ?> 
                                                </td>
                                                <td><?php echo $value['student_code'] ?></td>
                                                <td><?php echo $value['student_name'] ?></td>
                                                <?php $gt = ($value['gender']==1)?'Nam':'Nữ' ?>
                                                <td><?php echo $gt  ?></td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td class="col-lg-4" style="border: none;">SĐT</td>
                                                            <td  style="border: none;"><?php echo $value['phone'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Địa Chỉ</td>
                                                            <td><?php echo $value['address'] ?></td>

                                                        </tr>
                                                    </table>
                                                    
                                                </td>
                                                <td><?php echo $value['room_name'] ?></td>
                                                <td>
                                                    
                                                    <form method="POST">
                                                        <?php 
                                                        echo '
                                                            <a title="Sửa" class="btn btn-info" href="/dorm_manager/page/students/edit_student.php?id='.$value['student_id'].'">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                             </a>
                                                            <input value="'.$value['student_id'].'" type="hidden" name="studentID" >
                                                        '
                                                         ?>
                                                        
                                                        <button title="Xóa" class="btn btn-danger" type="submit" name="form_delete">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form> 
                                                </td>
                                            </tr>
                                    <?php } 

                                        if(!empty($_POST)){
                                            $studentID = $_POST['studentID'];
                                      
                                            
                                            if(isset($_POST['form_delete'])){
                                                $sql = 'DELETE FROM students where student_id = "'.$studentID.'"';
                                                execute($sql);
                                                echo '<script>location.href = "/dorm_manager/page/students";</script>';
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