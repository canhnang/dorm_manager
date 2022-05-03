<?php
session_start();

if(isset($_SESSION['USER']) && $_SESSION['USER'] != NULL){
    unset($_SESSION['USER']);
    header('Location: /dorm_manager/page/login');
}
?>