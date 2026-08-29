<?php
/**
 * Setup Script - I.K HOLINESS HOME CARE SERVICES
 * Usage: & "C:\xampp\php\php.exe" setup.php
 */
require_once __DIR__ . '/config/config.php';

echo "====================================================\n";
echo "Starting " . APP_NAME . " Database Setup...\n";
echo "====================================================\n\n";

try {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";charset=" . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    echo "[SUCCESS] Connected to MySQL Server.\n";

    // 1. Create Database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "[SUCCESS] Database '" . DB_NAME . "' ready.\n";
    $pdo->exec("USE " . DB_NAME);

    // 2. Import Schema
    $schemaFile = __DIR__ . '/database/schema.sql';
    if (!file_exists($schemaFile)) {
        die("[ERROR] Schema file not found at: $schemaFile\n");
    }
    $sql = file_get_contents($schemaFile);
    $pdo->exec($sql);
    echo "[SUCCESS] Schema imported successfully.\n";

    // 3. Seed Settings
    $stmt = $pdo->prepare("
        INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, currency)
        VALUES (1, :name, :address, :phone, :email, :currency)
        ON DUPLICATE KEY UPDATE clinic_name = :name, clinic_address = :address, phone_number = :phone, email = :email
    ");
    $stmt->execute([
        ':name' => APP_NAME,
        ':address' => CLINIC_LOCATION,
        ':phone' => CLINIC_PHONE,
        ':email' => CLINIC_EMAIL,
        ':currency' => DEFAULT_CURRENCY
    ]);
    echo "[SUCCESS] Seeded clinic settings.\n";

    // 4. Seed Admin & Staff Users
    $admin_user = 'admin';
    $admin_pass = password_hash('admin123', PASSWORD_BCRYPT);
    $admin_name = 'Dr. I.K Holiness';

    $check = $pdo->prepare("SELECT id FROM users WHERE username = :u");
    $check->execute([':u' => $admin_user]);
    if (!$check->fetch()) {
        $ins = $pdo->prepare("INSERT INTO users (username, password_hash, full_name, role) VALUES (:u, :p, :n, 'admin')");
        $ins->execute([':u' => $admin_user, ':p' => $admin_pass, ':n' => $admin_name]);
        echo "[SUCCESS] Created Admin User: admin / admin123\n";
    }

    $staff_user = 'staff';
    $staff_pass = password_hash('staff123', PASSWORD_BCRYPT);
    $staff_name = 'Clinical Staff Nurse';

    $check->execute([':u' => $staff_user]);
    if (!$check->fetch()) {
        $ins = $pdo->prepare("INSERT INTO users (username, password_hash, full_name, role) VALUES (:u, :p, :n, 'staff')");
        $ins->execute([':u' => $staff_user, ':p' => $staff_pass, ':n' => $staff_name]);
        echo "[SUCCESS] Created Staff User: staff / staff123\n";
    }

    echo "\n====================================================\n";
    echo "Setup Completed Successfully!\n";
    echo "Access URL: " . APP_URL . "\n";
    echo "====================================================\n";

} catch (PDOException $e) {
    echo "[DATABASE NOTICE] Could not connect to MySQL: " . $e->getMessage() . "\n";
    echo "Please ensure MySQL is running in XAMPP Control Panel.\n";
}