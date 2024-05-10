<?php
$this->load->view('templates/frontend/header', $header);
$this->load->view('templates/frontend/main_header', $header);
?>

<div class="container-xl">
      <div class="banner-form mb-4 mb-md-5">
        <img src="<?=base_url('assets/frontend/img/banner-limo.jpg')?>" alt="" class="img-fluid w-100">
      </div>
      <div class="" id="container">
        <div class="progress px-1" style="height: 3px;">
          <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="step-container d-flex justify-content-between">
          <div class="step-circle" onclick="displayStep(1)">
            <span>1</span>
            <p>Request Information</p>
          </div>
          <div class="step-circle" onclick="displayStep(2)">
            <span>2</span>
            <p>Choose Vehicle</p>
          </div>
          <div class="step-circle" onclick="displayStep(3)">
            <span>3</span>
            <p>Confirm</p>
          </div>
        </div>
      </div>

        <form id="multi-step-form" name="frm1" method="post" class="multi-step-form">
          <div class="step step-1">
            <!-- Step 1 form fields here -->
            <h4>Trip Type</h4>
            <div class="mb-3">              
              <ul class="nav nav-tabs mb-4" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#tab_1" trip-id="1" onclick="document.querySelector('#trip_type').value=1"><i class="la la-clock"></i> Hourly</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab_2" trip-id="2" onclick="document.querySelector('#trip_type').value=2"><i class="la la-arrow-right"></i> One Way</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab_3" trip-id="3" onclick="document.querySelector('#trip_type').value=3"><i class="la la-retweet"></i> Round Trip</a>
                </li>
              </ul>
              <input type="hidden" name="trip_type" id="trip_type" value="1">
              <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                  <div class="form-group">
                    <label>Duration</label>
                    <select class="form-control" id="duration" name="duration" onchange="document.querySelector('#error_message_duration').style.display = 'none'">
                      <option value="" selected>Duration</option>
                      <option value="0.5">0.5h</option>
                      <option value="1">1h</option>
                      <option value="1.5">1.5h</option>
                      <option value="2">2h</option>
                      <option value="2.5">2.5h</option>
                      <option value="3">3h</option>
                    </select>
                    <div style="color:red;display:none;" id="error_message_duration">Please select duration</div>
                  </div>
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control" id="hour_order_type" name="hour_order_type">
                      <optgroup label="Airport">
                        <option value="Airport Drop Off">Airport Drop Off</option>
                        <option value="Airport Pick Up">Airport Pick Up</option>
                      </optgroup>
                      <optgroup label="Birthday">
                        <option value="Birthday">Birthday</option>
                       </optgroup>
                       <optgroup label="Corporate">
                        <option value="corporate">Corporate</option>
                        <option value="Corporate Event">Corporate Event</option>
                       </optgroup>
                      
                    </select>
                    <div style="color:red;display:none;" id="error_message_hour_order_type">Please select order type</div>
                  </div>
                  <div class="form-group">
                    <label>Date & Time</label>
                    <input type="datetime-local" class="form-control" name="hour_pickup_date_time" id="hour_pickup_date_time"   onblur="document.querySelector('#error_message_hour_pickup_date_time').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_hour_pickup_date_time">Please select date & time</div>
                  </div>
                  <div class="form-group">
                    <div class="d-flex align-self-center">
                      <label class="align-self-center me-3">Pick-up</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="hour_pickup_address_type" id="hour_pickup_address_type11" checked value="address" >
                        <label class="btn btn-outline-primary" for="hour_pickup_address_type11">
                          Address
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="hour_pickup_address_type" id="hour_pickup_address_type12" value="airport">
                        <label class="btn btn-outline-primary" for="hour_pickup_address_type12">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                    
                    <input type="text" id="hour_pickup_address" name="hour_pickup_address" class="form-control" placeholder="Address" onfocus="document.querySelector('#error_message_hour_pickup_address').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_hour_pickup_address" >Please select pickup address</div>
                  </div>

                  <div class="form-group text-center">                    
                    <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                  </div>

                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Drop-off</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="hour_dropup_address_type" id="hour_dropup_address_type21" checked value="address">
                        <label class="btn btn-outline-primary" for="hour_dropup_address_type21">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="hour_dropup_address_type" id="hour_dropup_address_type22" value="airport">
                        <label class="btn btn-outline-primary" for="hour_dropup_address_type22">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                    
                    <input type="text" class="form-control" id="hour_dropup_address" name="hour_dropup_address" placeholder="Address" onfocus="document.querySelector('#error_message_hour_dropup_address').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_hour_dropup_address">Please select drop-off address</div>
                  </div>
                  <div class="form-group">                    
                    <div class="d-flex justify-content-between align-items-center">
                      <label>Passenger Count</label>
                      <div class="d-flex passenger-counter">
                        <!-- <a href="javascript:void(0)"><i class="la la-minus"></i></a>
                        <input type="text" value="1" class="form-control text-center">
                        <a href="javascript:void(0)" ><i class="la la-plus"></i></a> -->

                        <a href="javascript:void(0)" onclick="document.querySelector('#hour_passenger_count').value=parseInt(document.querySelector('#hour_passenger_count').value)<2?parseInt(document.querySelector('#hour_passenger_count').value):parseInt(document.querySelector('#hour_passenger_count').value)-1">-</a>
                        <input type="number" name="hour_passenger_count" class="form-control text-center" value="1" id="hour_passenger_count" min="1" max="20" value=0>
                        <a href="javascript:void(0)" onclick="document.querySelector('#hour_passenger_count').value=parseInt(document.querySelector('#hour_passenger_count').value)>19?parseInt(document.querySelector('#hour_passenger_count').value):parseInt(document.querySelector('#hour_passenger_count').value)+1">+</a>
                        <div style="color:red;display:none;" id="error_message_hour_passenger_count">Please insert passenger count</div>
                      </div>
                    </div>
                  </div>


                </div>
                <div id="tab_2" class="tab-pane fade">
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control" id="one_order_type" name="one_order_type">
                      <optgroup label="Group 1">
                        <option>Option 11</option>
                        <option>Option 12</option>
                        <option>Option 13</option>
                      </optgroup>
                      <optgroup label="Group 2">
                        <option>Option 21</option>
                        <option>Option 22</option>
                        <option>Option 23</option>
                      </optgroup>
                      <option>Option 3</option>
                      <option>Option 4</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date & Time</label>
                    <input type="datetime-local" class="form-control" name="one_pickup_date_time" id="one_pickup_date_time" onblur="document.querySelector('#error_message_one_pickup_date_time').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_one_pickup_date_time">Please select date & time</div>
                  </div>
                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Pick-up</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="one_pickup_address_type" id="one_pickup_address_type31" checked value="address">
                        <label class="btn btn-outline-primary" for="one_pickup_address_type31">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="one_pickup_address_type" id="one_pickup_address_type32" value="airport">
                        <label class="btn btn-outline-primary" for="one_pickup_address_type32">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                    
                    <input type="text" class="form-control" placeholder="Address" id="one_pickup_address" name="one_pickup_address" onfocus="document.querySelector('#error_message_one_pickup_address').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_one_pickup_address">Please select pickup address</div>
                  </div>

                  <div class="form-group text-center">                    
                    <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                  </div>

                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Drop-off</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="one_dropup_address_type" id="one_dropup_address_type41" checked value="address">
                        <label class="btn btn-outline-primary" for="one_dropup_address_type41">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="one_dropup_address_type" id="one_dropup_address_type42" value="airport">
                        <label class="btn btn-outline-primary" for="one_dropup_address_type42">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <input type="text" class="form-control" placeholder="Address" id="one_dropup_address" name="one_dropup_address" onfocus="document.querySelector('#error_message_one_dropup_address').style.display = 'none'">
                    <div style="color:red;display:none;" id="error_message_one_dropup_address">Please select drop-off address</div>
                  </div>
                  <div class="form-group">                    
                    <div class="d-flex justify-content-between align-items-center">
                      <label>Passenger Count</label>
                      <div class="d-flex passenger-counter">
                      <a href="javascript:void(0)" onclick="document.querySelector('#one_passenger_count').value=parseInt(document.querySelector('#one_passenger_count').value)<2?parseInt(document.querySelector('#one_passenger_count').value):parseInt(document.querySelector('#one_passenger_count').value)-1">-</a>
                        <input type="number" name="one_passenger_count" class="form-control text-center" value="1" id="one_passenger_count" min="1" max="20" value=0>
                        <a href="javascript:void(0)" onclick="document.querySelector('#one_passenger_count').value=parseInt(document.querySelector('#one_passenger_count').value)>19?parseInt(document.querySelector('#one_passenger_count').value):parseInt(document.querySelector('#one_passenger_count').value)+1">+</a>
                        <div style="color:red;display:none;" id="error_message_one_passenger_count">Please insert passenger count</div>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div id="tab_3" class="tab-pane fade">
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control" id="return_order_type" name="return_order_type">
                      <optgroup label="Group 1">
                        <option>Option 11</option>
                        <option>Option 12</option>
                        <option>Option 13</option>
                      </optgroup>
                      <optgroup label="Group 2">
                        <option>Option 21</option>
                        <option>Option 22</option>
                        <option>Option 23</option>
                      </optgroup>
                      <option>Option 3</option>
                      <option>Option 4</option>
                    </select>
                    <div style="color:red;display:none;" id="error_message_return_order_type">Please select order Type</div>
                  </div>
                  <div class="round-pick-up">
                    <h3>Round Trip: Pick-Up</h3>
                    <div class="form-group">
                      <label>Date & Time</label>
                      <input type="datetime-local" class="form-control" name="return_one_pickup_date_time" id="return_one_pickup_date_time" onblur="document.querySelector('#error_message_return_one_pickup_date_time').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_one_pickup_date_time">Please select date & time</div>
                    </div>
                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Pick-up</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="return_one_pickup_address_type" id="return_one_pickup_address_type51" checked value="address">
                          <label class="btn btn-outline-primary" for="return_one_pickup_address_type51">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="return_one_pickup_address_type" id="return_one_pickup_address_type52" value="airport">
                          <label class="btn btn-outline-primary" for="return_one_pickup_address_type52">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address" id="return_one_pickup_address" name="return_one_pickup_address" onfocus="document.querySelector('#error_message_return_one_pickup_address').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_one_pickup_address">Please select pickup address </div>
                    </div>

                    <div class="form-group text-center">                    
                      <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                    </div>

                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Drop-off</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="return_one_dropup_address_type" id="return_one_dropup_address_type61" checked value="address">
                          <label class="btn btn-outline-primary" for="return_one_dropup_address_type61">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="return_one_dropup_address_type" id="return_one_dropup_address_type62" value="airport">
                          <label class="btn btn-outline-primary" for="return_one_dropup_address_type62">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address" id="return_one_dropup_address" name="return_one_dropup_address" onfocus="document.querySelector('#error_message_return_one_dropup_address').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_one_dropup_address">Please select drop-off address</div>
                    </div>
                    <div class="form-group mb-0">                    
                      <div class="d-flex justify-content-between align-items-center">
                        <label>Passenger Count</label>
                        <div class="d-flex passenger-counter">
                        <a href="javascript:void(0)" onclick="document.querySelector('#return_one_passenger_count').value=parseInt(document.querySelector('#return_one_passenger_count').value)<2?parseInt(document.querySelector('#return_one_passenger_count').value):parseInt(document.querySelector('#return_one_passenger_count').value)-1">-</a>
                        <input type="number" name="return_one_passenger_count" class="form-control text-center" value="1" id="return_one_passenger_count" min="1" max="20" value=0>
                        <a href="javascript:void(0)" onclick="document.querySelector('#return_one_passenger_count').value=parseInt(document.querySelector('#return_one_passenger_count').value)>19?parseInt(document.querySelector('#return_one_passenger_count').value):parseInt(document.querySelector('#return_one_passenger_count').value)+1">+</a>
                        <div style="color:red;display:none;" id="error_message_return_one_passenger_count">Please insert passenger count</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="round-drop-off">
                    <h3>Round Trip: Return</h3>
                    <div class="form-group">
                      <label>Date & Time</label>
                      <input type="datetime-local" class="form-control" name="return_two_pickup_date_time" id="return_two_pickup_date_time" onblur="document.querySelector('#error_message_return_two_pickup_date_time').style.display = 'none'" onchange="document.querySelector('#error_message_return_two_pickup_date_time_invalid').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_two_pickup_date_time">Please select date & time</div>
                      <div style="color:red;display:none;" id="error_message_return_two_pickup_date_time_invalid">Return date & time must be later than pick-up date & time</div>
                    </div>
                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Pick-up</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="return_two_pickup_address_type" id="return_two_pickup_address_type71" checked value="address">
                          <label class="btn btn-outline-primary" for="return_two_pickup_address_type71">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="return_two_pickup_address_type" id="return_two_pickup_address_type72" value="airport">
                          <label class="btn btn-outline-primary" for="return_two_pickup_address_type72">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address" id="return_two_pickup_address" name="return_two_pickup_address" onfocus="document.querySelector('#error_message_return_two_pickup_address').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_two_pickup_address">Please select pickup address</div> 
                      
                    </div>

                    <div class="form-group text-center">                    
                      <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                    </div>

                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Drop-off</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="return_two_dropup_address_type" id="return_two_dropup_address_type81" checked value="address">
                          <label class="btn btn-outline-primary" for="return_two_dropup_address_type81">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="return_two_dropup_address_type" id="return_two_dropup_address_type82" value="airport">
                          <label class="btn btn-outline-primary" for="return_two_dropup_address_type82">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address" id="return_two_dropup_address" name="return_two_dropup_address" onfocus="document.querySelector('#error_message_return_two_dropup_address').style.display = 'none'">
                      <div style="color:red;display:none;" id="error_message_return_two_dropup_address">Please select drop-off address</div>
                    </div>
                    <div class="form-group mb-0">                    
                      <div class="d-flex justify-content-between align-items-center">
                        <label>Passenger Count</label>
                        <div class="d-flex passenger-counter">
                        <a href="javascript:void(0)" onclick="document.querySelector('#return_two_passenger_count').value=parseInt(document.querySelector('#return_two_passenger_count').value)<2?parseInt(document.querySelector('#return_two_passenger_count').value):parseInt(document.querySelector('#return_two_passenger_count').value)-1">-</a>
                        <input type="number" name="return_two_passenger_count" class="form-control text-center" value="1" id="return_two_passenger_count" min="1" max="20" value=0>
                        <a href="javascript:void(0)" onclick="document.querySelector('#return_two_passenger_count').value=parseInt(document.querySelector('#return_two_passenger_count').value)>19?parseInt(document.querySelector('#return_two_passenger_count').value):parseInt(document.querySelector('#return_two_passenger_count').value)+1">+</a>
                        <div style="color:red;display:none;" id="error_message_return_two_passenger_count">Please insert passenger count</div>
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
            <div class="text-end step-buttons">
              <button type="button" class="btn btn-primary next-step">Next Step</button>
            </div>
          </div>

          <div class="step step-2"> 
            <div class="request-summary mb-4 mb-md-5">
              <a href=""><i class="las la-pen-square"></i> Edit</a>
              <h4 class="mb-4">Request Summary</h4>
              <div class="summary">
                <div>
                  <p>PICK-UP DATE & TIME</p>
                  <span id="date-time-step2">Monday, Mar 11th, 2024 12:31 PM</span>
                </div>
                <div>
                  <p>PICK-UP ADDRESS</p>
                  <span id="pickup-step2">120 Broadway, New York, NY, USA</span>
                </div>
                <div>
                  <p>DROP-OFF ADDRESS</p>
                  <span id="dropup-step2">120 Broadway, New York, NY, USA</span>
                </div>
                <div id="duration-div-step2">
                  <p>DURATION</p>
                  <span><span id="duration-step2">4 </span> Hours</span>
                </div>
                <div id="return-div-step2">
                  <p>RETURN DATE & TIME</p>
                  <span id="return-date-time-step2">Monday, Mar 11th, 2024 12:31 PM</span>
                </div>
                <div>
                  <p>PASSENGER COUNT</p>
                  <span id="passenger-count-step2">4</span>
                </div>
              </div>
            </div>
            <h4 class="m-0 ">Choose Vehicle</h4>
            <input type="text" id="distance" name="distance">
            
            <?php if(!empty($vehicle)){ 
                    foreach($vehicle as $b_k=>$vehicles){ 
                      $car_image=explode(",",$vehicles->car_image);
                      if (!empty($vehicles->car_image)) {
                                $car_img = base_url('assets/uploads/car_images/' . $car_image[0]);
                                //print_r($img);
                        } else {
                                $car_img = base_url('assets/admin/media/illustrations/404-hd.png');
                        }
            ?>
            
            <div class="vehicle-item mt-0">
              <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                  <img src="<?=$car_img?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">                  
                  <div class="row mb-4">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" name="cars[]" cid="<?php echo  $vehicles->id; ?>" value="<?php echo  $vehicles->id; ?>">
                      <input type="text" id="choose_your_weekend<?php echo  $vehicles->id; ?>" name="choose_your_weekend" value="<?php echo  $vehicles->choose_your_weekend; ?>">
                      <input type="text" id="weekday_hourly_rate<?php echo  $vehicles->id; ?>" name="weekday_hourly_rate" value="<?php echo  $vehicles->weekday_hourly_rate; ?>">
                      <input type="text" id="weekend_hourly_rate<?php echo  $vehicles->id; ?>" name="weekend_hourly_rate" value="<?php echo  $vehicles->weekend_hourly_rate; ?>">
                      <input type="text" id="weekday_hourly_minimum<?php echo  $vehicles->id; ?>" name="weekday_hourly_minimum" value="<?php echo  $vehicles->weekday_hourly_minimum; ?>">

                      

                      <h3 class="m-0"><?php echo !empty($vehicles->vehicle_type) ? $vehicles->vehicle_type :''; ?></h3>
                      <p class="mb-2"><small><?php echo !empty($vehicles->make) ? $vehicles->make :''; ?></small></p>
                      <p class="m-0"><i class="la la-user"></i> <?php echo !empty($vehicles->passenger_capacity) ? $vehicles->passenger_capacity :''; ?> Passengers</p>
                    </div>
                    <div class="col-sm-6 text-start text-sm-end">
                      <h3 id="vehicle-price-show-second-step<?php echo  $vehicles->id; ?>">$150.50</h3>
                      <a href="javascript:void(0)" id="fare<?php echo  $vehicles->id; ?>" vid="<?php echo  $vehicles->id; ?>" vtype="<?php echo  $vehicles->vehicle_type; ?>" vmake="<?php echo  $vehicles->make; ?>" pcapacity="<?php echo  $vehicles->passenger_capacity; ?>" multimedia="<?php echo  $vehicles->multimedia; ?>"  class="btn btn-info next-step choose-vehicle">Choose Vehicle <i class="la la-arrow-right"></i></a>
                     
                    </div>
                  </div>
                  
                  <div class="row">

                    <?php if(isset($vehicles->general)) { ?>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p><small>GENERAL</small></p>
                      <?php $generals=explode(",",$vehicles->general); 
                      if(count($generals) > 0){
                        foreach ($generals as $general) { ?>
                          <p><i class="las la-wind"></i><?php echo $general; ?></p>
                       <?php }
                      } ?>
                     
                      <!-- <p><i class="las la-wind"></i> AC</p>
                      <p><i class="las la-luggage-cart"></i> Luggage</p> -->
                    </div>
                    <?php } ?>

                    <?php if(isset($vehicles->multimedia)) { ?>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p class="mb-2"><small>MULTIMEDIA</small></p>
                      <?php $multimedias=explode(",",$vehicles->multimedia); 
                      if(count($multimedias) > 0){
                        foreach ($multimedias as $multimedia) { ?>
                          <p><i class="lab la-bluetooth-b"></i> <?php echo $multimedia; ?></p>
                       <?php }
                      } ?>
                      <!-- <p><i class="lab la-bluetooth-b"></i> Bluetooth</p>
                      <p><i class="lab la-usb"></i> USB</p> -->
                    </div>
                    <?php } ?>
                    <?php if(isset($vehicles->policies)) { ?>
                    <div class="col-sm-4">
                      <p class="mb-2"><small>POLICY</small></p>
                      <p><i class="las la-ban"></i> <?php echo $vehicles->policies; ?></p>
                    </div> 
                    <?php } ?>                 
                </div>
              </div>
              </div>                
            </div>
            <?php } } ?>
            
           
            
            <div class="text-end step-buttons">
            <input type="hidden" id="vehicle_id" name="vehicle_id">
              <button type="button" class="btn btn-secondary prev-step">Previous Step</button>
              <!-- <button type="button" class="btn btn-primary next-step">Next Step</button> -->
            </div>
          </div>

          <div class="step step-3">
            <h2 id="date-time-final">Mar 11th 2024, 12:31 PM</h2>
            <hr>
            <h3 class="mb-4">Review & Reserve</h3>
            <div class="row">
              <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="review-summary mb-4 pb-0">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="m-0">Hourly</h5>
                    <div><span><i class="la la-clock me-1 font-20"></i> <span id="duration-review">4 </span> Hrs </span> <span class="px-3">|</span> <span><i class="la font-20 la-user me-1"></i> <span id="passenger-count-icon">5 </span></span></div>
                  </div>
                  <p><small>PICK-UP DATE & TIME</small> 
                    <br><p id="date-time-review">Monday, Mar 11th, 2024 12:30 PM</p></p>
                  <div class="pick-drop">
                    <div class="pickup pb-3">
                      <span class="pic-icon"><i class="la la-map-marker"></i></span>
                      <p class="mb-2"><small>PICK-UP</small> 
                        <br> <p id="pickup-review">120 Broadway New York, NY, USA</p></p>                      
                    </div>
                    <div class="dropoff mb-3">
                      <span class="drop-icon"><i class="la la-map-marker"></i></span>
                      <p class="mb-2"><small>DROP-OFF</small> 
                        <br><p id="dropup-review">Juncal 1207 Buenos Aires, Argentina</p></p>  
                      <p><i class="la la-clock me-1 font-20"></i> 4:30 PM</p>
                    </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0">Additional Trip Info</h5>
                    <a href=""><i class="las la-pen-square"></i> Edit</a>              
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-lg-3 mb-3">
                      <p class="m-0"><small >PASSENGER COUNT</small><br><p id="passenger-count-review">5</p></p>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                      <p class="m-0"><small>PASSENGER CONTACT</small><br>Lorem ipsum dolor sit</p>
                    </div>
                    <div class="col-sm-6 col-lg-2 mb-3">
                      <p class="m-0"><small>LUGGAGE COUNT</small><br>1</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-3">
                      <p class="m-0"><small>TRIP NOTE</small><br>Lorem ipsum dolor sit</p>
                    </div>
                  </div>
                  
                </div>
                  
                <div class="review-vehicle">
                  <h5>Vehicle</h5>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <img src="<?=base_url('assets/frontend/car/car1.jpg')?>" alt="" class="img-fluid me-3" width="80">
                      <div>
                        <p class="mb-2"><b id="vehicle-type-review">Premium SUV</b></p>
                        <div><span ><i class="la la-car me-1 font-20"></i> <span id="vehicle-make-review">SUV</span></span> <span class="px-2">|</span> <span ><i class="las font-20 la-couch me-1"></i><span id="vehicle-pnr-capacity"> 6 </span></span></div>
                      </div>
                    </div>
                    <div class="">
                      <p class="mb-2"><small>FEATURES</small></p>
                      <div><span><i class="las la-suitcase"></i></span> <span class="px-2">|</span> <span><i class="la font-20 la-usb"></i></span></div>
                    </div>                    
                  </div>
                </div>
              </div>
              
              <div class="col-lg-5">
                <div class="review-price mb-4">
                  <h5>Price Overview</h5>
                  <input type="text" id="price" name="price">
                  <p class="mb-2"><b>Trip 1 Pricing</b></p>
                  <p class="mb-2"><small class="d-flex align-items-center justify-content-between font-16 normal"><span>Base Rate</span><span id="vehicle-price-show-review-step">$264.00</span></small></p>
                  <p class="mb-2"><small class="d-flex align-items-center justify-content-between font-16 normal"><span>Service Fee</span><span>$9.24</span></small></p>
                  <p class="d-flex align-items-center justify-content-between"><span><b>Trip 1 Total</b></span><span><b>$273.24</b></span></p>                  
                  <hr>
                  <h5>Booking Contact</h5>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile number *" onfocus="document.querySelector('#err_mobile').style.display = 'none'">
                    <div style="color:red;display:none;" id="err_mobile">Enter Mobile No.</div>
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email *" onfocus="document.querySelector('#err_email').style.display = 'none'">
                    <div style="color:red;display:none;" id="err_email">Enter Email</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="mb-3">
                      <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="First name *" onfocus="document.querySelector('#err_first_name').style.display = 'none'">
                      <div style="color:red;display:none;" id="err_first_name">Enter First Name</div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Last name *" name="last_name" id="last_name" onfocus="document.querySelector('#err_last_name').style.display = 'none'">
                      <div style="color:red;display:none;" id="err_last_name">Enter Last Name</div>
                    </div>
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree to the <a href="javascript:void(0)">Terms & Conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="mb-4">
                    <a href="javascript:void(0)" id="save-reserve" class="btn btn-primary w-100">Reserve</a>
                  </div>
                  <p class="font-14 m-0">By clicking “Reserve” you agree to receive order updates via SMS. Messages & data rates may apply. You can also opt out of receiving text messages at any time by replying STOP.</p>
                </div>
                <div class="have-trouble mb-4">
                  <div class="d-flex align-items-center">
                      <i class="la la-info-circle la-2x me-3"></i>
                      <div>
                        <p class="m-0"><small>HAVING TROUBLE?</small></p>
                        <p class="m-0">Email us: <a href="mailto:bookings@limohiremelbourne.au">bookings@limohiremelbourne.au</a></p>                        
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="text-end step-buttons">
              <button type="button" class="btn btn-secondary prev-step">Previous Step</button>
              <!-- <button type="submit" class="btn btn-success">Submit</button> -->
            </div>
          </div>
        </form>
      </div>  


