<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../helpers/util.php";
require_once __DIR__ . "/../components/header.php";

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
                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#addTruckModal">
                        <i class="fa fa-plus"></i> Add Truck
                    </button>
                </div>

                <div class="table-responsive" id="truckTableContainer">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Truck Name</th>
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
                                        <td><?= htmlspecialchars($truck['truck_name']); ?></td>
                                        <td><?= htmlspecialchars($truck['license_plate']); ?></td>
                                        <td><?= ucfirst($truck['status']); ?></td>
                                        <td><?= date('d M Y', strtotime($truck['created_at'])); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" onclick="openEditTruckModal(<?= $truck['id']; ?>)">Edit</button>
                                            <button class="btn btn-sm btn-danger" onclick="deleteTruck(<?= $truck['id']; ?>)">Delete</button>
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

    <!-- Add Truck Modal -->
    <div class="modal fade" id="addTruckModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addTruckForm" class="p-3">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Truck</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Truck Name</label>
                                <input type="text" name="truck_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">License Plate</label>
                                <input type="text" name="license_plate" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="available">Available</option>
                                    <option value="assigned">Assigned</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Truck</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Edit Truck Modal -->
    <div class="modal fade" id="editTruckModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editTruckForm" class="p-3">
                    <input type="hidden" name="truck_id" id="edit_truck_id">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Truck</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Truck Name</label>
                                <input type="text" name="truck_name" id="edit_truck_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">License Plate</label>
                                <input type="text" name="license_plate" id="edit_license_plate" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <select name="status" id="edit_status" class="form-select" required>
                                    <option value="available">Available</option>
                                    <option value="assigned">Assigned</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Truck</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>

    <script>
        function loadTrucks() {
            fetch('../api/api_fetch_truck.php')
                .then(res => res.text())
                .then(html => document.getElementById('truckTableContainer').innerHTML = html);
        }

        function openEditTruckModal(id) {
            fetch(`../api/api_get_truck.php?id=${id}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('edit_truck_id').value = data.data.id;
                        document.getElementById('edit_truck_name').value = data.data.truck_name;
                        document.getElementById('edit_license_plate').value = data.data.license_plate;
                        document.getElementById('edit_status').value = data.data.status;
                        new bootstrap.Modal(document.getElementById('editTruckModal')).show();
                    } else {
                        showToasted(data.message, 'error');
                    }
                })
                .catch(() => showToasted('Failed to load truck.', 'error'));
        }

        function deleteTruck(id) {
            if (confirm('Are you sure you want to delete this truck?')) {
                fetch(`../api/api_delete_truck.php?id=${id}`)
                    .then(res => res.json())
                    .then(data => {
                        showToasted(data.message, data.status);
                        if (data.status === 'success') loadTrucks();
                    })
                    .catch(() => showToasted('Delete failed.', 'error'));
            }
        }

        document.getElementById('addTruckForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_add_truck.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    if (data.status === 'success') {
                        this.reset();
                        loadTrucks();
                        bootstrap.Modal.getInstance(document.getElementById('addTruckModal')).hide();
                    }
                })
                .catch(() => showToasted('Network error. Please try again.', 'error'));
        });

        document.getElementById('editTruckForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_edit_truck.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    if (data.status === 'success') {
                        loadTrucks();
                        bootstrap.Modal.getInstance(document.getElementById('editTruckModal')).hide();
                    }
                })
                .catch(() => showToasted('Update failed.', 'error'));
        });

        loadTrucks();
    </script>
    <!-- bootstrap CDN -->
     <script src=""></script>
</body>

</html>