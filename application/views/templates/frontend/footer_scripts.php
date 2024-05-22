
<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyCQ0FX4PX3pqB6lApllDjzjs3JXgBiNHqc"></script>
<!-- Template Main Javascript File -->
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

			//GET HOUR DATA
			var duration                   		=      $("#duration").val();
			var hour_order_type            		=      $("#hour_order_type").val();
			var hour_pickup_date_time      		=      $("#hour_pickup_date_time").val();
			var hour_pickup_address_type   		=      $('input[name="hour_pickup_address_type"]:checked').val();
			var hour_pickup_address        		=      $("#hour_pickup_address").val();
			var hour_dropup_address_type   		=      $("#hour_dropup_address_type").val();
			var hour_dropup_address        		=      $("#hour_dropup_address").val();
			var hour_passenger_count       		=      $("#hour_passenger_count").val();
			var hour_flight_number        		=      $("#hour_flight_number").val();
			var hour_wait_time       		    =      $("#hour_wait_time").val();
			var hour_terminal       		    =      $("#hour_terminal").val();
			//GET ONE WAY DATA
			var one_order_type            		=      $("#one_order_type").val();
			var one_pickup_date_time      		=      $("#one_pickup_date_time").val();
			var one_pickup_address_type   		=      $('input[name="one_pickup_address_type"]:checked').val();
			var one_pickup_address        		=      $("#one_pickup_address").val();
			var one_dropup_address_type   		=      $("#one_dropup_address_type").val();
			var one_dropup_address        		=      $("#one_dropup_address").val();
			var one_passenger_count       		=      $("#one_passenger_count").val();
			var one_flight_number        		=      $("#one_flight_number").val();
			var one_wait_time       		    =      $("#one_wait_time").val();
			var one_terminal       		        =      $("#one_terminal").val();
			
			//GET ONE RETURN DATA
			var return_order_type               =      $("#return_order_type").val();
			var return_one_pickup_date_time     =      $("#return_one_pickup_date_time").val();
			var return_one_pickup_address_type  =      $('input[name="return_one_pickup_address_type"]:checked').val();
			var return_one_pickup_address       =      $("#return_one_pickup_address").val();
			var return_one_dropup_address_type  =      $("#return_one_dropup_address_type").val();
			var return_one_dropup_address       =      $("#return_one_dropup_address").val();
			var return_one_passenger_count      =      $("#return_one_passenger_count").val();
			var return_one_flight_number        =      $("#return_one_flight_number").val();
			var return_one_wait_time       		=      $("#return_one_wait_time").val();
			var return_one_terminal       		=      $("#return_one_terminal").val();

			var return_two_pickup_date_time     =      $("#return_two_pickup_date_time").val();
			var return_two_pickup_address_type  =      $('input[name="return_two_pickup_address_type"]:checked').val();
			var return_two_pickup_address       =      $("#return_two_pickup_address").val();
			var return_two_dropup_address_type  =      $("#return_two_dropup_address_type").val();
			var return_two_dropup_address       =      $("#return_two_dropup_address").val();
			var return_two_passenger_count      =      $("#return_two_passenger_count").val();
			var return_two_flight_number        =      $("#return_two_flight_number").val();
			var return_two_wait_time       		=      $("#return_two_wait_time").val();
			var return_two_terminal       		=      $("#return_two_terminal").val();
			

			var trip_type =  $('#trip_type').val();
		
			if(trip_type == 1){

				if(duration=='')
				{ 
					$("#error_message_duration").show();
					flag=false;
				}
				if(hour_order_type=='')
				{ 
					$("#error_message_hour_order_type").show();
					flag=false;
				}
				if(hour_pickup_date_time=='')
				{ 
					$("#error_message_hour_pickup_date_time").show();
					flag=false;
				}
				if(hour_pickup_address=='')
				{ 
					$("#error_message_hour_pickup_address").show();
					flag=false;
				}
				if(hour_dropup_address=='')
				{ 
					$("#error_message_hour_dropup_address").show();
					flag=false;
				}
				if(hour_passenger_count=='')
				{ 
					$("#error_message_hour_passenger_count").show();
					flag=false;
				}
				if(hour_pickup_address_type == 'airport')
				{ 
					if(hour_flight_number=='')
					{ 
						$("#error_message_hour_flight_number").show();
						flag=false;
					}
					if(hour_wait_time=='')
					{ 
						$("#error_message_hour_wait_time").show();
						flag=false;
					}
				}
				// for second step
				var hour_date_time = moment(hour_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				console.log(hour_date_time);
				$('#pickup-step2').text(hour_pickup_address);
				$('#dropup-step2').text(hour_dropup_address);
				$('#passenger-count-step2').text(hour_passenger_count);
				$('#duration-step2').text(duration);
				$('#date-time-step2').text(hour_date_time);
				$('#duration-div-step2').css('display','block');
				$('#return-div-step2').css('display','none');
				// for review page
				$('#date-time-final').text(hour_pickup_date_time);
				$('#date-time-review').text(hour_pickup_date_time);
				$('#pickup-review').text(hour_pickup_address);
				$('#dropup-review').text(hour_dropup_address);
				$('#passenger-count-review').text(hour_passenger_count);
				$('#passenger-count-icon').text(hour_passenger_count);
				$('#duration-review').text(duration);

				//var hour_date_time = moment(hour_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				console.log(hour_date_time);
				$('#date-time-final').text(hour_date_time);
				$('#date-time-review').text(hour_date_time);

				getDistance(hour_pickup_address,hour_dropup_address);
				$('#date-time-return-final').text(return_two_pickup_date_time);
			}else if(trip_type == 2){
				
				if(one_order_type=='')
				{ 
					$("#error_message_one_order_type").show();
					flag=false;
				}
				if(one_pickup_date_time=='')
				{ 
					$("#error_message_one_pickup_date_time").show();
					flag=false;
				}
				if(one_pickup_address=='')
				{ 
					$("#error_message_one_pickup_address").show();
					flag=false;
				}
				if(one_dropup_address=='')
				{ 
					$("#error_message_one_dropup_address").show();
					flag=false;
				}
				if(one_passenger_count=='')
				{ 
					$("#error_message_one_passenger_count").show();
					flag=false;
				}
				if(one_pickup_address_type == 'airport')
				{ 
					if(one_flight_number=='')
					{ 
						$("#error_message_one_flight_number").show();
						flag=false;
					}
					if(one_wait_time=='')
					{ 
						$("#error_message_one_wait_time").show();
						flag=false;
					}
				}
				// for second step
				var one_date_time = moment(one_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				console.log(one_date_time);
				$('#pickup-step2').text(one_pickup_address);
				$('#dropup-step2').text(one_dropup_address);
				$('#passenger-count-step2').text(one_passenger_count);
				$('#duration-step2').text(duration);
				$('#date-time-step2').text(one_date_time);
				$('#duration-div-step2').css('display','none');
				$('#return-div-step2').css('display','none');
				// for review page
				$('#date-time-final').text(one_pickup_date_time);
				$('#date-time-review').text(one_pickup_date_time);
				$('#pickup-review').text(one_pickup_address);
				$('#dropup-review').text(one_dropup_address);
				$('#passenger-count-review').text(one_passenger_count);
				$('#passenger-count-icon').text(one_passenger_count);

				//var one_date_time = moment(one_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				console.log(one_date_time);
				$('#date-time-final').text(one_date_time);
				$('#date-time-review').text(one_date_time);
				getDistance(one_pickup_address,one_dropup_address);
				$('#date-time-return-final').text(return_two_pickup_date_time);
			}else{
				
				if(return_order_type=='')
				{ 
					$("#error_message_return_order_type").show();
					flag=false;
				}
				if(return_one_pickup_date_time=='')
				{ 
					$("#error_message_return_one_pickup_date_time").show();
					flag=false;
				}
				if(return_one_pickup_address_type=='')
				{ 
					$("#error_message_return_one_pickup_address_type").show();
					flag=false;
				}
				if(return_one_pickup_address=='')
				{ 
					$("#error_message_return_one_pickup_address").show();
					flag=false;
				}
				if(return_one_dropup_address_type=='')
				{ 
					$("#error_message_return_one_dropup_address_type").show();
					flag=false;
				}
				if(return_one_dropup_address=='')
				{ 
					$("#error_message_return_one_dropup_address").show();
					flag=false;
				}
				if(return_one_passenger_count=='')
				{ 
					$("#error_message_return_one_passenger_count").show();
					flag=false;
				}

				if(return_two_pickup_date_time=='')
				{ 
					$("#error_message_return_two_pickup_date_time").show();
					flag=false;
				}
				if(return_two_pickup_address_type=='')
				{ 
					$("#error_message_return_two_pickup_address_type").show();
					flag=false;
				}
				if(return_two_pickup_address=='')
				{ 
					$("#error_message_return_two_pickup_address").show();
					flag=false;
				}
				if(return_two_dropup_address_type=='')
				{ 
					$("#error_message_return_two_dropup_address_type").show();
					flag=false;
				}
				if(return_two_dropup_address=='')
				{ 
					$("#error_message_return_two_dropup_address").show();
					flag=false;
				}
				if(return_two_passenger_count=='')
				{ 
					$("#error_message_return_two_passenger_count").show();
					flag=false;
				}
				if ((Date.parse(return_two_pickup_date_time) <= Date.parse(return_one_pickup_date_time))) {
					//alert("End date should be greater than Start date");
					$("#error_message_return_two_pickup_date_time_invalid").show();
					flag=false;
				}

				if(return_one_pickup_address_type == 'airport')
				{ 
					if(return_one_flight_number=='')
					{ 
						$("#error_message_return_one_flight_number").show();
						flag=false;
					}
					if(return_one_wait_time=='')
					{ 
						$("#error_message_return_one_wait_time").show();
						flag=false;
					}
				}
				if(return_two_pickup_address_type == 'airport')
				{ 
					if(return_two_flight_number=='')
					{ 
						$("#error_message_return_two_flight_number").show();
						flag=false;
					}
					if(return_two_wait_time=='')
					{ 
						$("#error_message_return_two_wait_time").show();
						flag=false;
					}
				}
				
				// var return_order_type               =      $("#return_order_type").val();
				// var return_one_pickup_date_time     =      $("#return_one_pickup_date_time").val();
				// var return_one_pickup_address_type  =      $('input[name="return_one_pickup_address_type"]:checked').val();
				// var return_one_pickup_address       =      $("#return_one_pickup_address").val();
				// var return_one_dropup_address_type  =      $("#return_one_dropup_address_type").val();
				// var return_one_dropup_address       =      $("#return_one_dropup_address").val();
				// var return_one_passenger_count      =      $("#return_one_passenger_count").val();

				// var return_two_pickup_date_time     =      $("#return_two_pickup_date_time").val();
				// var return_two_pickup_address_type  =      $('input[name="return_two_pickup_address_type"]:checked').val();
				// var return_two_pickup_address       =      $("#return_two_pickup_address").val();
				// var return_two_dropup_address_type  =      $("#return_two_dropup_address_type").val();
				// var return_two_dropup_address       =      $("#return_two_dropup_address").val();
				// var return_two_passenger_count      =      $("#return_two_passenger_count").val();
			
				// for second step
				var return_one_pickup_date_time = moment(return_one_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				var return_two_pickup_date_time = moment(return_two_pickup_date_time).format('MMMM Do YYYY, h:mm A');
				//console.log(one_date_time);
				$('#pickup-step2').text(return_one_pickup_address);
				$('#dropup-step2').text(return_one_dropup_address);
				$('#passenger-count-step2').text(return_one_passenger_count);
				$('#date-time-step2').text(return_one_pickup_date_time);
				$('#duration-div-step2').css('display','none');
				$('#return-div-step2').css('display','block');
				$('#return-date-time-step2').text(return_two_pickup_date_time);
				// for review page
				$('#date-time-final').text(return_one_pickup_date_time);
				$('#date-time-return-final').text(return_two_pickup_date_time);
				$('#date-time-review').text(return_one_pickup_date_time);
				$('#pickup-review').text(return_one_pickup_address);
				$('#dropup-review').text(return_one_dropup_address);
				$('#passenger-count-review').text(return_one_passenger_count);
				$('#passenger-count-icon').text(return_one_passenger_count);
				//$('#date-time-final').text(one_date_time);
				//$('#date-time-review').text(one_date_time);
				getDistance(return_one_pickup_address,return_one_dropup_address);
				getDistanceReturn(return_two_pickup_address,return_two_dropup_address);
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

		$(".choose-vehicle").click(function() {
		  var service_fee = $("#service_fee").val();
		  var vehicle_id = $(this).attr('vid');
          var vehicle_type = $(this).attr('vtype');
		  var vehicle_make = $(this).attr('vmake');
		  var pcapacity = $(this).attr('pcapacity');
		  var multimedia = $(this).attr('multimedia');
		  var vehicle_fare = $(this).attr('vfare');
		  var return_vehicle_fare = $(this).attr('rvfare');
		  var total_fare_value = parseFloat(vehicle_fare) + parseFloat(service_fee);
		  var total_fare  = total_fare_value.toFixed(2);

		  var total_fare_value_return = parseFloat(return_vehicle_fare) + parseFloat(service_fee);
		  var total_fare_return  = total_fare_value_return.toFixed(2);

		  $("#vehicle_id").val(vehicle_id);
		  $("#vehicle-type-review").text(vehicle_type);
		  $("#vehicle-make-review").text(vehicle_make);
		  $("#vehicle-pnr-capacity").text(pcapacity);
		  $('#fare').val(vehicle_fare);
		  $('#fare_return').val(return_vehicle_fare);
		  $('#vehicle-price-show-review-step').text("$"+vehicle_fare);
		  $('#service_fee_review').text("$"+service_fee);
		  $('#total_fare_review').text("$"+total_fare);
		  $('#total_fare').val(total_fare);
		  $('#service_charge').val(service_fee);
		  $('#total_fare_return').val(total_fare_return);
        });
    });
	// GET DISTANCE API
	function getDistance(origin,destination){
		
        service = new google.maps.DistanceMatrixService();
         
        service.getDistanceMatrix(
             {
                 origins: [origin],
                 destinations: [destination],
                 travelMode: google.maps.TravelMode.DRIVING
                // avoidHighways: false,
                // avoidTolls: false
             }, 
             callback
         );
         
         function callback(response, status) {
			console.log(response);
            // var orig = document.getElementById("orig"),
               //  dest = document.getElementById("dest"),
                var dist = document.getElementById("distance");
                 //duration = document.getElementById("duration");
         
            if(status=="OK") {
                 //dest.value = response.destinationAddresses[0];
                 //orig.value = response.originAddresses[0];
				 //duration.value = response.rows[0].elements[0].duration.text;
				 var distance_with_km = response.rows[0].elements[0].distance.text;
				 var distance_without_km = distance_with_km.replace(' km','');
				 var distance = parseFloat(distance_without_km.replaceAll(",", ""));
                 dist.value = distance;
                 
				$('[name^="cars"]').each(function(){ 
					var distance = $('#distance').val();
					var duration = $('#duration').val();
					var cid = $(this).attr("cid");
					var choose_your_weekend = $('#choose_your_weekend'+cid).val();
					var weekday_hourly_rate = $('#weekday_hourly_rate'+cid).val();
					var weekend_hourly_rate = $('#weekend_hourly_rate'+cid).val();
					var trip_rate_per_km    = $('#trip_rate_per_km'+cid).val();

					var trip_type =  $('#trip_type').val();
					if(trip_type == 1){
						var hour_pickup_date_time = $("#hour_pickup_date_time").val();
						var day_hour_date_time = moment(hour_pickup_date_time).format('dddd');
				    	var is_weekend = choose_your_weekend.indexOf(day_hour_date_time) != -1;
						
						if(is_weekend){
							var total_price = duration*weekend_hourly_rate;
							var price = total_price.toFixed(2);
							$('#vehicle-price-show-second-step'+cid).text("$"+price);
							$('#fare'+cid).attr("vfare",price);
						}else{
							var total_price = duration*weekday_hourly_rate;
							var price = total_price.toFixed(2);
							$('#vehicle-price-show-second-step'+cid).text("$"+price);
							$('#fare'+cid).attr("vfare",price);
						}
						
					}else if(trip_type == 2){
						//var one_pickup_date_time = $("#one_pickup_date_time").val();
						//var day_one_date_time = moment(one_pickup_date_time).format('dddd');
						//var is_weekend = choose_your_weekend.indexOf(day_one_date_time) != -1;

						//if(is_weekend){
							var total_price = distance*trip_rate_per_km;
							var price = total_price.toFixed(2);
							$('#vehicle-price-show-second-step'+cid).text("$"+price);
							$('#fare'+cid).attr("vfare",price);
						// }else{
						// 	var price = distance*trip_rate_per_km;
						// 	$('#vehicle-price-show-second-step'+cid).text("$"+price);
						// 	$('#fare'+cid).attr("vfare",price);
						// }

					}else{
						//var return_one_pickup_date_time= $("#return_one_pickup_date_time").val();
						//var day_return_one_pickup_date_time = moment(return_one_pickup_date_time).format('dddd');
						//var is_weekend = choose_your_weekend.indexOf(day_return_one_pickup_date_time) != -1;
						//if(is_weekend){
							var total_price = distance*trip_rate_per_km;
							var price = total_price.toFixed(2);
							$('#vehicle-price-show-second-step'+cid).text("$"+price);
							$('#fare'+cid).attr("vfare",price);
						// }else{
						// 	var price = distance*trip_rate_per_km;
						// 	$('#vehicle-price-show-second-step'+cid).text("$"+price);
						// 	$('#fare'+cid).attr("vfare",price);
						// }
					}

					// if(is_weekend){
					// 	var price = distance*weekend_hourly_rate;
					// 	$('#vehicle-price-show-second-step'+cid).text("$"+price);
					// 	$('#fare'+cid).attr("vfare",price);
					// }else{
					// 	var price = distance*weekday_hourly_rate;
					// 	$('#vehicle-price-show-second-step'+cid).text("$"+price);
					// 	$('#fare'+cid).attr("vfare",price);
					// }
					
				});
            } else {
                 alert("Error: " + status);
            }
         }
	}

	function getDistanceReturn(origin,destination){ 
		
        service = new google.maps.DistanceMatrixService();
         
        service.getDistanceMatrix(
             {
                 origins: [origin],
                 destinations: [destination],
                 travelMode: google.maps.TravelMode.DRIVING
                // avoidHighways: false,
                // avoidTolls: false
             }, 
             callback
         );
         
         function callback(response, status) {
			console.log(response);
                var return_distance = document.getElementById("return_distance");
         
            if(status=="OK") {
				 var distance_with_km = response.rows[0].elements[0].distance.text;
				 var distance_without_km = distance_with_km.replace(' km','');
				 var distance = parseFloat(distance_without_km.replaceAll(",", ""));
                 return_distance.value = distance;
                 
				$('[name^="cars"]').each(function(){ 
					var return_distance = $('#return_distance').val();
					var cid = $(this).attr("cid");
					var trip_rate_per_km = $('#trip_rate_per_km'+cid).val();

					var trip_type =  $('#trip_type').val();
					if(trip_type == 3){
						
						var total_price = return_distance*trip_rate_per_km;
						var price = total_price.toFixed(2);
						$('#fare'+cid).attr("rvfare",price);
						
					}
				});
            } else {
                 alert("Error: " + status);
            }
         }
	}

	// function changeForAddressType(param){ alert(this.value);
	// 	console.log(param);
	// }

	$('.pickup-check-address-type').click(function(){
		var pickup_address_type = $(this).val();
		var trip_type =  $('#trip_type').val();
		var is_return = $(this).attr('return');
		var airport_address =  $('#airport_address').val();
		//alert(pickup_address_type);
		if(trip_type == 1){
			if(pickup_address_type == 'airport'){
				$('#hour-flight-number_address-div').show();
				$('#hour-wait-time-div').show();
				$('#hour_pickup_address').val(airport_address);
				$('#hour_pickup_address_dummy').val(airport_address);
				$('#hour_pickup_address_div').hide();
				$('#hour_pickup_address_div_dummy').show();
				// $('#hour_pickup_address').attr("readonly","readonly");
				 $("#error_message_hour_pickup_address").hide();
				
				
			}else{
				$('#hour_pickup_address').val("");
				$('#hour_pickup_address_div').show();
				$('#hour_pickup_address_div_dummy').hide();
				//$('#hour_pickup_address').removeAttr('readonly');
				$('#hour_flight_number').val("");
				$('#hour_wait_time').val("");
				$('#hour-flight-number_address-div').hide();
				$('#hour-wait-time-div').hide();
			}
		}else if(trip_type == 2){
			if(pickup_address_type == 'airport'){
				$('#one-flight-number_address-div').show();
				$('#one-wait-time-div').show();
				$('#one_pickup_address').val(airport_address);
				//$('#one_pickup_address').attr("readonly","readonly");
				$('#one_pickup_address_dummy').val(airport_address);
				$('#one_pickup_address_div').hide();
				$('#one_pickup_address_div_dummy').show();
				$("#error_message_one_pickup_address").hide(); 
			}else{
				$('#one_pickup_address').val("");
				//$('#one_pickup_address').removeAttr('readonly');
				$('#one_pickup_address_div').show();
				$('#one_pickup_address_div_dummy').hide();
				$('#one_flight_number').val("");
				$('#one_wait_time').val("");
				$('#one-flight-number_address-div').hide();
				$('#one-wait-time-div').hide();
			}
		}else{
			if(is_return == 1){
				if(pickup_address_type == 'airport'){
					$('#return-two-flight-number_address-div').show();
					$('#return-two-wait-time-div').show();
					$('#return_two_pickup_address').val(airport_address);
					//$('#return_two_pickup_address').attr("readonly","readonly");
					$('#return_two_pickup_address_dummy').val(airport_address);
					$('#return_two_pickup_address_div').hide();
					$('#return_two_pickup_address_div_dummy').show();
					$("#error_message_return_two_pickup_address").hide(); 
				}else{
					$('#return_two_pickup_address').val("");
					//$('#return_two_pickup_address').removeAttr('readonly');
					$('#return_two_pickup_address_div').show();
					$('#return_two_pickup_address_div_dummy').hide();
					$('#return_two_flight_number').val("");
					$('#return_two_wait_time').val("");
					$('#return-two-flight-number_address-div').hide();
					$('#return-two-wait-time-div').hide();
				}
			}else{
				if(pickup_address_type == 'airport'){
					$('#return-one-flight-number_address-div').show();
					$('#return-one-wait-time-div').show();
					$('#return_one_pickup_address').val(airport_address);
					//$('#return_one_pickup_address').attr("readonly","readonly");
					$('#return_one_pickup_address_dummy').val(airport_address);
					$('#return_one_pickup_address_div').hide();
					$('#return_one_pickup_address_div_dummy').show();
					$("#error_message_return_one_pickup_address").hide(); 
				}else{
					$('#return_one_pickup_address').val("");
					//$('#return_one_pickup_address').removeAttr('readonly');
					$('#return_one_pickup_address_div').show();
					$('#return_one_pickup_address_div_dummy').hide();
					$('#return_one_flight_number').val("");
					$('#return_one_wait_time').val("");
					$('#return-one-flight-number_address-div').hide();
					$('#return-one-wait-time-div').hide();
				}
			}
			
		}
 	});


	$('.dropup-check-address-type').click(function(){
		var dropup_address_type = $(this).val();
		var trip_type =  $('#trip_type').val();
		var is_return = $(this).attr('return');
		var airport_address =  $('#airport_address').val();
		//alert(is_return);
		//alert(pickup_address_type);
		if(trip_type == 1){
			if(dropup_address_type == 'airport'){
				$('#hour-terminal-div').show();
				$('#hour_dropup_address').val(airport_address);
				//$('#hour_dropup_address').attr("readonly","readonly");  
				$('#hour_dropup_address_dummy').val(airport_address);
				$('#hour_dropup_address_div').hide();
				$('#hour_dropup_address_div_dummy').show();
				$("#error_message_hour_dropup_address").hide(); 
				
			}else{
				$('#hour_dropup_address').val("");
				//$('#hour_dropup_address').removeAttr('readonly');
				$('#hour_dropup_address_div').show();
				$('#hour_dropup_address_div_dummy').hide();
				$('#hour_terminal').val("");
				$('#hour-terminal-div').hide();
			}
		}else if(trip_type == 2){
			if(dropup_address_type == 'airport'){
				$('#one-terminal-div').show();
				$('#one_dropup_address').val(airport_address);
				//$('#one_dropup_address').attr("readonly","readonly");   
				$('#one_dropup_address_dummy').val(airport_address);
				$('#one_dropup_address_div').hide();
				$('#one_dropup_address_div_dummy').show();
				$("#error_message_one_dropup_address").hide(); 
			}else{
				$('#one_dropup_address').val("");
				//$('#one_dropup_address').removeAttr('readonly');
				$('#one_dropup_address_div').show();
				$('#one_dropup_address_div_dummy').hide();
				$('#one_terminal').val("");
				$('#one-terminal-div').hide();
			}
		}else{
			if(is_return == 1){

				if(dropup_address_type == 'airport'){
					$('#return-two-terminal-div').show();
					$('#return_two_dropup_address').val(airport_address);
					//$('#return_two_dropup_address').attr("readonly","readonly"); 
					$('#return_two_dropup_address_dummy').val(airport_address);
					$('#return_two_dropup_address_div').hide();
					$('#return_two_dropup_address_div_dummy').show();
					$("#error_message_return_two_dropup_address").hide();   
					
				}else{
					$('#return_two_dropup_address').val("");
					//$('#return_two_dropup_address').removeAttr('readonly');
					$('#return_two_dropup_address_div').show();
					$('#return_two_dropup_address_div_dummy').hide();
					$('#return_two_terminal').val("");
					$('#return-two-terminal-div').hide();
				}

			}else{
				if(dropup_address_type == 'airport'){
					$('#return-one-terminal-div').show();
					$('#return_one_dropup_address').val(airport_address);
					//$('#return_one_dropup_address').attr("readonly","readonly"); 
					$('#return_one_dropup_address_dummy').val(airport_address);
					$('#return_one_dropup_address_div').hide();
					$('#return_one_dropup_address_div_dummy').show();
					$("#error_message_return_one_dropup_address").hide();   
					
				}else{
					$('#return_one_dropup_address').val("");
					//$('#return_one_dropup_address').removeAttr('readonly');
					$('#return_one_dropup_address_div').show();
					$('#return_one_dropup_address_div_dummy').hide();
					$('#return_one_terminal').val("");
					$('#return-one-terminal-div').hide();
				}
			}
			
		}
 	});

</script>


</html>