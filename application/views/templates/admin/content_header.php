<?php
$image = get_settings_value('logo');
if (!empty($image)) {
$sys_img = base_url('assets/uploads/system_images/' . $image);
} else {
$sys_img = base_url('assets/admin/dist/media/logos/logo-default.png');
} 

?> 
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-white">
<div class="page-wrapper">
<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
<div class="page-header-inner ">
<!-- logo start -->
<div class="page-logo">
<a href="<?=base_url()?>">
    <img alt="" src="<?=base_url('assets/admin/img/logo.png')?>" width="60">
<span class="logo-default">Limo Hire</span> </a>
</div>
<!-- logo end -->
<ul class="nav navbar-nav navbar-left in">
<li><a href="javascript:void(0)" class="menu-toggler sidebar-toggler font-size-23"><i class="fa fa-bars"></i></a>
</li>
</ul>
<ul class="nav navbar-nav navbar-left in">
<!-- start full screen button -->
<li><a href="javascript:;" class="fullscreen-click font-size-20"><i
class="fa fa-arrows-alt"></i></a></li>
<!-- end full screen button -->
</ul>
<form class="search-form-opened" action="#" method="GET">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search..." name="query">
<span class="input-group-btn search-btn">
<a href="javascript:;" class="btn submit">
<i class="fa fa-search"></i>
</a>
</span>
</div>
</form>
<!-- start mobile menu -->
<a href="javascript:;" class="menu-toggler responsive-toggler" data-bs-toggle="collapse"
data-bs-target=".navbar-collapse">
<span></span>
</a>
<!-- end mobile menu -->
<!-- start header menu -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">
<!-- start notification dropdown -->
<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
<a href="javascript:;" class="dropdown-toggle" data-bs-toggle="dropdown"
data-hover="dropdown" data-close-others="true">
<i class="fa fa-bell-o"></i>
<span class="notify"></span>
<span class="heartbeat"></span>
</a>
<ul class="dropdown-menu pullDown">
<li class="external">
<h3><span class="bold">Notifications</span></h3>
<span class="notification-label purple-bgcolor">New 6</span>
</li>
<li>
<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
<li>
<a href="javascript:;">
<span class="time">just now</span>
<span class="details">
<span
class="notification-icon circle deepPink-bgcolor box-shadow-1"><i
class="fa fa-check"></i></span> Congratulations!. </span>
</a>
</li>
<li>
<a href="javascript:;">
<span class="time">3 mins</span>
<span class="details">
<span
class="notification-icon circle purple-bgcolor box-shadow-1"><i
class="fa fa-user o"></i></span>
<b>John Micle </b>is now following you. </span>
</a>
</li>
<li>
<a href="javascript:;">
<span class="time">7 mins</span>
<span class="details">
<span class="notification-icon circle blue-bgcolor box-shadow-1"><i
class="fa fa-comments-o"></i></span>
<b>Sneha Jogi </b>sent you a message. </span>
</a>
</li>
<li>
<a href="javascript:;">
<span class="time">12 mins</span>
<span class="details">
<span class="notification-icon circle pink box-shadow-1"><i
class="fa fa-heart"></i></span>
<b>Ravi Patel </b>like your photo. </span>
</a>
</li>
<li>
<a href="javascript:;">
<span class="time">15 mins</span>
<span class="details">
<span class="notification-icon circle yellow box-shadow-1"><i
class="fa fa-warning"></i></span> Warning! </span>
</a>
</li>
<li>
<a href="javascript:;">
<span class="time">10 hrs</span>
<span class="details">
<span class="notification-icon circle red box-shadow-1"><i
class="fa fa-times"></i></span> Application error. </span>
</a>
</li>
</ul>
<div class="dropdown-menu-footer">
<a href="javascript:void(0)"> All notifications </a>
</div>
</li>
</ul>
</li>
<!-- end notification dropdown -->
<!-- start message dropdown -->
<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
<a href="javascript:;" class="dropdown-toggle" data-bs-toggle="dropdown"
data-hover="dropdown" data-close-others="true">
<i class="fa fa-envelope-o"></i>
<span class="notify"></span>
<span class="heartbeat"></span>
</a>
<ul class="dropdown-menu animated pullDown">
<li class="external">
<h3><span class="bold">Messages</span></h3>
<span class="notification-label cyan-bgcolor">New 2</span>
</li>
<li>
<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
<li>
<a href="#">
<span class="photo">
<img src="<?=base_url('assets/admin/img/user/user2.jpg')?>" class="img-circle"
alt=""> </span>
<span class="subject">
<span class="from"> Sarah Smith </span>
<span class="time">Just Now </span>
</span>
<span class="message"> Jatin I found you on LinkedIn... </span>
</a>
</li>
<li>
<a href="#">
<span class="photo">
<img src="<?=base_url('assets/admin/img/user/user3.jpg')?>" class="img-circle"
alt=""> </span>
<span class="subject">
<span class="from"> John Deo </span>
<span class="time">16 mins </span>
</span>
<span class="message"> Fwd: Important Notice Regarding Your Domain
Name... </span>
</a>
</li>
<li>
<a href="#">
<span class="photo">
<img src="<?=base_url('assets/admin/img/user/user1.jpg')?>" class="img-circle" alt=""> </span>
<span class="subject">
<span class="from"> Rajesh </span>
<span class="time">2 hrs </span>
</span>
<span class="message"> pls take a print of attachments. </span>
</a>
</li>
<li>
<a href="#">
<span class="photo">
<img src="<?=base_url('assets/admin/img/user/user8.jpg')?>" class="img-circle" alt=""> </span>
<span class="subject">
<span class="from"> Lina Smith </span>
<span class="time">40 mins </span>
</span>
<span class="message"> Apply for Ortho Surgeon </span>
</a>
</li>
<li>
<a href="#">
<span class="photo">
<img src="<?=base_url('assets/admin/img/user/user5.jpg')?>" class="img-circle" alt=""> </span>
<span class="subject">
<span class="from"> Jacob Ryan </span>
<span class="time">46 mins </span>
</span>
<span class="message"> Request for leave application. </span>
</a>
</li>
</ul>
<div class="dropdown-menu-footer">
<a href="#"> All Messages </a>
</div>
</li>
</ul>
</li>
<!-- end message dropdown -->
<!-- start manage user dropdown -->
<li class="dropdown dropdown-user">
<a href="javascript:;" class="dropdown-toggle" data-bs-toggle="dropdown"
data-hover="dropdown" data-close-others="true">
<img alt="" class="img-circle " src="<?=base_url('assets/admin/img/profile.png')?>" />
</a>
<ul class="dropdown-menu dropdown-menu-default animated jello">
<li>
<a href="#">
<i class="fa fa-user-o"></i> Profile </a>
</li>
<li>
<a href="#">
<i class="fa fa-cogs"></i> Settings
</a>
</li>
<li>
<a href="#">
<i class="fa fa-question-circle"></i> Help
</a>
</li>
<li class="divider"> </li>
<li>
<a href="javascript:void(0)">
<i class="fa fa-lock"></i> Lock
</a>
</li>
<li>
<a href="<?=base_url('Auth/logout')?>">
<i class="fa fa-sign-out"></i> Log Out </a>
</li>
</ul>
</li>
<!-- end manage user dropdown -->

