<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Chỉnh sửa thông tin phòng ký túc xá</title>
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
                            <h4>Chỉnh sửa thông tin phòng ký túc xá</h4>
                            <a class="btn btn-primary" style="float: right;" href="./">Quay về danh sách phòng</a>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                         <?php 
                                                            require_once "../../config/connectDB.php"; 
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM dorm_room WHERE room_id = $id";
                                                            $buildings = executeResult($sql);
                                                            foreach ($buildings as $value){
                                                                $buildCheck = $value['building_id'];
                                                                ?>

                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Tên phòng" name="name" required
                                                                value="<?php echo $value['room_name'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="building_select">Thuộc dãy</label>
                                                                <select multiple class="form-control" name='buildings' id="building_select" required>
                                                                <?php 
                                                                    require_once "../../config/connectDB.php";
                                                                    $sql = "SELECT * FROM buildings";
                                                                    $result = executeResult($sql);
                                                                        foreach ($result as $key => $item) {
                                                                            ?>
                                                                            <option value="<?php echo $item['building_id']  ?>" <?php echo ($item['building_id']== $buildCheck)?'selected': '' ?>><?php echo $item['building_name']  ?></option>
                                                                            

                                                                            <?php 
                                                                        }
                                                                        ?>
                                                                  
                                                                  
                                                                </select>
                                                              </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Số người tối đa" name="room_capacity" required value="<?php echo $value['room_capacity'] ?>">
                                                            </div>
                                                            <div class="form-check">
                                                                <legend class="col-form-label col-lg-2" style="border-bottom: none; font-size: 15px;">Giới tính:</legend>
                                                              <input class="form-check-input" type="radio" id="male" value="1" name="room_type" <?php echo ($value['room_type']==1)? 'checked': ''  ?>>
                                                              <label class="form-check-label" for="male">
                                                                Nam
                                                              </label>
                                                            </div>
                                                            
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="radio" id="female" value="0" name="room_type" <?php echo ($value['room_type']==0)? 'checked': ''  ?>>
                                                              <label class="form-check-label" for="female">
                                                                Nữ
                                                              </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Giá phòng" name="room_rate" required
                                                                value="<?php echo $value['room_rate'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú"> <?php echo $value['note']; ?></textarea>
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
            $buildings = $_POST['buildings'];
            $roomType = $_POST['room_type'];
            $roomCapacity = $_POST['room_capacity'];
            $roomRate = $_POST['room_rate'];
            $note = $_POST['note'];  

        
            if(isset($_POST['form_click'])){
                
                $sql = 'UPDATE dorm_room SET room_name = "'.$name.'", building_id = '.$buildings.', room_type = '.$roomType.', room_capacity = '.$roomCapacity.', room_rate = '.$roomRate.', note = "'.$note.'" WHERE room_id ='.$id;
                execute($sql);
                echo '<script>location.href = "/dorm_manager/page/rooms";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>

     <?php include("../../config/js.php") ?>
</body>

</html>