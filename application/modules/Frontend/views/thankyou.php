<?php
$this->load->view('templates/frontend/header', $header);
$this->load->view('templates/frontend/main_header', $header);
?>

<div class="container-xl">
      <div class="banner-form mb-4 mb-md-5">
        <img src="<?=base_url('assets/frontend/img/banner-limo.jpg')?>" alt="" class="img-fluid w-100">
      </div>
      <h2><center>Your booking has been successfully confirmed. Thank you!!</center></h2>

        
      </div>  


<?php
$this->load->view('templates/frontend/footer', $header);
$this->load->view('templates/frontend/footer_scripts', $header);
?>

