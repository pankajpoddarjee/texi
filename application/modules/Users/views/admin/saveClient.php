<!--begin::Form-->
<form class="form" method="POST" enctype="multipart/form-data" id="calc_form_<?=$query->id?>">
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
<!--begin::Page title-->
<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-left me-3 flex-wrap mb-5 mb-lg-0 lh-1">
<!--begin::Title-->
<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3"><?=$header['site_title']?></h1>
<!--end::Title-->
<!--begin::Separator-->
<span class="h-20px border-gray-200 border-start mx-4"></span>
<!--end::Separator-->
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
<li class="breadcrumb-item text-muted">
<a href="<?=base_url()?>" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item">
<span class="bullet bg-gray-200 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-muted">
<a href="<?=base_url('Users/listingClient')?>" class="text-muted text-hover-primary">Client List</a>
</li>
<li class="breadcrumb-item">
<span class="bullet bg-gray-200 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-dark"><?=$header['site_title']?></li>
</ul>
<!--end::Breadcrumb-->
</div>
<!--end::Page title-->
<!--begin::Actions-->
<div class="d-flex align-items-center py-1">
<div class="">
<a href="<?=base_url('Users/listingClient')?>" class="btn btn-white btn-active-light-danger me-2">Back</a>
<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
</div>
</div>
<!--end::Actions-->
</div>
<!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">		
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
<!--START::ALERT MESSAGE --><?php $this->load->view('templates/admin/alert');?><!--END::ALERT MESSAGE -->
<!--begin::Card header-->
<div style="background:#1a2935!important;" class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#customer_div" aria-expanded="true" aria-controls="customer_div">
<!--begin::Card title-->
<div class="card-title m-0 text-white">
<h3 class="fw-bolder m-0">Client (Personal) Details</h3>
</div>
<!--end::Card title-->

</div>
<!--begin::Card header-->
<!--begin::Content-->
<div id="customer_div" class="collapse show">
<!--begin::Card body-->
<div class="card-body border-top p-9">
<div class="d-flex flex-column flex-lg-row">
<!--begin::Sidebar-->
<div class="col-md-2">
<!--begin::Catigories-->
<div class="mb-15">
<h4 class="text-black mb-7">Profile Image</h4>
<!--begin::Menu-->
<div class="row mb-6">							
<!--begin::Col-->
<div class="col-md-8">
<?php 
$image = $query->profile_image;
if (!empty($image)) {
$img = base_url('assets/uploads/user_images/' . $image);
} else {
$img = base_url('assets/admin/media/avatars/blank.png');
}
?>
<!--begin::Image input-->
<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(<?=base_url('assets/admin/media/avatars/blank.png')?>)">
<!--begin::Preview existing avatar-->
<div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?=$img?>)"></div>
<!--end::Preview existing avatar-->
<!--begin::Edit-->
<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
<i class="bi bi-pencil-fill fs-7"></i>
<!--begin::Inputs-->
<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
<input type="hidden" name="avatar_remove">
<input type="hidden" value="<?=$query->profile_image?>" name="profile_image">
<!--end::Inputs-->
</label>
<!--end::Edit-->
<!--begin::Cancel-->
<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
<i class="bi bi-x fs-2"></i>
</span>
<!--end::Cancel-->
<!--begin::Remove-->
<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow d-none" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
<i class="bi bi-x fs-2"></i>
</span>
<!--end::Remove-->
</div>
<!--end::Image input-->
<!--begin::Hint-->
<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
<!--end::Hint-->
</div>
<!--end::Col-->
</div>
</div>
<!--end::Catigories-->

</div>
<!--end::Sidebar-->
<!--begin::Content-->

<div class="col-lg-10 col-md-12">

