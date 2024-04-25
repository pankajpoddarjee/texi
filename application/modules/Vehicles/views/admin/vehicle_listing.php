<!-- start page container -->
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Vehicle</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                          href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Vehicles/vehicle_listing/')?>">Vehicle Listing</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Vehicle</li>
                    </ol>
                </div>
            </div>
           
            <div class="tab-content tab-space">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                            <div class="card-head">
                                <a href="<?= base_url('Vehicles/add_vehicle') ?>" class="btn btn-circle btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Vehicle </a>

                            </div>
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width"
                                               id="example4">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="center"> Registration Number </th>
                                                    <th class="center"> Make </th>
                                                    <th class="center"> Model </th>
                                                    <th class="center"> Year </th>
                                                    <th class="center">Vehicle Type</th>
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
                                                                $edit_link = base_url('Vehicles/add_vehicle/'.$id);
                                                                //$delete_link = base_url('Banners/remove/'.$id);
                                                                $status_link = base_url('Vehicles/VehiclesStatusChange/'.$id);
                                                                //$query = $this->Banner_model->getBannerDetails($rows->id);
                                                                $edit['query']=$query;
                                                                $car_image=explode(",",$rows->car_image);
                                                                if (!empty($rows->car_image)) {
                                                                       $img_get = base_url('assets/uploads/car_images/' . $car_image[0]);
                                                                        //print_r($img);
                                                                } else {
                                                                        $img_get = base_url('assets/admin/media/illustrations/404-hd.png');
                                                                }
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td class="user-circle-img sorting_1">
                                                        <img src="<?=$img_get?>" alt="" width="50">
                                                    </td>
                                                    <td class="center"><?= $rows->registration_number?></td>
                                                    <td class="center"><?= $rows->make?></td>
                                                    <td class="center"><?= $rows->model?></td>
                                                    <td class="center"> <?= $rows->year?></td>
                                                    <td class="center"><?= ucfirst($rows->vehicle_type)?></td>
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

