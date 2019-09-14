<br>
<footer class="footer">
  <div class="row justify-content-center">
    <!-- <div class="container"> -->
       <div class="row">
         <div class="col-md-3">
          <h6 class="title">&copy; Created By  <a href="https://instagram.com/sumadirejaa" target="_blank"><strong>Imron Sumadireja</strong></a> 2019</h6>
         </div>
		<!-- </div> -->
	</div>
</footer>

<style>
.footer {
  position:0;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #6666;
  color: white;
  text-align: center;
}
</style>

<!-- <div class="footer">
<h6 class="title">&copy; Created By  <a href="https://instagram.com/rojasqifadilla13" target="_blank"><strong>Rojasqi Fadilla</strong></a> 2018</h6>
</div> -->

<!-- <footer>
  <p>Posted by: Hege Refsnes</p>
  <p>Contact information: <a href="mailto:someone@example.com">
  someone@example.com</a>.</p>
</footer> -->

<script src="<?php echo base_url('assets/js/core/jquery.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js')?>" type="text/javascript"></script>

  <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/jquery.price_format.min.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js')?>" type="text/javascript"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-switch.js')?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js')?>" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartjs.min.js')?>"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="<?php echo base_url('assets/js/plugins/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.js')?>" type="text/javascript"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <!-- <script src="<?php echo base_url('assets/js/blk-design-system.min.js?v=1.0.0')?>" type="text/javascript"></script> -->
  <script>
    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</div>
</body>