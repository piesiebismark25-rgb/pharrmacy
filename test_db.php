<?php
/**
 * Test Database Connection
 *
 * Verifies that:
 * 1. The custom autoloader works.
 * 2. The database configurations are loaded.
 * 3. The Singleton Database class returns a successful connection.
 */

// Load the custom autoloader
require_once __DIR__ . '/app/autoload.php';

// Load configurations
require_once __DIR__ . '/config/config.php';

use App\Core\Database;

echo "=========================================\n";
echo "Testing Database Integration...\n";
echo "=========================================\n\n";

try {
    // Attempt to retrieve the Singleton connection instance
    echo "[INFO] Requesting Database Singleton instance...\n";
    $dbInstance1 = Database::getInstance();
    $connection1 = $dbInstance1->getConnection();
    echo "[SUCCESS] Connection 1 obtained.\n";

    // Request a second instance to verify the Singleton pattern is functioning
    $dbInstance2 = Database::getInstance();
    $connection2 = $dbInstance2->getConnection();
    echo "[SUCCESS] Connection 2 obtained.\n";

    // Verify both connections reference the exact same object instance
    if ($dbInstance1 === $dbInstance2) {
        echo "[SUCCESS] Singleton Pattern Confirmed: Both variables point to the exact same class instance.\n";
    } else {
        echo "[ERROR] Singleton Pattern Failed: Multiple database class instances were generated.\n";
    }

    // Run a basic diagnostic query (checking MySQL version)
    $stmt = $connection1->query("SELECT VERSION() AS version");
    $result = $stmt->fetch();
    echo "[SUCCESS] Database Query Diagnostic Output: MySQL Version " . $result['version'] . "\n\n";

    echo "=========================================\n";
    echo "Verification Complete: Connection Successful!\n";
    echo "=========================================\n";

} catch (Exception $e) {
    echo "[FAILURE] Integration failed with error: " . $e->getMessage() . "\n";
    echo "[HELP] Ensure your local MySQL server (XAMPP/MySQL) is started and active.\n";
}
