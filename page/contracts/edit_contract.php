<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa hợp đồng</title>
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
                            <h4>Chỉnh sửa hợp đồng</h4>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <?php 
                                                            require_once "../../config/connectDB.php";
                                                            $id = $_GET['id'];
                                                            $sql_select = "SELECT ctr.note, ctr.student_id, student_name, ctr.room_id, staff_name, room_name FROM `contract` ctr JOIN students std ON ctr.student_id = std.student_id JOIN dorm_room dr ON dr.room_id = ctr.room_id JOIN staffs stf ON stf.staff_id = ctr.staff_id WHERE contract_id = $id";
                                                            $student_id = 0 ;
                                                            $room_check = 0 ;
                                                            $result = executeResult($sql_select);
                                                                foreach ($result as $value) {
                                                                    $room_check = $value['room_id'];
                                                                    $student_id = $value['student_id'];
                                                                ?>
                                                            <div class="form-group">
                                                                <label for="student_select">Học sinh: <span style="color: red"><?php echo $value['student_name'] ?></span></label>
                                                                
                                                                </select>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="student_select">Nhân viên đăng ký: <span style="color: red"><?php echo $value['staff_name'] ?></span></label>
                                                                
                                                                </select>
                                                              </div>
                                                            <div class="form-group">
                                                                <label for="room_select">Chọn phòng</label>
                                                                <select multiple class="form-control" name='room_id' id="room_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM `dorm_room` WHERE current_quantity < 4";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $item) {
                                                                            ?>
                                                                            <option value="<?php echo $item['room_id'] ?>" <?php echo ($item['room_id']==$room_check)?'selected':'' ?>><?php echo $item['room_name'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                </select>
                                                              </div>
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
            $room_id = $_POST['room_id'];
            $note = $_POST['note'];
            $date = getdate();
            $created_at = $date['year'].'-'.$date['mon'].'-'.$date['mon'];
            if(isset($_POST['form_click'])){
                $sql_update_student = 'UPDATE students SET room_id ="'.$room_id .'"WHERE student_id = '.$student_id;
                $sql_update_contract = 'UPDATE contract SET room_id = "'.$room_id.'", staff_id = 3, created_at = "'.$created_at.'", note = "'.$note.'" WHERE contract_id = '.$id;


                $sql_roomNew = 'SELECT * FROM dorm_room WHERE room_id ='.$room_id;
                $sql_roomOld = 'SELECT * FROM dorm_room WHERE room_id ='.$room_check;
                $result1 = executeResult($sql_roomNew);
                $num_new = 0;
                $num_old = 0;
                foreach ($result1 as $value1) {
                    $num_new =  $value1['current_quantity'];
                }
                $num_new = $num_new + 1;

                $result2 = executeResult($sql_roomOld);
                foreach ($result2 as $value2) {
                    $num_old =  $value2['current_quantity'];
                }
                $num_old = $num_old - 1;


                $sql_update_roomOld = 'UPDATE dorm_room SET current_quantity = '.$num_old .' WHERE room_id ='.$room_check;
                $sql_update_roomNew = 'UPDATE dorm_room SET current_quantity ='.$num_new .' WHERE room_id ='.$room_id;
                execute($sql_update_student);
                execute($sql_update_contract);
                execute($sql_update_roomOld);
                execute($sql_update_roomNew);
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