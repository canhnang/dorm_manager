<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa thông tin tài khoản</title>
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

     
     <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <h4>Chỉnh sửa thông tin tài khoản</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <?php 
                                                        require_once "../../config/connectDB.php";
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM user WHERE user_id = $id";
                                                            $result = executeResult($sql);
                                                                foreach ($result as $key => $value) {

                                                         ?>
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" 
                                                                 name="username" required value="<?php echo $value['username'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" class="form-control" 
                                                                 name="password" required value="<?php echo $value['password'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <?php 
                                                                    $sql2 = "SELECT * FROM staffs JOIN user ON staffs.staff_id = user.staff_id WHERE user_id = $id";
                                                                    $st_name = mysqli_query($conn, $sql2);
                                                                    foreach ($st_name as $item) {
                                                                         ?>
                                                                         <label for="staff_select">Thuộc nhân viên:    <span style="color: red;"> <?php echo $item['staff_name'] ?></span> </label>
                                                                         '
                                                                <?php   }
                                                                  

                                                                 ?>
                                                                
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="role_select">Phân quyền</label>
                                                                <select class="form-control" name='role' id="role_select" required>
                                                                    <option value="1" <?php echo ($value['role']==1)? 'selected': '' ?>>Admin</option>
                                                                    <option value="0" <?php echo ($value['role']==0)? 'selected': '' ?>>User</option>
                                                                  
                                                                </select>
                                                              </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Trạng thái:</legend>
                                                              <input class="form-check-input" type="radio"  value="1" id="active" name="isActive" <?php echo ($value['role']==1)? 'checked': '' ?>>
                                                              <label class="form-check-label" for="active">
                                                                Active
                                                              </label>
                                                            </div>
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio"  value="0"
                                                              id="non-active" name="isActive" <?php echo ($value['role']==0)? 'checked': '' ?>>
                                                              <label class="form-check-label" for="non-active">
                                                                Non-Active
                                                              </label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="form_click">Lưu lại</button>

                                                        </form>

                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


     <?php 
        require_once "../../config/connectDB.php"; 
        if(!empty($_POST)){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $isActive = $_POST['isActive'];  

        
            if(isset($_POST['form_click'])){
                
                $sql_update = 'UPDATE user SET username = "'.$username.'", password = "'.$password.'", role = '.$role.', isActive = "'.$isActive.'" WHERE user_id ='.$id;
                execute($sql_update);
                echo '<script>location.href = "./";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>