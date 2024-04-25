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
                <!-- END BANNER SECTION-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#section_1" aria-expanded="true" aria-controls="section_4">
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
                             <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Cooperation Partners" class="form-label fs-6 fw-bolder mb-3">Cooperation Partners</label>
                                    <input type="text" name="cooperation_partners" class="form-control form-control-solid" placeholder="Cooperation Heading" value="<?= get_content_value('cooperation_partners') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                             <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="School Partners" class="form-label fs-6 fw-bolder mb-3">School Partners</label>
                                    <input type="text" name="school_partners" class="form-control form-control-solid" placeholder="School Partners" value="<?= get_content_value('school_partners') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7 ">
                                <?php
                                $member_cms_image = get_content_value('member_cms_image');
                                $member_cms_image_show = base_url('assets/uploads/member_images/' . $member_cms_image);
                               
                                //echo $img;
                                ?>								
                                <div class="col-lg-3">
                                    <img class=" img-fluid" src="<?= $member_cms_image_show ?>" alt="Image" style=""> 
                                </div>								
                                <div class="col-lg-6">
                                    <label for="member_cms_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="member_cms_image" name="member_cms_image" placeholder="Image" >
                                    <input type="hidden" class="form-control" id="member_cms_image" name="member_cms_image" value="<?= $member_cms_image ?>" > 
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Benefits Heading" class="form-label fs-6 fw-bolder mb-3">Benefits Heading</label>
                                    <input type="text" name="benefits_heading" class="form-control form-control-solid" placeholder="Benefits Heading" value="<?= get_content_value('benefits_heading') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-1" class="form-label fs-6 fw-bolder mb-3">Heading-1</label>
                                    <input type="text" name="benefits_1" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_1') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-1" class="form-label fs-6 fw-bolder mb-3">Content-1</label>
                                    <textarea name="benefits_content_1" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_content_1') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-2" class="form-label fs-6 fw-bolder mb-3">Heading-2</label>
                                    <input type="text" name="benefits_2" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_2') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-2" class="form-label fs-6 fw-bolder mb-3">Content-2</label>
                                    <textarea name="benefits_content_2" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_content_2') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-3" class="form-label fs-6 fw-bolder mb-3">Heading-3</label>
                                    <input type="text" name="benefits_3" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_3') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-3" class="form-label fs-6 fw-bolder mb-3">Content-3</label>
                                    <textarea name="benefits_content_3" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_content_3') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-4" class="form-label fs-6 fw-bolder mb-3">Heading-4</label>
                                    <input type="text" name="benefits_4" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_4') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-4" class="form-label fs-6 fw-bolder mb-3">Content-3</label>
                                    <textarea name="benefits_content_4" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_4') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                             <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-5" class="form-label fs-6 fw-bolder mb-3">Heading-5</label>
                                    <input type="text" name="benefits_5" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_5') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-5" class="form-label fs-6 fw-bolder mb-3">Content-5</label>
                                    <textarea name="benefits_content_5" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_content_5') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Heading-6" class="form-label fs-6 fw-bolder mb-3">Heading-6</label>
                                    <input type="text" name="benefits_6" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('benefits_6') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Content-6" class="form-label fs-6 fw-bolder mb-3">Content-6</label>
                                    <textarea name="benefits_content_6" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('benefits_content_6') ?></textarea>
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Apply heading" class="form-label fs-6 fw-bolder mb-3">Apply Heading</label>
                                    <input type="text" name="apply_heading" class="form-control form-control-solid" placeholder="Heading" value="<?= get_content_value('apply_heading') ?>">
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2 row mt-7">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="Apply Content" class="form-label fs-6 fw-bolder mb-3">Apply Content</label>
                                    <textarea name="apply_content" class="form-control form-control-solid" rows="5" placeholder="content"><?= get_content_value('apply_content') ?></textarea>
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
