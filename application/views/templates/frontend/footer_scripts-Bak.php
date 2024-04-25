<!-- JavaScript Libraries -->
<script src="<?=base_url('assets/frontend/lib/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/jquery/jquery-migrate.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/easing/easing.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/mobile-nav/mobile-nav.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/wow/wow.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/waypoints/waypoints.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/counterup/counterup.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/owlcarousel/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/isotope/isotope.pkgd.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/lib/lightbox/js/lightbox.min.js')?>"></script>
<!-- Calendar File -->
<script src="<?=base_url('assets/frontend/js/evo-calendar.js')?>" ></script>
<script>
$('#evoCalendar').evoCalendar({
    todayHighlight: true,
    sidebarToggler: true,
    eventListToggler: true,
    canAddEvent: false,
    calendarEvents: [
        { name: "New Year", date: "Wed Jan 01 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        { name: "Valentine's Day", date: "Fri Feb 14 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        { name: "Patient #1", date: "February/3/2020", type: "event" },
        { name: "Patient #3", date: "February/3/2020", type: "event" },
        { name: "Patient #4", date: "February/3/2020", type: "event" },
        { name: "Holiday #3", date: "February/3/2020", type: "holiday" },
        { name: "Birthday #2", date: "February/3/2020", type: "birthday" },
        { name: "Author's Birthday", date: "February/15/2020", type: "birthday", everyYear: true },
        { name: "Holiday #4", date: "February/15/2020", type: "event" },
        { name: "Patient #2", date: "February/8/2020", type: "event" },
        { name: "Leap day", date: "February/29/2020", type: "holiday", everyYear: true }
    ],
    onSelectDate: function() {
        // console.log('onSelectDate!')
    },
    onAddEvent: function() {
        console.log('onAddEvent!')
    }
});
        // $("#evoCalendar").evoCalendar('addCalendarEvent', [...]);
</script>
<!-- Template Main Javascript File -->
 <script src="<?=base_url('assets/frontend/js/slick.min.js')?>"></script>
<script src="<?=base_url('assets/frontend/js/main.js')?>"></script>
<script src="<?=base_url('assets/frontend/js/intlTelInput.js')?>"></script>
<script>
    var input = document.querySelector("#phone");
	
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
<script>
//function runCommddand(){
  //alert( "Handler for .click() called." );
//};


</script>
<script>
 // Registration form step popup carousel  
  
  
  $(document).ready(function() {
  prep_modal();
});

function prep_modal()
{
  $(".modal").each(function() {

  var element = this;
	var pages = $(this).find('.modal-split');

  if (pages.length != 0)
  {
    	pages.hide();
    	pages.eq(0).show();

    	var b_button = document.createElement("button");
                b_button.setAttribute("type","button");
          			b_button.setAttribute("class","signupbtn");
          			b_button.setAttribute("style","display: none;");
          			b_button.innerHTML = "Back";

    	var n_button = document.createElement("button");
                n_button.setAttribute("type","button" );
          			//n_button.setAttribute("class","signupbtn");
                                //n_button.setAttribute("id","registration");
          			//n_button.innerHTML = "Next";
                                 n_button.setAttribute("type","button" );
          			n_button.setAttribute("class","signupbtn");
                                n_button.setAttribute("id","register_next");
                                //n_button.setAttribute("onclick", "runCommddand();");
          			n_button.innerHTML = "Next";

    	$(this).find('.modal-footer').append(b_button).append(n_button);


    	var page_track = 0;

    	$(n_button).click(function() { 
        var fname      = $("#fname").val();
        var lname      = $("#lname").val();
        var email      = $("#email").val();
        var phone      = $("#phone").val();
        var country      = $("#country").val();
        var state      = $("#state").val();
        var city      = $("#city").val();
        var address      = $("#address").val();
        var month      = $("#month").val();
        var day      = $("#day").val();
        var year      = $("#year").val();
        var colleague      = $("#colleague").val();
        var google      = $("#google").val();
        var blog      = $("#blog").val();
        var article      = $("#article").val();
        
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        var flag       = true;
        if(fname==""){ 
        
        $('#fname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(lname==""){ 
        
        $('#lname').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(!pattern.test(email)) {
        $('#email').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(phone==""){ 
        
       $('#phone').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(country==""){ 
        $('#country').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(state==""){ 
        $('#state').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(city==""){ 
        $('#city').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        
        if(address==""){ 
        $('#address').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(month==""){ 
        $('#month').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(day==""){ 
        $('#day').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
        if(year==""){ 
        $('#year').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
        flag = false;
        }
       
        if(flag) 
        {
        this.blur();

    		if(page_track == 0)
    		{
    		$(b_button).show();
    		}

    		if(page_track == pages.length-2)
    		{
    			//$(n_button).text("Submit");
                        n_button.setAttribute("type","button" );
          			n_button.setAttribute("class","signupbtn");
                                n_button.setAttribute("id","registration_sub");
                               //n_button.setAttribute("onclick", "runCommand();");
          			n_button.innerHTML = "Submit";
    		}

        if(page_track == pages.length-1)
        { 
            var fname      = $("#fname").val();
          
            var lname      = $("#lname").val();
            var email      = $("#email").val();
            var phone      = $("#phone").val();
            var country      = $("#country").val();
            var state      = $("#state").val();
            var city      = $("#city").val();
            var address      = $("#address").val();
            var month      = $("#month").val();
            var day      = $("#day").val();
            var year      = $("#year").val();
            var colleague      = $("#colleague").val();
            var google      = $("#google").val();
            var blog      = $("#blog").val();
            var article      = $("#article").val(); 
            var member_1      = $("#member_1").val(); 
            var member_2      = $("#member_2").val(); 
            var flag       = true;
            if(!$("#member_1").prop("checked")){
            $('#member_1').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
            if(!$("#member_2").prop("checked")){
            $('#member_2').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
            flag = false;
            }
          //$(element).find("form").submit();
            if(flag) 
            { 
               var fd = new FormData();
var data = jQuery('#registration_form').serializeArray();
jQuery.each(data,function(key,input){
    fd.append(input.name,input.value);
});
jQuery.ajax({
    type: 'POST',
    url: '<?=base_url('Frontend/saveRegistration')?>',
    data: fd,
    contentType: false,
    processData: false,
    beforeSend: function(){
        // Show image container
        $("#loader").show();
     },
    
    success: function (result) {
        console.log(result);
        //$("#loader").hide();
        jQuery("#sucess_message").html(result);
          setTimeout(function(){
            window.location.href = '<?=base_url()?>';
         }, 4000);
           
      },
        complete:function(data){
        // Hide image container
        $("#loader").hide();
       },
        error: function () {
             jQuery("#error_message").html(result);
        }
}); 
            }
        }

    		if(page_track < pages.length-1)
    		{
    			page_track++;

    			pages.hide();
    			pages.eq(page_track).show();
    		}
            }

    	});

    	$(b_button).click(function() { 

    		if(page_track == 1)
    		{
    			$(b_button).hide();
    		}

    		if(page_track == pages.length-1)
    		{
    			//$(n_button).text("Next");
                        n_button.setAttribute("type","button" );
          			n_button.setAttribute("class","signupbtn");
                                n_button.setAttribute("id","register_next");
                                //n_button.setAttribute("onclick", "runCommddand();");
          			n_button.innerHTML = "Next";
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
</script>
<script>
function sign_in(){ 
var user      = $("#username").val();
var pass      = $("#password").val();
var flag       = true;     

if(user==""){ 
    $('#username').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
    flag = false;
}
if(pass==""){ 
    $('#password').attr('style', 'border-color:red !important; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%), 0 0 8px rgb(255 0 0 / 60%);');
    flag = false;
}

if(flag) 
{

var fd = new FormData();
var data = jQuery('#login_form').serializeArray();
jQuery.each(data,function(key,input){
    fd.append(input.name,input.value);
});
jQuery.ajax({
    type: 'POST',
    url: '<?=base_url('Frontend/login')?>',
    data: fd,
    contentType: false,
    processData: false,
    beforeSend: function(){
        // Show image container
        $("#loader_login").show();
     },
    /*success: function(response){

        console.log(response);
    }*/
    success: function (result) {
        console.log(result);
        if(result=='success') 
        {    
         $("#sucess_message_login").show();
         $("#error_message_login").hide();
         setTimeout(function(){
          window.location.href = '<?=base_url('user-dashboard')?>';
         }, 2000);
        }
        if(result=='fail') 
        {    
        $("#error_message_login").show();
        $("#sucess_message_login").hide();
        }
        
        
      },
        complete:function(data){
        // Hide image container
        $("#loader_login").hide();
       },
        error: function () {
             jQuery("#error_message_login").html(result);
        }
});
} 
}


</script>
</html>


