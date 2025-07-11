<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';

$stmt = $pdo->prepare("SELECT * FROM trucks ORDER BY created_at DESC");
$stmt->execute();
$trucks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehicle Name</th>
                <th>License Plate</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($trucks)): ?>
                <?php foreach ($trucks as $index => $truck): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($truck['truck_name']); ?></td>
                        <td><?= htmlspecialchars($truck['license_plate']); ?></td>
                        <td><?= ucfirst($truck['status']); ?></td>
                        <td><?= date('d M Y', strtotime($truck['created_at'])); ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="openEditTruckModal(<?= $truck['id']; ?>)">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
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