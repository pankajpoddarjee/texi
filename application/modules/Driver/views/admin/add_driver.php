<!--begin::Form-->
<form class="form" id="update_form_<?= $query->id ?>" method="POST" action="<?= base_url('Driver/add_driver/' . $query->id) ?>" id="" data-kt-redirect="<?= base_url('Driver/add_driver/' . $query->id) ?>" enctype="multipart/form-data">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Driver</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Driver/add_driver')?>">Drivers</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Driver</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Driver</header>
                           
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-12">
                                <h3>Basic Information</h3>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="fname" value="<?=$query->fname?>">
                                    <label class="mdl-textfield__label">First Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtLName" name="lname" value="<?=$query->lname?>">
                                    <label class="mdl-textfield__label">Last Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="pname" value="<?=$query->pname?>">
                                    <label class="mdl-textfield__label">Preferred Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                           pattern="-?[0-9]*(\.[0-9]+)?" id="text5" name="mobile_number" value="<?=$query->mobile_number?>">
                                    <label class="mdl-textfield__label" for="text5">Mobile Number</label>
                                    <span class="mdl-textfield__error">Number required!</span>
                                </div>
                            </div>
                          
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="email" id="txtemail" name="email" value="<?=$query->email?>">
                                    <label class="mdl-textfield__label">Email</label>
                                    <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <!--<input class="mdl-textfield__input" type="text" id="birtd_date" name="birth_date" >-->
                                    <input type="text" placeholder="" data-mask="99/99/9999"
                                        class="mdl-textfield__input" id="birtd_date" name="birth_date" value="<?=$query->birth_date?>">
                                    <label class="mdl-textfield__label">Birth Date </label>
                                    
                                    <span class="help-block">dd/mm/yyyy</span>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="address" name="address" required value="<?=$query->address?>">
                                    <label class="mdl-textfield__label">Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                           pattern="-?[0-9]*(\.[0-9]+)?" id="text5" name="emergency_contact_number" value="<?=$query->emergency_contact_number?>" required >
                                    <label class="mdl-textfield__label" for="text5">Emergency Contact Name</label>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <h3>License Information</h3>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="license_number" name="license_number" value="<?=$query->license_number?>" required>
                                    <label class="mdl-textfield__label">License Number</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                          id="license_expiry" name="license_expiry" value="<?=$query->license_expiry?>" required>
                                    <label class="mdl-textfield__label" for="text5">License Expiry</label>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="state" name="state" value="<?=$query->state?>" required>
                                    <label class="mdl-textfield__label">State</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label">Driver Authority Number
                                            </label>
                                            <div class="col-lg-9 col-md-8">
                                                <select class="form-control  select2" name="driver_authority_number" value="<?=$query->driver_authority_number?>" required>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label">Airport Authority
                                            </label>
                                            <div class="col-lg-9 col-md-8">
                                                <select class="form-control select2" name="airport_authority" required>
                                                    <option value="yes" <?php if($query->airport_authority=='yes') {?> selected="selected" <?php }?>>Yes</option>
                                                    <option value="no" <?php if($query->airport_authority=='no') {?> selected="selected" <?php }?>>No</option>
                                                </select>
                                            </div>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                           id="availability" name="driver_notes" placeholder="Driver Notes" value="<?=$query->driver_notes?>" required>
                                    <label class="mdl-textfield__label" for="text5">Availability</label>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h3>Bank Information</h3>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="account_name" name="account_name" value="<?=$query->account_name?>" required>
                                    <label class="mdl-textfield__label">Account Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                          id="account_number" name="account_number" value="<?=$query->account_number?>" required>
                                    <label class="mdl-textfield__label" for="text5">Account Number</label>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                          id="ssb" name="ssb" value="<?=$query->ssb?>" required>
                                    <label class="mdl-textfield__label" for="text5" >SSB</label>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                          id="abn_number" name="abn_number" value="<?=$query->abn_number?>" required>
                                    <label class="mdl-textfield__label" for="text5">ABN Number</label>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label">GST Registered
                                            </label>
                                            <div class="col-lg-9 col-md-8">
                                                <select class="form-control select2" name="gst_registered" required>
                                                    <option value="yes" <?php if($query->gst_registered=='yes') {?> selected="selected" <?php }?>>Yes</option>
                                                    <option value="no" <?php if($query->gst_registered=='no') {?> selected="selected" <?php }?>>No</option>
                                                </select>
                                            </div>
                                    <!--<span class="mdl-textfield__error">Number required!</span>-->
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width mdl-textfield--file">
                                    <input class="mdl-textfield__input" placeholder="Upload Profile Photo" type="file" id="profile_avatar" name="profile_avatar">
                                    <input type="hidden" value="<?=$query->profile_image?>" name="profile_image">
                                    
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

    