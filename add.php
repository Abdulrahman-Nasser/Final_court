<?php
include "shared/login_head.php";
include "shared/head.php";
include "shared/header.php";
include "shared/asside.php";
include "app/config.php";
include "app/functions.php";

$select_role = "SELECT * FROM roles";
$s_role = mysqli_query($conn, $select_role);

$select = "SELECT * FROM admin_details";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

$msg = [];
$success = [];
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    if ($name == "" || $pass == "" || $select == "") {
        $msg[] = "لا يمكن ادخال بيانات فارغة";
    }
    foreach ($s as $item) {
        if ($item['name'] == $name) {
            $msg[] = "هذا الموظف غير متاح ، مسجل مسبقاً";
        }
    }

    if (empty($msg)) {
        $insert = "INSERT INTO `admins`(`id`, `name`, `password`, `role_id`)  VALUES(null,'$name','$pass',$role)";
        $i = mysqli_query($conn, $insert);
        $success[] = 'تم الاضافة بنجاح';
        path("list_admin.php");
    }
}

auth_admin(1);
?>

<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->

<main class="main pY-5" id="main">
    <section class="section login_parent mt-5">
        <div class="overlay"></div>
        <div class="container col-md-6 loginbox mt-4">
            <img class="loginpic" src="assets/img/logo.jpg">
            <h2> تسجيل موظف</h2>

            <?php if (!empty($msg)) : ?>
                <?php foreach ($msg as $data) : ?>
                    <div class="alaert alert-danger text-danger bg-danger text-light p-1 text-center mt-4">
                        <span>
                            <?= $data ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php foreach ($success as $data) : ?>
                <div class="alaert alert-success text-success bg-success text-light p-1 text-center mt-4">
                    <span>
                        <?= $data ?>
                    </span>
                </div>
            <?php endforeach; ?>
            <form method="post">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-6 col-6">
                        <p>إسم المستخدم</p>
                        <input type="text" name="name" placeholder=" أدخل إسم المستخدم" required>
                    </div>
                    <div class="col-lg-12 col-md-6 col-6">
                        <p>كلمة السر</p>
                        <input type="password" name="password" placeholder=" أدخل كلمة السر" required>
                    </div>
                    <div class="col-lg-12 col-md-6 col-6">
                        <p>المهمة</p>
                        <select name="role" id="" class="form-control bg-transparent" style="border-bottom: 1px solid #002f65; ">
                            <?php foreach ($s_role as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <div class="login text-center ">
                            <button class="btn_login" name="login"> إضافة الموظف</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</main>


<!--  -->



<?php
include "shared/script.php";
?>