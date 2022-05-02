<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Thêm dãy nhà</title>
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
                            <h4>Thêm dãy nhà</h4>
                                    <a class="btn btn-primary" style="float: right;" href="./">Quay về danh sách dãy nhà</a>
                                <div class="product-tab-list tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <form method="POST" class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" 
                                                                placeholder="Tên dãy" name="name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" 
                                                                placeholder="Số lượng phòng" name="room_quantity" required>
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
            $romQuantity = $_POST['room_quantity'];
            $note = $_POST['note'];  

        
            if(isset($_POST['form_click'])){
                
                $sql = 'INSERT INTO buildings VALUES(NULL, "'.$name.'", "'.$romQuantity.'", "'.$note.'")';
                execute($sql);
                echo '<script>location.href = "/dorm_manager/page/buildings";</script>';
                die();
            }
        }
            
        
        ?>
     
     <?php include("../../layout/footer.php"); ?>
    </div>
    <?php include("../../config/js.php") ?>
    
    </body>

</html>