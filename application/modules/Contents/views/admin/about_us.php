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
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="banner_heading" name="banner_heading" value="<?= get_content_value('banner_heading') ?>" placeholder="Banner Heading" required>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-7 ">
                                <?php
                                $banner_image = get_content_value('banner_image');
                                $banner_image_show = base_url('assets/uploads/about_us/' . $banner_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $banner_image_show ?>" alt="Banner image" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="banner_image" class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="Purpose Image" >
                                    <input type="hidden" class="form-control" id="banner_image" name="banner_image" value="<?= $banner_image ?>" > 
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
                                $section_1_image = get_content_value('section_1_image');
                                $section_1_image_show = base_url('assets/uploads/about_us/' . $section_1_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $section_1_image_show ?>" alt="Purpose image" style=""> 
                                </div>								
                                <div class="col-lg-6">
                                    <label for="section_1_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="section_1_image" name="section_1_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="section_1_image" name="section_1_image" value="<?= $section_1_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="description_one" class="form-label fs-6 fw-bolder mb-3">Description One</label>
                                    <textarea name="description_one" class="form-control form-control-solid editor" rows="5" placeholder="Description One"><?= get_content_value('description_one') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="description_two" class="form-label fs-6 fw-bolder mb-3">Description Two</label>
                                    <textarea name="description_two" class="form-control form-control-solid editor" rows="5" placeholder="Description Two"><?= get_content_value('description_two') ?></textarea>
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
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_2" aria-expanded="true" aria-controls="section_2">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Section-2</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="section_2" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            
                            <div class="col-lg-12">
                                <?php
                                $about_ceo_image = get_content_value('about_ceo_image');
                                $about_ceo_image_show = base_url('assets/uploads/about_us/' . $about_ceo_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $about_ceo_image_show ?>" alt="CEO image" style=""> 
                                </div>								
                                <div class="col-lg-6">
                                    <label for="ceo_image" class="form-label">CEO Image</label>
                                    <input type="file" class="form-control" id="ceo_image" name="about_ceo_image" placeholder="CEO Image" >
                                    <input type="hidden" class="form-control" id="ceo_image" name="about_ceo_image" value="<?= $about_ceo_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="about_ceo_description" class="form-label fs-6 fw-bolder mb-3">CEO Description</label>
                                    <textarea name="about_ceo_description" class="form-control form-control-solid editor" rows="5" placeholder="CEO Description"><?= get_content_value('about_ceo_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            
                        </div>	
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->			
            </div>
            <div class="card mb-5 mb-xl-10">
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_3" aria-expanded="true" aria-controls="section_3">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Section-3</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="section_3" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="why_choose_description" class="form-label fs-6 fw-bolder mb-3">Why Choose Description</label>
                                    <textarea name="why_choose_description" class="form-control form-control-solid editor" rows="5" placeholder="Why Choose Description"><?= get_content_value('why_choose_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            
                        </div>	
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->			
            </div>
            <div class="card mb-5 mb-xl-10">
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_4" aria-expanded="true" aria-controls="section_4">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Section-4</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="section_4" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Our Values" class="form-label fs-6 fw-bolder mb-3">Our Values</label>
                                    <input type="text" name="our_values" class="form-control form-control-solid" placeholder="Our Values" value="<?= get_content_value('our_values') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-1" class="form-label fs-6 fw-bolder mb-3">Heading-1</label>
                                    <input type="text" name="heading_1" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('heading_1') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-1" class="form-label fs-6 fw-bolder mb-3">Content-1</label>
                                    <textarea name="content_1" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('content_1') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-2" class="form-label fs-6 fw-bolder mb-3">Heading-2</label>
                                    <input type="text" name="heading_2" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('heading_2') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-2" class="form-label fs-6 fw-bolder mb-3">Content-2</label>
                                    <textarea name="content_2" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('content_2') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-3" class="form-label fs-6 fw-bolder mb-3">Heading-3</label>
                                    <input type="text" name="heading_3" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('heading_3') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-3" class="form-label fs-6 fw-bolder mb-3">Content-3</label>
                                    <textarea name="content_3" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('content_3') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-4" class="form-label fs-6 fw-bolder mb-3">Heading-4</label>
                                    <input type="text" name="heading_4" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('heading_4') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-4" class="form-label fs-6 fw-bolder mb-3">Content-3</label>
                                    <textarea name="content_4" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('content_4') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="our_value_description" class="form-label fs-6 fw-bolder mb-3">Description</label>
                                    <textarea name="our_value_description" class="form-control form-control-solid editor" rows="5" placeholder="Description"><?= get_content_value('our_value_description') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                        </div>	
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->			
            </div>
            <div class="card mb-5 mb-xl-10">
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_5" aria-expanded="true" aria-controls="section_5">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Section-5</h3>
                    </div>
                    <!--end::Card title-->

                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="section_5" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-1">
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="team_heading" class="form-label fs-6 fw-bolder mb-3">Team Heading</label>
                                    <input type="text" name="team_heading" class="form-control form-control-solid" placeholder="Team Heading" value="<?= get_content_value('team_heading') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7 ">
                                <?php
                                $team_1_image = get_content_value('team_1_image');
                                $team_1_image_show = base_url('assets/uploads/about_us/' . $team_1_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $team_1_image_show ?>" alt="Team image" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="team_1_image" class="form-label">Team Image</label>
                                    <input type="file" class="form-control" id="team_1_image" name="team_1_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="team_1_image" name="team_1_image" value="<?= $team_1_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Team_1_Name" class="form-label fs-6 fw-bolder mb-3">Name</label>
                                    <input type="text" name="team_1_name" class="form-control form-control-solid" placeholder="Team Name" value="<?= get_content_value('team_1_name') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Team_1_Content" class="form-label fs-6 fw-bolder mb-3">Content</label>
                                    
                                    <textarea name="team_1_content" class="form-control form-control-solid editor" rows="5" placeholder="Content"><?= get_content_value('team_1_content') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mt-7 ">
                                <?php
                                $team_2_image = get_content_value('team_2_image');
                                $team_2_image_show = base_url('assets/uploads/about_us/' . $team_2_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $team_2_image_show ?>" alt="Team image" style=""> 
                                </div>								
                                <div class="col-lg-9">
                                    <label for="team_1_image" class="form-label">Team Image</label>
                                    <input type="file" class="form-control" id="team_2_image" name="team_2_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="team_2_image" name="team_2_image" value="<?= $team_2_image ?>" > 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Team_2_Name" class="form-label fs-6 fw-bolder mb-3">Name</label>
                                    <input type="text" name="team_2_name" class="form-control form-control-solid" placeholder="Team Name" value="<?= get_content_value('team_2_name') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Team_2_Content" class="form-label fs-6 fw-bolder mb-3">Content</label>
                                    
                                    <textarea name="team_2_content" class="form-control form-control-solid editor" rows="5" placeholder="Content"><?= get_content_value('team_2_content') ?></textarea>
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
