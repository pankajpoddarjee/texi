<!--begin::Form-->
<form class="form" id="update_form_<?= $query->id ?>" method="POST" action="<?= base_url('Vehicles/add_type/' . $query->id) ?>" id="" data-kt-redirect="<?= base_url('Vehicles/add_type/' . $query->id) ?>" enctype="multipart/form-data">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Vehicle Type</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Vehicles/type_listing')?>">Type</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Vehicle Type</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Vehicle Type</header>
                           
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-12">
                                <h3>Basic Information</h3>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="type_name" value="<?=$query->type_name?>" required>
                                    <label class="mdl-textfield__label">Type</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width mdl-textfield--file">
                                    <input class="mdl-textfield__input" placeholder="Upload Profile Photo" type="file" id="car_type_image" name="car_type_image">
                                    <input type="hidden" value="<?=$query->type_image?>" name="type_image">
                                    
                            </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                            <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                            <button type="button"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--end::Form-->
<style>
 .help-block, .control-label{color: #aaaaaa !important;
 font-size: 13px !important;  
 } 
</style>    
<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
?>

    