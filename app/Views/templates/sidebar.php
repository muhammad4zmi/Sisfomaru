<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #2b3643">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
            <i class="fas">
                <img src="<?= base_url(); ?>/admin/assets/img/logo.png" alt="" class="logo-side">
            </i>
        </div>
        <div class="sidebar-brand-text mx-2">STMIK SZ</div>
    </a>

    <!-- Heading -->

    <hr class="sidebar-divider">
    <!-- query menu -->
    <?php
    $db = \Config\Database::connect();
    $role_id = session()->get('role_id');


    $queryMenu = $db->query("SELECT user_menu.id, menu
                                FROM user_menu JOIN user_access_menu
                                ON user_menu.id = user_access_menu.menu_id
                                WHERE user_access_menu.role_id = $role_id
                                ORDER BY user_access_menu.role_id");
    $menu = $queryMenu->getResultArray();


    ?>


    <!-- looping menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?> PANEL

        </div>
        <?php
        $menu_id = $m['id'];
        $querySubMenu = $db->query("SELECT * FROM user_sub_menu
                        WHERE menu_id = $menu_id
            and is_active = 1 ");

        $Submenu = $querySubMenu->getResultArray();
        ?>
        <?php foreach ($Submenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>

                <hr class="sidebar-divider my-0">
            <?php endforeach; ?>

        <?php endforeach; ?>


        <!-- Divider -->





        <!-- Divider -->


        <!-- Nav Item - Dashboard -->


        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt ml-1"></i>
                <span>Log Out</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->