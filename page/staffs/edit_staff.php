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
                                                            <?php  echo'
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Số điện thoại"name="phone" required value="'.$value['phone'].'">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Địa chỉ" name="address" required value="'.$value['address'].'">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú">'.$value['note'].'</textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="form_click">Lưu lại</button>

                                                        </form>' ?>
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
            $note = $_POST['note'];  

            if(isset($_POST['form_click'])){
                
                $sql = 'UPDATE staffs SET apartment_id = "'.$cccd.'", staff_name = "'.$name.'", gender = "'.$gender.'", address = "'.$address.'", phone = "'.$phone.'", note = "'.$note.'" WHERE staff_id ='.$id;
                execute($sql);
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