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
                  <a class="nav-link active" data-bs-toggle="tab" href="#tab_1"><i class="la la-clock"></i> Hourly</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab_2"><i class="la la-arrow-right"></i> One Way</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab_3"><i class="la la-retweet"></i> Round Trip</a>
                </li>
              </ul>

              <div class="tab-content">
                <div id="tab_1" class="tab-pane active">
                  <div class="form-group">
                    <label>Duration</label>
                    <select class="form-control" id="duration" name="duration">
                      <option value="" selected>Duration</option>
                      <option value="0.5">0.5h</option>
                      <option value="1">1h</option>
                      <option value="1.5">1.5h</option>
                      <option value="2">2h</option>
                      <option value="2.5">2.5h</option>
                      <option value="3">3h</option>
                    </select>
                    <div style="color:red;display:none;" id="error_message_duration">Please Select</div>
                  </div>
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control" id="order_type" name="order_type">
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
                    <div style="color:red;display:none;" id="error_message_order_type">Please Select</div>
                  </div>
                  <div class="form-group">
                    <label>Date & Time</label>
                    <input type="datetime-local" class="form-control" name="pickup_date_time" id="pickup_date_time">
                  </div>
                  <div class="form-group">
                    <div class="d-flex align-self-center">
                      <label class="align-self-center me-3">Pick-up</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="flexRadioDefault1" id="flexRadioDefault11" checked>
                        <label class="btn btn-outline-primary" for="flexRadioDefault11">
                          Address
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="flexRadioDefault1" id="flexRadioDefault12">
                        <label class="btn btn-outline-primary" for="flexRadioDefault12">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                    
                    <input type="text" id="searchTextField" name="pickup_address" class="form-control" placeholder="Address">
                  </div>

                  <div class="form-group text-center">                    
                    <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                  </div>

                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Drop-off</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="flexRadioDefault2" id="flexRadioDefault21" checked>
                        <label class="btn btn-outline-primary" for="flexRadioDefault21">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="flexRadioDefault2" id="flexRadioDefault22">
                        <label class="btn btn-outline-primary" for="flexRadioDefault22">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <input type="text" class="form-control" id="dropup_address" name="dropup_address" placeholder="Address">
                  </div>
                  <div class="form-group">                    
                    <div class="d-flex justify-content-between align-items-center">
                      <label>Passenger Count</label>
                      <div class="d-flex passenger-counter">
                        <!-- <a href="javascript:void(0)"><i class="la la-minus"></i></a>
                        <input type="text" value="1" class="form-control text-center">
                        <a href="javascript:void(0)" ><i class="la la-plus"></i></a> -->

                        <a href="javascript:void(0)" onclick="document.querySelector('#passenger_count').value=parseInt(document.querySelector('#passenger_count').value)<2?parseInt(document.querySelector('#passenger_count').value):parseInt(document.querySelector('#passenger_count').value)-1">-</a>
                        <input type="number" name="passenger_count" class="form-control text-center" value="1" id="passenger_count" min="1" max="20" value=0>
                        <a href="javascript:void(0)" onclick="document.querySelector('#passenger_count').value=parseInt(document.querySelector('#passenger_count').value)>19?parseInt(document.querySelector('#passenger_count').value):parseInt(document.querySelector('#passenger_count').value)+1">+</a>
                      </div>
                    </div>
                  </div>


                </div>
                <div id="tab_2" class="tab-pane fade">
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control">
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
                    <input type="datetime-local" class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Pick-up</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="flexRadioDefault3" id="flexRadioDefault31" checked>
                        <label class="btn btn-outline-primary" for="flexRadioDefault31">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="flexRadioDefault3" id="flexRadioDefault32">
                        <label class="btn btn-outline-primary" for="flexRadioDefault32">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">                    
                    <input type="text" class="form-control" placeholder="Address">
                  </div>

                  <div class="form-group text-center">                    
                    <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                  </div>

                  <div class="form-group">
                    <div class="d-flex">
                      <label class="align-self-center me-3">Drop-off</label>
                      <div class="form-check-inline">
                        <input class="btn-check" type="radio" name="flexRadioDefault4" id="flexRadioDefault41" checked>
                        <label class="btn btn-outline-primary" for="flexRadioDefault41">
                          Address 
                        </label>
                      </div>
                      <div class="form-check-inline ">
                        <input class="btn-check" type="radio" name="flexRadioDefault4" id="flexRadioDefault42">
                        <label class="btn btn-outline-primary" for="flexRadioDefault42">
                          Airport
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <input type="text" class="form-control" placeholder="Address">
                  </div>
                  <div class="form-group">                    
                    <div class="d-flex justify-content-between align-items-center">
                      <label>Passenger Count</label>
                      <div class="d-flex passenger-counter">
                        <a href=""><i class="la la-minus"></i></a>
                        <input type="number" value="1" class="form-control text-center">
                        <a href=""><i class="la la-plus"></i></a>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div id="tab_3" class="tab-pane fade">
                  <div class="form-group">
                    <label>Order Type</label>
                    <select class="form-control">
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
                  <div class="round-pick-up">
                    <h3>Round Trip: Pick-Up</h3>
                    <div class="form-group">
                      <label>Date & Time</label>
                      <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Pick-up</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="flexRadioDefault5" id="flexRadioDefault51" checked>
                          <label class="btn btn-outline-primary" for="flexRadioDefault51">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="flexRadioDefault5" id="flexRadioDefault52">
                          <label class="btn btn-outline-primary" for="flexRadioDefault52">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address">
                    </div>

                    <div class="form-group text-center">                    
                      <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                    </div>

                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Drop-off</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="flexRadioDefault6" id="flexRadioDefault61" checked>
                          <label class="btn btn-outline-primary" for="flexRadioDefault61">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="flexRadioDefault6" id="flexRadioDefault62">
                          <label class="btn btn-outline-primary" for="flexRadioDefault62">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group mb-0">                    
                      <div class="d-flex justify-content-between align-items-center">
                        <label>Passenger Count</label>
                        <div class="d-flex passenger-counter">
                          <a href=""><i class="la la-minus"></i></a>
                          <input type="number" value="1" class="form-control text-center">
                          <a href=""><i class="la la-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="round-drop-off">
                    <h3>Round Trip: Return</h3>
                    <div class="form-group">
                      <label>Date & Time</label>
                      <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Pick-up</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="flexRadioDefault7" id="flexRadioDefault71" checked>
                          <label class="btn btn-outline-primary" for="flexRadioDefault71">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="flexRadioDefault7" id="flexRadioDefault72">
                          <label class="btn btn-outline-primary" for="flexRadioDefault72">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address">
                    </div>

                    <div class="form-group text-center">                    
                      <a class="btn btn-link" href=""><i class="la la-plus"></i> Add Stop</a>
                    </div>

                    <div class="form-group">
                      <div class="d-flex">
                        <label class="align-self-center me-3">Drop-off</label>
                        <div class="form-check-inline">
                          <input class="btn-check" type="radio" name="flexRadioDefault8" id="flexRadioDefault81" checked>
                          <label class="btn btn-outline-primary" for="flexRadioDefault81">
                            Address 
                          </label>
                        </div>
                        <div class="form-check-inline ">
                          <input class="btn-check" type="radio" name="flexRadioDefault8" id="flexRadioDefault82">
                          <label class="btn btn-outline-primary" for="flexRadioDefault82">
                            Airport
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">                    
                      <input type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group mb-0">                    
                      <div class="d-flex justify-content-between align-items-center">
                        <label>Passenger Count</label>
                        <div class="d-flex passenger-counter">
                          <a href=""><i class="la la-minus"></i></a>
                          <input type="number" value="1" class="form-control text-center">
                          <a href=""><i class="la la-plus"></i></a>
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
                  <span>Monday, Mar 11th, 2024 12:31 PM</span>
                </div>
                <div>
                  <p>PICK-UP ADDRESS</p>
                  <span>120 Broadway, New York, NY, USA</span>
                </div>
                <div>
                  <p>DURATION</p>
                  <span>4 Hours</span>
                </div>
                <div>
                  <p>PASSENGER COUNT</p>
                  <span>4</span>
                </div>
              </div>
            </div>
            <h4 class="m-0">Choose Vehicle</h4>
            <div class="vehicle-item mt-0">
              <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                  <img src="<?=base_url('assets/frontend/car/car1.jpg')?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">                  
                  <div class="row mb-4">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <h3 class="m-0">Prime SUV</h3>
                      <p class="mb-2"><small>SUV</small></p>
                      <p class="m-0"><i class="la la-user"></i> 4 Passengers</p>
                    </div>
                    <div class="col-sm-6 text-start text-sm-end">
                      <h3>$150.50</h3>
                      <a href="" class="btn btn-info">Choose Vehicle <i class="la la-arrow-right"></i></a>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p><small>GENERAL</small></p>
                      <p><i class="las la-wind"></i> AC</p>
                      <p><i class="las la-luggage-cart"></i> Luggage</p>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p class="mb-2"><small>MULTIMEDIA</small></p>
                      <p><i class="lab la-bluetooth-b"></i> Bluetooth</p>
                      <p><i class="lab la-usb"></i> USB</p>
                    </div>
                    <div class="col-sm-4">
                      <p class="mb-2"><small>POLICY</small></p>
                      <p><i class="las la-ban"></i> No alcohol, food, pets, or smoking allowed</p>
                    </div>                  
                </div>
              </div>
              </div>                
            </div>
            
            
            <div class="vehicle-item">
              <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                  <img src="<?=base_url('assets/frontend/car/car2.jpg')?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">                  
                  <div class="row mb-4">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <h3 class="m-0">Prime SUV</h3>
                      <p class="mb-2"><small>SUV</small></p>
                      <p class="m-0"><i class="la la-user"></i> 4 Passengers</p>
                    </div>
                    <div class="col-sm-6 text-start text-sm-end">
                      <h3>$150.50</h3>
                      <a href="" class="btn btn-info">Choose Vehicle <i class="la la-arrow-right"></i></a>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p><small>GENERAL</small></p>
                      <p><i class="las la-wind"></i> AC</p>
                      <p><i class="las la-luggage-cart"></i> Luggage</p>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p class="mb-2"><small>MULTIMEDIA</small></p>
                      <p><i class="lab la-bluetooth-b"></i> Bluetooth</p>
                      <p><i class="lab la-usb"></i> USB</p>
                    </div>
                    <div class="col-sm-4">
                      <p class="mb-2"><small>POLICY</small></p>
                      <p><i class="las la-ban"></i> No alcohol, food, pets, or smoking allowed</p>
                    </div>                  
                </div>
              </div>
              </div>                
            </div>
            
            <div class="vehicle-item">
              <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                  <img src="<?=base_url('assets/frontend/car/car3.jpg')?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">                  
                  <div class="row mb-4">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <h3 class="m-0">Prime SUV</h3>
                      <p class="mb-2"><small>SUV</small></p>
                      <p class="m-0"><i class="la la-user"></i> 4 Passengers</p>
                    </div>
                    <div class="col-sm-6 text-start text-sm-end">
                      <h5>Request for Pricing</h5>
                      <a href="" class="btn btn-info">Choose Vehicle <i class="la la-arrow-right"></i></a>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p><small>GENERAL</small></p>
                      <p><i class="las la-wind"></i> AC</p>
                      <p><i class="las la-luggage-cart"></i> Luggage</p>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <p class="mb-2"><small>MULTIMEDIA</small></p>
                      <p><i class="lab la-bluetooth-b"></i> Bluetooth</p>
                      <p><i class="lab la-usb"></i> USB</p>
                    </div>
                    <div class="col-sm-4">
                      <p class="mb-2"><small>POLICY</small></p>
                      <p><i class="las la-ban"></i> No alcohol, food, pets, or smoking allowed</p>
                    </div>                  
                </div>
              </div>
              </div>                
            </div>
            
            <div class="text-end step-buttons">
              <button type="button" class="btn btn-secondary prev-step">Previous Step</button>
              <button type="button" class="btn btn-primary next-step">Next Step</button>
            </div>
          </div>

          <div class="step step-3">
            <h2>Mar 11th 2024, 12:31 PM</h2>
            <hr>
            <h3 class="mb-4">Review & Reserve</h3>
            <div class="row">
              <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="review-summary mb-4 pb-0">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="m-0">Hourly</h5>
                    <div><span><i class="la la-clock me-1 font-20"></i> 4 Hrs</span> <span class="px-3">|</span> <span><i class="la font-20 la-user me-1"></i> 5</span></div>
                  </div>
                  <p><small>PICK-UP DATE & TIME</small> 
                    <br>Monday, Mar 11th, 2024 12:30 PM</p>
                  <div class="pick-drop">
                    <div class="pickup pb-3">
                      <span class="pic-icon"><i class="la la-map-marker"></i></span>
                      <p class="mb-2"><small>PICK-UP</small> 
                        <br>120 Broadway New York, NY, USA</p>                      
                    </div>
                    <div class="dropoff mb-3">
                      <span class="drop-icon"><i class="la la-map-marker"></i></span>
                      <p class="mb-2"><small>DROP-OFF</small> 
                        <br>Juncal 1207 Buenos Aires, Argentina</p>  
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
                      <p class="m-0"><small>PASSENGER COUNT</small><br>5</p>
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
                        <p class="mb-2"><b>Premium SUV</b></p>
                        <div><span><i class="la la-car me-1 font-20"></i> SUV</span> <span class="px-2">|</span> <span><i class="las font-20 la-couch me-1"></i> 5</span></div>
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
                  <p class="mb-2"><b>Trip 1 Pricing</b></p>
                  <p class="mb-2"><small class="d-flex align-items-center justify-content-between font-16 normal"><span>Base Rate</span><span>$264.00</span></small></p>
                  <p class="mb-2"><small class="d-flex align-items-center justify-content-between font-16 normal"><span>Service Fee</span><span>$9.24</span></small></p>
                  <p class="d-flex align-items-center justify-content-between"><span><b>Trip 1 Total</b></span><span><b>$273.24</b></span></p>                  
                  <hr>
                  <h5>Booking Contact</h5>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Mobile number *">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Email *">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="mb-3">
                      <input type="text" class="form-control" placeholder="First name *">
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Last name *">
                    </div>
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree to the <a href="">Terms & Conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="mb-4">
                    <a href="" class="btn btn-primary w-100">Reserve</a>
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
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>  


