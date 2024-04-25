<!--begin::Form-->
<form class="form" method="POST" enctype="multipart/form-data" id="calc_form_<?= $query->id ?>">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend"
                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-left me-3 flex-wrap mb-5 mb-lg-0 lh-1">
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
                        <a href="<?= base_url('Users/listingCityAdmin') ?>" class="text-muted text-hover-primary">City
                            Admin List</a>
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
                    <a href="<?= base_url('Users/listingCityAdmin') ?>"
                        class="btn btn-white btn-active-light-danger me-2">Back</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        Changes</button>
                </div>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

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

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--START::ALERT MESSAGE --><?php $this->load->view('templates/admin/alert'); ?>
                <!--END::ALERT MESSAGE -->
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer  bg-info" role="button" data-bs-toggle="collapse"
                    data-bs-target="#customer_div" aria-expanded="true" aria-controls="customer_div">
                    <!--begin::Card title-->
                    <div class="card-title m-0 text-white">
                        <h3 class="fw-bolder m-0">City Admin Details</h3>
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
                            <div class="col-md-2">
                                <!--begin::Catigories-->
                                <div class="mb-15">
                                    <h4 class="text-black mb-7">Avatar</h4>
                                    <!--begin::Menu-->
                                    <div class="row mb-6">
                                        <!--begin::Col-->
                                        <div class="col-md-8">
                                            <?php
                                            $image = $query->profile_image;
                                            if (!empty($image)) {
                                                $img = base_url('assets/uploads/user_images/' . $image);
                                            } else {
                                                $img = base_url('assets/admin/media/avatars/blank.png');
                                            }
                                            ?>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url(<?= base_url('assets/admin/media/avatars/blank.png') ?>)">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url(<?= $img ?>)"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Edit-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                    data-kt-image-input-action="change1" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove">
                                                    <input type="hidden" value="<?= $query->profile_image ?>"
                                                        name="profile_image">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Edit-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow d-none"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="" data-bs-original-title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center mt-3">
                                                <label class="form-check form-check-inline form-check-solid ">
                                                    <input class="form-check-input" name="status" value="1" type="radio"
                                                        <?= $query->status == '1' ? 'checked' : '' ?>>
                                                    <span class="fw-bold fs-8">Active</span>
                                                </label>
                                                <label class="form-check form-check-inline form-check-solid ">
                                                    <input class="form-check-input" type="radio" name="status" value="0"
                                                        <?= $query->status == '0' ? 'checked' : '' ?>>
                                                    <span class="fw-bold fs-8">Inactive</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>

                                </div>
                                <!--end::Catigories-->

                            </div>
                            <!--end::Sidebar-->
                            <!--begin::Content-->
                            <div class="col-lg-10 col-md-12">
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label required fw-bold fs-6">Login ID</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control  " id="login_id" name="login_id"
                                            value="<?= !empty($query->user_login_id) ? $query->user_login_id : generateUserLoginId('CA') ?>"
                                            placeholder="Login ID" readonly>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control  " id="password" name="password"
                                            value="" placeholder="Password">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label fw-bold fs-6">Register Date & Time</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control  " id="addedOn" name="addedOn"
                                            value="<?= !empty($query->addedOn) ? $query->addedOn : date('Y-m-d H:i:s') ?>"
                                            placeholder="Registration Date & Time" readonly>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end">Unregister
                                        Date & Time</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control  " id="unregisteredOn"
                                            name="unregisteredOn"
                                            value="<?= !empty($query->unregisteredOn) ? $query->unregisteredOn : '' ?>"
                                            placeholder="Unregister Date & Time" readonly>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label required fw-bold fs-6">City Admin Name</label>
                                    <div class="col-md-4">
                                        <input type="text" name="full_name" class="form-control   mb-3 mb-lg-0"
                                            placeholder="Full name" value="<?= $query->full_name ?>" required>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label required fw-bold fs-6 text-lg-end text-md-end">Code</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control  " id="code" name="code"
                                            value="<?= $query->code ?>" placeholder="Code">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label required fw-bold fs-6">Email</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <input type="email" name="email" class="form-control  "
                                                    placeholder="Email" value="<?= $query->email ?>" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label  fw-bold fs-6">Address</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <div
                                                    class="notice d-flex bg-light-success rounded border-success border border-dashed mb-3 p-6">
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <div class="fw-bold">
                                                            <h4 class="text-gray-900 fw-bolder">Mark The Location On The
                                                                Map</h4>
                                                        </div>
                                                        <div class="fw-bold">
                                                            <a href="javascript:void(0)" class="btn btn-success"
                                                                data-bs-toggle="modal" data-bs-target="#kt_modal_map">
                                                                <i class="fas fa-map-marker-alt"></i> Open Map
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <textarea name="address" class="form-control  editor" rows="5"
                                                    placeholder="address" id="address"><?= $query->address ?></textarea>
                                                <input type="hidden" name="lat" id="lat" value="<?= $query->lat ?>">
                                                <input type="hidden" name="lng" id="lng" value="<?= $query->lng ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label  fw-bold fs-6 mb-5">Province</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <select name="state_id" id="state_id" aria-label="Select a state"
                                                    data-placeholder="Select a state.." class="form-select  "
                                                    onchange="getCityList(this.value)">
                                                    <?= state_list_dropdown($query->state_id, !empty($query->country_id) ? $query->country_id : '102'); ?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label  fw-bold fs-6 mb-5 text-lg-end text-md-end">City</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <select name="city_id" id="city_id" aria-label="Select a city"
                                                    data-placeholder="Select a city.." class="form-select  "
                                                    onchange="$('#state_id').val($(this).find('option:selected').data('state_id'))">
                                                    <?= city_list_dropdown($query->city_id, $query->state_id, !empty($query->country_id) ? $query->country_id : '102'); ?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label  fw-bold fs-6 mb-5">Postal Code</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <input type="text" name="pincode" class="form-control  "
                                                    placeholder="Postal Code" value="<?= $query->pincode ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label  fw-bold fs-6 mb-5 text-lg-end text-md-end">Country</label>
                                    <div class="col-md-4 mb-5">
                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <select name="country_id" aria-label="Select a Country"
                                                    data-placeholder="Select a Country.." class="form-select  "
                                                    onchange="getStateList(this.value)">
                                                    <?= country_list_dropdown(!empty($query->country_id) ? $query->country_id : '102'); ?>
                                                </select>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label  fw-bold fs-6">Phone Number 1</label>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_code" class="form-control p-3"
                                                    placeholder="ph code"
                                                    value="<?= !empty($query->phone_code) ? $query->phone_code : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-10 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_no" class="form-control  number"
                                                    placeholder="phone no" value="<?= $query->phone_no ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Ext</label>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="ext" class="form-control  " placeholder="Ext"
                                                    value="<?= $query->ext ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label  fw-bold fs-6">Phone Number 2</label>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_code2" class="form-control p-3 "
                                                    placeholder="ph code"
                                                    value="<?= !empty($query->phone_code2) ? $query->phone_code2 : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-10 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_no2" class="form-control  number"
                                                    placeholder="phone no" value="<?= $query->phone_no2 ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Ext</label>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="ext2" class="form-control  " placeholder="Ext"
                                                    value="<?= $query->ext2 ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label  fw-bold fs-6">Phone Number 3</label>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-2 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_code3" class="form-control p-3"
                                                    placeholder="ph code"
                                                    value="<?= !empty($query->phone_code3) ? $query->phone_code3 : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-10 fv-row fv-plugins-icon-container">
                                                <input type="text" name="phone_no3" class="form-control  number"
                                                    placeholder="phone no" value="<?= $query->phone_no3 ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label
                                        class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Ext</label>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="ext3" class="form-control  " placeholder="Ext"
                                                    value="<?= $query->ext3 ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label required fw-bold fs-6">Mobile Number</label>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                <input type="text" name="mobile_code" class="form-control p-3"
                                                    placeholder="mobile code"
                                                    value="<?= !empty($query->mobile_code) ? $query->mobile_code : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                <input type="text" name="mobile_no" class="form-control  number"
                                                    placeholder="Mobile No" value="<?= $query->mobile_no ?>" required>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end">Whatsapp
                                        Number</label>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                <input type="text" name="whatsapp_phone_code" class="form-control p-3"
                                                    placeholder="country code"
                                                    value="<?= !empty($query->whatsapp_phone_code) ? $query->whatsapp_phone_code : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                <input type="text" name="whatsapp_phone_no" class="form-control  number"
                                                    placeholder="Whatsapp No" value="<?= $query->whatsapp_phone_no ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label fw-bold fs-6">Wechat Number</label>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                <input type="text" name="wechat_phone_code" class="form-control p-3"
                                                    placeholder="country code"
                                                    value="<?= !empty($query->wechat_phone_code) ? $query->wechat_phone_code : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                <input type="text" name="wechat_phone_no" class="form-control  number"
                                                    placeholder="wechat No" value="<?= $query->wechat_phone_no ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-2 col-form-label fw-bold fs-6 text-lg-end text-md-end">QQ
                                        Number</label>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                <input type="text" name="qq_phone_code" class="form-control p-3"
                                                    placeholder="country code"
                                                    value="<?= !empty($query->qq_phone_code) ? $query->qq_phone_code : '+62' ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                            <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                <input type="text" name="qq_phone_no" class="form-control  number"
                                                    placeholder="qq No" value="<?= $query->qq_phone_no ?>">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <label class="col-md-2 col-form-label fw-bold fs-6">Open Day <br><br> Open
                                        Time</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <?php
                                            $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                                            foreach ($days as $day => $day_name) {
                                                $getSchedules = $this->User_model->getUserScheduleData($day, $query->user_id);
                                                $time_from = !empty($getSchedules) ? $getSchedules->time_from : '';
                                                $time_to = !empty($getSchedules) ? $getSchedules->time_to : '';
                                                $type = (!empty($getSchedules) && ($getSchedules->type == 'Open')) ? 'flex' : 'none';
                                            ?>

                                            <div class="col-md-6 col-form-label fw-bold fs-6 text-center">
                                                <label class="col-form-label fw-bold fs-6 text-center">
                                                    <?= $day_name ?>
                                                    <input name="schedule_day[]" type="hidden" value="<?= $day ?>">
                                                    <input name="schedule_day_name[]" type="hidden"
                                                        value="<?= $day_name ?>">
                                                </label>
                                                <label
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid text-center d-block">
                                                    <input class="form-check-input" name="schedule_type[]"
                                                        type="checkbox" value="Open"
                                                        onchange="$('#open_time_<?= $day ?>').toggle();"
                                                        <?= $type == 'flex' ? 'checked' : '' ?>>
                                                </label>
                                                <div class="row" id="open_time_<?= $day ?>"
                                                    style="display:<?= $type ?>;">
                                                    <div class="col-6">
                                                        <input class="form-control  " name="schedule_time_from[]"
                                                            type="time" value="<?= $time_from ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control  " name="schedule_time_to[]"
                                                            type="time" value="<?= $time_to ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>


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
            <!--begin::Basic info-->
            <div id="div_repeter">
                <?php
                if (!empty($employeeList)) {
                    $knt = 1;
                    foreach ($employeeList as $k => $emp) {

                        $customerList = $this->User_model->customerList($emp->user_id);

                ?>
                <div class="card mb-5 mb-xl-10 div_repeat" id="div_repeat_<?= $k + 1 ?>">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer  bg-info" role="button" data-bs-toggle="collapse"
                        data-bs-target="#emp_div<?= $k ?>" aria-expanded="true" aria-controls="emp_div<?= $k ?>">
                        <!--begin::Card title-->
                        <div class="card-title m-0 text-white">
                            <h3 class="fw-bolder m-0">Employee Details</h3>
                        </div>
                        <!--end::Card title-->

                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="emp_div<?= $k ?>" class="collapse show">
                        <input type="hidden" class="form-control" name="user_ids[]" value="<?= $emp->user_id ?>">
                        <input type="hidden" class="form-control" name="user_profile_ids[]"
                            value="<?= $emp->user_profile_id ?>">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="d-flex flex-column flex-lg-row">
                                <!--begin::Sidebar-->
                                <div class="col-md-2">
                                    <!--begin::Catigories-->
                                    <div class="mb-15">
                                        <h4 class="text-black mb-7">Avatar</h4>
                                        <!--begin::Menu-->
                                        <div class="row mb-6">
                                            <!--begin::Col-->
                                            <div class="col-md-8">
                                                <?php
                                                        $image = $emp->profile_image;
                                                        if (!empty($image)) {
                                                            $img = base_url('assets/uploads/user_images/' . $image);
                                                        } else {
                                                            $img = base_url('assets/admin/media/avatars/blank.png');
                                                        }
                                                        ?>
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url(<?= base_url('assets/admin/media/avatars/blank.png') ?>)">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(<?= $img ?>)"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Edit-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="profile_avatars[]"
                                                            class="profile_avatars" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove">
                                                        <input type="hidden" value="<?= $emp->profile_image ?>"
                                                            name="profile_images[]">
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow d-none"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>

                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center mt-3">
                                                        <label
                                                            class="form-check form-check-inline form-check-solid me-5 is-valid">
                                                            <input class="form-check-input" name="emp_status[<?= $k ?>]"
                                                                value="1" type="radio"
                                                                <?= $emp->status == '1' ? 'checked' : '' ?>>
                                                            <span class="fw-bold ps-2 fs-6">Active</span>
                                                        </label>
                                                        <label
                                                            class="form-check form-check-inline form-check-solid is-invalid">
                                                            <input class="form-check-input" type="radio"
                                                                name="emp_status[<?= $k ?>]" value="0"
                                                                <?= $emp->status == '0' ? 'checked' : '' ?>>
                                                            <span class="fw-bold ps-2 fs-6">Inactive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Catigories-->

                                </div>
                                <!--end::Sidebar-->
                                <!--begin::Content-->
                                <div class="col-lg-10 col-md-12">

                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6"> Name</label>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                    <select name="abbreviations[]" class="form-select " tabindex="-1"
                                                        aria-hidden="true">
                                                        <option value="Mr."
                                                            <?= $emp->abbreviation == 'Mr.' ? 'selected' : '' ?>>Mr.
                                                        </option>
                                                        <option value="Ms."
                                                            <?= $emp->abbreviation == 'Ms.' ? 'selected' : '' ?>>Ms.
                                                        </option>
                                                        <option value="Mrs."
                                                            <?= $emp->abbreviation == 'Mrs.' ? 'selected' : '' ?>>Mrs.
                                                        </option>
                                                        <option value="Miss"
                                                            <?= $emp->abbreviation == 'Miss' ? 'selected' : '' ?>>Miss
                                                        </option>
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="fullnames[]"
                                                        class="form-control   mb-3 mb-lg-0" placeholder="Full name"
                                                        value="<?= $emp->full_name ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Position</label>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <select name="role_ids[]" class="form-select  position"
                                                        tabindex="-1" aria-hidden="true"
                                                        id="position_select_<?= $k + 1 ?>"
                                                        onchange="showdiv('<?= $k + 1 ?>')">
                                                        
                                                        <?php
                                                        if ($k == '0') {
                                                        ?>
                                                        <option value="5" <?= $emp->role_ids == '5' ? 'selected' : '' ?>>Manager </option>
                                                        <?php
                                                        } else if ($k == '1') {
                                                        ?>
                                                        <option value="6" <?= $emp->role_ids == '6' ? 'selected' : '' ?>>Vice Manager </option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                        <option value="7" <?= $emp->role_ids == '7' ? 'selected' : '' ?>>Employee </option>
                                                        <option value="13" <?= $emp->role_ids == '13' ? 'selected' : '' ?>>Sales Person </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Email</label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="email" name="emails[]" class="form-control   email"
                                                        placeholder="Email" value="<?= $emp->email ?>" readonly>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Password</label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="password" name="passwords[]" class="form-control  "
                                                        placeholder="Password" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Mobile Number</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="text" name="mobile_nos[]" class="form-control  number"
                                                        placeholder="Mobile No" value="<?= $emp->mobile_no ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Phone Number </label>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="phone_codes[]" class="form-control  "
                                                        placeholder="ph code"
                                                        value="<?= !empty($emp->phone_code) ? $emp->phone_code : '+62' ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="phone_nos[]" class="form-control  number"
                                                        placeholder="phone no" value="<?= $emp->phone_no ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Ext</label>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="exts[]" class="form-control  "
                                                        placeholder="Ext" value="<?= $emp->ext ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-6 ">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">IP Address</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="text" name="ip_address[]" class="form-control  "
                                                        placeholder="IP Address" value="<?= $emp->ip_address ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-6 saleid <?= $emp->role_ids == '13' ? '' : 'd-none' ?>"
                                        id="sale_id_<?= $k + 1 ?>">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">ID</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="text" name="sales_uniqe_id[]" class="form-control  "
                                                        placeholder="sales uniqe id"
                                                        value="<?= $emp->sales_uniqe_id ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!---------------------------- Table Start--------------------------->
                                    <?php if ($emp->role_ids == 13) { ?>

                                    <div class="card-body pt-0 text-end">
                                        <div class="">
                                            <a href="<?= base_url('Users/save') ?>" class="btn btn-primary">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1">
                                                        </rect>
                                                        <rect fill="#000000" opacity="0.5"
                                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                                            x="4" y="11" width="16" height="2" rx="1"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Personal
                                            </a>
                                            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                            <a href="<?= base_url('Users/saveCompany') ?>" class="btn btn-primary">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1">
                                                        </rect>
                                                        <rect fill="#000000" opacity="0.5"
                                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
                                                            x="4" y="11" width="16" height="2" rx="1"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Company
                                            </a>
                                        </div>
                                    </div>

                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_listing_table"
                                        width="100%">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3 d-none">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_listing_table .form-check-input"
                                                            value="" />
                                                    </div>
                                                    #
                                                </th>

                                                <th class="min-w-100px">Type</th>
                                                <th class="min-w-100px">Name</th>
                                                <th class="">Address</th>
                                                <th class="">City</th>

                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">
                                            <?php
                                                        //print_r($customerList);
                                                        if (!empty($customerList)) {
                                                            foreach ($customerList as $k => $rows) {
                                                                $id = base64_encode($rows->user_id);
                                                                $edit_link = base_url('Users/saveCompany/' . $id);
                                                        ?>
                                            <tr id="tr_<?= $rows->user_id ?>">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid d-none">
                                                        <input class="form-check-input removeData" type="checkbox"
                                                            value="<?= $rows->user_id ?>" />
                                                    </div>
                                                    <?= $k + 1 ?>
                                                </td>
                                                <td>
                                                    <a href="<?= $edit_link ?>" class="badge badge-light-success">
                                                        <?php if ($rows->user_role_name == 'Individual Customer') {
                                                                                echo 'Personal';
                                                                            } else { ?>
                                                        <?= $rows->user_role_name; ?> <?php } ?></a>
                                                </td>
                                                <td>
                                                    <?= $rows->full_name ?>
                                                </td>
                                                <td><?= $rows->address ?><?= $rows->company_address1 ?></td>
                                                <td><?= $rows->city ?> <?= $rows->c_city ?></td>


                                            </tr>

                                            <?php
                                                            }
                                                        }
                                                        ?>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <?php } ?>
                                    <!--------------------------- End Table Start------------------------>

                                </div>
                                <!--end::Content-->
                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <?php
                    }
                    $knt++;
                } else {

                    ?>
                <div class="card mb-5 mb-xl-10 div_repeat" id="div_repeat_1">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer  bg-info" role="button" data-bs-toggle="collapse"
                        data-bs-target="#emp_div0" aria-expanded="true" aria-controls="emp_div0">
                        <!--begin::Card title-->
                        <div class="card-title m-0 text-white">
                            <h3 class="fw-bolder m-0">Employee Details</h3>
                        </div>
                        <div class="card-title m-0 text-white text-lg-end text-md-end">
                            <button type="button"
                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm d-none remove"
                                onclick="">
                                <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                            <path
                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </div>
                        <!--end::Card title-->

                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="emp_div0" class="collapse show">
                        <input type="hidden" class="form-control" name="user_ids[]" value="">
                        <input type="hidden" class="form-control" name="user_profile_ids[]" value="">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="d-flex flex-column flex-lg-row">
                                <!--begin::Sidebar-->
                                <div class="col-md-2">
                                    <!--begin::Catigories-->
                                    <div class="mb-15">
                                        <h4 class="text-black mb-7">Avatar</h4>
                                        <!--begin::Menu-->
                                        <div class="row mb-6">
                                            <!--begin::Col-->
                                            <div class="col-md-8">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline"
                                                    style="background-image: url(<?= base_url('assets/admin/media/avatars/blank.png') ?>)">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url(<?= base_url('assets/admin/media/avatars/blank.png') ?>)">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Edit-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Change avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="profile_avatars[]"
                                                            class="profile_avatars" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove">
                                                        <input type="hidden" value="" name="profile_images[]">
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Cancel avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow d-none"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="" data-bs-original-title="Remove avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Col-->
                                        </div>

                                        <div class="row">
                                            <div class="fv-row fv-plugins-icon-container">
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center mt-3">
                                                        <label
                                                            class="form-check form-check-inline form-check-solid me-5 is-valid">
                                                            <input class="form-check-input" name="emp_status[0]"
                                                                value="1" type="radio">
                                                            <span class="fw-bold ps-2 fs-6">Active</span>
                                                        </label>
                                                        <label
                                                            class="form-check form-check-inline form-check-solid is-invalid">
                                                            <input class="form-check-input" type="radio"
                                                                name="emp_status[0]" value="0">
                                                            <span class="fw-bold ps-2 fs-6">Inactive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Catigories-->

                                </div>
                                <!--end::Sidebar-->
                                <!--begin::Content-->
                                <div class="col-lg-10 col-md-12">

                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6"> Name</label>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                    <select name="abbreviations[]" class="form-select " tabindex="-1"
                                                        aria-hidden="true">
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                        <option value="Miss">Miss</option>
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="fullnames[]"
                                                        class="form-control   mb-3 mb-lg-0" placeholder="Full name"
                                                        value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Position</label>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <select name="role_ids[]" class="form-select  position"
                                                        tabindex="-1" aria-hidden="true">
                                                        <!--<option value="12">Owner</option>-->
                                                        <option value="5">Manager</option>
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Email</label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="email" name="emails[]" class="form-control   email"
                                                        placeholder="Email" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Password</label>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="password" name="passwords[]" class="form-control  "
                                                        placeholder="Password" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Mobile Number</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="text" name="mobile_nos[]" class="form-control  number"
                                                        placeholder="Mobile No" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">Phone Number </label>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="phone_codes[]" class="form-control  "
                                                        placeholder="ph code" value="+62">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-9 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="phone_nos[]" class="form-control  number"
                                                        placeholder="phone no" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <label
                                            class="col-md-2 col-form-label  fw-bold fs-6 text-lg-end text-md-end">Ext</label>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-12 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="exts[]" class="form-control  "
                                                        placeholder="Ext" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-6 ">
                                        <label class="col-md-2 col-form-label  fw-bold fs-6">IP Address</label>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="fv-row fv-plugins-icon-container">
                                                    <input type="text" name="ip_address[]" class="form-control  "
                                                        placeholder="IP Address" value="">
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

                <?php
                }
                ?>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <a href="javascript:;" class="col-12 btn btn-sm font-weight-bolder btn-light-warning"
                        onclick="return emp_clone(event)">
                        <i class="la la-plus"></i>Add Employee
                    </a>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClxHQfq36gVF6f6udbVnPCXn6q7sU6iFQ&callback=initMap&libraries=&v=weekly"
    async></script>
    
<?php
$this->load->view('admin/_js', $this->data);
$this->load->view('admin/_map_js', $query);
?>
<script>
function getStateList(id) {
    if (id != '') {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Users/getStateList') ?>" + "/" + id,
            data: '',
            success: function(result) {
                //console.log(result);
                $('#state_id').html(result);
            }
        });
    }
    $.ajax({
        type: 'POST',
        url: "<?= base_url('Users/getCityList') ?>" + "/0/" + id,
        data: '',
        success: function(result) {
            //console.log(result);
            $('#city_id').html(result);
        }
    });
}

function getCityList(id) {
    if (id != '') {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Users/getCityList') ?>" + "/" + id,
            data: '',
            success: function(result) {
                //console.log(result);
                $('#city_id').html(result);
            }
        });
    }
}
</script>