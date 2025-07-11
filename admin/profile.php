<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../helpers/util.php";
require_once __DIR__ . "/../components/header.php";
?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . "/../components/sidebar.php"; ?>

        <main class="main-content">
            <?php require_once __DIR__ . "/../components/navbar.php"; ?>

            <div class="dashboard-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fs-4 fw-bold mb-0">My Profile</h2>
                </div>

                <div class="card p-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="../assets/img/avatar.jpg" alt="Profile" class="rounded-circle me-3" width="80" height="80">
                        <div>
                            <h5 class="mb-0"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'Admin'); ?></h5>
                            <small class="text-muted">User ID: <?= htmlspecialchars($_SESSION['user_id'] ?? ''); ?></small>
                        </div>
                    </div>

                    <form id="profileForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name" class="form-input" value="<?= htmlspecialchars($_SESSION['user']['name'] ?? ''); ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" name="email" class="form-input" value="<?= htmlspecialchars($_SESSION['user']['email'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="text" name="phone" class="form-input" value="<?= htmlspecialchars($_SESSION['user']['phone'] ?? ''); ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Role</label>
                                <input type="text" class="form-input" value="<?= htmlspecialchars($_SESSION['user']['role'] ?? 'Administrator'); ?>" disabled>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="button custom-button">Update Profile</button>
                        </div>

                        <div id="profileMessage" class="small mt-2 text-muted"></div>
                    </form>
                </div>

                <div class="card p-4">
                    <h5 class="mb-3 fw-bold">Change Password</h5>

                    <form id="changePasswordForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Current Password</label>
                                <input type="password" name="current_password" class="form-input" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">New Password</label>
                                <input type="password" name="new_password" class="form-input" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-input" required>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="button custom-button">Change Password</button>
                        </div>

                        <div id="passwordMessage" class="small mt-2 text-muted"></div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/sidebar.js"></script>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_update_profile.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    document.getElementById('profileMessage').innerText = data.message;
                })
                .catch(() => showToasted('Failed to update profile.', 'error'));
        });

        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../api/api_change_password.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    showToasted(data.message, data.status);
                    document.getElementById('passwordMessage').innerText = data.message;
                    if (data.status === 'success') this.reset();
                })
                .catch(() => showToasted('Password update failed.', 'error'));
        });
    </script>
</body>

</html>