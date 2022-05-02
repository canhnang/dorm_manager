<!doctype html>
<html class="no-js" lang="en">

<head>
     <?php include("../../config/head.php") ?>
     <title>Nhóm 12 - Quản lý thông tin phòng ký túc xá</title>
</head>

<body>
   <?php 
   require_once "../../config/connectDB.php";
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

     
     <div class="product-status mg-b-15">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách phòng ký túc xá</h4>
                            <div class="row">
                            	<div class="breadcome-heading col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<form method="GET" class="sr-input-func">
                                    	<input type="text" placeholder="name..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                	</form>
                            	</div>
                            	<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<a class="btn btn-primary" style="float: right;" href="./add_room.php">Thêm phòng</a>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                    <table>
                                        <tr>
                                            <th class="col-lg-1">#</th>
                                            <th class="col-lg-1">Tên Phòng</th>
                                            <th class="col-lg-1">Dãy Nhà</th>
                                            <th class="col-lg-1">Loại Phòng</th>
                                            <th class="col-lg-1">Tối Đa (người)</th>
                                            <th class="col-lg-1">Đang Ở</th>
                                            <th class="col-lg-2">Giá Phòng</th>
                                            <th class="col-lg-3">Ghi Chú</th>
                                            <th class="col-lg-1"></th>
                                        </tr>
                                        <?php 
                                            $sql = "select dorm_room.note, room_name, room_id, room_rate, room_type, room_capacity, building_name, current_quantity from dorm_room join buildings where buildings.building_id = dorm_room.building_id";
                                            $result = executeResult($sql);
                                                foreach ($result as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $key + 1 ?> 
                                                    </td>
                                                    <td><?php echo $value['room_name'] ?></td>
                                                    <td><?php echo $value['building_name'] ?></td>
                                                    <td><?php echo ($value['room_type']==1)?'Nam': 'Nữ' ?></td>
                                                    <td><?php echo $value['room_capacity'] ?></td>
                                                    <td><?php echo $value['current_quantity'] ?></td>
                                                    <td><?php echo $value['room_rate'] ?>.000 đồng</td>
                                                    <td><?php echo $value['note'] ?></td>
                                                    <td>
                                                        
                                                        <form method="POST" id="formDelete">
                                                            <?php 
                                                            echo '
                                                                <a title="Sửa" class="btn btn-info" href="/dorm_manager/page/rooms/edit_room.php?id='.$value['room_id'].'">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                 </a>
                                                                <input value="'.$value['room_id'].'" type="hidden" name="roomID" >
                                                            '
                                                             ?>
                                                            
                                                            <button disabled title="Xóa" type="submit" class="btn btn-danger" name="form_delete" >
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>
                                                        </form> 
                                                    </td>
                                                </tr>
                                        <?php } 

                                            if(!empty($_POST)){
                                                $roomID = $_POST['roomID'];
                                          
                                                
                                                if(isset($_POST['form_delete'])){
                                                    $sql = 'DELETE FROM dorm_room where room_id = "'.$roomID.'"';
                                                    execute($sql);
                                                    echo '<script>location.href = "/dorm_manager/page/rooms";</script>';
                                                    die();
                                                }

                                            }
                                        ?>
                                        
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



     
     <?php include("../../layout/footer.php"); ?>
    </div>
     <?php include("../../config/js.php") ?>
</body>

</html>