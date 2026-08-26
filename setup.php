<?php
/**
 * Setup Script - I.K HOLINESS CLINIC
 *
 * This script automates:
 * 1. Directory Scaffolding: Creates all MVC folders.
 * 2. Database Creation: Creates 'ik_holiness_clinic' database.
 * 3. Database Schema Import: Parses and executes database/schema.sql.
 * 4. Default Seed Data: Inserts default Admin, Staff, and Clinic settings.
 *
 * Usage: Run from CLI: php setup.php
 */

header('Content-Type: text/plain');

// Ensure this script is run via Command Line Interface (CLI) for security
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die("Access Denied: This installation script must be run from the Command Line Interface.\n");
}

echo "=========================================\n";
echo "Starting I.K HOLINESS CLINIC Setup (Phase 2)...\n";
echo "=========================================\n\n";

// --- STEP 1: FOLDER SCAFFOLDING ---
echo "--- Step 1: Scaffolding Directory Structure ---\n";

$directories = [
    'app',
    'app/Controllers',
    'app/Core',
    'app/Helpers',
    'app/Middleware',
    'app/Models',
    'config',
    'database',
    'public',
    'public/assets',
    'public/assets/css',
    'public/assets/js',
    'public/uploads',
    'storage',
    'views',
    'views/shared',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "[SUCCESS] Created directory: /$dir\n";
        } else {
            die("[ERROR] Failed to create directory: /$dir\n");
        }
    } else {
        echo "[INFO] Directory already exists: /$dir\n";
    }
}
echo "Directory scaffolding completed successfully.\n\n";

// --- STEP 2: DATABASE CREATION ---
echo "--- Step 2: Creating Database ---\n";

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';

try {
    // Connect to MySQL server
    $dsn = "mysql:host=$db_host;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    echo "[SUCCESS] Connected to MySQL Server.\n";

    // Create Database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS ik_holiness_clinic CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "[SUCCESS] Database 'ik_holiness_clinic' created or already exists.\n";

    // Select Database
    $pdo->exec("USE ik_holiness_clinic");
    echo "[SUCCESS] Selected database 'ik_holiness_clinic'.\n\n";

    // --- STEP 3: EXECUTE SCHEMA SQL ---
    echo "--- Step 3: Importing Database Schema ---\n";
    $schemaFile = __DIR__ . '/database/schema.sql';
    if (!file_exists($schemaFile)) {
        die("[ERROR] Schema file not found at: $schemaFile\n");
    }

    $sql = file_get_contents($schemaFile);
    
    // Execute the SQL multi-statement using PDO exec (note: standard PDO exec runs multiple queries separated by ;)
    $pdo->exec($sql);
    echo "[SUCCESS] Database schema imported and tables created successfully.\n\n";

    // --- STEP 4: SEED INITIAL DATA ---
    echo "--- Step 4: Seeding Initial Configuration and Users ---\n";

    // Seed default settings
    $stmt = $pdo->query("SELECT COUNT(*) FROM settings");
    if ($stmt->fetchColumn() == 0) {
        $settings_stmt = $pdo->prepare("
            INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, currency)
            VALUES (1, :name, :address, :phone, :email, :currency)
        ");
        $settings_stmt->execute([
            ':name' => 'I.K HOLINESS CLINIC',
            ':address' => '123 Holiness Ave, Accra, Ghana',
            ':phone' => '+233 24 123 4567',
            ':email' => 'info@ikholinessclinic.com',
            ':currency' => 'GH₵'
        ]);
        echo "[SUCCESS] Seeded default clinic settings.\n";
    } else {
        echo "[INFO] Clinic settings already exist. Skipping.\n";
    }

    // Seed Admin User
    $admin_user = 'admin';
    $admin_pass = 'admin123';
    $admin_hash = password_hash($admin_pass, PASSWORD_BCRYPT);
    $admin_name = 'Super Admin';

    $check_admin = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $check_admin->execute([':username' => $admin_user]);
    
    if (!$check_admin->fetch()) {
        $user_stmt = $pdo->prepare("
            INSERT INTO users (username, password_hash, full_name, role)
            VALUES (:username, :password_hash, :full_name, 'admin')
        ");
        $user_stmt->execute([
            ':username' => $admin_user,
            ':password_hash' => $admin_hash,
            ':full_name' => $admin_name
        ]);
        echo "[SUCCESS] Seeded Default Admin User:\n";
        echo "          Username: $admin_user\n";
        echo "          Password: $admin_pass\n";
    } else {
        echo "[INFO] Admin user already exists. Skipping.\n";
    }

    // Seed Staff User
    $staff_user = 'staff';
    $staff_pass = 'staff123';
    $staff_hash = password_hash($staff_pass, PASSWORD_BCRYPT);
    $staff_name = 'Clinic Staff';

    $check_staff = $pdo->prepare("SELECT id FROM users WHERE username = :username");
    $check_staff->execute([':username' => $staff_user]);

    if (!$check_staff->fetch()) {
        $user_stmt = $pdo->prepare("
            INSERT INTO users (username, password_hash, full_name, role)
            VALUES (:username, :password_hash, :full_name, 'staff')
        ");
        $user_stmt->execute([
            ':username' => $staff_user,
            ':password_hash' => $staff_hash,
            ':full_name' => $staff_name
        ]);
        echo "[SUCCESS] Seeded Default Staff User:\n";
        echo "          Username: $staff_user\n";
        echo "          Password: $staff_pass\n\n";
    } else {
        echo "[INFO] Staff user already exists. Skipping.\n\n";
    }

    echo "=========================================\n";
    echo "I.K HOLINESS CLINIC Setup Completed Successfully!\n";
    echo "=========================================\n";

} catch (PDOException $e) {
    die("[DATABASE ERROR] Setup failed: " . $e->getMessage() . "\n");
}
