<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm thông tin cơ sở vật chất</title>
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
                            <h4>Thêm thông tin cơ sở vật chất phòng</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label for="staff_select">Phòng</label>
                                                                <select multiple class="form-control" name='room_id' id="staff_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM `dorm_room` WHERE room_id NOT IN (SELECT room_id FROM material_manager)";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $value) {
                                                                            echo "
                                                                            <option value=".$value['room_id']." >".$value['room_name']."</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                  
                                                                  
                                                                </select>
                                                            </div>
                                                                <div class="form-group">
                                                                    <label>Thông tin cơ sở vật chất</label>
                                                                    <textarea name="room_information" cols="30" rows="10" required></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ghi chú</label>
                                                                    <textarea name="note" cols="30" rows="10"></textarea>
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
            $roomId = $_POST['room_id'];
            $roomInformation = $_POST['room_information'];
            $note = $_POST['note'];  

        
            if(isset($_POST['form_click'])){
                
                $sql_insert = 'INSERT INTO material_manager VALUES(NULL, '.$roomId.', "'.$roomInformation.'","'.$note.'")';
                execute($sql_insert);
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