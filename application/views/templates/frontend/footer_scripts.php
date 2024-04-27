
<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>

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
			//GET ONE WAY DATA
			var one_order_type            		=      $("#one_order_type").val();
			var one_pickup_date_time      		=      $("#one_pickup_date_time").val();
			var one_pickup_address_type   		=      $('input[name="one_pickup_address_type"]:checked').val();
			var one_pickup_address        		=      $("#one_pickup_address").val();
			var one_dropup_address_type   		=      $("#one_dropup_address_type").val();
			var one_dropup_address        		=      $("#one_dropup_address").val();
			var one_passenger_count       		=      $("#one_passenger_count").val();
			//GET ONE RETURN DATA
			var return_order_type               =      $("#return_order_type").val();
			var return_one_pickup_date_time     =      $("#return_one_pickup_date_time").val();
			var return_one_pickup_address_type  =      $('input[name="return_one_pickup_address_type"]:checked').val();
			var return_one_pickup_address       =      $("#return_one_pickup_address").val();
			var return_one_dropup_address_type  =      $("#return_one_dropup_address_type").val();
			var return_one_dropup_address       =      $("#return_one_dropup_address").val();
			var return_one_passenger_count      =      $("#return_one_passenger_count").val();

			var return_two_pickup_date_time     =      $("#return_two_pickup_date_time").val();
			var return_two_pickup_address_type  =      $('input[name="return_two_pickup_address_type"]:checked').val();
			var return_two_pickup_address       =      $("#return_two_pickup_address").val();
			var return_two_dropup_address_type  =      $("#return_two_dropup_address_type").val();
			var return_two_dropup_address       =      $("#return_two_dropup_address").val();
			var return_two_passenger_count      =      $("#return_two_passenger_count").val();
			

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
				

				$('#date-time-final').text(hour_pickup_date_time);
				$('#date-time-review').text(hour_pickup_date_time);
				$('#pickup-review').text(hour_pickup_address);
				$('#dropup-review').text(hour_dropup_address);
				$('#passenger-count-review').text(hour_passenger_count);
		
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

				$('#date-time-final').text(one_pickup_date_time);
				$('#date-time-review').text(one_pickup_date_time);
				$('#pickup-review').text(one_pickup_address);
				$('#dropup-review').text(one_dropup_address);
				$('#passenger-count-review').text(one_passenger_count);

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
			
			var return_one_dropup_address_type  =      $("#return_one_dropup_address_type").val();
			var return_one_dropup_address       =      $("#return_one_dropup_address").val();
			var return_one_passenger_count      =      $("#return_one_passenger_count").val();

			var return_two_pickup_date_time     =      $("#return_two_pickup_date_time").val();
			var return_two_pickup_address_type  =      $('input[name="return_two_pickup_address_type"]:checked').val();
			var return_two_pickup_address       =      $("#return_two_pickup_address").val();
			var return_two_dropup_address_type  =      $("#return_two_dropup_address_type").val();
			var return_two_dropup_address       =      $("#return_two_dropup_address").val();
			var return_two_passenger_count      =      $("#return_two_passenger_count").val();
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

</html>