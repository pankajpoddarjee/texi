<!-- start page container -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Vehicles Type</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?= base_url() ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?= base_url('Vehicles/type_listing') ?>">Vehicles Type</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Vehicles Type</li>
                </ol>
            </div>
        </div>

        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="tab1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-head">
                                <a href="<?= base_url('Vehicles/Add_type') ?>" class="btn btn-circle btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Type </a>

                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table class="table table-hover table-checkable order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="center"> Vehicle Type </th>
                                                <th class="center">Status</th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($datas)) {
                                                foreach ($datas as $k => $rows) {
                                                    $id = base64_encode($rows->id);
                                                    //$name=$rows->fname .' '. $rows->lname .' '.
                                                    $edit_link = base_url('Vehicles/Add_type/' . $id);
                                                    //$delete_link = base_url('Banners/remove/'.$id);
                                                    $status_link = base_url('Vehicles/TypeStatusChange/' . $id);
                                                    //$query = $this->Banner_model->getBannerDetails($rows->id);
                                                    $edit['query'] = $query;

                                                    if (!empty($rows->type_image)) {
                                                        $img = base_url('assets/uploads/car_images/' . $rows->type_image);
                                                    } else {
                                                        $img = base_url('assets/admin/media/illustrations/404-hd.png');
                                                    }
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td class="user-circle-img sorting_1">
                                                            <img src="<?= $img ?>" alt="" width="50">
                                                        </td>
                                                        <td class="center"><?=$rows->type_name?></td>

                                                        <td class="center">
                                                            <a href="<?= $status_link ?>" class="label label-sm box-shadow-1 label-<?= ($rows->status == '1') ? 'success' : 'danger' ?>"><?= ($rows->status == '1') ? 'Active' : 'Suspend' ?></a>
                                                        </td>
                                                        <td class="center">
                                                            <a href="<?= $edit_link ?>" class="btn btn-tbl-edit btn-xs">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a class="btn btn-tbl-delete btn-xs">
                                                                <i class="fa fa-trash-o "></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end page content -->





<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
//$this->load->view('admin/_js', $this->data);
