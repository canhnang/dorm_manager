<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm hợp đồng</title>
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
                            <h4>Thêm hợp đồng</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <label for="student_select">Học sinh</label>
                                                                <select multiple class="form-control" name='student_id' id="student_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql_std = "SELECT student_name, students.student_id FROM students WHERE student_id NOT IN (SELECT student_id FROM contract) ";
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
            $note = $_POST['note'];

            $date = getdate();
            $created_at = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
            if(isset($_POST['form_click'])){
                $sql = 'SELECT * FROM dorm_room WHERE room_id ='.$room_id;
                $result = executeResult($sql);
                $num = 0;
                foreach ($result as $value) {
                    $num =  $value['current_quantity'];
                }
                $num = $num + 1;

                $sql_update_student = 'UPDATE students SET room_id ="'.$room_id .'"WHERE student_id = '.$student_id;
                $sql_insert_contract = 'INSERT INTO contract VALUES(NULL, '.$student_id.', '.$room_id.', 2, "'.$created_at.'", "'.$note.'")';
                $sql_update_room = 'UPDATE dorm_room SET current_quantity ="' .$num .'" WHERE room_id = '.$room_id;
                execute($sql_update_room);
                execute($sql_update_student);
                execute($sql_insert_contract);
                echo '<script>location.href = "/dorm_manager/page/contracts";</script>';
                die();


            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>