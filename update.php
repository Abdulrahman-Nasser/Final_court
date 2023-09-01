<?php
include "shared/head.php";
include "shared/header.php";
include "shared/asside.php";
include "app/config.php";
include "app/functions.php";

// link url for listing the data
$link = $_SESSION['list']['link'];
$msg = [];


// update query
if (isset($_GET['update'])) {
  $id = $_GET['update'];
  // select for get data into inputs
  $select = "SELECT * From `$link` where id = $id ";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);

  $old_files = json_decode($row['file']);
  $current_appeal_name = json_decode($row['appeal_name']);
  $current_appellant_name = json_decode($row['appellant_name']);

  if (isset($_POST['send'])) {

    $appeal_no = isset($_POST['appeal_no']) ? $_POST['appeal_no'] : '';
    $appeal_date = isset($_POST['appeal_date']) ? $_POST['appeal_date'] : '';
    $circle_no = isset($_POST['circle_no']) ? $_POST['circle_no'] : '';
    $history_ruling = isset($_POST['history_ruling']) ? $_POST['history_ruling'] : '';
    $note = isset($_POST['note']) ? $_POST['note'] : '';

    if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
      echo "hello";

      foreach ($old_files as $file_name) {
        unlink('uploads/' . $file_name);
      }
      $target_dir = "uploads/";
      $files = $_FILES['files'];
      $fileNames = [];
      $file_numbers = count($files['name']);

      for ($i = 0; $i < count($files['name']); $i++) {
        $file_name = time() . $files['name'][$i];
        $file_tmp = $files['tmp_name'][$i];
        $file_size = $files['size'][$i];
        $file_error = $files['error'][$i];

        // check for errors
        if ($file_error === 0) {
          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
          $file_dest = $target_dir . $file_name . "." . $file_ext;

          // move the uploaded file to the uploads directory
          if (move_uploaded_file($file_tmp, $file_dest)) {
            $fileNames[] = $file_name;
          } else {
            echo "ثققخق";
          }
        }
      }
    } else {
      $file_numbers = count($old_files);
      $fileNames[] = $old_files;
    }

    $names = isset($_POST["names"]) && is_array($_POST["names"]) ? $_POST["names"] : [];
    $appellants = isset($_POST["appellants"]) && is_array($_POST["appellants"]) ? $_POST["appellants"] : [];
    $appeal_name_no = count($names);
    $appellants_name_no = count($appellants);

    $namesString = mysqli_real_escape_string($conn, json_encode($names, JSON_UNESCAPED_UNICODE));
    $appellantsString = mysqli_real_escape_string($conn, json_encode($appellants, JSON_UNESCAPED_UNICODE));
    $fileNamesString = mysqli_real_escape_string($conn, json_encode($fileNames, JSON_UNESCAPED_UNICODE));

    $insert = "UPDATE `$link` SET `Appeal_No`=$appeal_no,`Appeal_Date`='$appeal_date',`appeal_num`=$appeal_name_no,`appellant_num`=$appellants_name_no,`appeal_name`='$namesString',`appellant_name`='$appellantsString',`circle_no`=$circle_no,`history_ruling`='$history_ruling',`note`='$note',`file`='$fileNamesString',`file_numbers`=$file_numbers WHERE id = $id";
    $result = mysqli_query($conn, $insert);
    if ($result) {
      $msg = "تم التعديل بنجاح";
      // path("index.php?link_variable='$link'");
    } else {
      echo json_encode(array("success" => false, "message" => "Error: " . mysqli_error($conn)));
    }
  }
}



// auth_admin(1,2);
?>

<!-- Start loading page -->
<div class="loading-spiner">
  <span class="loader"></span>
</div>
<!-- End loading page -->


<main id="main" class="main">



  <section class="section dashboard p-70">
    <div class="overlay"></div>


    <div class="container col-md-6 ">
      <div class="form-details p-4">

        <?php if (!empty($msg)) : ?>
          <div class="alret alert-success bg-success text-light text-success text-center m-3 p-3 msg">
            <?= $msg ?>
          </div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">رقم الأستئناف</label>
                <input type="number" name="appeal_no" value="<?= $row['Appeal_No'] ?>" class="form-control input_form">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="input_form" class="label">سنة الأستئناف</label>
                <input type="date" name="appeal_date" value="<?= $row['Appeal_Date'] ?>" class="form-control input_form">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="" class="label"> اسم المستئنف </label>
                    <input type="text" id="nameInput" class="form-control input_form">
                  </div>
                </div>
                <div class="col-md-2">

                  <div class="form-group">
                    <button type="button" id="addNameBtn" class="plus"><i class="bi bi-plus"></i></button>
                  </div>
                </div>
              </div>

              <div id="namesList" class="lists">
                <?php foreach ($current_appeal_name as $data) : ?>
                  <span><?= $data ?></span>
                  <a href="list.php?delete=<?= $data ?>"><i class="bi bi-trash"></i></a>
                  <br>
                <?php endforeach ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="" class="label"> اسم المستئنف ضده </label>
                    <input type="text" id="appellantInput" value="" class="form-control input_form">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="button" id="addAppellantBtn" class="plus"><i class="bi bi-plus"></i></button>
                  </div>
                </div>
              </div>

              <div id="appellantsList" class="lists">
                <?php foreach ($current_appellant_name as $data) : ?>
                  <span><?= $data ?></span>
                <?php endforeach ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">الدائرة</label>
                <input type="text" name="circle_no" value="<?= $row['circle_no'] ?>" class="form-control input_form" placeholder="رقم الدائرة">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="" class="label">تاريخ الحكم</label>
                <input type="date" name="history_ruling" value="<?= $row['history_ruling'] ?>" class="form-control input_form">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="" class="label">منطوق الحكم</label>
                <textarea name="note" class="form-control text_area p-3" rows="3" cols="3" placeholder="أكتب شيئاً"><?= $row['note'] ?></textarea>
              </div>
            </div>
            <div class="col-lg-12 mt-3">
              <div class="form-group">
                <label for="" class="label">
                  الملفات الحالية :</label>
                <?php foreach ($old_files as $data) : ?>
                  <a href="uploads/<?= $data ?>" class="glightbox">
                    <img src="uploads/<?= $data ?>" style="width:60px;" alt="">
                  </a>
                <?php endforeach; ?>
                <hr>
                <label for="" class="label">رفع ملفات جديدة</label>
                <input type="file" name="files[]" multiple class="form-control input_form mt-3">
              </div>
            </div>
            <div class="col-lg-3 mt-3">
              <button type="submit" name="send" class="btn_save">تعديل</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



<?php
include "shared/footer.php";
include "shared/script.php";

?>