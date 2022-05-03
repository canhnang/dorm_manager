<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm phòng ký túc xá</title>
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
                            <h4>Thêm  phòng ký túc xá</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Tên phòng" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="building_select">Thuộc dãy</label>
                                                                <select multiple class="form-control" name='buildings' id="building_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM buildings";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $key => $value) {
                                                                            echo "
                                                                            <option value=".$value['building_id']." >".$value['building_name']."</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                  
                                                                  
                                                                </select>
                                                              </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Số người tối đa" name="room_capacity" required>
                                                            </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Loại phòng:</legend>
                                                              <input class="form-check-input" type="radio" id="male" value="1" name="room_type" checked>
                                                              <label class="form-check-label" for="male">
                                                                Nam
                                                              </label>
                                                            </div>
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" id="female" value="0" name="room_type">
                                                              <label class="form-check-label" for="female">
                                                                Nữ
                                                              </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Giá phòng" name="room_rate" required>
                                                            </div>
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
            $buildings = $_POST['buildings'];
            $roomType = $_POST['room_type'];
            $roomCapacity = $_POST['room_capacity'];
            $roomRate = $_POST['room_rate'];
            $note = $_POST['note'];  

        
            if(isset($_POST['form_click'])){
                
                $sql = 'INSERT INTO dorm_room VALUES(NULL, '.$buildings.', "'.$name.'", '.$roomType.', '.$roomCapacity.', 0, '.$roomRate.', "'.$note.'")';
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