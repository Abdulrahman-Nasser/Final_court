<?php
include "shared/head.php";
include "shared/header.php";
include "shared/asside.php";
include "app/config.php";
include "app/functions.php";



auth_admin(1,2,3);
?>


<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->

<main id="main" class="main">



  <section class="section dashboard index p-70">
    <div class="overlay"></div>


    <div class="container col-md-6 text-center">
      <div class="text mt-5">
        <img src="assets/img/logo2.png" style="width: 120px;" alt="">
        <h1 class="home_text">دار القضاء</h1>
        <p class="text-light text2">احفظ ملفاتك بكل سهولة و أكثر امان</p>
      </div>
    </div>
  </section>

</main>
<!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<?php
include "shared/footer.php";
include "shared/script.php";

?>