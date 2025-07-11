<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../helpers/util.php';
require_once __DIR__ . '/../components/header.php';
?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . '/../components/sidebar.php'; ?>

        <main class="main-content">
            <?php require_once __DIR__ . '/../components/navbar.php'; ?>

            <div class="dashboard-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fs-4 fw-bold mb-0">Daily Reports</h2>
                </div>

                <form id="addReportForm" class="p-3 rounded bg-white">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Truck</label>
                            <select name="truck_id" class="form-input" required>
                                <option value="">Select Truck</option>
                                <!-- Populate from DB -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Driver</label>
                            <select name="driver_id" class="form-input" required>
                                <option value="">Select Driver</option>
                                <!-- Populate from DB -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Destination</label>
                            <input type="text" name="destination" class="form-input" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Goods Value (₦)</label>
                            <input type="number" name="goods_value" class="form-input" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Remarks / Summary</label>
                        <textarea name="remarks" class="form-input" rows="3"></textarea>
                    </div>

                    <button type="submit" class="button custom-button">Submit Report</button>
                </form>
            </div>
        </main>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/sidebar.js"></script>
    <script>
        document.getElementById('addReportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_add_report.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    if (data.status === 'success') {
                        this.reset();
                    }
                })
                .catch(() => showToasted('Network error. Please try again.', 'error'));
        });
    </script>
</body>

</html>