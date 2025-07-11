<?php require_once __DIR__ . "/../components/header.php"; ?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . "/../components/sidebar.php"; ?>
        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <?php require_once __DIR__ . "/../components/navbar.php"; ?>
            <!-- Dashboard Content -->
            <div class="dashboard-content">
               <!-- Content goes here -->
            </div>
        </main>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <script src="../assets/js/sidebar.js"></script>
</body>

</html>