<?php
$this->load->view('templates/frontend/footer', $header);
$this->load->view('templates/frontend/footer_scripts', $header);
?>
 <script>
  // INSERT AND UPDATE SCRIPT
  $('body').on('click','#save-reserve',function(){
          flag=true;
          if($("#mobile").val()=='' || $("#mobile").val()==undefined)
				  { 
					  $("#err_mobile").show();
					  flag=false;
				  }
          if($("#email").val()=='' || $("#email").val()==undefined)
				  { 
					  $("#err_email").show();
					  flag=false;
				  }
          if($("#first_name").val()=='' || $("#first_name").val()==undefined)
				  { 
					  $("#err_first_name").show();
					  flag=false;
				  }
          if($("#last_name").val()=='' || $("#last_name").val()==undefined)
				  { 
					  $("#err_last_name").show();
					  flag=false;
				  }
          if(flag){
            //$('#dvLoading').show();
            var data = $("#multi-step-form").serialize();
            $.ajax({
            type: "post",
            async: false,
            // url: "booking.php",
            url: "<?php echo base_url('booking'); ?>", 
            data: data, 
            dataType: "json",
            
            success: function(data) { 
                
                if(data.status==1)
                { 
                  window.location = "<?php echo base_url('thankyou'); ?>";
                   
                }
                else
                {
                  alert(data.msg);
                    return false;
                }
                
            },
            complete: function(){
                $('#dvLoading').hide();
            }
            });
          }else{
            return false;
          }
        } );
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ0FX4PX3pqB6lApllDjzjs3JXgBiNHqc&libraries=places"></script>
        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('hour_pickup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('hour_dropup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('one_pickup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('one_dropup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('return_one_pickup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('return_one_dropup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('return_two_pickup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('return_two_dropup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['ind']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
