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
                <!-- Metrics Cards -->
                <div class="metrics-grid">
                    <div class="metric-card">
                        <div class="metric-icon purple">
                            <i class="fas fa-file-text"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Today's Revenue</span>
                            <span class="metric-value">₦ 701,451.33</span>
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-icon blue">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Trucks</span>
                            <span class="metric-value">51</span>
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-icon blue">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Drivers</span>
                            <span class="metric-value">50</span>
                        </div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-icon gray">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Undelivered</span>
                            <span class="metric-value">5</span>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="charts-row">
                    <!-- Weekly Shipments Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Weekly Shipments Chart</h3>
                            <div class="chart-filter">
                                <span>This Week</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="chart-placeholder">
                            <i class="fas fa-chart-bar"></i>
                            <p>Chart functionality excluded</p>
                        </div>
                    </div>

                    <!-- Deliveries -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Deliveries</h3>
                        </div>
                        <div class="deliveries-content">
                            <div class="delivery-percentage">78%</div>
                            <div class="delivery-stats">
                                <div class="stat-item">
                                    <div class="stat-indicator red"></div>
                                    <span class="stat-label">Ontime</span>
                                    <span class="stat-value">78%</span>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-indicator yellow"></div>
                                    <span class="stat-label">In Progress</span>
                                    <span class="stat-value">78%</span>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-indicator dark"></div>
                                    <span class="stat-label">Delayed</span>
                                    <span class="stat-value">78%</span>
                                </div>
                            </div>
                            <button class="download-btn">
                                <i class="fas fa-download"></i>
                                Download Statistics
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bottom Row -->
                <div class="bottom-row">
                    <!-- Store Locations -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Store Locations</h3>
                            <div class="chart-filter">
                                <span>In Europe</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="chart-placeholder">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Map functionality excluded</p>
                        </div>
                    </div>

                    <!-- Products In Stock -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Products In Stock</h3>
                            <a href="#" class="view-all">View All</a>
                        </div>
                        <div class="products-list">
                            <div class="product-item">
                                <div class="product-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="product-info">
                                    <span class="product-name">Red velvet frostings</span>
                                    <span class="product-branch">Abuja Branch</span>
                                </div>
                                <div class="product-details">
                                    <span class="product-price">₦ 7,000</span>
                                    <span class="product-quantity">x 5</span>
                                </div>
                            </div>

                            <div class="product-item">
                                <div class="product-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="product-info">
                                    <span class="product-name">Red velvet frostings</span>
                                    <span class="product-branch">Abuja Branch</span>
                                </div>
                                <div class="product-details">
                                    <span class="product-price">₦ 7,000</span>
                                    <span class="product-quantity">x 5</span>
                                </div>
                            </div>

                            <div class="product-item">
                                <div class="product-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="product-info">
                                    <span class="product-name">Red velvet frostings</span>
                                    <span class="product-branch">Abuja Branch</span>
                                </div>
                                <div class="product-details">
                                    <span class="product-price">₦ 7,000</span>
                                    <span class="product-quantity">x 5</span>
                                </div>
                            </div>

                            <div class="product-item">
                                <div class="product-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="product-info">
                                    <span class="product-name">Red velvet frostings</span>
                                    <span class="product-branch">Abuja Branch</span>
                                </div>
                                <div class="product-details">
                                    <span class="product-price">₦ 7,000</span>
                                    <span class="product-quantity">x 5</span>
                                </div>
                            </div>

                            <div class="product-item">
                                <div class="product-icon">
                                    <i class="fas fa-box"></i>
                                </div>
                                <div class="product-info">
                                    <span class="product-name">Red velvet frostings</span>
                                    <span class="product-branch">Abuja Branch</span>
                                </div>
                                <div class="product-details">
                                    <span class="product-price">₦ 7,000</span>
                                    <span class="product-quantity">x 5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <script src="../assets/js/sidebar.js"></script>
</body>

</html>