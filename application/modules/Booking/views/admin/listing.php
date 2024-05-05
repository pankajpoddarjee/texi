<!-- start page container -->
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Drivers</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                          href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Driver/listing')?>">Driver</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Drivers</li>
                    </ol>
                </div>
            </div>
           
            <div class="tab-content tab-space">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="card-head">
                                    <button id="panel-button"
                                            class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                            data-upgraded=",MaterialButton">
                                        <i class="material-icons">more_vert</i>
                                    </button>
                                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                        data-mdl-for="panel-button">
                                        <li class="mdl-menu__item"><i
                                                class="material-icons">assistant_photo</i>Action</li>
                                        <li class="mdl-menu__item"><i class="material-icons">print</i>Another
                                            action</li>
                                        <li class="mdl-menu__item"><i
                                                class="material-icons">favorite</i>Something else here</li>
                                    </ul>
                                </div>
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width"
                                               id="example4">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="center"> Name </th>
                                                    <th class="center"> Mobile </th>
                                                    <th class="center"> Email </th>
                                                    <th class="center"> Address </th>
                                                    <th class="center">License Number</th>
                                                    <th class="center">Status</th>
                                                    <th class="center"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($datas)){
                                                        foreach($datas as $k=> $rows)
                                                        {
                                                                $id = base64_encode($rows->id);
                                                                //$name=$rows->fname .' '. $rows->lname .' '.
                                                                $edit_link = base_url('Driver/add_driver/'.$id);
                                                                //$delete_link = base_url('Banners/remove/'.$id);
                                                                $status_link = base_url('Driver/statusChange/'.$id);
                                                                //$query = $this->Banner_model->getBannerDetails($rows->id);
                                                                $edit['query']=$query;

                                                                if (!empty($rows->profile_image)) {
                                                                        $img = base_url('assets/uploads/user_images/' . $rows->profile_image);
                                                                } else {
                                                                        $img = base_url('assets/admin/media/illustrations/404-hd.png');
                                                                }
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td class="user-circle-img sorting_1">
                                                        <img src="<?=$img?>" alt="" width="50">
                                                    </td>
                                                    <td class="center"><?= ucfirst($rows->fname .' '. $rows->lname)?></td>
                                                    <td class="center"><a href="tel:<?= $rows->mobile_number?>">
                                                            <?= $rows->mobile_number?> </a></td>
                                                    <td class="center"><a href="mailto:<?= $rows->email?>">
                                                            <?= $rows->email?> </a></td>
                                                    <td class="center"> <?= $rows->address?></td>
                                                    <td class="center"><?= $rows->license_number?></td>
                                                    <td>
                                                        <a href="<?=$status_link?>" class="label label-sm box-shadow-1 label-<?=($rows->status=='1')?'success':'danger'?>"><?=($rows->status=='1')?'Active':'Suspend'?></a>
                                                    </td>
                                                    <td class="center">
                                                        <a href="<?=$edit_link?>" class="btn btn-tbl-edit btn-xs">
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

