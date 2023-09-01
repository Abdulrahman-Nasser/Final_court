<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';

include 'app/config.php';
include 'app/functions.php';




$select = "SELECT * FROM admin_details";
$s = mysqli_query($conn, $select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `admins` where id = $id";
    mysqli_query($conn, $delete);
    path("list_admin.php");
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
            <h1> قائمة الموظفين</h1>
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
                                    <th scope="col"> اسم المستخدم</th>
                                    <th scope="col"> كلمة السر</th>
                                    <th scope="col"> الدور</th>                                    
                                    <th scope="col" colspan="2">الأوامر </th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php if (!empty($s)) : ?>
                                    <?php foreach ($s as $data) : ?>
                                        <tr>

                                            <td><?= $data['id'] ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['password'] ?></td>
                                            <td><?= $data['description'] ?></td>
                                            <td>
                                                <div class="status d-flex  justify-content-center">
                                                    <?php if ($_SESSION['foda']['roleID'] == 1) : ?>
                                                        <a href="update_admin.php?edit_admin= <?= $data['id'] ?>" class="btn edit">
                                                            <i class="bi bi-pencil"></i>
                                                            <div class="overlay"></div>
                                                        </a>
                                                        <a href='list_admin.php?delete=<?= $data['id'] ?>' class="btn delete">
                                                            <i class="bi bi-trash"></i>
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