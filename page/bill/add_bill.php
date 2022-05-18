<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm hóa đơn</title>
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
                            <h4>Thêm hóa đơn</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label for="room_select">Chọn phòng</label>
                                                                <select multiple class="form-control" name='room_id' id="room_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM `dorm_room`";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $key => $value) {
                                                                            echo "
                                                                            <option value=".$value['room_id']." >".$value['room_name']."</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                </select>
                                                              </div>
                                                              <div class="form-group">
                                                                <label>Số điện đã dùng</label>
                                                                <input type="number" class="form-control" 
                                                                 name="electric_consume" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giá điện (k/kg)</label>
                                                                <input type="number" class="form-control" 
                                                                 name="electric_price" 
                                                                value="2" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Số nước đã dùng</label>
                                                                <input type="number" class="form-control" 
                                                                 name="water_consume" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giá nước (k/khối)</label>
                                                                <input type="number" class="form-control" 
                                                                 name="water_price" 
                                                                value="5" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Thuộc tháng</label>
                                                                <input type="number" min="1" max="12" class="form-control" 
                                                                 name="month_of" 
                                                                value="1" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="student_select">Học sinh</label>
                                                                <select multiple class="form-control" name='student_id' id="student_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql_std = "SELECT student_name, students.student_id FROM students ";
                                                                    $result = executeResult($sql_std);
                                                                        foreach ($result as $key => $value) {
                                                                            echo "
                                                                            <option value=".$value['student_id']." >".$value['student_name']."</option>
                                                                            ";
                                                                        }
                                                                        ?>
                                                                </select>
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
            $room_id = $_POST['room_id'];
            $student_id = $_POST['student_id'];
            $electric_consume = $_POST['electric_consume'];
            $electric_price = $_POST['electric_price'];
            $water_consume = $_POST['water_consume'];
            $water_price = $_POST['water_price'];
            $month_of = $_POST['month_of'];
            $staff_id = $_SESSION['USER'];
            $note = $_POST['note'];

            $date = getdate();
            $created_at = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
            if(isset($_POST['form_click'])){
                
                $sql = 'INSERT INTO room_bill VALUES (NULL,' .$room_id.','.$electric_consume.','.$electric_price.', '.$water_consume.','.$water_price.','.$student_id.','.$staff_id.',"'.$created_at.'", '.$month_of.', "'.$note.'" )';
                execute($sql);
            
                echo '<script>location.href = "/dorm_manager/page/bill";</script>';
                die();


            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>