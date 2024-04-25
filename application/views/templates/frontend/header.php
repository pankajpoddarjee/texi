 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title><?=!empty($header)?get_settings_value('system_name').' || '.$header['site_title']:get_settings_value('system_name')?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <link rel="canonical" href="<?=current_url()?>" />
<meta name="description" content="<?=get_settings_value('meta_descriptions')?>">
<meta name="keywords" content="<?=get_settings_value('meta_keywords')?>">
<meta name="author" content="<?=get_settings_value('meta_author')?>">
<meta property='og:title' content="<?=!empty($header)?get_settings_value('system_name').' || '.$header['og_title']:get_settings_value('system_name')?>"/>
<?php
        $favicon = get_settings_value('favicon');
        $fav = base_url('assets/frontend/img/favicon.png');
        if (!empty($favicon)) {
                $fav = base_url('assets/uploads/system_images/' . $favicon);
        }
    ?>  
  <!-- Favicons -->
  <link href="<?=$fav?>" rel="icon">
  <link href="<?=$fav?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  
  <!-- Bootstrap CSS File -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" rel="stylesheet" />        
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url('assets/frontend/lib/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/css/evo-calendar.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/css/evo-calendar.midnight-blue.css')?>"/>
  <!-- Main Stylesheet File -->
  <link href="<?=base_url('assets/frontend/css/style.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url('assets/frontend/css/intlTelInput.css')?>">

</head>

<body>


