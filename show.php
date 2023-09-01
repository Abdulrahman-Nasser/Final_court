<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';
include 'app/config.php';
include 'app/functions.php';





$link = $_SESSION['list']['link'];
$id = $_GET['show'];

$select = "SELECT * FROM `$link` where id = $id";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$data = json_decode($row['file']);


?>

<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->

<div class="scroll-area left-scroll mt-5">
  <?php foreach ($data as $item) : ?>
    <div class="col-lg-12  left">
      <a href="uploads/<?= $item ?>?img=<?= $item ?>" class="glightbox">
        <img src="uploads/<?= $item ?>" alt="">
      </a>
      <div class="down mt-3">
        <form action="download.php" method="post">
          <input type="hidden" name="image" value="<?= $item ?>">
          <span>أسم الملف :  <?= $item ?></span>
          <hr>
          <div class="row justify-content-center m-0 p-0">
            <div class="col">
              <button id="newBtn" class="" name="download"><i class="bi bi-download"></i></button>
            </div>
            <div class="col">
              <a href="uploads/<?= $item ?>?img=<?= $item ?>" id="newBtn" class="eye glightbox" name="download"><i class="bi bi-eye"></i></a>
            </div>
         
          </div>
        </form>
      </div>


    </div>
  <?php endforeach; ?>
</div>

<main id="main" class="main">

  <section class="section p-70">


    <div class="pagetitle text-center ">
      <h1> بيانات الاستئناف التفصيلية</h1>
    </div><!-- End Page Title -->


    <div class="container col-md-8">
      <div class="row justify-content-center">
        <!-- Recent Sales -->
        <div class="col-lg-8 bg-light">
          <div class="row">
            <div class="col-md-6 p-4 view">
              <strong>
                <span> رقم الأستئناف :</span>
              </strong>
              <span class=""><strong><?= $row['Appeal_No'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> تاريخ الأستئناف :</span>
              </strong>
              <span class=""><strong><?= $row['Appeal_Date'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> عدد المستئنفين :</span>
              </strong>
              <span class=""><strong><?= $row['appeal_num'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> عدد المستئنفين ضددهم:</span>
              </strong>
              <span class=""><strong><?= $row['appellant_num'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> اسماء المستئنفين :</span>
              </strong>
              <span class=""><strong><?= $row['appeal_name'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> اسماء المستئنفين ضددهم:</span>
              </strong>
              <span class=""><strong><?= $row['appellant_name'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> رقم الدائرة:</span>
              </strong>
              <span class=""><strong><?= $row['circle_no'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> تاريخ الحكم :</span>
              </strong>
              <span class=""><strong><?= $row['history_ruling'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> منطوق الحكم :</span>
              </strong>
              <span class=""><strong><?= $row['note'] ?></strong></span>
            </div>
            <div class="col-md-6 p-4 view">
              <strong>
                <span> عدد المستندات :</span>
              </strong>
              <span class=""><strong><?= $row['file_numbers'] ?></strong></span>
            </div>
          </div>
        </div><!-- End Recent Sales -->
      </div>
    </div>


  </section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<?php
include 'shared/footer.php';
include 'shared/script.php';


?>