<div class="row mb-6">
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Project Name</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="p_id" class="form-control form-select" required="">
<option value="">Select Project Name</option>
<?php
if(!empty($p_name)){
        foreach($p_name as $k=>$pname){
?>
<option value="<?=$pname->id?>" <?= ($pname->id == $query->p_id ) ? 'selected' : '' ?>><?=$pname->project_name?></option>
<?php } }?>
</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>

</div>
<div class="row mb-12">
<label class="col-md-2 col-form-label required fw-bold fs-6">Login ID</label>
<div class="col-md-2">
<input type="text" class="form-control" id="login_id" name="login_id" value="<?=!empty($query->user_login_id)?$query->user_login_id:generateUserLoginId('CL')?>" placeholder="Customer Login ID" readonly>
</div>
<label class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end <?php if(empty($query->id)){?>required <?php } ?>">Password</label>
<div class="col-md-4">
<input type="password" class="form-control  " id="password" name="password" value="<?= $query->password ?>" placeholder="Password" <?php if(empty($query->id)){?>required <?php } ?>>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>								
</div>    

<div class="row mb-6">
<label class="col-md-2 col-form-label required fw-bold fs-6">Full Name</label>
<div class="col-md-10">
<div class="row">										
<div class="col-md-2 fv-row fv-plugins-icon-container">
<select name="abbreviation" class="form-select  " tabindex="-1" aria-hidden="true">
<option value="Mr." <?=$query->abbreviation=='Mr.'?'selected':''?> >Mr.</option>
<option value="Ms." <?=$query->abbreviation=='Ms.'?'selected':''?>>Ms.</option>
<option value="Mrs." <?=$query->abbreviation=='Mrs.'?'selected':''?>>Mrs.</option>
<option value="Miss" <?=$query->abbreviation=='Miss'?'selected':''?>>Miss</option>
</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
<div class="col-md-10 fv-row fv-plugins-icon-container">
<input type="text" name="full_name" class="form-control  mb-3 mb-lg-0" placeholder="Full name" value="<?=$query->full_name?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>

</div>
</div>
</div>
<div class="row mb-6">
<label class="col-md-2 col-form-label required fw-bold fs-6">Email</label>
<div class="col-md-10">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="email" name="email" class="form-control " placeholder="Email" value="<?=$query->email?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
</div>

    
   
<div class="row mb-6">
<label class="col-md-2 col-form-label  fw-bold fs-6 required">Address</label>
<div class="col-md-10">
<div class="row">										
<div class="fv-row fv-plugins-icon-container">
<!--<div class="notice d-flex bg-light-success rounded border-success border border-dashed mb-3 p-6">
<div class="d-flex flex-stack flex-grow-1">
<div class="fw-bold">
<h4 class="text-gray-900 fw-bolder">Mark The Location On The Map</h4>
</div>
<div class="fw-bold">
<a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_map">
<i class="fas fa-map-marker-alt"></i> Open Map
</a>
</div>

</div>
</div>-->

<textarea name="address" class="form-control  editor" rows="5" placeholder="address" id="address" required><?=$query->address?></textarea>
<input type="hidden" name="lat" id="lat" value="<?=$query->lat?>" >
<input type="hidden" name="lng" id="lng" value="<?=$query->lng?>" >
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
</div>
<div class="row mb-6">
<label class="col-md-2 col-form-label  fw-bold fs-6 mb-5 required">Province</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="state_id" id="state_id" aria-label="Select a state"  data-placeholder="Select a state.." required class="form-select " onchange="getCityList(this.value)">
<?=state_list_dropdown($query->state_id,!empty($query->country_id)?$query->country_id:'14'); ?>
</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  fw-bold fs-6 mb-5 text-end required">City</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="city_id" id="city_id" aria-label="Select a city"  data-placeholder="Select a city.." class="form-select " required onchange="$('#state_id').val($(this).find('option:selected').data('state_id'))">
<?=city_list_dropdown($query->city_id,$query->state_id,!empty($query->country_id)?$query->country_id:'14');?>
</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  fw-bold fs-6 mb-5 required">Pincode</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="pincode" class="form-control" required placeholder="pincode" value="<?=$query->pincode?>">
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  fw-bold fs-6 mb-5 text-end required">Country</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="country_id" aria-label="Select a Country" required data-placeholder="Select a Country.." class="form-select " onchange="getStateList(this.value)">
<?=country_list_dropdown(!empty($query->country_id)?$query->country_id:'14');?>
</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
</div>
<div class="row mb-6">
<label class="col-md-2 col-form-label required fw-bold fs-6">Mobile Number</label>
<div class="col-md-4">
<input type="number" name="phone_no" class="form-control " placeholder="phone no" value="<?=$query->phone_no?>">
</div>
 <label class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end required">Whatsapp Number</label>