</ul>
</div>
</div>
</div>
<!-- end header -->
<!-- start page container -->
<div class="page-container">
<!-- start sidebar menu -->
<div class="sidebar-container">
<div class="sidemenu-container navbar-collapse collapse fixed-menu">
<div id="remove-scroll">
<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
data-slide-speed="200">
<li class="sidebar-toggler-wrapper hide">
<div class="sidebar-toggler">
<span></span>
</div>
</li>
<li class="sidebar-user-panel">
<div class="user-panel">
<div class="pull-left image">
<img src="<?=base_url('assets/admin/img/profile.png')?>" class="img-circle user-img-circle"
alt="User Image" />
</div>
<div class="pull-left info">
<p> Limo</p>
<a title="Inbox" href="#"><i class="material-icons">email</i></a>
<a title="Profile" href="#"><i
class="material-icons">person</i></a>
<a title="Logout" href="<?= base_url('Auth/logout') ?>"><i
class="material-icons">power_settings_new</i></a>
</div>
</div>
</li>
<li class="menu-heading">
<span>-- Main</span>
</li>
<li class="nav-item active">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">dashboard</i>
<span class="title">Dashboard</span>

</a>

</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">email</i>
<span class="title">Email</span>
<span class="arrow"></span>

</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Inbox</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">View Mail</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Compose Mail</span>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">local_taxi</i>
<span class="title">Trip</span>
<span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Active Trips</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Completed Trips</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Booked Trips</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Route Map</span>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">person</i>
<span class="title">Drivers</span>
<span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="<?=base_url('Driver/add_driver')?>" class="nav-link ">
<span class="title">Add New Driver</span>
</a>
</li>
<li class="nav-item">
<a href="<?=base_url('Driver/listing')?>" class="nav-link ">
<span class="title">All Drivers</span>
</a>
</li>
<li class="nav-item">
<a href="<?=base_url('Driver/driver_payment')?>" class="nav-link ">
<span class="title">Driver Payment</span>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link nav-toggle">
<i class="material-icons">people</i>
<span class="title">All Passengers</span>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">airport_shuttle</i>
<span class="title">Vehicle</span>
<span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="<?=base_url('Vehicles/type_listing')?>" class="nav-link ">
<span class="title">Vehicle Type Listing</span>
</a>
</li>    
<li class="nav-item">
<a href="<?=base_url('Vehicles/vehicle_listing')?>" class="nav-link ">
<span class="title">Vehicle Listing</span>
</a>
</li>

</ul>
</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">style</i>
<span class="title">Coupons</span>
<span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Coupon Generation</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Coupon List</span>
</a>
</li>
</ul>
</li>
<li class="nav-item">
<a href="#" class="nav-link nav-toggle">
<i class="material-icons">local_atm</i>
<span class="title">Fare Management</span>
<span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Add Fare</span>
</a>
</li>
<li class="nav-item">
<a href="javascript:void(0)" class="nav-link ">
<span class="title">Fail List</span>
</a>
</li>
</ul>
</li>

</ul>
</div>
</div>
</div>
<!-- end sidebar menu -->
<!-- start page content -->