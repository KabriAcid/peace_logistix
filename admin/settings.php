<!-- settings.php -->
<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../helpers/util.php';
require_once __DIR__ . '/../components/header.php';

// Fetch user settings from DB
$userSettings = getUserSettings($pdo, $_SESSION['user_id']);

?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . '/../components/sidebar.php'; ?>

        <main class="main-content">
            <?php require_once __DIR__ . '/../components/navbar.php'; ?>

            <div class="dashboard-content">
                <h2 class="fw-bold mb-4">Settings</h2>

                <div class="settings-section">
                    <h5 class="mb-3">Security Settings</h4>

                        <div class="setting-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="setting-icon me-3">
                                    <i class="fas fa-fingerprint fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Biometrics</h6>
                                    <small class="text-muted">Choose to sign in with biometrics</small>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="biometricsToggle" <?= $userSettings['biometrics_enabled'] ? 'checked' : ''; ?>>
                            </div>
                        </div>

                        <div class="setting-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="setting-icon me-3">
                                    <i class="fas fa-eye-slash fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Hide Balance</h6>
                                    <small class="text-muted">Show or hide your balance</small>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="hideBalanceToggle" <?= $userSettings['hide_balance'] ? 'checked' : ''; ?>>
                            </div>
                        </div>

                        <div class="setting-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="setting-icon me-3">
                                    <i class="fas fa-clock fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Session Expiry</h6>
                                    <small class="text-muted">Auto-logout after every idle 30 mins</small>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="sessionExpiryToggle" <?= $userSettings['session_expiry'] ? 'checked' : ''; ?>>
                            </div>
                        </div>
                </div>

                <div class="settings-section mt-5">
                    <h4 class="mb-3">Appearance</h4>

                    <div class="setting-item d-flex align-items-center justify-content-between p-3 mb-3 rounded shadow-sm">
                        <div class="d-flex align-items-center">
                            <div class="setting-icon me-3">
                                <i class="fas fa-moon fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Dark Mode</h6>
                                <small class="text-muted">Switch between light and dark themes</small>
                            </div>
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input" id="darkModeToggle" <?= $userSettings['dark_mode'] ? 'checked' : ''; ?>>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>
    <script src="../assets/js/settings.js"></script>
</body>

</html>

<script>
    document.getElementById('userSettingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('../api/api_update_settings.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                showToasted(data.message, data.status);
            })
            .catch(() => showToasted('Failed to save settings.', 'error'));
    });
</script>
</body>

</html>