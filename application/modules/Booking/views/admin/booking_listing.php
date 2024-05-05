<!-- start page container -->
<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Booking</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                          href="<?=base_url()?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="<?=base_url('Vehicles/vehicle_listing/')?>">Booking Listing</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Booking</li>
                    </ol>
                </div>
            </div>
           
            <div class="tab-content tab-space">
                <div class="tab-pane active show" id="tab1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                            <!-- <div class="card-head">
                                <a href="<?= base_url('Vehicles/add_vehicle') ?>" class="btn btn-circle btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Vehicle </a>

                            </div> -->
                                <div class="card-body ">
                                    <div class="table-scrollable">
                                        <table class="table table-hover table-checkable order-column full-width"
                                               id="example4">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="center"> SL. No. </th>
                                                    <th class="center"> Trip Type </th>
                                                    <th class="center"> Order Type </th>
                                                    <th class="center"> Pickup Date Time </th>
                                                    <th class="center">Pickup Address</th>
                                                    <th class="center">Dropup Address</th>
                                                    <th class="center">No. Of Passenger </th>
                                                    <th class="center">Vehicle Detail </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sno= 1;
                                                if(!empty($datas)){
                                                        foreach($datas as $k=> $rows)
                                                        {       
                                                               if($rows->trip_type==1){
                                                                $trip_type="Hourly";
                                                               }elseif($rows->trip_type==2){
                                                                $trip_type="One Way";
                                                               }else{
                                                                $trip_type="Round Trip";
                                                               }
                                                               
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo $sno; ?></td>
                                                    <td class="center"><?= $trip_type?></td>
                                                    <td class="center"><?= $rows->order_type?></td>
                                                    <td class="center"><?= $rows->pickup_date_time?></td>
                                                    <td class="center"> <?= $rows->pickup_address?></td>
                                                    <td class="center"><?= ucfirst($rows->dropup_address)?></td>
                                                    <td class="center"><?= ucfirst($rows->passenger_count)?></td>
                                                    <td class="center"><?= $rows->vehicle_id?></td>
                                                </tr>
                                                <?php
                                                $sno++;        }
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

