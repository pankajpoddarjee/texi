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
                        <a href="<?= base_url() ?>" class="text-muted text-hover-primary">About us</a>
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
                <!--Start:: Banner Section-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#general_settings_banner" aria-expanded="true" aria-controls="general_settings_banner">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Banner</h3>
                    </div>
                    <!--end::BANNER SECTION-->

                </div>
                <!--START BANNER SECTION-->
                <div id="general_settings_banner" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            <div class="col-lg-6 mb-2">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="heading" class="form-label fs-6 fw-bolder mb-3">Banner Heading</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="opportunities_heading" name="opportunities_heading" value="<?= get_content_value('opportunities_heading') ?>" placeholder="Banner Heading" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $banner_image = get_content_value('opportunities_banner_image');
                                $banner_image_show = base_url('assets/uploads/opportunities/' . $banner_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $banner_image_show ?>" alt="Banner image" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="banner_image" class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="opportunities_banner_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="banner_image" name="opportunities_banner_image" value="<?= $banner_image ?>" > 
                                </div>
                            </div>
                            
                            
                        </div>	
                    </div>
                    <!--end::Card body-->
                </div>
                </div>
             <div class="card mb-5 mb-xl-10">
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_1" aria-expanded="true" aria-controls="section_1">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Section-1</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="section_1" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            
                            <div class="col-lg-12">
                                <?php
                                $section_1_image = get_content_value('featured_image');
                                $section_1_image_show = base_url('assets/uploads/opportunities/' . $section_1_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $section_1_image_show ?>" alt="image" style=""> 
                                </div>								
                                <div class="col-lg-6">
                                    <label for="Image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="featured_image" name="featured_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="featured_image" name="featured_image" value="<?= $section_1_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="description_one" class="form-label fs-6 fw-bolder mb-3">Description One</label>
                                    <textarea name="opportunities_description" class="form-control form-control-solid editor" rows="5" placeholder="Description One"><?= get_content_value('opportunities_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            
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


<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
$this->load->view('admin/_js', $this->data);
?>
