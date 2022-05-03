<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Quản lý tài khoản</title>
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
                            <h4>Danh sách tài khoản</h4>
                            <div class="row">
                            	<div class="breadcome-heading col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<form method="GET" class="sr-input-func">
                                    	<input type="text" placeholder="name..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                	</form>
                            	</div>
                            	<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<a class="btn btn-primary" style="float: right;" href="./add_user.php">Thêm tài khoản</a>
                            	</div>
                            	<div class="asset-inner col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                	<table>
                                      <thead>
                                        <tr>
                                            <th class="col-lg-2">#</th>
                                            <th class="col-lg-2">Tài Khoản</th>
                                            <th class="col-lg-2">Tên Nhân Viên</th>
                                            <th class="col-lg-2">Phân Quyền</th>
                                            <th class="col-lg-2">Trạng Thái</th>
                                            <th class="col-lg-2"></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                            <?php 
                                                require_once "../../config/connectDB.php";
                                                $sql = "SELECT * FROM `user` JOIN staffs WHERE staffs.staff_id = user.staff_id";
                                                $result = executeResult($sql);
                                                foreach ($result as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td><?php echo $value['username']; ?></td>
                                                         <td><?php echo $value['staff_name'] ?></td>
                                                         <td><?php echo ($value['role']==1)?'<span class="label label-success">Admin</span>': '<span class="label label-warning">User</span>' ?>
                                                         </td>
                                                         <td><?php echo ($value['isActive']==1)?'<span class="label label-primary">Active</span>': '<span class="label label-default">Non-Active</span>' ?>
                                                         </td>
                                                         <td>
                                                            <form method="POST">
                                                                <?php 
                                                                echo '
                                                                    <a title="Sửa" class="btn btn-info" href="./edit_user.php?id='.$value['user_id'].'">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                     </a>
                                                                    <input value="'.$value['user_id'].'" type="hidden" name="userID" >
                                                                '
                                                                 ?>
                                                                
                                                                <button title="Xóa" class="btn btn-danger" type="submit" name="form_delete">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>
                                                            </form> 
                                                        </td>
                                                     </tr>

                                      </tbody>
                                      <?php } 

                                        if(!empty($_POST)){
                                            $userID = $_POST['userID'];
                                      
                                            
                                            if(isset($_POST['form_delete'])){
                                                $sql = 'DELETE FROM user where user_id = "'.$userID.'"';
                                                execute($sql);
                                                echo '<script>location.href = "./";</script>';
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