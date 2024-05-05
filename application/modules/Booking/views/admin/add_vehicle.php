<!--begin::Form-->
<form class="form" id="update_form_<?= $query->id ?>" method="POST"
    action="<?= base_url('Vehicles/add_vehicle/' . $query->id) ?>" id=""
    data-kt-redirect="<?= base_url('Vehicles/add_vehicle/' . $query->id) ?>" enctype="multipart/form-data">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Add Vehicle</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Vehicles/vehicle_listing')?>">Vehicle
                                Listing</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add Vehicle</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Vehicle</header>

                        </div>
                        <div class="card-body row">
                            <div class="col-lg-12">
                                <h3>Vehicle Information</h3>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName"
                                        name="registration_number" value="<?=$query->registration_number?>" required>
                                    <label class="mdl-textfield__label">Registration Number</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="make"
                                        value="<?=$query->make?>" required>
                                    <label class="mdl-textfield__label">Make</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="model"
                                        value="<?=$query->model?>" required>
                                    <label class="mdl-textfield__label">Model</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName" name="year"
                                        value="<?=$query->year?>" required>
                                    <label class="mdl-textfield__label">Year</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label">Vehicle Type
                                    </label>
                                    <div class="col-lg-9 col-md-8">
                                        <select class="form-control  select2" name="vehicle_type" required>
                                            <option value="Sedan" <?php if($query->vehicle_type=='sedan'){?>
                                                selected="true" <?php }?>>Sedan</option>
                                            <option value="SUV" <?php if($query->vehicle_type=='sedan'){?>
                                                selected="true" <?php }?>>SUV</option>
                                            <option value="First Class" <?php if($query->vehicle_type=='sedan'){?>
                                                selected="true" <?php }?>>First Class</option>
                                            <option value="Family People Mover"
                                                <?php if($query->vehicle_type=='sedan'){?> selected="true" <?php }?>>
                                                Family People Mover</option>
                                            <option value="Luxury People Mover"
                                                <?php if($query->vehicle_type=='sedan'){?> selected="true" <?php }?>>
                                                Luxury People Mover</option>
                                            <option value="Stretch Limo" <?php if($query->vehicle_type=='sedan'){?>
                                                selected="true" <?php }?>>Stretch Limo</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="txtFName"
                                        name="passenger_capacity" value="<?=$query->passenger_capacity?>" required>
                                    <label class="mdl-textfield__label">Passenger Capacity</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="luggage_capacity"
                                        name="luggage_capacity" value="<?=$query->luggage_capacity?>" required>
                                    <label class="mdl-textfield__label">Check-in Luggage Capacity</label>
                                </div>
                            </div>


                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="exterior_color"
                                        name="exterior_color" value="<?=$query->exterior_color?>" required>
                                    <label class="mdl-textfield__label">Exterior Color</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="rwc_date" name="rwc_date"
                                        value="<?=$query->rwc_date?>" required>
                                    <label class="mdl-textfield__label">RWC Date</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <label class="control-label">Airport Authority
                                    </label>
                                    <div class="col-lg-9 col-md-8">
                                        <select class="form-control  select2" name="airport_authority" required data-placeholder="Airport Authority">
                                            <option value="Yes" <?php if($query->airport_authority=='Yes'){?>
                                                selected="true" <?php }?>>Yes</option>
                                            <option value="No" <?php if($query->airport_authority=='No'){?>
                                                selected="true" <?php }?>>No</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                  
                                    <div class="col-lg-9 col-md-8">
                                        <select class="form-control  select2-multiple" multiple name="general[]" required data-placeholder="Select General">
                                            <?php $general = explode(",",$query->general);?>
                                            <option value="AC" <? if(in_array('AC', $general)) {?> selected="true"<?php }?>>AC</option>
                                            <option value="Bathroom" <? if(in_array('Bathroom', $general)) {?> selected="true"<?php }?>>Bathroom</option>
                                            <option value="Dance Pole" <? if(in_array('Dance Pole', $general)) {?> selected="true"<?php }?>>Dance Pole</option>
                                            <option value="In-Vehicle Bar" <? if(in_array('In-Vehicle Bar', $general)) {?> selected="true"<?php }?>In-Vehicle Bar</option>
                                            <option value="Luggage" <? if(in_array('Luggage', $general)) {?> selected="true"<?php }?>Luggage</option>
                                            <option value="Refrigerator" <? if(in_array('Refrigerator', $general)) {?> selected="true"<?php }?>>Refrigerator</option>
                                            <option value="Ice Chest" <? if(in_array('Ice Chest', $general)) {?> selected="true"<?php }?>>Ice Chest</option>

                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    
                                    <div class="col-lg-9 col-md-8">
                                    <?php $multi = explode(",",$query->multimedia);?>
                                        <select class="form-control select2-multiple" name="multimedia[]" multiple  required data-placeholder="Select Multimedia">
                                            <option value="AUX" <? if(in_array('AUX', $multi)) {?> selected="true"<?php }?>>AUX</option>
                                            <option value="Bluetooth" <? if(in_array('Bluetooth', $multi)) {?> selected="true"<?php }?>>Bluetooth</option>
                                            <option value="DVD Player" <? if(in_array('DVD Player', $multi)) {?> selected="true"<?php }?>>DVD Player</option>
                                            <option value="Game Console" <? if(in_array('Game Console', $multi)) {?> selected="true"<?php }?>>Game Console</option>
                                            <option value="Karaoke" <? if(in_array('Karaoke', $multi)) {?> selected="true"<?php }?>>Karaoke</option>
                                            <option value="TV" <? if(in_array('TV', $multi)) {?> selected="true"<?php }?>>TV</option>
                                            <option value="USB" <? if(in_array('USB', $multi)) {?> selected="true"<?php }?>>USB</option>
                                            <option value="Wifi" <? if(in_array('Wifi', $multi)) {?> selected="true"<?php }?> >Wifi</option>
                                            <option value="Power Outlets" <? if(in_array('Power Outlets', $multi)) {?> selected="true"<?php }?>>Power Outlets</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <div class="col-lg-9 col-md-8">
                                        <?php $policies = explode(",",$query->policies);?>
                                        <select class="form-control  select2-multiple" name="policies[]" multiple required data-placeholder="Select Policies">
                                            <option value="Alcohol Friendly"<? if(in_array('Alcohol Friendly', $policies)) {?> selected="true"<?php }?>>Alcohol Friendly</option>
                                            <option value="Food Allowed" <? if(in_array('Food Allowed', $policies)) {?> selected="true"<?php }?>>Food Allowed</option>
                                            <option value="Pets Allowed" <? if(in_array('Pets Allowed', $policies)) {?> selected="true"<?php }?>>Pets Allowed</option>
                                            <option value="Smoking Allowed" <? if(in_array('Smoking Allowed', $policies)) {?> selected="true"<?php }?>>Smoking Allowed</option>

                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width mdl-textfield--file">
                                    <input class="mdl-textfield__input" placeholder="Upload Profile Photo" type="file"
                                        name="files_1[]" multiple>
                                    <span style="color:red">You can upload Multiple Car Image</span>
                                </div>
                            </div>
                            <h3>Pricing</h3>
                            
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="trip_rate_per_km"
                                        name="minimum_total_base_rate" value="<?=$query->minimum_total_base_rate?>" required>
                                    <label class="mdl-textfield__label">Minimum Total Base Rate</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="trip_rate_per_km" name="trip_rate_per_km"
                                        value="<?=$query->trip_rate_per_km?>" required>
                                    <label class="mdl-textfield__label">Trip Rate per KM</label>
                                </div>
                            </div>
                           

                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="weekday_hourly_rate" name="weekday_hourly_rate"
                                        value="<?=$query->weekday_hourly_rate?>" required>
                                    <label class="mdl-textfield__label">Weekday Hourly Rate</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="weekend_hourly_rate" name="weekend_hourly_rate"
                                        value="<?=$query->weekend_hourly_rate?>" required>
                                    <label class="mdl-textfield__label">Weekend Hourly Rate</label>
                                </div>
                            </div>

                            <div class="col-lg-6 p-t-5">
                           
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <select id="multiple" name="weekday_hourly_minimum" class="form-control select2" data-placeholder="Weekend Hourly Minimum">
                                    <option value="">None</option>    
                                        <option value="0" <? if($query->weekday_hourly_minimum == '0') {?> selected="true"<?php }?>>0 Hours</option>
                                        <option value="0.5" <? if($query->weekday_hourly_minimum == '0.5') {?> selected="true"<?php }?>>0.5 Hours</option>
                                        <option value="1" <? if($query->weekday_hourly_minimum == '1') {?> selected="true"<?php }?>>1 Hours</option>
                                        <option value="1.5" <? if($query->weekday_hourly_minimum == '1.5') {?> selected="true"<?php }?>>1.5 Hours</option>
                                        <option value="2" <? if($query->weekday_hourly_minimum == '2') {?> selected="true"<?php }?>>2 Hours</option>
                                        <option value="2.5" <? if($query->weekday_hourly_minimum == '2.5') {?> selected="true"<?php }?>>2.5 Hours</option>
                                        <option value="3" <? if($query->weekday_hourly_minimum == '3') {?> selected="true"<?php }?>>3 Hours</option>
                                        <option value="3.5" <? if($query->weekday_hourly_minimum == '3.5') {?> selected="true"<?php }?>>3.5 Hours</option>
                                        <option value="4" <? if($query->weekday_hourly_minimum == '4') {?> selected="true"<?php }?>>4 Hours</option>
                                        <option value="4.5" <? if($query->weekday_hourly_minimum == '4.5') {?> selected="true"<?php }?>>4.5 Hours</option>
                                        <option value="5" <? if($query->weekday_hourly_minimum == '5') {?> selected="true"<?php }?>>5 Hours</option>
                                        <option value="5.5" <? if($query->weekday_hourly_minimum == '5.5') {?> selected="true"<?php }?>>5.5 Hours</option>
                                        <option value="6" <? if($query->weekday_hourly_minimum == '6') {?> selected="true"<?php }?>>6 Hours</option>
                                        <option value="6.5" <? if($query->weekday_hourly_minimum == '6.5') {?> selected="true"<?php }?>>6.5 Hours</option>
                                        <option value="7" <? if($query->weekday_hourly_minimum == '7') {?> selected="true"<?php }?>>7 Hours</option>
                                        <option value="7.5" <? if($query->weekday_hourly_minimum == '7.5') {?> selected="true"<?php }?>>7.5 Hours</option>
                                        <option value="8" <? if($query->weekday_hourly_minimum == '8') {?> selected="true"<?php }?>>8 Hours</option>
                                        
                                                   
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-5">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <?php $weekend = explode(",",$query->choose_your_weekend);?>
                                    <select id="multiple" name="choose_your_weekend[]" class="form-control select2-multiple" multiple data-placeholder="Choose Your Weekends">
                                    <option value="Friday" <? if(in_array('Friday', $weekend)) {?> selected="true"<?php }?>>Friday</option>
                                        <option value="Saturday" <? if(in_array('Saturday', $weekend)) {?> selected="true"<?php }?>>Saturday</option>
                                        <option value="Sunday" <? if(in_array('Sunday', $weekend)) {?> selected="true"<?php }?>>Sunday</option>
                                                   
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <?php if(!empty($query->id)) {?>
                                    <h3>Car Images</h3> <?php } ?>
                                    <div id="owl-demo2" class="owl-carousel">
                                        <?php if(!empty($query->car_image)) {
                                 $car_image=explode(",",$query->car_image); 
                                 foreach($car_image as $row) { 
                                    $img_get = base_url('assets/uploads/car_images/' . $row);  
                                ?>
                                        <div class="item"><img src="<?=$img_get;?>" alt="">
                                        </div>
                                        <?php } } ?>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12 p-t-5 text-center">
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
.help-block,
.control-label {
    color: #aaaaaa !important;
    font-size: 13px !important;
}

#owl-demo .item img {
    display: block;
    width: 100%;
    height: auto;
}

#owl-demo2 .item {
    margin: 3px;
    border: 2px solid;
}
</style>
<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
?>