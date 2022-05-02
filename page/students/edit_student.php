<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa thông tin học sinh</title>
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
                            <h4>Chỉnh sửa thông tin học sinh</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                        
                                                            <?php 
                                                            require_once "../../config/connectDB.php";
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT student_name, student_code, birthday, gender, phone, address, student_id, students.room_id, room_name  FROM `students` JOIN dorm_room ON students.room_id = dorm_room.room_id WHERE student_id = $id";
                                                            $result = executeResult($sql);
                                                                foreach ($result as $key => $value) {
                                                                ?>
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Họ và tên" name="name" required value="<?php echo $value['student_name'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Mã học sinh" name="mhs" required 
                                                                value="<?php echo $value['student_code'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control" 
                                                                placeholder="Ngày sinh" name="birthday" required
                                                                value="<?php echo $value['birthday'] ?>">
                                                            </div>
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
                                                                placeholder="Số điện thoại"name="phone" required
                                                                value="<?php echo $value['phone'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Địa chỉ" name="address" required
                                                                value="<?php echo $value['address'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="room_select">Phòng ở: <span style="color: red"><?php echo $value['room_name'] ?></span></label>
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
            $mhs = $_POST['mhs'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];

        
            if(isset($_POST['form_click'])){
                
                $sql = 'UPDATE students SET student_code = "'.$mhs.'", student_name = "'.$name.'", birthday = "'.$birthday.'", gender = "'.$gender.'", phone = "'.$phone.'", address = "'.$address.'"WHERE student_id ='.$id;
                execute($sql);
                echo '<script>location.href = "/dorm_manager/page/students";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>