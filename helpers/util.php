<?php

function getTodayRevenue(PDO $pdo): string
{
    $stmt = $pdo->prepare("SELECT SUM(goods_value) as total FROM reports WHERE DATE(created_at) = CURDATE()");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return number_format($result['total'] ?? 0, 2);
}

function getTotalTrucks(PDO $pdo): int
{
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM trucks");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return intval($result['count']);
}

function getTotalDrivers(PDO $pdo): int
{
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM drivers");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return intval($result['count']);
}

function getUndeliveredReports(PDO $pdo): int
{
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM reports WHERE status = 'pending'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return intval($result['count']);
}

function getRecentReports(PDO $pdo, int $limit = 5): array
{
    // Step 1: Fetch recent reports
    $stmt = $pdo->prepare("SELECT * FROM reports ORDER BY created_at DESC LIMIT ?");
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->execute();
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 2: Map truck and driver names manually
    foreach ($reports as &$report) {
        // Get Truck Name
        $truckName = getTruckNameById($pdo, $report['truck_id']);
        $report['truck_name'] = $truckName ?? 'Unknown Truck';

        // Get Driver Name
        $driverName = getDriverNameById($pdo, $report['driver_id']);
        $report['driver_name'] = $driverName ?? 'Unknown Driver';
    }

    return $reports;
}

// Helper function to get truck name by ID
function getTruckNameById(PDO $pdo, int $truckId): ?string
{
    $stmt = $pdo->prepare("SELECT truck_name FROM trucks WHERE id = ?");
    $stmt->execute([$truckId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['truck_name'] ?? null;
}

// Helper function to get driver name by ID
function getDriverNameById(PDO $pdo, int $driverId): ?string
{
    $stmt = $pdo->prepare("SELECT first_name FROM drivers WHERE id = ?");
    $stmt->execute([$driverId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['first_name'] ?? null;
}

function getUserSettings(PDO $pdo, int $userId): array
{
    $stmt = $pdo->prepare("SELECT * FROM user_settings WHERE user_id = ?");
    $stmt->execute([$userId]);
    $settings = $stmt->fetch(PDO::FETCH_ASSOC);

    // Provide default values if no settings found
    return [
        'biometrics_enabled'      => isset($settings['biometrics_enabled']) ? (bool)$settings['biometrics_enabled'] : false,
        'hide_balance'    => isset($settings['hide_balance']) ? (bool)$settings['hide_balance'] : false,
        'session_expiry'  => isset($settings['session_expiry']) ? (bool)$settings['session_expiry'] : true,
        'dark_mode'  => isset($settings['dark_mode']) ? (bool)$settings['dark_mode'] : true,
    ];
}
