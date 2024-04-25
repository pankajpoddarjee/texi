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
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?=base_url('assets/admin/plugins/global/plugins.bundle.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/admin/css/style.bundle.css')?>" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->

</head>
<body class="">

<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #1a2935 ">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Content-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="<?=base_url()?>" class="py-9">
								<img alt="Logo" src="<?=$sys_img?>" class="h-150px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10 text-white" style="">Welcome to <?=get_settings_value('system_name')?></h1>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="fw-bold fs-2 text-white" style=""><?=get_settings_value('system_title')?>
							</p>
							<!--end::Description-->
						</div>
						<!--end::Content-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(<?=base_url('assets/admin/media/illustrations/saii.png')?>)"></div>
						<!--end::Illustration-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="" method="POST">
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Sign In to <?=get_settings_value('system_name')?></h1>
									<!--end::Title-->
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
								</div>
								<!--begin::Heading-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Label-->
									<label class="form-label fs-6 fw-bolder text-dark">Login ID</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control form-control-lg form-control-solid" type="text" name="login_id" placeholder="Login Id" required autocomplete="off"  />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack mb-2">
										<!--begin::Label-->
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
										<!--end::Label-->
										<!--begin::Link-->
										<a href="" class="link-primary fs-6 fw-bolder d-none">Forgot Password ?</a>
										<!--end::Link-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Input-->
									<input class="form-control form-control-lg form-control-solid"  type="password" name="password" id="password"  placeholder="Password" required autocomplete="off" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="text-center">
									<!--begin::Submit button-->
									<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
										<span class="indicator-label">Continue</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<!--end::Submit button-->
									
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
					
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->


<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?=base_url('assets/admin/plugins/global/plugins.bundle.js')?>"></script>
<script src="<?=base_url('assets/admin/js/scripts.bundle.js')?>"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->


</body>
</html>
