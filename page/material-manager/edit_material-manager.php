<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa thông tin cơ sở vật chất</title>
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
                            <h4>Chỉnh sửa thông tin cơ sở vật chất phòng</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <?php 
                                                        require_once "../../config/connectDB.php";
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT room_name, room_information, material_manager.note FROM material_manager JOIN dorm_room ON material_manager.room_id = dorm_room.room_id where id = $id";
                                                            $result = executeResult($sql);
                                                                foreach ($result as $key => $value) {

                                                         ?>
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label>Tên phòng: <span style="color: red;"><?php echo $value['room_name'] ?></span></label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Thông tin cơ sở vật chất</label>
                                                                <textarea name="room_information" cols="30" rows="10" required><?php echo $value['room_information'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Ghi chú</label>
                                                                <textarea name="note" cols="30" rows="10"><?php echo $value['note'] ?></textarea>
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
            $roomInformation = $_POST['room_information'];
            $note = $_POST['note'];  
        
            if(isset($_POST['form_click'])){
                
                $sql_update = 'UPDATE material_manager SET room_information = "'.$roomInformation.'", note = "'.$note.'" WHERE material_id ='.$id;
                execute($sql_update);
                echo '<script>location.href = "/dorm_manager/page/material-manager";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>