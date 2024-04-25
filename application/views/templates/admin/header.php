<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=!empty($header)?get_settings_value('system_name').' || '.$header['site_title']:get_settings_value('system_name')?></title>
	<?php
	$image = get_settings_value('logo');
	if (!empty($image)) {
		$sys_img = base_url('assets/uploads/system_images/' . $image);
	} else {
		$sys_img = base_url('assets/admin/dist/media/logos/logo-default.png');
	} 
	
	$favicon = get_settings_value('favicon');
	$fav = base_url('assets/admin/images/default_favicon.png');
	if (!empty($favicon)) {
		$fav = base_url('assets/uploads/system_images/' . $favicon);
	}
	?>  
									
	<link rel="shortcut icon" href="<?=$fav?>">
	<link rel="apple-touch-icon" href="<?=$fav?>">
	<link rel="image_src" href="<?=$fav?>"> 
	<link rel="search" type="application/opensearchdescription+xml" title="" href="">
	<link rel="canonical" href="<?=current_url()?>" />
		
	<meta name="description" content="<?=get_settings_value('meta_descriptions')?>">
	<meta name="keywords" content="<?=get_settings_value('meta_keywords')?>">
	<meta name="author" content="<?=get_settings_value('meta_author')?>">

  
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="x-pjax-version" content="v123">
        <base href="<?= base_url(); ?>">
	
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
        <!-- icons -->
        <link href="<?=base_url('assets/admin/fonts/material-design-icons/material-icon.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/fonts/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
        <!--bootstrap -->
        <link href="<?=base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/plugins/summernote/summernote.css')?>" rel="stylesheet">
        <!-- morris chart -->
        <link href="<?=base_url('assets/admin/plugins/morris/morris.css')?>" rel="stylesheet" type="text/css" />
        <!-- Material Design Lite CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/material/material.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/admin/css/material_style.css')?>">
        <!-- data tables -->
	<link href="<?=base_url('assets/admin/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- animation -->
        <link href="<?=base_url('assets/admin/css/pages/animate_page.css')?>" rel="stylesheet">
        <!-- Theme Styles -->
        <link href="<?=base_url('assets/admin/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/css/responsive.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/css/theme-color.css')?>" rel="stylesheet" type="text/css" />
		<!-- Owl Carousel Assets -->
		<link href="<?=base_url('assets/admin/plugins/owl-carousel/owl.carousel.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/admin/plugins/owl-carousel/owl.theme.css')?>" rel="stylesheet">
        <!-- dropzone -->
	<link href="<?=base_url('assets/admin/plugins/dropzone/dropzone.css')?>" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/plugins/flatpicker/css/flatpickr.min.css')?>" />
        <!--select2-->
        <link href="<?=base_url('assets/admin/plugins/select2/css/select2.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets/admin/plugins/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	
    <!-- Js url -->
    <script type="text/javascript" language="javascript">
        var base_url='<?=base_url()?>';
		var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = "<?php echo $this->config->item('csrf_cookie_name'); ?>";
    </script>	


<!-- favicon -->
</head>

