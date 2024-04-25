<!--begin::Card-->
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="input-group mb-5">
			<input type="text" class="form-control" id="gmap_address" placeholder="Enter Your Address..." value="<?=$query->address?>">
			<div class="input-group-append">
				<button type="button" class="btn btn-primary" id="gmap_btn">
					<i class="fa fa-search"></i>
				</button>
				<button type="button" class="btn btn-danger" id="gmap_clr_btn">
					<i class="fa fa-trash-alt"></i>
				</button>
			</div>
		</div>												
		<div id="map" style="height:300px;"></div>
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