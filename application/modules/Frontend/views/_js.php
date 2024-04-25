<script>
    var input = document.querySelector("#member_phone");
	
    window.intlTelInput(input, {
     
      utilsScript: "build/js/utils.js",
    });
  </script>
  
   
    <script>
  // Prevent modal on top of modal while maintaining dismissibility. 
// If a sub-modal is dismissed the original modal is reopened.
$('.modal [data-toggle="modal"]').on('click', function() {
  var curModal = $(this).closest('.modal');
  var nextModal = $($(this).attr('data-target'));

  if (curModal != nextModal) {
    curModal.modal('hide');
    nextModal.on('hide.bs.modal', function() {
      //curModal.modal('show');
    });
  }
});
</script> 

<script>
$(document).ready(function() {
  prep_modal_apply();
});

function prep_modal_apply()
{
  $(".apply_projects").each(function() {

  var element = this;
	var pages = $(this).find('.modal-split');

  if (pages.length != 0)
  {
    	pages.hide();
    	pages.eq(0).show();

    	var b_button_project = document.createElement("button");
                b_button_project.setAttribute("type","button");
          			b_button_project.setAttribute("class","signupbtn");
          			b_button_project.setAttribute("style","display: none;");
          			b_button_project.innerHTML = "Back";

    	var n_button_project = document.createElement("button");
                n_button_project.setAttribute("type","button");
          			//n_button_project.setAttribute("class","signupbtn");
          			//n_button_project.innerHTML = "Next";
                                
                                n_button_project.setAttribute("type","button" );
          			n_button_project.setAttribute("class","signupbtn");
                                n_button_project.setAttribute("id","register_next");
                                //n_button.setAttribute("onclick", "runCommddand();");
          			n_button_project.innerHTML = "Next";                               
                                                                    
    	$(this).find('.modal-footer').append(b_button_project).append(n_button_project);


    	var page_track = 0;
        
    	$(n_button_project).click(function() {
            var member_id  = $("#member_id").val();
            var fname      = $("#member_fname").val();
            var lname      = $("#member_lname").val();
            var email      = $("#member_email").val();
            var phone      = $("#member_phone").val();
            var country    = $("#member_country").val();
            var state      = $("#member_state").val();
            var city       = $("#member_city").val();
            var address    = $("#member_address").val();
            var address    = $("#member_address").val();
            
            
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
            var flag       = true;
            if(member_id==""){ 
            $('#member_id').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(fname==""){ 
            $('#member_fname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(fname==""){ 
            $('#member_fname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(lname==""){ 
            $('#member_lname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(!pattern.test(email)) {
            $('#member_email').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(phone==""){ 
            $('#member_member_phone').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(country==""){ 
            $('#member_country').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(state==""){ 
            $('#member_state').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(city==""){ 
            $('#member_city').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            
            
           if(flag) 
            { 
            this.blur();
                //alert(page_track);
                 
    		if(page_track == 0)
    		{ 
    			$(b_button_project).show();
    		}
                
               
    		/*if(page_track == pages.length-2)
    		{
    			//$(n_button_project).text("Submit");
                       
                        n_button_project.setAttribute("type","button" );
                        n_button_project.setAttribute("class","signupbtn");
                        n_button_project.setAttribute("id","registration_sub");
                       //n_button.setAttribute("onclick", "runCommand();");
                        n_button_project.innerHTML = "Submit";
    		}*/
                
               
    		if(page_track < pages.length-2)
    		{ 
    			page_track++;

    			pages.hide();
    			pages.eq(page_track).show();
    		}
            }
            if(page_track == 1)
    		{   
                    var student_fname    = $("#student_fname").val();
                    var student_lname    = $("#student_lname").val();
                    var flag       = true;
                   if(student_fname==""){ 
                    $('#student_fname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
                    flag = false;
                    }
                    if(student_lname==""){ 
                    $('#student_lname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
                    flag = false;
                    }
                    if(flag) 
                    { 
                       
                        if(page_track == pages.length-2)
                        {
    			//$(n_button_project).text("Submit");
                       
                        n_button_project.setAttribute("type","button" );
                        n_button_project.setAttribute("class","signupbtn");
                        n_button_project.setAttribute("id","registration_sub");
                        //n_button.setAttribute("onclick", "applyprojects();");
                        //n_button_project.setAttribute("onclick", function() { applyprojects() });
                         n_button_project.setAttribute('onclick','applyprojects();');
                        n_button_project.innerHTML = "Submit";
                        }
                       if(page_track < pages.length-1)
                        {
    			page_track++;
                        pages.hide();
    			pages.eq(page_track).show();
                        }
                        
                         if(page_track == pages.length-1) {
                             
                         }
                    }
    		} 

    	});

    	$(b_button_project).click(function() {
       

    		if(page_track == 1)
    		{
    			$(b_button_project).hide();
    		}

    		if(page_track == pages.length-1)
    		{
    			//$(n_button_project).text("Next");
                        n_button_project.setAttribute("type","button" );
          			n_button_project.setAttribute("class","signupbtn");
                                n_button_project.setAttribute("id","register_next");
                                //n_button.setAttribute("onclick", "runCommddand();");
          			n_button_project.innerHTML = "Next";
    		}
                
    		if(page_track > 0)
    		{
    			page_track--;

    			pages.hide();
    			pages.eq(page_track).show();
    		}


    	});

  }

  });
}
function applyprojects() 
{ 
var fd = new FormData();
var data = jQuery('#apply_projects').serializeArray();
jQuery.each(data,function(key,input){
    fd.append(input.name,input.value);
});
jQuery.ajax({
    type: 'POST',
    url: '<?=base_url('Frontend/saveApplyProjects')?>',
    data: fd,
    contentType: false,
    processData: false,
    beforeSend: function(){
        // Show image container
        $("#loader_apply").show();
     },

    success: function (result) {
        result = jQuery.parseJSON(result); 
        console.log(result);
        jQuery("#sucess_message_applysave").html(result);
        if(result.status==0){
          jQuery("#error_message_applysave").html('The form was not sent sucessfully...'); 
         
        }
      else {
          jQuery("#suscess_message_applysave").html('Thank you for filling out your information!');
          $("#loader_apply").hide();
          setTimeout(function(){
            window.location.href = '<?=current_url()?>';
         }, 2000);
       }
        
       
}
});
}
</script>

<script>
//////////////////// For Duplicate Email Checking ///////////////////////////

    $('#member_id').on('blur', function(){ 
        
    var member_id   = jQuery("#member_id").val(); 
    //alert(member_id);
    jQuery.ajax({
    type: 'POST',    
    url: '<?=base_url('Frontend/checkValidationmemberID')?>'+'/'+member_id,
    success: function (result) {
        result = jQuery.parseJSON(result); 
        console.log(result);
        //jQuery("#error_message_member_id").html(result);
         if(result.status==0){
          jQuery("#error_message_member_id").html('Invalid Membership ID'); 
          $(':input[type="button"]').prop('disabled', true);
        }
      else {
          jQuery("#error_message_member_id").html(''); 
         var fname     =   result.data.fname;
         var email     =   result.data.email;
         var phone     =   result.data.phone;
         var country   =   result.data.country;
         var state     =   result.data.state;
         var city      =   result.data.city;
         var address   =   result.data.school_address;
         var state     =   result.data.state;
         
          jQuery("#member_fname").val(fname);
          jQuery("#member_email").val(email);
          jQuery("#member_phone").val(phone);
          jQuery("#member_country").val(country);
          jQuery("#member_state").val(state);
          jQuery("#member_city").val(city);
          jQuery("#member_address").val(address);
          jQuery("#member_state").val(state);
          $(':input[type="button"]').prop('disabled', false);
      }
      
    }
    
    });
  });
</script> 

<script>
 $(document).ready(function() {
    $("body").on("click",".add-more",function(){ 
        var html = $(".after-add-more").first().clone();
      
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
      
          $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a href='#' class=' remove'>- Remove Student</a>");
      
      
        $(".after-add-more").last().after(html);
      
     
       
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".after-add-more").remove();
    });
});   
</script>