<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';

include 'app/config.php';
include 'app/functions.php';


$link =  $_SESSION['list']['link'];


$select = "SELECT * FROM `$link`";
$s = mysqli_query($conn, $select);


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM $link where id = $id";
  mysqli_query($conn, $delete);
  path("list.php");
}




?>



<!-- Start loading page -->
<div class="loading-spiner">
  <span class="loader"></span>
</div>
<!-- End loading page -->

<main id="main" class="main">

  <section class="section p-70">


    <div class="pagetitle text-center ">
      <h1>الاستئنافات المسجلة</h1>
    </div><!-- End Page Title -->


    <div class="row">
      <!-- Recent Sales -->
      <div class="col-lg-12">
        <div class="card recent-sales overflow-auto">



          <div class="card-body text-capitalize">

            <table class="table table-borderless datatable text-center  ">
              <thead class="text-center">
                <tr>
                  <th scope="col">التسلسل</th>
                  <th scope="col">رقم الاستئناف</th>
                  <th scope="col">تاريخ الاستئناف</th>
                  <th scope="col">عدد المستئنفين</th>
                  <th scope="col">عدد المستئنفين ضددهم</th>
                  <th scope="col">اسماء المستئنفين</th>
                  <th scope="col">اسماء المستئنفين ضددهم</th>
                  <th scope="col">رقم الدائرة</th>
                  <th scope="col">تاريخ الحكم </th>
                  <th scope="col">منطوق الحكم </th>
                  <th scope="col"> عدد الملفات المرفقة </th>
                  <th scope="col" colspan="3">الأوامر </th>

                </tr>
              </thead>
              <tbody>

                <?php if (!empty($s)) : ?>
                  <?php foreach ($s as $data) : ?>
                    <tr>

                      <td><?= $data['id'] ?></td>
                      <td><?= $data['Appeal_No'] ?></td>
                      <td><?= $data['Appeal_Date'] ?></td>
                      <td><?= $data['appeal_num'] ?></td>
                      <td><?= $data['appellant_num'] ?></td>
                      <td><?= $data['appeal_name'] ?></td>
                      <td><?= $data['appellant_name'] ?></td>
                      <td><?= $data['circle_no'] ?></td>
                      <td><?= $data['history_ruling'] ?></td>
                      <td><?= $data['note'] ?></td>
                      <td><?= $data['file_numbers'] ?></td>


                      <td>
                        <div class="status d-flex  justify-content-center">
                          <?php if ($_SESSION['foda']['roleID'] == 1) : ?>
                            <a href="update.php?update= <?= $data['id'] ?>" class="btn edit">
                              <i class="bi bi-pencil"></i>
                              <div class="overlay"></div>
                            </a>
                            <a href='list.php?delete=<?= $data['id'] ?>' class="btn delete">
                              <i class="bi bi-trash"></i>
                            </a>
                            <a href='show.php?show=<?= $data['id'] ?>' class="btn show">
                              <i class="bi bi-eye-fill"></i>
                            </a>
                          <?php elseif ($_SESSION['foda']['roleID'] == 2) : ?>
                            <a href="update.php?update= <?= $data['id'] ?>" class="btn edit">
                              <i class="bi bi-pencil"></i>
                              <div class="overlay"></div>
                            </a>
                            <a href='show.php?show=<?= $data['id'] ?>' class="btn show">
                              <i class="bi bi-eye-fill"></i>
                            </a>
                          <?php else : ?>
                            <a href='show.php?show=<?= $data['id'] ?>' class="btn show">
                              <i class="bi bi-eye-fill"></i>
                            </a>
                          <?php endif; ?>

                        </div>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </tbody>
            </table>

          </div>

        </div>
      </div><!-- End Recent Sales -->
    </div>


  </section>

</main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<?php
include 'shared/footer.php';
include 'shared/script.php';


?>