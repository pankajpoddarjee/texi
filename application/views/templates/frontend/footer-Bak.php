<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3  col-sm-12 text-center">

                    <div class="footer-info">
                        <img src="<?=base_url('assets/frontend/img/footer-logo.png')?>" alt="Footer Logo" />
                    </div>

                    <div class="social-links">
                    <a href="#" class="facebook"><i class="fa fa-wechat"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-3  col-sm-12">
                    <div class="footer-links">
                        <ul>
                            <li><a href="<?=base_url('opportunities')?>">Opportunities</a></li>
                            <li><a href="<?=base_url('contact-us')?>">Contact Us</a></li>
                            <li><a href="<?=base_url('social-media-sharing')?>">Social Media Sharing</a></li>
                        </ul>
                    </div>




                </div>


                <div class="col-lg-3  col-sm-12">
                    <div class="footer-links">
                        <ul>
                            <li><a href="<?=base_url('terms-conditions')?>">Terms & Conditions</a></li>
                            <li><a href="<?=base_url('privacy-statement')?>">Privacy Statement</a></li>
                            <li><a href="<?=base_url('policy-regulations')?>">Policies & Regulations</a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-3  col-sm-12">
                    <div class="footer-contact ">
                        <h3>Contact Info</h3>
                        <p><img src="<?=base_url('assets/frontend/img/adr-ic.png')?>" alt="ic" /> 374 William S Canning Blvd, River <br> MA 2721, USA</p>
                        <p><img src="<?=base_url('assets/frontend/img/ph-ic.png')?>" alt="ic" /> (+880)155-69569</p>
                        <p><img src="<?=base_url('assets/frontend/img/email-ic.png')?>" alt="ic" /> support@sumen.com</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="copyright">
                    &copy; 2022 Sumen. All Rights Reserved.  
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="license">
                    <a href="#" class="readmore">Licensing Details</a>
                </div>
            </div>


        </div>


    </div>
</footer><!-- #footer -->
 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
 
 <!-- Header Registration Form Modal -->
<div class="modal fade" id="registrationFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>


