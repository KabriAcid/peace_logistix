<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../components/header.php';

// Fetch trucks
$stmt = $pdo->prepare("SELECT * FROM trucks ORDER BY created_at DESC");
$stmt->execute();
$trucks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . '/../components/sidebar.php'; ?>

        <main class="main-content">
            <?php require_once __DIR__ . '/../components/navbar.php'; ?>

            <div class="dashboard-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fs-4 fw-bold mb-0">Truck Management</h2>
                    <a href="add_truck.php" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Truck
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Vehicle Name</th>
                                <th>License Plate</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($trucks)): ?>
                                <?php foreach ($trucks as $index => $truck): ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= htmlspecialchars($truck['vehicle_name']); ?></td>
                                        <td><?= htmlspecialchars($truck['license_plate']); ?></td>
                                        <td><?= ucfirst($truck['status']); ?></td>
                                        <td><?= date('d M Y', strtotime($truck['created_at'])); ?></td>
                                        <td>
                                            <a href="edit_truck.php?id=<?= $truck['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="delete_truck.php?id=<?= $truck['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this truck?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No trucks found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>
</body>

</html>