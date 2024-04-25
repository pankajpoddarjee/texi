<!--begin::Form-->
<form class="form" method="POST" enctype="multipart/form-data" id="calc_form_<?= $query->id ?>">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-left me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3"><?= $header['site_title'] ?></h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= base_url() ?>" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= base_url('Projects/project_assigned_listing') ?>" class="text-muted text-hover-primary">Assigned Projects List</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-dark"><?= $header['site_title'] ?></li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <div class="">
                    <a href="<?= base_url('Projects/project_assigned_listing') ?>" class="btn btn-white btn-active-light-danger me-2">Back</a>
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
                <!--START::ALERT MESSAGE --><?php $this->load->view('templates/admin/alert'); ?><!--END::ALERT MESSAGE -->
                <!--begin::Card header-->
                <div style="background:#1a2935!important;" class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#customer_div" aria-expanded="true" aria-controls="customer_div">
                    <!--begin::Card title-->
                    <div class="card-title m-0 text-white">
                        <h3 class="fw-bolder m-0">Project Assign</h3>
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
                                                <select name="p_id" class="form-control form-select" required="" onchange="getClientName(this.value)">
                                                    <option value="">Select Project Name</option>
                                                    <?php
                                                    if (!empty($p_name)) {
                                                        foreach ($p_name as $k => $pname) {
                                                            ?>
                                                            <option value="<?= $pname->id ?>" <?= ($pname->id == $query->p_id ) ? 'selected' : '' ?>><?= $pname->project_name ?></option>
                                                        <?php }
                                                    } ?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Client Name</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">

                                                <select name="client_name_id" id="client_name_id" class="form-control form-select" required="" >
                                                    <option value="">Select Client Name</option>
                                                    <?php
//print_r($client_name);
                                                    if (!empty($client_name)) {
                                                        foreach ($client_name as $k => $c_name) {
                                                            ?>
                                                            <option value="<?= $c_name->c_id ?>" <?= ($c_name->c_id == $query->client_id) ? 'selected' : '' ?>><?= $c_name->c_name ?></option>
    <?php }
} ?>
                                                </select>    
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-6">

                                    <label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Work Type</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">

                                                <select name="work_id" class="form-control form-select" required="" onchange="getStaffName(this.value)">
                                                    <option value="">Select Work Type</option>
                                                    <?php
                                                    if (!empty($work_type)) {
                                                        foreach ($work_type as $k => $w_type) {
                                                            ?>
                                                            <option value="<?= $w_type->id ?>" <?= ($w_type->id == $query->work_id) ? 'selected' : '' ?>><?= $w_type->category_name ?></option>
    <?php }
} ?>
                                                </select>    
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Employee Name</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <select name="staff_name_id" id="staff_name_id" class="form-select" tabindex="-1" aria-hidden="true">
                                                    <option value="">Select Employee</option>
                                                    <?php
                                                    if (!empty($staff_name)) {
                                                        foreach ($staff_name as $k_m => $staffname) {
                                                            ?>												
                                                            <option value="<?= $staffname->id ?>" <?= $query->user_id == $staffname->id ? 'selected' : '' ?> ><?= $staffname->name ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>	
                                                </select>

                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="row mb-6">

                                    <label class="col-md-2 col-form-label  required fw-bold fs-6 mb-5">Notes</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <textarea class="form-control" id="notes" rows="2" name="notes" placeholder="Notes" required><?= $query->notes ?></textarea>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>     

                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label required fw-bold fs-6 mb-5">Assign Date</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <input type="date" name="start_date" required class="form-control" value="<?= $query->start_date ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label required fw-bold fs-6 mb-5">Completion Date</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <input type="date" name="end_date" required class="form-control" value="<?= $query->end_date ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
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
$this->load->view('admin/saveMap', $query);
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
                        <input type="text" class="form-control" id="gmap_address2" placeholder="Enter Your Address..." value="<?= $query->billing_address ?>">
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
    function getStaffName(id) {
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Projects/getStaffName') ?>" + "/" + id,
                data: '',
                success: function (result) {
                    //console.log(result);
                    $('#staff_name_id').html(result);
                }
            });
        } else {
            $('#staff_name_id').html('<option value=""  >Select Staff</option>');
        }
    }




    function getClientName(id) {
        if (id != '') {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Projects/getClientName') ?>" + "/" + id,
                data: '',
                success: function (result) {
                    console.log(result);
                    $('#client_name_id').html(result);
                }
            });
        } else {
            $('#client_name_id').html('<option value=""  >Select Client</option>');
        }
    }
</script>