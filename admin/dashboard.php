<?php
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../helpers/util.php";
require_once __DIR__ . "/../components/header.php";

$todayRevenue = getTodayRevenue($pdo);
$totalTrucks = getTotalTrucks($pdo);
$totalDrivers = getTotalDrivers($pdo);
$undelivered = getUndeliveredReports($pdo);
$recentReports = getRecentReports($pdo);
?>

<body>
    <div class="dashboard">
        <?php require_once __DIR__ . "/../components/sidebar.php"; ?>

        <main class="main-content">
            <?php require_once __DIR__ . "/../components/navbar.php"; ?>

            <div class="dashboard-content">
                <div class="row">
                    <!-- Metrics Cards (Full Width) -->
                    <div class="col-12 mb-3">
                        <div>
                            <!-- Your existing metric cards go here -->
                            <div class="metrics-grid">
                                <div class="metric-card">
                                    <div class="metric-icon purple">
                                        <i class="fas fa-file-text"></i>
                                    </div>
                                    <div class="metric-info">
                                        <span class="metric-title">Today's Revenue</span>
                                        <span class="metric-value">₦ <?= $todayRevenue; ?></span>
                                    </div>
                                </div>

                                <div class="metric-card">
                                    <div class="metric-icon blue">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="metric-info">
                                        <span class="metric-title">Trucks</span>
                                        <span class="metric-value"><?= $totalTrucks; ?></span>
                                    </div>
                                </div>

                                <div class="metric-card">
                                    <div class="metric-icon blue">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="metric-info">
                                        <span class="metric-title">Drivers</span>
                                        <span class="metric-value"><?= $totalDrivers; ?></span>
                                    </div>
                                </div>

                                <div class="metric-card">
                                    <div class="metric-icon gray">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div class="metric-info">
                                        <span class="metric-title">Undelivered</span>
                                        <span class="metric-value"><?= $undelivered; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Row: Recent Reports (2/3) + Deliveries Summary (1/3) -->
                    <div class="col-lg-8 mb-3">
                        <div class="chart-card h-100">
                            <div class="chart-header d-flex justify-content-between align-items-center">
                                <h3>Recent Reports</h3>
                                <a href="reports.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="products-list">
                                <?php if (!empty($recentReports)): ?>
                                    <?php foreach ($recentReports as $report): ?>
                                        <div class="product-item">
                                            <div class="product-icon">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <div class="product-info">
                                                <span class="product-name"><?= htmlspecialchars(getTruckNameById($pdo, $report['truck_id']) ?? 'Unknown Truck'); ?></span>
                                                <span class="product-branch"><?= htmlspecialchars($report['destination'] ?? 'N/A'); ?></span>
                                            </div>
                                            <div class="product-details text-end">
                                                <span class="product-price">₦ <?= number_format($report['goods_value'], 2); ?></span>
                                                <span class="product-quantity small text-muted"><?= date('d M Y', strtotime($report['created_at'])); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center text-muted">No recent reports available.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="chart-card h-100">
                            <div class="chart-header">
                                <h3>Deliveries Summary</h3>
                            </div>
                            <div class="deliveries-content text-center">
                                <div class="delivery-percentage mb-2">85%</div>
                                <div class="delivery-stats">
                                    <div class="stat-item">
                                        <div class="stat-indicator bg-success"></div>
                                        <span class="stat-label">On-time</span>
                                        <span class="stat-value">85%</span>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-indicator bg-warning"></div>
                                        <span class="stat-label">In Progress</span>
                                        <span class="stat-value">10%</span>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-indicator bg-danger"></div>
                                        <span class="stat-label">Delayed</span>
                                        <span class="stat-value">5%</span>
                                    </div>
                                </div>
                                <button class="download-btn mt-3">
                                    <i class="fas fa-download"></i> Download Statistics
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row: Recent Activity Logs (Full Width) -->
                    <div class="col-12 mb-4">
                        <div class="chart-card">
                            <div class="chart-header d-flex justify-content-between align-items-center">
                                <h3>Recent Activity Logs</h3>
                                <a href="reports.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="products-list">
                                <?php if (!empty($recentReports)): ?>
                                    <?php foreach ($recentReports as $report): ?>
                                        <div class="product-item">
                                            <div class="product-icon"><i class="fas fa-truck"></i></div>
                                            <div class="product-info">
                                                <span class="product-name"><?= htmlspecialchars(getTruckNameById($pdo, $report['truck_id']) ?? 'Unknown Truck'); ?></span>
                                                <span class="product-branch"><?= htmlspecialchars($report['destination'] ?? 'N/A'); ?></span>
                                            </div>
                                            <div class="product-details text-end">
                                                <span class="product-price">₦ <?= number_format($report['goods_value'], 2); ?></span>
                                                <span class="product-quantity small text-muted"><?= date('d M Y', strtotime($report['created_at'])); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center text-muted">No recent activity available.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>
</body>

</html>