<?php

if (isset($_GET['link_variable'])) {
    $_SESSION['list'] = [
        'link' => $_GET['link_variable'],
    ];
    print_r($_SESSION['list']);
}


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


        <li class="nav-item">
            <a class="nav-link collapsed"  href="/court/index.php">
                <i class="bi bi-journal-text"></i><span>الرئيسية</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>مدني</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/court/action.php?link_variable=civil">
                        <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                    </a>
                </li>

                <li>
                    <a href="/court/list.php?link_variable=civil">
                        <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End Dashboard Nav -->





        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>اسرة</span><i class="bi bi-chevron-down " style="margin:0 133px 0 0 ;"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


                <li id="sidebar_son">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>نفس</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav3" class="nav-content collapse " data-bs-parent="#sidebar_son">
                        <li>
                            <a href="/court/action.php?link_variable=self">
                                <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                            </a>
                        </li>
                            <li>
                                <a href="/court/list.php?link_variable=self">
                                    <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                                </a>
                            </li>
                    </ul>
                </li>



                <li id="sidebar_son">
                    <a class="nav-link " data-bs-target="#forms-nav4" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>مالي</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav4" class="nav-content collapse " data-bs-parent="#sidebar-son">
                        <li>
                            <a href="/court/action.php?link_variable=money">
                                <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                            </a>
                        </li>
                            <li>
                                <a href="/court/list.php?link_variable=money">
                                    <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                                </a>
                            </li>
                    </ul>
                </li>



                <li id="sidebar_son">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav6" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text" style="margin:0 ; margin-right:11px;"></i><span>شرعي</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav6" class="nav-content collapse " data-bs-parent="#sidebar_son">
                        <li>
                            <a href="/court/action.php?link_variable=legal">
                                <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                            </a>
                        </li>
                            <li>
                                <a href="/court/list.php?link_variable=legal">
                                    <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                                </a>
                            </li>
                    </ul>
                </li>


            </ul>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>عمالي</span><i class="bi bi-chevron-down" style="margin:0 125px 0 0 ;"></i>
            </a>
            <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/court/action.php?link_variable=worker">
                        <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                    </a>
                </li>
                    <li>
                        <a href="/court/list.php?link_variable=worker">
                            <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                        </a>
                    </li>
            
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav7" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>ضرائب</span><i class="bi bi-chevron-down" style="margin:0 125px 0 0 ;"></i>
            </a>
            <ul id="forms-nav7" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/court/action.php?link_variable=taxes">
                        <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                    </a>
                </li>
                
                    <li>
                        <a href="/court/list.php?link_variable=taxes">
                            <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                        </a>
                    </li>
           
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav8" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>استثماري</span><i class="bi bi-chevron-down" style="margin:0 102px 0 0 ;"></i>
            </a>
            <ul id="forms-nav8" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/court/action.php?link_variable=investment">
                        <i class="bi bi-circle"></i><span>إضافة استئناف</span>
                    </a>
                </li>
              
                    <li>
                        <a href="/court/list.php?link_variable=investment">
                            <i class="bi bi-circle"></i><span>عرض الاستئنافات المسجلة </span>
                        </a>
                    </li>
               
            </ul>
        </li>


        <?php if ($_SESSION['foda']['roleID'] == 1) : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav9" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>الموظفين</span><i class="bi bi-chevron-down" style="margin:0 102px 0 0 ;"></i>
                </a>
                <ul id="forms-nav9" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="/court/add.php">
                            <i class="bi bi-journal-text"></i><span>إضافة موظفين</span>
                        </a>
                    </li>
                    <li>
                        <a href="/court/lisT_admin.php">
                            <i class="bi bi-journal-text"></i><span>عرض الموظفين</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>




        <li class="nav-item">
            <form action="" method="get">
                <button class="nav-link collapseed btn_logout" name="logout">
                    <i class="bi bi-grid"></i>
                    <span>تسجيل خروج </span>

                </button>
            </form>

        </li><!-- End Dashboard Nav -->

    </ul>

</aside><!-- End Sidebar-->