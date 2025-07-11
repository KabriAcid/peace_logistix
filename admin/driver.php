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
                <form action="" method="post">
                    <div class="form-row">
                        <label for="truck_number" class="form-label">Truck Number</label>
                        <input type="text" class="form-input" name="truck_number" placeholder="e.g GME-345XE">
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <script src="../assets/js/sidebar.js"></script>
</body>

</html>