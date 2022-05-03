<?php include("../../config/checkSession.php") ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include("../../config/head.php") ?>
    <title>Nhóm 12 - Chỉnh sửa thông tin dãy nhà</title>
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
                            <h4>Chỉnh sửa thông tin dãy nhà</h4>
                                    <a class="btn btn-primary" style="float: right;" href="./">Quay về danh sách dãy nhà</a>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                                        <?php 
                                                            require_once "../../config/connectDB.php"; 
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM buildings WHERE building_id = $id";
                                                            $buildings = executeResult($sql);
                                                            foreach ($buildings as $value){

                                                            echo '
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Tên dãy" name="name" required
                                                                value="'.$value['building_name'].'">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Số lượng phòng" name="room_quantity" required
                                                                value="'.$value['room_quantity'].'">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="note" cols="30" rows="10" placeholder="Ghi chú">'.$value['note'].'</textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="form_click">Lưu lại</button>

                                                        </form>'?>
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
            $roomQuantity = $_POST['room_quantity'];
            $note = $_POST['note'];  

            if(isset($_POST['form_click'])){
                
                $sql = 'UPDATE buildings SET building_name = "'.$name.'", room_quantity = "'.$roomQuantity.'", note = "'.$note.'" WHERE building_id ='.$id;
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