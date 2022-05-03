<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm tài khoản</title>
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
                            <h4>Thêm tài khoản</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" 
                                                                 name="username" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" class="form-control" 
                                                                 name="password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="staff_select">Thuộc nhân viên</label>
                                                                <select multiple class="form-control" name='staff' id="staff_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM `staffs` WHERE staff_id NOT IN (SELECT staff_id FROM user)";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $key => $value) {
                                                                            echo "
                                                                            <option value=".$value['staff_id']." >".$value['staff_name']."</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                  
                                                                  
                                                                </select>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="role_select">Phân quyền</label>
                                                                <select class="form-control" name='role' id="role_select" required>
                                                                    <option value="1" selected>Admin</option>
                                                                    <option value="0">User</option>
                                                                  
                                                                </select>
                                                              </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Trạng thái:</legend>
                                                              <input class="form-check-input" type="radio"  value="1" id="active" name="isActive" checked>
                                                              <label class="form-check-label" for="active">
                                                                Active
                                                              </label>
                                                            </div>
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio"  value="0"
                                                              id="non-active" name="isActive">
                                                              <label class="form-check-label" for="non-active">
                                                                Non-Active
                                                              </label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="form_click">Lưu lại</button>

                                                        </form>
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
            $staff = $_POST['staff'];
            $isActive = $_POST['isActive'];  

        
            if(isset($_POST['form_click'])){
                
                $sql = 'INSERT INTO user VALUES(NULL, "'.$username.'", "'.$password.'", '.$staff.', '.$role.', '.$isActive.')';
                execute($sql);
                echo '<script>location.href = "/dorm_manager/page/users";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>