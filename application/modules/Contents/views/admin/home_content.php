<!--begin::Form-->
<form id="" class="form" method="POST" enctype="multipart/form-data">
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
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= base_url() ?>" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark"><?= $header['site_title'] ?></li>
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
                <!--START::ALERT MESSAGE --><?php $this->load->view('templates/admin/alert'); ?><!--END::ALERT MESSAGE -->
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#general_settings_div" aria-expanded="true" aria-controls="general_settings_div">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Purpose</h3>
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
                                    <label for="heading" class="form-label fs-6 fw-bolder mb-3">Purpose Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="purpose_name" name="purpose_name" value="<?= get_content_value('purpose_name') ?>" placeholder="Purpose Name" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $purpose_image = get_content_value('purpose_image');
                                $purpose_image_show = base_url('assets/uploads/home_images/' . $purpose_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $purpose_image_show ?>" alt="Purpose image" style="background: #faf5e3"> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="purpose_image" class="form-label">Purpose Image</label>
                                    <input type="file" class="form-control" id="purpose_image" name="purpose_image" placeholder="Purpose Image" >
                                    <input type="hidden" class="form-control" id="purpose_image" name="purpose_image" value="<?= $purpose_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="purpose_description" class="form-label fs-6 fw-bolder mb-3">Purpose Description</label>
                                    <textarea name="purpose_description" class="form-control form-control-solid editor" rows="5" placeholder="Purpose Description"><?= get_content_value('purpose_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
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
                        <h3 class="fw-bolder m-0">Vision</h3>
                    </div>
                </div>
                <div id="contact_settings_div" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="heading" class="form-label fs-6 fw-bolder mb-3">Vision Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="vision_name" name="vision_name" value="<?= get_content_value('vision_name') ?>" placeholder="Vision Name" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $vision_image = get_content_value('vision_image');
                                $vision_image_show = base_url('assets/uploads/home_images/' . $vision_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $vision_image_show ?>" alt="Vision image" style="background: #faf5e3"> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="vision_image" class="form-label">Vision Image</label>
                                    <input type="file" class="form-control" id="vision_image" name="vision_image" placeholder="Vision Image" >
                                    <input type="hidden" class="form-control" id="vision_image" name="vision_image" value="<?= $vision_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="vision_description" class="form-label fs-6 fw-bolder mb-3">Vision Description</label>
                                    <textarea name="vision_description" class="form-control form-control-solid editor" rows="5" placeholder="Vision Description"><?= get_content_value('vision_description') ?></textarea>
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
                        <h3 class="fw-bolder m-0">Mission</h3>
                    </div>
                </div>
                <div id="other_settings_div" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="heading" class="form-label fs-6 fw-bolder mb-3">Mission Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="mission_name" name="mission_name" value="<?= get_content_value('mission_name') ?>" placeholder="Mission Name" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $mission_image = get_content_value('mission_image');
                                $mission_image_show = base_url('assets/uploads/home_images/' . $mission_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $mission_image_show ?>" alt="Mission image" style="background: #faf5e3"> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="mission_image" class="form-label">Mission Image</label>
                                    <input type="file" class="form-control" id="mission_image" name="mission_image" placeholder="Mission Image" >
                                    <input type="hidden" class="form-control" id="mission_image" name="mission_image" value="<?= $mission_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="mission_description" class="form-label fs-6 fw-bolder mb-3">Mission Description</label>
                                    <textarea name="mission_description" class="form-control form-control-solid editor" rows="5" placeholder="Mission Description"><?= get_content_value('mission_description') ?></textarea>
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
                        <h3 class="fw-bolder m-0">CEO Message</h3>
                    </div>
                </div>
                <div id="login_settings_div" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="heading" class="form-label fs-6 fw-bolder mb-3">Ceo Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="ceo_name" name="ceo_name" value="<?= get_content_value('ceo_name') ?>" placeholder="Ceo Name" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $ceo_image = get_content_value('ceo_image');
                                $ceo_image_show = base_url('assets/uploads/home_images/' . $ceo_image);
                                
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $ceo_image_show ?>" alt="Ceo image" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="ceo_image" class="form-label">Ceo Image</label>
                                    <input type="file" class="form-control" id="ceo_image" name="ceo_image" placeholder="Ceo Image" >
                                    <input type="hidden" class="form-control" id="ceo_image" name="ceo_image" value="<?= $ceo_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="ceo_description" class="form-label fs-6 fw-bolder mb-3">Ceo Description</label>
                                    <textarea name="ceo_description" class="form-control form-control-solid editor" rows="5" placeholder="Ceo Description"><?= get_content_value('ceo_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $ceo_signature = get_content_value('ceo_signature');
                                $ceo_signature_show = base_url('assets/uploads/home_images/' . $ceo_signature);
                                 
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $ceo_signature_show ?>" alt="Ceo Signature" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="ceo_image" class="form-label">Ceo Image</label>
                                    <input type="file" class="form-control" id="ceo_signature" name="ceo_signature" placeholder="Ceo Signature" >
                                    <input type="hidden" class="form-control" id="ceo_signature" name="ceo_signature" value="<?= $ceo_signature ?>" > 
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>		
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#tax_settings_div" aria-expanded="true" aria-controls="tax_settings_div">
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Left & Right Sliding</h3>
                    </div>
                </div>
                <div id="tax_settings_div" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                             <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="left_heading" class="form-label fs-6 fw-bolder mb-3">Left Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="left_heading" name="left_heading" value="<?= get_content_value('left_heading') ?>" placeholder="Left Heading" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="left_description" class="form-label fs-6 fw-bolder mb-3">Left Description</label>
                                    <textarea name="left_description" class="form-control form-control-solid editor" rows="5" placeholder="Left Description"><?= get_content_value('left_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="right_heading" class="form-label fs-6 fw-bolder mb-3">Right Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="left_heading" name="right_heading" value="<?= get_content_value('right_heading') ?>" placeholder="Right Heading" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="right_description" class="form-label fs-6 fw-bolder mb-3">Right Description</label>
                                    <textarea name="right_description" class="form-control form-control-solid editor" rows="5" placeholder="Right Description"><?= get_content_value('right_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
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
$this->load->view('admin/_js', $this->data);
?>
