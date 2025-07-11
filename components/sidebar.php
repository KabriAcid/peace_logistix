<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <img src="../favicon.png" alt="" class="favicon">
            <span class="fw-bold">Peace Logistix</span>
        </div>
        <button class="close-sidebar" id="closeSidebar">
            <i class="fa fa-times"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <a href="../admin/dashboard.php" class="nav-item <?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
            <i class="fa fa-th-large"></i>
            <span>Dashboard</span>
        </a>
        <a href="../admin/reports.php" class="nav-item <?= ($current_page == 'reports.php') ? 'active' : ''; ?>">
            <i class="fa fa-file-text"></i>
            <span>Reports</span>
        </a>
        <a href="../admin/shipments.php" class="nav-item <?= ($current_page == 'shipments.php') ? 'active' : ''; ?>">
            <i class="fa fa-box"></i>
            <span>Shipments</span>
        </a>
        <a href="../admin/truck.php" class="nav-item <?= ($current_page == 'truck.php') ? 'active' : ''; ?>">
            <i class="fa fa-truck"></i>
            <span>Truck</span>
        </a>
        <a href="../admin/driver.php" class="nav-item <?= ($current_page == 'driver.php') ? 'active' : ''; ?>">
            <i class="fa fa-user"></i>
            <span>Driver</span>
        </a>
        <a href="../auth/logout.php" class="nav-item">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
        </a>
    </nav>
</aside>