<?php
$this->load->view('templates/frontend/footer', $header);
$this->load->view('templates/frontend/footer_scripts', $header);
?>
<script>
var currentStep = 1;
var updateProgressBar;

  function displayStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= 3) {
      $(".step-" + currentStep).hide();
      $(".step-" + stepNumber).show();
      currentStep = stepNumber;
      updateProgressBar();
    }
  }

  $(document).ready(function() {
    $('#multi-step-form').find('.step').slice(1).hide();
    
  
    $(".next-step").click(function() {
      var flag = true;
      var duration         = $("#duration").val();
      var order_type         = $("#order_type").val();
      alert(order_type);
      
      if(duration=='')
      { 
        $("#error_message_duration").show();
        flag=false;
      }
      if(order_type=='')
      { 
        $("#error_message_order_type").show();
        flag=false;
      }
      if(flag) 
      {
        if (currentStep < 3) {
          $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
          currentStep++;
          setTimeout(function() {
            $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
            $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
            updateProgressBar();
          }, 500);
        }
      }
    });

    $(".prev-step").click(function() {
      if (currentStep > 1) {
        $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
        currentStep--;
        setTimeout(function() {
          $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
          $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
          updateProgressBar();
        }, 500);
      }
    });

    updateProgressBar = function() {
      var progressPercentage = ((currentStep - 1) / 2) * 100;
      $(".progress-bar").css("width", progressPercentage + "%");
    }
  });
  </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ0FX4PX3pqB6lApllDjzjs3JXgBiNHqc&libraries=places"></script>
        <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('searchTextField');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['aus']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

      <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('dropup_address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
                       autocomplete.setComponentRestrictions({'country': ['aus']});
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>

      
