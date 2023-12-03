</div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container">
    <div class="copyright-wrap d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          <h3>TRƯỜNG PHÂN HIỆU ĐẠI HỌC THỦY LỢI</h3>
          <p>
            Địa chỉ: 02 Trường Sa, phường 17, Quận Bình Thạnh, TP.HCM<br />
            Tel: (+84) 0828991060 - Fax: (+84) 0828991060<br />
            Sinh viên thực hiện:
            <ul>
              <li>Nguyễn Lý Hoàng Thành</li>
              <li>Nguyễn Thị Thúy Diễm</li>
              <li>Ngô Chí Nghiệm</li>
              <li>Võ Chí Nô</li>
              <li>Lê Hoài Nam</li>
            </ul>
          </p>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="https://hotrolaptrinh.github.io/js/tech/main.js"></script>

<script>
    $('#menuHeader li a[data]').each(function (){
      console.log($(this).attr('data'));
      if ($(this).attr('data').length > 0 && $(this).attr('data').includes('<?php echo basename($_SERVER["SCRIPT_FILENAME"], '.php');?>')) {
        $(this).parent().addClass('active');
      }
      else{
        $(this).parent().removeClass('active');
      }
    });
    $(document).ready(function() {
        $('.modal select').select2();
        $('select.form-control').select2();
    });

</script>

</body>

</html>