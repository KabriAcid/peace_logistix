<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
?>
    <p class="text-center">Invalid request method.</p>
    <?php
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM drivers ORDER BY created_at DESC");
    $stmt->execute();
    $drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$drivers) {
    ?>
        <p class="text-center">No drivers found.</p>
    <?php
        exit;
    }

    ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Driver Name</th>
                <th>Phone</th>
                <th>License Number</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drivers as $index => $driver): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($driver['driver_name']); ?></td>
                    <td><?= htmlspecialchars($driver['phone']); ?></td>
                    <td><?= htmlspecialchars($driver['license_number']); ?></td>
                    <td><?= ucfirst($driver['status']); ?></td>
                    <td><?= date('d M Y', strtotime($driver['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="openEditDriverModal(<?= $driver['id']; ?>)">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteDriver(<?= $driver['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php

} catch (PDOException $e) {
?>
    <p class="text-danger text-center">Failed to fetch drivers.</p>
<?php
}