<div class="col-md-4">
<input type="number" name="whatsapp_number" class="form-control" placeholder="Whatsapp Number" value="<?=$query->whatsapp_number?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>								
</div>


</div>
<!--end::Content-->
</div>

</div>
<!--end::Card body-->
</div>
<!--end::Content-->
</div>


</div>
<!--end::Container-->
</div>
<!--end::Post-->
</form>
<!--end::Form-->


<!--begin::Modal - Map-->
<div class="modal fade " id="kt_modal_map" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-800px">
<!--begin::Modal content-->
<div class="modal-content">
<!--begin::Form-->
<?php			
$this->load->view('admin/saveMap',$query); 
?>
<!--end::Form-->											
</div>
</div>
</div>
<!--end::Modal -->

<!--begin::Modal - Map-->
<div class="modal fade " id="kt_modal_map2" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-800px">
<!--begin::Modal content-->
<div class="modal-content">
<!--begin::Card-->
<div class="card card-custom gutter-b">
<div class="card-body">
<div class="input-group mb-5">
<input type="text" class="form-control" id="gmap_address2" placeholder="Enter Your Address..." value="<?=$query->billing_address?>">
<div class="input-group-append">
<button type="button" class="btn btn-primary" id="gmap_btn2">
<i class="fa fa-search"></i>
</button>
<button type="button" class="btn btn-danger" id="gmap_clr_btn2">
<i class="fa fa-trash-alt"></i>
</button>
</div>
</div>												
<div id="map2" style="height:300px;"></div>
</div>	
</div>
<!--end::Card-->
<!--begin::Modal footer-->
<div class="modal-footer flex-center">		
<!--begin::Button-->
<button type="button" class="btn btn-primary" data-kt-indicator="off"  data-bs-dismiss="modal" aria-label="Close">
<span class="indicator-label">Submit</span>
<span class="indicator-progress">Please wait...
<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
</button>
<!--end::Button-->
</div>
<!--end::Modal footer-->											
</div>
</div>
</div>
<!--end::Modal -->


<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
?>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClxHQfq36gVF6f6udbVnPCXn6q7sU6iFQ&callback=initialize&libraries=&v=weekly" async ></script>-->
<?php
$this->load->view('admin/_js', $this->data);
//$this->load->view('admin/_map_js', $query);
?>

<script>
function getStateList(id) {
if (id != '') {
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getStateList') ?>" + "/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#state_id').html(result);
}
});
}
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getCityList') ?>" + "/0/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#city_id').html(result);
}
});
}
function getCityList(id) {
if (id != '') {
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getCityList') ?>" + "/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#city_id').html(result);
}
});
}
}
function getBStateList(id) {
if (id != '') {
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getStateList') ?>" + "/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#billing_state_id').html(result);
}
});
}
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getCityList') ?>" + "/0/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#billing_city_id').html(result);
}
});
}
function getBCityList(id) {
if (id != '') {
$.ajax({
type: 'POST',
url: "<?= base_url('Users/getCityList') ?>" + "/" + id,
data: '',
success: function (result) {
//console.log(result);
$('#billing_city_id').html(result);
}
});
}
}
</script>