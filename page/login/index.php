<?php session_start();

require_once "../../config/connectDB.php";
  	if(!empty($_POST)){
    	$username = $_POST['username'];
    	$password = $_POST['password'];

    	if(isset($_POST['login'])){
    		$sql = 'SELECT * FROM user WHERE username = "'.$username.'" AND password = "'.$password.'"';
    		$query = mysqli_query($conn, $sql);
    		foreach ($query as $value) { 
    			$id = $value['user_id'];
    		}
    		$num_rows = mysqli_num_rows($query);
    		if ($num_rows==0){
            	header('Location: ../login');
            	$_SESSION['fail'] = 'error';
        	}else{
            	$_SESSION['USER'] = $id;
            	unset($_SESSION['fail']);
            	header('Location: ../home');
        	die();
        }
    	}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
	 <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">
	<link rel="stylesheet" href="./style.css">
</head>

<body>
	<div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		<?php
        	if(isset($_SESSION['fail']) && $_SESSION['fail'] != NULL) {
                echo '<span style="color: yellow; font-family: sans-serif;">Tên tài khoản hoặc mật khẩu không chính xác</span>';
            }
        ?> 
		
		<form class="form" method="POST">
			<input type="text" placeholder="Username" name="username" required>
			<input type="password" placeholder="Password" name="password" required>
			<button type="submit" id="login-button" name="login">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
</body>

</html>
