<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa thông tin nhân viên</title>
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
                            <h4>Chỉnh sửa thông tin nhân viên</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                        <?php 
                                                            require_once "../../config/connectDB.php"; 
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM staffs WHERE staff_id = $id";
                                                            $staffs = executeResult($sql);
                                                            foreach ($staffs as $value){
                                                            
                                                         echo '       
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Họ và tên" name="name" required value="'.$value['staff_name'].'">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Căn cước công dân" name="cccd" required value="'.$value['apartment_id'].'">
                                                            </div>'
                                                            ?>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Giới tính:</legend>
                                                              <input class="form-check-input" type="radio" id="male" value="1" name="gender" <?php echo ($value['gender']==1)? 'checked': ''  ?>>
                                                              <label class="form-check-label" for="male">
                                                                Nam
                                                              </label>
                                                            </div>
                                                            
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" id="female" value="0" name="gender" <?php echo ($value['gender']==0)? 'checked': ''  ?>>
                                                              <label class="form-check-label" for="female">
                                                                Nữ
                                                              </label>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Số điện thoại"name="phone" required value="<?php echo $value['phone'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Địa chỉ" name="address" required value="<?php echo $value['address'] ?>">
                                                            </div>
                                                            <hr>
                                                            <h4>Tài khoản</h4>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Username" name="username" required value="<?php echo $value['username'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" 
                                                                placeholder="Mật khẩu mới" name="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" 
                                                                placeholder="Xác nhận mật khẩu" name="cf_password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role_select">Phân quyền</label>
                                                                <select class="form-control" name='role' id="role_select" required>
                                                                    <option value="1" <?php echo(($value['role'] == 1)? 'selected' : '') ?>>Admin</option>
                                                                    <option value="0" <?php echo(($value['role'] == 0)? 'selected' : '' )?>>User</option>
                                                                  
                                                                </select>
                                                              </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Trạng thái:</legend>
                                                              <input class="form-check-input" type="radio"  value="1" id="active" name="isActive" <?php echo(($value['isActive'] == 1)? 'checked' : '' )?>>
                                                              <label class="form-check-label" for="active">
                                                                Active
                                                              </label>
                                                            </div>
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio"  value="0"
                                                              id="non-active" name="isActive" <?php echo(($value['role'] == 0)?'checked' : '' )?>>
                                                              <label class="form-check-label" for="non-active">
                                                                Non-Active
                                                              </label>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú"><?php echo $value['note'] ?></textarea>
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
            $id = $_GET['id'];
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
                
                if($password == null && $cf_password == null){
                    $sql = 'UPDATE staffs SET apartment_id = "'.$cccd.'", staff_name = "'.$name.'", gender = "'.$gender.'", address = "'.$address.'", phone = "'.$phone.'", note = "'.$note.'", username = "'.$username.'", role = "'.$role.'", isActive = "'.$isActive.'" WHERE staff_id ='.$id;
                    execute($sql);
                    echo '<script>location.href = "/dorm_manager/page/staffs";</script>';
                    die();
                }else if($password != $cf_password){
                    echo '<script>alert("Xác nhận mật khẩu không chính xác!");</script>';
                }else{
                    $sql2 = 'UPDATE staffs SET apartment_id = "'.$cccd.'", staff_name = "'.$name.'", gender = "'.$gender.'", address = "'.$address.'", phone = "'.$phone.'", note = "'.$note.'", username = "'.$username.'", password = "'.$password.'",role = "'.$role.'", isActive = "'.$isActive.'" WHERE staff_id ='.$id;
                    execute($sql2);
                    echo '<script>location.href = "/dorm_manager/page/staffs";</script>';
                    die();
                }
                    
            }
        }
            

        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>
     <?php include("../../config/js.php") ?>
</body>

</html>