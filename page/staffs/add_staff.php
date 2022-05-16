<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm nhân viên</title>
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
     
      
     <?php include("../../layout/header.php"); $alert = ''; ?>

     
     <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <h4>Thêm nhân viên</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Họ và tên" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Căn cước công dân" name="cccd" required>
                                                            </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Giới tính:</legend>
                                                              <input class="form-check-input" type="radio" id="male" value="1" name="gender" checked>
                                                              <label class="form-check-label" for="male">
                                                                Nam
                                                              </label>
                                                            </div>
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" id="female" value="0" name="gender">
                                                              <label class="form-check-label" for="female">
                                                                Nữ
                                                              </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Số điện thoại"name="phone" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Địa chỉ" name="address" required>
                                                            </div>
                                                            <hr>
                                                            <h4>Tài khoản</h4>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Username" name="username" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" 
                                                                placeholder="Mật khẩu" name="password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" 
                                                                placeholder="Xác nhận mật khẩu" name="cf_password" required>
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
                                                            <hr>
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú"></textarea>
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
            $name = $_POST['name'];
            $cccd = $_POST['cccd'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cf_password = $_POST['cf_password'];
            $role = $_POST['role'];
            $isActive = $_POST['isActive'];
            $note = $_POST['note'];  

        
            if(isset($_POST['form_click'])){
                
                if($password == $cf_password){
                    $sql = 'INSERT INTO staffs VALUES(NULL, "'.$cccd.'", "'.$name.'", "'.$gender.'", "'.$address.'", "'.$note.'", "'.$phone.'", "'.$username.'", "'.$password.'", "'.$role.'", "'.$isActive.'")';
                    execute($sql);
                    echo '<script>location.href = "/dorm_manager/page/staffs";</script>';
                    die();  
                }else{
                    echo '<script>alert("Xác nhận mật khẩu không chính xác!");</script>';
                }
                
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>