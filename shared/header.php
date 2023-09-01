<?php



// $select_role = "SELECT * FROM roles where id = $id";
// $s_role = mysqli_query($conn, $select_role);
// $row_role = mysqli_fetch_assoc($s_role);

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:login.php");
}

?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">



    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo2.png" style="width: 100px; margin: 0 0 0 10px;" alt="not found">
            <span class="d-none d-lg-block">دار القضاء </span>
        </a>

        <i class="bi bi-list-nested toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav me-auto">
        <ul class="d-flex align-items-center">




            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['foda']['name'] ?></span>
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6> <?= $_SESSION['foda']['name'] ?> </h6>
                        <span><?= $_SESSION['foda']['description'] ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>




                    <li>
                        <form action="" method="get">
                            <button name="logout" class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span style="margin: 0 10px;">تسجيل خروج</span>
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->


</header><!-- End Header -->