</div>
<form id="registration_form" method="post" name="frm1">
    <div class="modal-body">

    <div class="modal-split">
    <div class="form-holder">
    <h3>Register Now</h3>
    <p>Please fill in this form to create an account.</p>
    
    <div class="row">
    <div class="col-lg-6 col-md-12">
    <div class="form-group">
    <label for="firstname">First Name*</label>
    <input type="text" name="firstname" id="fname"  placeholder="" >
    </div></div>

    <div class="col-lg-6 col-md-12">
    <div class="form-group">
    <label for="lastname">Last Name*</label>
    <input type="text" name="lastname" id="lname" placeholder="" >
    </div></div>

    <div class="col-lg-12">
    <div class="form-group">
    <label for="email">Email*</label>
    <input type="text" placeholder="" id="email" name="email" >
    </div></div>


    <div class="col-lg-12">
    <div class="form-group">
    <label for="phone">Phone Number*</label>
    <br>
    <input id="phone" name="phone" id="phone" type="tel">
    </div>
    </div>

    <div class="col-lg-6 col-md-12">
    <div class="form-group">
    <label for="country">Country*</label>
    <input type="text" name="country" id="country" placeholder="" >
    </div></div>


    <div class="col-lg-6 col-md-12">
    <div class="form-group">
    <label for="state">State / Province*</label>
    <input type="text" name="state" id="state" placeholder="" >
    </div></div>



    <div class="col-lg-12 col-md-12">
    <div class="form-group">
    <label for="city">City*</label>
    <input type="text" name="city" id="city" placeholder="" >
    </div></div>



    <div class="col-lg-12">
    <div class="form-group">
    <label for="email">Address</label>
    <input type="text" placeholder="" id="address" name="address" >
    <p>Street Address</p>

    </div></div>


    <div class="col-lg-12">
    <label for="date">Birth Date*</label>
    <div class="row birth-date">		 
    <div class="col-lg-4 col-md-12">
    <div class="form-group">
        <select name="month"  id="month">
    <option selected hidden value="">month</option>
    <option value="Jan">Jan</option>
    <option value="Feb">Feb</option>
    <option value="Mar">Mar</option>
    <option value="Apr">Apr</option>
    <option value="May">May</option>
    <option value="Jun">Jun</option>
    <option value="Jul">Jul</option>
    <option value="Aug">Aug</option>
    <option value="Sept">Sept</option>
    <option value="Oct">Oct</option>
    <option value="Nov">Nov</option>
    <option value="Dec">Dec</option>
    </select>
    </div></div>

    <div class="col-lg-4 col-md-12">
    <div class="form-group">
        <select name="day"  id="day">
    <option selected hidden value="">day</option>
    <?php for($i=1;$i<=30;$i++) {?>
    <option value="<?=$i?>"><?=$i?></option>
    <?php }?>
    </select>
    </div></div>

    <div class="col-lg-4 col-md-12">
    <div class="form-group">
        <select name="year" id="year">
    <option selected hidden value="">year</option>
    <?php $currently_selected = date('Y'); 
    $earliest_year = 1980; 
    $latest_year = date('Y'); 
    foreach ( range( $latest_year, $earliest_year ) as $i ) {
    ?>
    <option value="<?=$i?>"><?=$i?></option>
    <?php }?>
    
    </select>
    </div></div>

    </div>
    </div>


    <div class="col-lg-12">
    <h5> Where did you hear about us?</h5>
    <div class="form-group">
        <input type="checkbox" value="colleague" name="colleague" id="colleague">
    <label for="colleague">A Friend or colleague</label>
    </div>
    <div class="form-group">
        <input type="checkbox" value="google" name="google" id="google">
    <label for="google">Google</label>
    </div>
    <div class="form-group">
        <input type="checkbox" value="blog" name="blog" id="blog">
    <label for="blog">Blog Post</label>
    </div>
    <div class="form-group">
        <input type="checkbox" value="article" name="article" id="article">
    <label for="article">News Article</label>
    </div>

    </div>

    </div>

    </div>
    </div>

    <div class="modal-split">
    <div class="form-holder">
        
    <h3>Membership rules</h3>

    <h6>1. Membership is vailable to anyone 18 years of age or older.</h6>

    <h6>2. You promise NOT to use conduct any fraudulent or business activity or have more than one Member Account at any time.</h6>


    <div class="form-group mt-20  d-flex">
        <input type="checkbox" value="member_1" id="member_1">
    <label for="member">I have read, understood, and accepted the rules for membership.</label>
    </div>

    <h2>Privacy Policy</h2>

    <p>Please reach out and read our Privacy Policy in order to understand how your information is used and shared, and check below if you accept the policy.</p>


    <div class="form-group mt-20  d-flex">
    <input type="checkbox" value="member_2" id="member_2">
    <label for="member">I have read, understood, and accepted the Privacy Policy for membership.</label>
    </div>

    </div>

    </div>

    </div>
    </form>

<div class="modal-footer">
<!--Nothing Goes Here but is needed! -->

</div>
<div id='loader' style='display: none;'>
<img src='<?=base_url('assets/frontend/img/loading.gif')?>' width='32px' height='32px'>
</div>
<div id="error_message" class="error_message"></div>
<div id="sucess_message" class="sucess_message"></div>  
</div>
</div>
</div>
<!-- Sign In Form Modal -->

<div class="modal fade" id="signInFormModal" tabindex="-1" role="dialog" aria-labelledby="signInFormModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Sign In Now!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<div class="form-holder">
			
<form id="login_form" method="post" name="frm2">

   <div class="row">
    <div class="col-lg-12 col-md-12">
     <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="" >
    </div></div>

    <div class="col-lg-12 col-md-12">
     <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="" >
    </div></div>

      <div class="col-lg-12 col-md-12">
    <button type="button" class="signupbtn" onclick="sign_in()">Sign In</button>
     
    </div> 

    </div>
</form>
 <div id='loader_login' style='display: none;'>
<img src='<?=base_url('assets/frontend/img/loading.gif')?>' width='32px' height='32px'>
</div>
<div id="error_message_login" class="error_message"  style='display: none;'>Wrong Authentication please try again!!</div>
<div id="sucess_message_login" class="sucess_message"  style='display: none;'>Thank you for logging in. Please wait it will automatically redirect in dashboard</div>            
</div>
	
      </div>

    </div>
  </div>
</div>
</body>
