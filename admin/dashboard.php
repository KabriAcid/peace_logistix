<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShipUp.ng Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <span class="logo-ship">Ship</span><span class="logo-up">Up</span><span class="logo-ng">.ng</span>
                </div>
                <button class="close-sidebar" id="closeSidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-file-text"></i>
                    <span>Quotations</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-box"></i>
                    <span>Shipments</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-truck"></i>
                    <span>Dispatches</span>
                </a>
                <a href="#" class="nav-item">
                    <i class="fas fa-store"></i>
                    <span>Store Management</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <i class="fas fa-chevron-left"></i>
                    <h1>Dashboard</h1>
                </div>
                
                <div class="header-right">
                    <div class="search-container">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search by Sales, products, attendants, branch...">
                    </div>
                    
                    <div class="notification">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">1</span>
                    </div>
                    
                    <div class="user-profile">
                        <img src="https://images.pexels.com/photos/1040880/pexels-photo-1040880.jpeg?auto=compress&cs=tinysrgb&w=32&h=32&dpr=2" alt="User">
                        <div class="user-info">
                            <span class="user-name">Tiger Shroff</span>
                            <span class="user-id">ID: 1234567</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Metrics Cards -->
                <div class="metrics-grid">
                    <div class="metric-card">
                        <div class="metric-icon purple">
                            <i class="fas fa-file-text"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Request For Quotation</span>
                            <span class="metric-value">0</span>
                        </div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="metric-icon blue">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Today's Revenue</span>
                            <span class="metric-value">₦ 7,000</span>
                        </div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="metric-icon blue">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Shipments</span>
                            <span class="metric-value">50</span>
                        </div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="metric-icon gray">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="metric-info">
                            <span class="metric-title">Total Warehouse</span>
                            <span class="metric-value">100</span>
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

    <script>
        // Mobile sidebar toggle
        const menuToggle = document.getElementById('menuToggle');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('open');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebarFunc() {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        menuToggle.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarFunc);
        sidebarOverlay.addEventListener('click', closeSidebarFunc);

        // Close sidebar on window resize if desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebarFunc();
            }
        });
    </script>
</body>
</html>