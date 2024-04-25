<!--begin::Form-->
<form id="" class="form" method="POST" enctype="multipart/form-data">
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
				<!--begin::Item-->
				<li class="breadcrumb-item text-muted">
					<a href="<?=base_url()?>" class="text-muted text-hover-primary">Home</a>
				</li>
				<!--end::Item-->
								
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-dark"><?=$header['site_title']?></li>
				<!--end::Item-->
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title-->
		<!--begin::Actions-->
		<div class="d-flex align-items-center py-1">
			<div class="">
				<button type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</button>
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
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#general_settings_div" aria-expanded="true" aria-controls="general_settings_div">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">General Settings</h3>
				</div>
				<!--end::Card title-->
				
			</div>
			<!--begin::Card header-->
			<!--begin::Content-->
			<div id="general_settings_div" class="collapse show">
				<!--begin::Card body-->
				<div class="card-body border-top p-9">
					<div class="row mb-1">
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-0 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Application Name</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="system_name" name="system_name" value="<?=get_settings_value('system_name')?>" placeholder="System Name" required>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-0 fv-plugins-icon-container">
								<label for="newpassword" class="form-label fs-6 fw-bolder mb-3">Application Slogan</label>
								<input type="text" class="form-control form-control-lg form-control-solid"  id="system_title" name="system_title" value="<?=get_settings_value('system_title')?>"  placeholder="System Title" required>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mt-7 row">
							<?php
							$logo = get_settings_value('logo');
							if (!empty($logo)) {
								$img = base_url('assets/uploads/system_images/' . $logo);
							} else {
								$img = base_url('assets/admin/images/default_logo.jpeg');
							}
							//echo $img;
							?>								
							<div class="col-lg-3">
								<img class=" img-fluid" src="<?= $img ?>" alt="Logo image" style=""> 
							</div>								
							<div class="col-lg-9">
							  <label for="logo_image" class="form-label">Application Logo</label>
							  <input type="file" class="form-control" id="logo_image" name="logo_image" placeholder="Logo" >
							  <input type="hidden" class="form-control" id="logo" name="logo" value="<?= $logo ?>" > 
							</div>
						</div>
						<div class="col-lg-6 mt-7 row">
							<?php
							$favicon = get_settings_value('favicon');
							$img2 = base_url('assets/admin/images/default_favicon.png');
							if (!empty($favicon)) {
								$img2 = base_url('assets/uploads/system_images/' . $favicon);
							}
							//echo $img;
							?>								
							<div class="col-lg-3">
								<img class=" img-fluid" src="<?= $img2 ?>" alt="Favicon image" style=""> 
							</div>								
							<div class="col-lg-9">
							  <label for="favicon_image" class="form-label">Favicon</label>
							  <input type="file" class="form-control" id="favicon_image" name="favicon_image" placeholder="Favicon" >
							  <input type="hidden" class="form-control" id="favicon" name="favicon" value="<?= $favicon ?>" >
							</div>
						</div>
					</div>	
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Content-->			
		</div>
		<!--end::Basic info-->
		
		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#contact_settings_div" aria-expanded="true" aria-controls="contact_settings_div">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Contact Settings</h3>
				</div>
			</div>
			<div id="contact_settings_div" class="collapse show">
				<div class="card-body border-top p-9">
					<div class="row mb-1">
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Application Email</label>
								<input type="email" class="form-control form-control-lg form-control-solid" id="email_to" name="email_to" value="<?=get_settings_value('email_to')?>" placeholder="Email To Address">
								<div class="fv-plugins-message-container">User will send email to this id </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">System Email</label>
								<input type="email" class="form-control form-control-lg form-control-solid" id="email_from" name="email_from" value="<?=get_settings_value('email_from')?>" placeholder="Email From Address">
								<div class="fv-plugins-message-container">Admin / System generated email will be sent from this id</div>
							</div>
						</div>						
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Contact No</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="contact_no" name="contact_no" value="<?=get_settings_value('contact_no')?>" placeholder="Contact No"maxlength="11">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>												
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Alternate Contact No</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="contact_no2" name="contact_no2" value="<?=get_settings_value('contact_no2')?>" placeholder="Alternate Contact No"maxlength="11">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>						
					</div>	
				</div>
			</div>		
		</div>
		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#other_settings_div" aria-expanded="true" aria-controls="other_settings_div">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Other Settings</h3>
				</div>
			</div>
			<div id="other_settings_div" class="collapse show">
				<div class="card-body border-top p-9">
					<div class="row mb-1">
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="address1" class="form-label fs-6 fw-bolder mb-3">Address Line 1</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="address1" name="address1" value="<?=get_settings_value('address1')?>" placeholder="Address Line 1">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="address2" class="form-label fs-6 fw-bolder mb-3">Address Line 2</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="address2" name="address2" value="<?=get_settings_value('address2')?>" placeholder="Address Line 3">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="country_id" class="form-label fs-6 fw-bolder mb-3">Country</label>
								<select name="country_id" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country.." class="form-select form-select-solid form-select-lg" onchange="getStateList(this.value)">
									<?=country_list_dropdown(get_settings_value('country_id'));?>
								</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="state_id" class="form-label fs-6 fw-bolder mb-3">State</label>
								<select name="state_id" id="state_id" aria-label="Select a state" data-control="select2" data-placeholder="Select a state.." class="form-select form-select-solid form-select-lg" onchange="getCityList(this.value)">
									<?=state_list_dropdown(get_settings_value('state_id'),get_settings_value('country_id'));?>
								</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="city_id" class="form-label fs-6 fw-bolder mb-3">City</label>
								<select name="city_id" id="city_id" aria-label="Select a city" data-control="select2" data-placeholder="Select a city.." class="form-select form-select-solid form-select-lg">
									<?=city_list_dropdown(get_settings_value('city_id'),get_settings_value('state_id'));?>
								</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="zip" class="form-label fs-6 fw-bolder mb-3">ZIP/PIN</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="zip" name="zip" value="<?=get_settings_value('zip')?>" placeholder="ZIP/PIN">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="time_zone" class="form-label fs-6 fw-bolder mb-3">TimeZone</label>
								<select name="time_zone" id="time_zone" aria-label="Select a TimeZone" data-control="select2" data-placeholder="Select a TimeZone.." class="form-select form-select-solid form-select-lg">
									<?php $timezones = timezone_identifiers_list();
									if (!empty($timezones)):
										foreach ($timezones as $timezone):?>
											<option value="<?php echo $timezone; ?>" <?php echo ($timezone == get_settings_value('time_zone')) ? 'selected' : ''; ?>><?php echo $timezone; ?></option>
										<?php endforeach;
									endif; ?>
								</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>	
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currency" class="form-label fs-6 fw-bolder mb-3">Currency</label>
								<select name="currency" id="currency" aria-label="Select a Currency" data-control="select2" data-placeholder="Select a Currency.." class="form-select form-select-solid form-select-lg">
									<?=currency_list_dropdown(get_settings_value('currency'));?>
								</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>						
					</div>	
				</div>
			</div>		
		</div>
		
		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#login_settings_div" aria-expanded="true" aria-controls="login_settings_div">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Login Settings</h3>
				</div>
			</div>
			<div id="login_settings_div" class="collapse show">
				<div class="card-body border-top p-9">
					<div class="row mb-1">
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Maximum Login Attempts</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="maximum_login_attempts" name="maximum_login_attempts" value="<?=get_settings_value('maximum_login_attempts')?>" placeholder="Maximum Login Attempts" >
								<div class="fv-plugins-message-container">Number of time user can try to login with wrong credentials</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Lockout Time</label>
								<input type="text" class="form-control form-control-lg form-control-solid" id="lockout_time" name="lockout_time" value="<?=get_settings_value('lockout_time')?>" placeholder="Lockout Time" >
								<div class="fv-plugins-message-container">Time limit of lockout profile after profile locked for max login attempt</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Track Login IP</label>
								<select name="track_login_ip_address" class="form-select form-select-solid form-select-lg">
										<option value="TRUE" <?=(get_settings_value('track_login_ip_address')=="TRUE")?'selected':''?>>TRUE</option>
										<option value="FALSE" <?=(get_settings_value('track_login_ip_address')=="FALSE")?'selected':''?>>FALSE</option>
									</select>
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						
					</div>	
				</div>
			</div>		
		</div>
		
		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#tax_settings_div" aria-expanded="true" aria-controls="tax_settings_div">
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Tax Settings</h3>
				</div>
			</div>
			<div id="tax_settings_div" class="collapse show">
				<div class="card-body border-top p-9">
					<div class="row mb-1">
						<div class="col-lg-6">
							<div class="fv-row mb-5 fv-plugins-icon-container">
								<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Tax Rate (%)</label>
								<input type="number" class="form-control form-control-lg form-control-solid" id="tax_rate" name="tax_rate" value="<?=get_settings_value('tax_rate')?>" placeholder="Tax Rate in (%)" >
								<div class="fv-plugins-message-container">Tax Rate in (%)</div>
							</div>
						</div>
						
					</div>	
				</div>
			</div>		
		</div>
		
		
	</div>
	<!--end::Container-->
</div>
<!--end::Post-->
</form>
<!--end::Form-->


<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
?>
<script>
function getStateList(id) {
	if (id != '') {
		$.ajax({
			type: 'POST',
			url: "<?= base_url('Settings/getStateList') ?>" + "/" + id,
			data: '',
			success: function (result) {
				//console.log(result);
				$('#state_id').html(result);
			}
		});
	}
}
function getCityList(id) {
	if (id != '') {
		$.ajax({
			type: 'POST',
			url: "<?= base_url('Settings/getCityList') ?>" + "/" + id,
			data: '',
			success: function (result) {
				//console.log(result);
				$('#city_id').html(result);
			}
		});
	}
}
</script>