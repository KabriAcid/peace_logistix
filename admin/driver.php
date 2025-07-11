<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../helpers/util.php";
require_once __DIR__ . "/../components/header.php";

// Fetch drivers
$stmt = $pdo->prepare("SELECT * FROM drivers ORDER BY created_at DESC");
$stmt->execute();
$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . '/../components/sidebar.php'; ?>

        <main class="main-content">
            <?php require_once __DIR__ . '/../components/navbar.php'; ?>

            <div class="dashboard-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fs-4 fw-bold mb-0">Driver Management</h2>
                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#addDriverModal">
                        <i class="fa fa-plus"></i> Add Driver
                    </button>
                </div>

                <div class="table-responsive" id="driverTableContainer">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
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
                            <?php if (!empty($drivers)): ?>
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
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No drivers found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <!-- Add Driver Modal -->
    <div class="modal fade" id="addDriverModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addDriverForm" class="p-3">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Driver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Driver Name</label>
                                <input type="text" name="driver_name" class="form-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="phone" class="form-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">License Number</label>
                                <input type="text" name="license_number" class="form-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <select name="status" class="form-input" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="button outline-button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="button custom-button">Add Driver</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Edit Driver Modal -->
    <div class="modal fade" id="editDriverModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editDriverForm" class="p-3">
                    <input type="hidden" name="driver_id" id="edit_driver_id">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Driver</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Driver Name</label>
                                <input type="text" name="driver_name" id="edit_driver_name" class="form-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" name="phone" id="edit_phone" class="form-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">License Number</label>
                                <input type="text" name="license_number" id="edit_license_number" class="form-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <select name="status" id="edit_status" class="form-input" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="button outline-button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="button custom-button">Update Driver</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>

    <script>
        function loadDrivers() {
            fetch('../api/api_fetch_driver.php')
                .then(res => res.text())
                .then(html => document.getElementById('driverTableContainer').innerHTML = html);
        }

        function openEditDriverModal(id) {
            fetch(`../api/api_get_driver.php?id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('edit_driver_id').value = data.data.id;
                        document.getElementById('edit_driver_name').value = data.data.driver_name;
                        document.getElementById('edit_phone').value = data.data.phone;
                        document.getElementById('edit_license_number').value = data.data.license_number;
                        document.getElementById('edit_status').value = data.data.status;
                        new bootstrap.Modal(document.getElementById('editDriverModal')).show();
                    } else {
                        showToasted(data.message, 'error');
                    }
                })
                .catch(() => showToasted('Failed to load driver.', 'error'));
        }

        function deleteDriver(id) {
            if (confirm('Are you sure you want to delete this driver?')) {
                fetch(`../api/api_delete_driver.php?id=${id}`)
                    .then(res => res.json())
                    .then(data => {
                        showToasted(data.message, data.status);
                        if (data.status === 'success') loadDrivers();
                    })
                    .catch(() => showToasted('Delete failed.', 'error'));
            }
        }

        document.getElementById('addDriverForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_add_driver.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    if (data.status === 'success') {
                        this.reset();
                        loadDrivers();
                        bootstrap.Modal.getInstance(document.getElementById('addDriverModal')).hide();
                    }
                })
                .catch(() => showToasted('Network error. Please try again.', 'error'));
        });

        document.getElementById('editDriverForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_edit_driver.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    if (data.status === 'success') {
                        loadDrivers();
                        bootstrap.Modal.getInstance(document.getElementById('editDriverModal')).hide();
                    }
                })
                .catch(() => showToasted('Update failed.', 'error'));
        });

        loadDrivers();
    </script>
</body>

</html>