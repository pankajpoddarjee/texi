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
<a href="<?=base_url('Projects/listing')?>" class="text-muted text-hover-primary">Projects List</a>
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
<a href="<?=base_url('Projects/listing')?>" class="btn btn-white btn-active-light-danger me-2">Back</a>
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
<h3 class="fw-bolder m-0">Project Details</h3>
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

<!--end::Sidebar-->
<!--begin::Content-->
<div class="col-lg-12 col-md-12">
<div class="row mb-6">
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Project Name</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="project_name" class="form-control  mb-3 mb-lg-0" placeholder="Project Name" value="<?=$query->project_name?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Project Type</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="type" class="form-select  " tabindex="-1" aria-hidden="true" required>
<option value="">Please Select</option>   
<option value="single_storey" <?=$query->type=='single_storey'?'selected':''?> >Single Storey</option>
<option value="multiple_storey"  <?=$query->type=='multiple_storey'?'selected':''?>>Multiple Storey</option>

</select>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
</div>  
<div class="row mb-6">
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Client Name</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<select name="c_id" class="form-control form-select" required="">
<option value="">Select Client Name</option>
<?php
if(!empty($client_name)){
        foreach($client_name as $k=>$cname){
?>
<option value="<?=$cname->id?>" <?= ($cname->id == $query->c_id ) ? 'selected' : '' ?>><?=$cname->client_name?></option>
<?php } }?>
</select>
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
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Plot Size</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="plot_size" class="form-control  mb-3 mb-lg-0" placeholder="Plot Size" value="<?=$query->plot_size?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Unit Number</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="unit_number" class="form-control  mb-3 mb-lg-0" placeholder="Unit Number" value="<?=$query->unit_number?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label required fw-bold fs-6 mb-5">Start Date</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="date" name="start_date" required class="form-control" value="<?=$query->start_date?>">
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label required fw-bold fs-6 mb-5">End Date</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="date" name="end_date" required class="form-control" value="<?=$query->end_date?>">
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
</div>

<div class="row mb-6">
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Latitude</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="latitude" class="form-control  mb-3 mb-lg-0" placeholder="Latitude" value="<?=$query->latitude?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>
<label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Longitude</label>
<div class="col-md-4 mb-5">
<div class="row">
<div class="fv-row fv-plugins-icon-container">
<input type="text" name="longitude" class="form-control  mb-3 mb-lg-0" placeholder="Longitude" value="<?=$query->longitude?>" required>
<div class="fv-plugins-message-container invalid-feedback"></div>
</div>
</div>
</div>


</div>    

<div class="row mb-6">
<label class="col-md-2 col-form-label required fw-bold fs-6">Document-1

</label>

<div class="col-md-4">
<input type="file" class="form-control" name="files_1[]" multiple />
<span style="color:red">You can upload Multiple Documents</span><br>
<span style="color:#df9fbf">Open To All</span>
<?php
if(!empty($query->document_1)) {
    $document_1=explode(",",$query->document_1);
?>
<ol class="list-group list-group-numbered">
    <?php
    $count=1;
    foreach($document_1 as $value) { 
     ?>
    <li><a href="<?= base_url('assets/uploads/projects_documents/' . $value) ?>" target="_blank;" download>Document</a></li>
    <?php $count++;} ?>
 </ol>
<?php } ?>
</div>
 <label class="col-md-2 col-form-label required fw-bold fs-6 mb-5">Document-2
 </label>
 
<div class="col-md-4">
<input type="file" class="form-control" name="files_2[]" multiple />
<span style="color:red">You can upload Multiple Documents</span><br>
 <span style="color:#df9fbf">Only For Staff</span>
<?php

if(!empty($query->document_2)) {
$document_2=explode(",",$query->document_2);
?>
<ol class="list-group list-group-numbered">
    <?php
    $count=1;
    foreach($document_2 as $value) { 
     ?>
    <li><a href="<?= base_url('assets/uploads/projects_documents/' . $value) ?>" target="_blank;" download>Document</a></li>
    <?php $count++;} ?>
 </ol>
<?php } ?>
</div>								
</div>
    
<div class="row mb-6">
<label class="col-md-2 col-form-label required fw-bold fs-6">Document-3

</label>

<div class="col-md-4">
<input type="file" class="form-control" name="files_3[]" multiple />
<span style="color:red">You can upload Multiple Documents</span><br>
<span style="color:#df9fbf">For For Staff & Allocated Employee</span>
<?php
if(!empty($query->document_3)) {
    $document_3=explode(",",$query->document_3);

?>
<ol class="list-group list-group-numbered">
    <?php
    $count=1;
    foreach($document_3 as $value) { 
     ?>
    <li><a href="<?= base_url('assets/uploads/projects_documents/' . $value) ?>" target="_blank;" download>Document</a></li>
    <?php $count++;} ?>
 </ol>
<?php } ?>
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