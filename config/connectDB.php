<?php
require_once "db_config.php";
// Create connection
$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    function execute($sql){
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_query($con, $sql);
    mysqli_close($con);
    }
    function executeResult($sql){
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    $result = mysqli_query($con, $sql);
    $data = [];
    
    while ($row = mysqli_fetch_array($result,1))
    {
      
        $data[] = $row;
    }
  
    mysqli_close($con);
    return $data;}
    
