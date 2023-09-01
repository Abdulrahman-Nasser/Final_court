<?php
include "shared/login_head.php";
include "app/config.php";
include "app/functions.php";
session_start();



if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $select = "SELECT * FROM admin_details WHERE name = '$name' and password = '$pass'";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $numRows = mysqli_num_rows($s);



    if ($numRows == 1) {
        $_SESSION['foda'] = [
            "id" => $row['id'],
            "name" => $row['name'],
            'roleID' => $row['role_id'],
            'description' => $row['description'],
            
        ];
        pathAdmin("index.php");
    } else {
        $emailErorr[] = 'خطأ في اسم المستخدم أو كلمة السر';
    }
}

?>

<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->

<main class="main" id="main">
    <section class="section login_parent">
        <div class="overlay"></div>
        <div class="container col-md-6 loginbox">
            <img class="loginpic" src="assets/img/logo.jpg">
            <h2> تسجيل الدخول</h2>

            <?php if (!empty($emailErorr)) : ?>
                <?php foreach ($emailErorr as $data) : ?>
                    <div class="alaert alert-danger text-danger bg-danger text-light p-4 text-center mt-4">
                        <span>
                            <?= $data ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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

                    <div class="col-lg-6">
                        <div class="login text-center ">
                            <button class="btn_login" name="login">تسجيل الدخول</button>
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