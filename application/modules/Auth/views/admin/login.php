<!DOCTYPE html>
<html lang="en">
<head>	
	<base href="<?=base_url()?>">
	<meta charset="utf-8" />
	<title><?=get_settings_value('system_name')?> | Log in</title>
<?php 
	$image = get_settings_value('logo');
	if (!empty($image)) {
		$sys_img = base_url('assets/uploads/system_images/' . $image);
	} else {
		$sys_img = base_url('assets/admin/dist/media/logos/logo-default.png');
	} 
	$favicon = get_settings_value('favicon');
	if (!empty($favicon)) {
		$fav_img = base_url('assets/uploads/system_images/' . $favicon);
	} else {
		$fav_img = base_url('assets/admin/dist/media/logos/logo-default.png');
	} 
?>		
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="canonical" href="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="<?=$fav_img?>" />
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?=base_url('assets/admin/fonts/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/admin/plugins/iconic/css/material-design-iconic-font.min.css')?>">
	<!-- bootstrap -->
	<link href="<?=base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/css/pages/extra_pages.css')?>">
	<!--end::Global Stylesheets Bundle-->

</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" novalidate="novalidate" id="kt_sign_in_form" action="" method="POST">    
					<span class="login100-form-logo">
						<img alt="" src="<?=base_url('assets/admin/img/taxi.jpg')?>">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                                        <?php
                                        if($this->session->flashdata('error_msg')!=''){
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>ERROR!</strong> <?=$this->session->flashdata('error_msg')?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        }
                                        ?>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="login_id" placeholder="Login Id">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password" placeholder="Password" autocomplete="off" >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox d-none">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
                                            <button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-50 d-none">
						<a class="txt1" href="forgot_password.html">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?=base_url('assets/admin/plugins/jquery/jquery.min.js')?>"></script>
	<!-- bootstrap -->
	<script src="<?=base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/admin/js/pages/extra_pages/login.js')?>"></script>
	<!-- end js include path -->
</body>

</html>