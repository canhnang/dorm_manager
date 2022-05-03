<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .header-top-menu .navbar-nav>li>a{
        padding: 20px 20px;
        color: #fff;
        font-size:14px;
        }
        .header-top-menu .navbar-nav>li a .angle-down-topmenu{
            margin-left:4px;
        }
        .header-top-menu .navbar-nav>li>a:hover{
            color: #03a9f4;
        }
        .header-top-menu .navbar-nav>li .dropdown-menu a{
            padding: 10px 20px;
            display:block;
            color: #303030;
        }
        .header-top-menu .navbar-nav>li .dropdown-menu a:hover{
            background:#2b2a2a;
        }
        .header-top-menu .navbar-nav>li .dropdown-menu{
            border: 0px solid #ccc; 
            border: 0px solid rgba(0,0,0,.15);
            background-color: #303030;
            -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.175);
            box-shadow: 0 1px 4px rgba(0,0,0,.175); 
        }
        .header-right-info .navbar-nav>li .dropdown-menu{
            border: 0px solid #ccc; 
            border: 0px solid rgba(0,0,0,.15);
            -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.175);
            box-shadow: 0 1px 4px rgba(0,0,0,.175); 
        }
        .header-top-menu .nav>li>a:focus, .header-top-menu .nav>li>a:hover, .header-top-menu .nav>li>a:active {
            text-decoration: none;
            background-color: transparent;
        }
        .header-top-menu .nav .open>a, .header-top-menu .nav .open>a:focus, .header-top-menu .nav .open>a:hover{
            background-color: transparent;
        }
        .header-right-info .nav>li>a:focus, .header-right-info .nav>li>a:hover, .header-right-info .nav>li>a:active {
            text-decoration: none;
            background-color: transparent;
        }
        .header-right-info .nav.custon-set-tab>li>a:focus, .header-right-info .nav.custon-set-tab>li>a:hover, .header-right-info .nav.custon-set-tab>li>a:active {
            color:#03a9f4;
        }
        .header-right-info .nav.custon-set-tab>li>a {
            color:#303030;
        }
        .header-right-info .nav .open>a, .header-top-menu .nav .open>a:focus, .header-top-menu .nav .open>a:hover{
            background-color: transparent;
        }
        .header-right-info .navbar-nav{
            float:right;
            padding:17px 40px;
        }
        .admin-logo{
            padding:10px 0px;
        }
        .header-top-menu ul.header-top-nav li{
            display:inline-block;
            position:relative;
        }
        .header-top-menu ul.header-top-nav li ul.dropdown-header-top{
            position:absolute;
            top:130%;
            left:-10px;
            width:200px;
            background:#303030;
            opacity:0;
            transition: all 0.5s ease 0s;
            z-index:999;
            padding:10px 0px;
        }
        .header-top-menu ul.header-top-nav li ul.dropdown-header-top.in{
            opacity:1;
            top:100%;
            transition: all 0.5s ease 0s;
        }
        .admin-project-icon{
            margin-left:5px;
            font-size:10px;
            color:#fff;
        }
        .header-top-menu ul.header-top-nav li .dropdown-header-top li{
            display:block;
        }
        .header-top-menu ul.header-top-nav li .dropdown-header-top li a{
            display:block;
            color:#fff;
            padding:15px 20px;
        }
        .header-top-menu ul.header-top-nav li .dropdown-header-top li a:hover{
            background:#03a9f4;
        }
        .header-top-menu ul.header-top-nav li a{
            font-size:14px;
            color:#fff;
            text-decoration:none;
            text-transform:capitalize;
            display:block;
            padding:18px 10px;
        }
        .header-right-info {
            
        }
        .header-right-info ul.header-right-menu li{
            display:inline-block;
        }
        .header-right-info ul.header-right-menu li .author-message-top, .header-right-info ul.header-right-menu li .notification-author, .header-right-info ul.header-right-menu li .author-log{
           position:absolute;
           top:160%;
           left:-70px;
           width:330px;
           background:#343434;
           text-align:left;
           opacity:0;
           transition: all 0.5s ease 0s;
           visibility:hidden;
           z-index:999;
        }
        .header-right-info ul.header-right-menu li .dropdown-header-top.author-log{
           width:200px;
           padding:10px 0px;
        }
        .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li{
           display:block;
        }
        .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li a{
           padding:10px 20px;
           display:block;
           color:#303030;
           font-size:14px;
        }
        .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li .author-log-ic{
           margin-right:10px;
        }
        .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li a:hover, .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li a:focus{
           background:#2b2a2a;
        }
        .header-right-info ul.header-right-menu li .author-message-top{
           left:-133px;
        }
        .header-right-info ul.header-right-menu li .notification-author{
           left:-134px;
        }
        .header-right-info ul.header-right-menu li .author-log{
           left:-2px;
        }
        .header-right-info ul.header-right-menu li.open .author-message-top, .header-right-info ul.header-right-menu li.open .notification-author, .header-right-info ul.header-right-menu li.open .author-log{
           opacity:1;
           top:170%;
           transition: all 0.5s ease 0s;
           visibility:visible;
        }
        .header-right-info ul.header-right-menu li ul.message-menu li a, .header-right-info ul.header-right-menu li ul.notification-menu li a {
            margin: 20px 20px;
            display:block;
            text-decoration:none;
            color:#fff;
        }
        .header-right-info ul.header-right-menu li .message-view a, .header-right-info ul.header-right-menu li .notification-view a{
            display:block;
            color: #ccc;
            font-size: 14px;
            border-top:1px solid #383838;
            padding: 15px 0px;
            text-align:center;
            text-decoration:none;
        }
        .header-right-info ul.header-right-menu > li > a{
            display:inline-block;
            color:#fff;
            padding: 0px 0px 0px 20px;
            font-size:20px;
            text-decoration:none;
            position:relative;
        }
        
        
        .header-right-info .admin-name{
            display: inline-block;
            color: #fff;
            font-size: 16px;
            position: relative;
            top: -2px;
            margin-left:2px;
        }
        .header-right-info .nav>li>a>img{
            width: 26px;
            border-radius: 50%;
        }
        .header-right-info .author-project-icon{
            color: #fff;
            font-size: 10px;
            position: relative;
            top: -4px;
            margin-left:5px;
        }
        .header-right-info .message-author{
           position:relative;
        }

        .header-right-info .author-message-top:before, .header-right-info .notification-author:before{
            position: absolute;
            content: "";
            display: inline-block;
            border-bottom: 10px solid #343434;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 0;
            right: 50%;
            top: -9px;
            margin-right: -10px;
            z-index: 99;
        }
        .header-right-info .author-message-top li a{
           color:#fff;
        }
        .message-single-top h1,{
            font-size: 16px;
            color: #303030;
            font-weight: 400;
            text-align: center;
            padding: 15px 0px;
            margin: 0px;
            border-bottom:1px solid #383838;
        }
      
       
        
        .header-right-info ul.header-right-menu li.open > a{
            color:#fff;
        }
        .header-top-menu .navbar-nav>li.open > a{
            color:#03a9f4;
        }
        
        .header-right-info ul.header-right-menu li .admintab-wrap.dropdown-menu {
            position: absolute;
            top: 170%;
            left: -358px;
            width: 400px;
            box-shadow: 0px 2px 3px rgba(0,0,0,.175);
            padding: 20px;
        }
        
        
       
        
       
        .header-top-menu .navbar-nav>li .dropdown-menu, .header-right-info ul.header-right-menu li .author-message-top, .header-right-info ul.header-right-menu li .notification-author, .header-right-info ul.header-right-menu li .author-log, .header-right-info ul.header-right-menu li .admintab-wrap.menu-setting-wrap.menu-setting-wrap-bg.dropdown-menu {
            /*background: #e12503;*/
            background: white;
        }
        .header-top-menu .navbar-nav>li .dropdown-menu a:hover, .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li a:hover, .header-right-info ul.header-right-menu li .dropdown-header-top.author-log li a:focus, .header-drl-controller-btn.btn-info:active:focus, .btn-info:active:hover {
            background: white;
        }
        .menu-switcher-pro .btn-info:active, .menu-switcher-pro .btn-info:focus, .menu-switcher-pro .btn-info:hover, .menu-switcher-pro .btn-info:visited, .header-drl-controller-btn.btn-info:active:focus{
            background: #006DF0;
        }
        .header-right-info ul.header-right-menu li .message-view a, .header-right-info ul.header-right-menu li .notification-view a {
            border-top: 1px solid #c7290d;
        }
        .message-single-top h1, {
            border-bottom: 1px solid #F6F8FA;
        }
        .header-right-info .author-message-top:before, .header-right-info .notification-author:before {
            border-bottom: 10px solid #F6F8FA;
        }
        .header-top-menu .navbar-nav>li.open > a {
            color: #fff;
        }
        .header-top-menu .navbar-nav>li>a:hover {
            color: #fff;
        }
        .header-right-info .author-message-top:before, .header-right-info .notification-author:before {
            position: absolute;
            content: "";
            display: inline-block;
            border-bottom: 10px solid #e12503;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 0;
            right: 50%;
            top: -9px;
            margin-right: -10px;
            z-index: 99;
        }
        .menu-setting-wrap.menu-setting-wrap-bg .nav-tabs>li.active>a, .menu-setting-wrap.menu-setting-wrap-bg .nav-tabs>li.active>a:focus, .menu-setting-wrap.menu-setting-wrap-bg .nav-tabs>li.active>a:hover
         .notes-img {
            background: #e12503;
        }
        .breadcome-list {
            padding-top: 20px;
            padding-bottom: 20px;
            background: #fff;
            padding-left: 20px;
            padding-right: 20px;
            margin-bottom: 30px;
            margin-top: 70px;
        }
        .sr-input-func {
            position: relative;
            margin: 0;
            width: 180px;
            right: 0px;
            transition: .5s ease-out;
        }
        .sr-input-func a {
            position: absolute;
            top: 8px;
            right: -5px;
            color: #999;
            transition: .5s ease-out;
            font-size:14px;
        }
        .sr-input-func:focus a {
            color: #006DF0;
        }
    </style>
</head>
<body>
     <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="#" class="dropdown-item">Documentation</a>
                            
                                                    </div>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="../assets/img/product/pro4.jpg" alt="" />
                                                            <span class="admin-name">Cảnh Năng</span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>Thông tin tài khoản</a>
                                                        <li><a href="../logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Đăng xuất</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        </li>
                                        <li><a href="events.html">Event</a></li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>