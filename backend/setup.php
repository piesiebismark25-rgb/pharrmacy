<?php
/**
 * Automated Setup & Configuration Installer
 * I.K HOLINESS HOME CARE SERVICES
 * Can be run via Web Browser (http://localhost/ik-holiness-clinic/backend/setup.php) or CLI
 */
require_once __DIR__ . '/config/config.php';

$isCli = (php_sapi_name() === 'cli');
$logs = [];
$status = 'pending';
$errorDetails = '';

try {
    // Try connecting directly with dbname (standard for shared hosts like InfinityFree)
    try {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $logs[] = "Connected successfully to MySQL Database '" . DB_NAME . "' at " . DB_HOST;
    } catch (PDOException $e) {
        // Fallback for local environments where database might not exist yet
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE " . DB_NAME);
        $logs[] = "Database '" . DB_NAME . "' created and initialized.";
    }

    // 2. Import Schema
    $schemaFile = __DIR__ . '/database/schema.sql';
    if (!file_exists($schemaFile)) {
        throw new Exception("Schema file not found at: $schemaFile");
    }
    $sql = file_get_contents($schemaFile);
    $pdo->exec($sql);
    $logs[] = "Database tables (clients, visits, appointments, invoices, payments, users, settings) created.";

    // 3. Seed Clinic Settings
    $stmt = $pdo->prepare("
        INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, currency)
        VALUES (1, :name, :address, :phone, :email, :currency)
        ON DUPLICATE KEY UPDATE clinic_name = VALUES(clinic_name), clinic_address = VALUES(clinic_address), phone_number = VALUES(phone_number), email = VALUES(email)
    ");
    $stmt->execute([
        ':name' => APP_NAME,
        ':address' => CLINIC_LOCATION,
        ':phone' => CLINIC_PHONE,
        ':email' => CLINIC_EMAIL,
        ':currency' => DEFAULT_CURRENCY
    ]);
    $logs[] = "Clinic configuration & branding initialized for " . APP_NAME;

    // 4. Seed Admin & Staff Users
    $admin_user = 'admin';
    $admin_pass = password_hash('admin123', PASSWORD_BCRYPT);
    $admin_name = 'Dr. I.K Holiness';

    $check = $pdo->prepare("SELECT id FROM users WHERE username = :u");
    $check->execute([':u' => $admin_user]);
    if (!$check->fetch()) {
        $ins = $pdo->prepare("INSERT INTO users (username, password_hash, full_name, role) VALUES (:u, :p, :n, 'admin')");
        $ins->execute([':u' => $admin_user, ':p' => $admin_pass, ':n' => $admin_name]);
        $logs[] = "Admin Doctor account created: username 'admin' / password 'admin123'";
    } else {
        $logs[] = "Admin Doctor account verified (admin / admin123).";
    }

    $staff_user = 'staff';
    $staff_pass = password_hash('staff123', PASSWORD_BCRYPT);
    $staff_name = 'Clinical Staff Nurse';

    $check->execute([':u' => $staff_user]);
    if (!$check->fetch()) {
        $ins = $pdo->prepare("INSERT INTO users (username, password_hash, full_name, role) VALUES (:u, :p, :n, 'staff')");
        $ins->execute([':u' => $staff_user, ':p' => $staff_pass, ':n' => $staff_name]);
        $logs[] = "Clinical Staff account created: username 'staff' / password 'staff123'";
    } else {
        $logs[] = "Clinical Staff account verified (staff / staff123).";
    }

    // 5. Seed Demonstration Patients & Encounters if table is empty
    $pCount = (int)$pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();
    if ($pCount === 0) {
        $demoClients = [
            [
                ':id' => 'CL-000001', ':name' => 'Madam Akua Serwaa', ':gender' => 'Female', ':dob' => '1958-04-12', ':age' => 68,
                ':phone' => '0244112233', ':address' => 'Plot 12, Pankrono Estate, Kumasi',
                ':ename' => 'Kofi Serwaa (Son)', ':ephone' => '0555998877'
            ],
            [
                ':id' => 'CL-000002', ':name' => 'Opanin Kwabena Osei', ':gender' => 'Male', ':dob' => '1962-09-24', ':age' => 64,
                ':phone' => '0208776655', ':address' => 'Near Pankrono High School, Kumasi',
                ':ename' => 'Abena Osei (Wife)', ':ephone' => '0243332211'
            ],
            [
                ':id' => 'CL-000003', ':name' => 'Mrs. Beatrice Appiah', ':gender' => 'Female', ':dob' => '1975-11-03', ':age' => 51,
                ':phone' => '0501234567', ':address' => 'House 8B, Tafo Nhyiaeso, Kumasi',
                ':ename' => 'Dr. Emmanuel Appiah', ':ephone' => '0241974447'
            ]
        ];

        $insClient = $pdo->prepare("
            INSERT INTO clients (client_id, full_name, gender, dob, age, phone, address, emergency_name, emergency_phone, registration_date)
            VALUES (:id, :name, :gender, :dob, :age, :phone, :address, :ename, :ephone, CURDATE())
        ");
        foreach ($demoClients as $dc) {
            $insClient->execute($dc);
        }
        $logs[] = "Seeded 3 initial demonstration home care patients.";

        // Demo Encounter
        $insVisit = $pdo->prepare("
            INSERT INTO visits (client_id, visit_date, complaint, symptoms, temperature, bp, weight, diagnosis, treatment, prescription, notes, attending_staff_id)
            VALUES ('CL-000001', NOW(), 'Routine diabetic checkup and minor leg ulcer dressing.', 'Fasting blood sugar high, mild localized swelling on right ankle.', '36.7', '135/85', '68.0', 'Type 2 Diabetes Mellitus & Stage 1 Superficial Ulcer', 'Wound debridement, normal saline irrigation, and sterile hydrocolloid dressing applied.', 'Tab Metformin 500mg BD x 30 days\nTab Vitamin C 1000mg Daily x 14 days', 'Review wound healing in 5 days. Low carbohydrate dietary reinforcement.', 1)
        ");
        $insVisit->execute();
        $logs[] = "Seeded demonstration clinical encounter and prescription record.";

        // Demo Invoice
        $pdo->exec("
            INSERT INTO invoices (invoice_number, client_id, invoice_date, total_amount, amount_paid, balance, payment_status)
            VALUES ('INV-000001', 'CL-000001', CURDATE(), 180.00, 180.00, 0.00, 'Paid')
        ");
        $pdo->exec("
            INSERT INTO invoice_items (invoice_number, service_description, quantity, unit_price, subtotal)
            VALUES 
            ('INV-000001', 'Glucose Monitoring & Vital Signs Check', 1, 60.00, 60.00),
            ('INV-000001', 'Wound Dressing & Aseptic Care', 1, 120.00, 120.00)
        ");
        $pdo->exec("
            INSERT INTO payments (payment_id, receipt_number, client_id, invoice_number, payment_date, amount_paid, payment_method, staff_id, notes)
            VALUES ('PAY-000001', 'REC-000001', 'CL-000001', 'INV-000001', NOW(), 180.00, 'Mobile Money', 1, 'MoMo Reference: MM202688990')
        ");
        $logs[] = "Seeded demonstration billing invoice and payment receipt.";

        // Demo Appointment
        $pdo->exec("
            INSERT INTO appointments (client_id, appointment_date, appointment_time, reason, status)
            VALUES ('CL-000002', CURDATE(), '10:30:00', 'Catheter Replacement & Vital Signs Monitoring', 'Scheduled')
        ");
        $logs[] = "Seeded scheduled home care appointment for today.";
    }

    $status = 'success';

} catch (Exception $e) {
    $status = 'error';
    $errorDetails = $e->getMessage();
}

// If running in CLI: Output clean terminal text
if ($isCli) {
    echo "====================================================\n";
    echo APP_NAME . " - Database Setup\n";
    echo "====================================================\n\n";
    foreach ($logs as $log) {
        echo "[SUCCESS] $log\n";
    }
    if ($status === 'error') {
        echo "\n[ERROR] Setup failed: $errorDetails\n";
        echo "Please ensure MySQL is running in XAMPP.\n";
    } else {
        echo "\nSetup completed successfully!\n";
        echo "Public Website URL: " . APP_URL . "/\n";
        echo "Doctor Portal URL:  " . APP_URL . "/login\n";
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Installer - I.K HOLINESS HOME CARE SERVICES</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #060a09;
            background-image: radial-gradient(circle at 50% 0%, rgba(20, 184, 166, 0.15) 0%, transparent 60%);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .setup-card {
            background-color: #0f1816;
            border: 1px solid rgba(45, 212, 191, 0.25);
            border-radius: 20px;
            padding: 40px;
            max-width: 620px;
            width: 100%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }
        .log-box {
            background-color: #060a09;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 16px;
            max-height: 260px;
            overflow-y: auto;
            font-family: monospace;
            font-size: 0.85rem;
            color: #94a3b8;
        }
        .log-item {
            margin-bottom: 8px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }
        .btn-primary-custom {
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #059669 0%, #0f766e 100%);
            color: #ffffff;
        }
        .btn-secondary-custom {
            background-color: #1a2c28;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>
<body>
    <div class="setup-card">
        <div class="text-center mb-4">
            <div class="d-inline-flex p-3 rounded-3 mb-3" style="background: rgba(20, 184, 166, 0.2); border: 1px solid rgba(45, 212, 191, 0.35);">
                <i class="fa-solid fa-server fs-2 text-teal" style="color: #2dd4bf;"></i>
            </div>
            <h3 class="fw-bold text-white mb-1" style="font-family: 'Outfit';">I.K HOLINESS HOME CARE SERVICES</h3>
            <p class="text-secondary small mb-0">System Setup & Database Configuration</p>
        </div>

        <?php if ($status === 'success'): ?>
            <div class="alert alert-success border-0 rounded-3 bg-opacity-10 bg-success text-success p-3 mb-4">
                <i class="fa-solid fa-circle-check fs-5 me-2"></i>
                <strong>Database & System Initialized Successfully!</strong>
            </div>
        <?php else: ?>
            <div class="alert alert-danger border-0 rounded-3 bg-opacity-10 bg-danger text-danger p-3 mb-4">
                <i class="fa-solid fa-circle-exclamation fs-5 me-2"></i>
                <strong>Database Connection Error:</strong><br>
                <small><?php echo htmlspecialchars($errorDetails); ?></small><br>
                <small class="mt-2 d-block">Please make sure <strong>MySQL</strong> is started in your <strong>XAMPP Control Panel</strong>.</small>
            </div>
        <?php endif; ?>

        <div class="mb-4">
            <label class="form-label text-muted small fw-bold text-uppercase">Installation Progress Log:</label>
            <div class="log-box">
                <?php foreach ($logs as $l): ?>
                    <div class="log-item">
                        <i class="fa-solid fa-check text-success mt-1"></i>
                        <span><?php echo htmlspecialchars($l); ?></span>
                    </div>
                <?php endforeach; ?>
                <?php if ($status === 'error'): ?>
                    <div class="log-item text-danger">
                        <i class="fa-solid fa-xmark text-danger mt-1"></i>
                        <span><?php echo htmlspecialchars($errorDetails); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($status === 'success'): ?>
            <div class="p-3 rounded-3 mb-4" style="background-color: rgba(20, 184, 166, 0.08); border: 1px dashed rgba(20, 184, 166, 0.3); font-size: 0.85rem;">
                <strong class="text-white d-block mb-1"><i class="fa-solid fa-key text-teal me-1" style="color: #2dd4bf;"></i> Default Doctor & Staff Credentials:</strong>
                <div>Doctor / Admin: <code class="text-teal">admin</code> / <code class="text-teal">admin123</code></div>
                <div>Staff Nurse: <code class="text-teal">staff</code> / <code class="text-teal">staff123</code></div>
            </div>

            <div class="d-flex justify-content-between gap-2 flex-wrap">
                <a href="<?php echo APP_URL; ?>/" class="btn-secondary-custom">
                    <i class="fa-solid fa-globe"></i> View Public Website
                </a>
                <a href="<?php echo APP_URL; ?>/login" class="btn-primary-custom">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login to Doctor Portal
                </a>
            </div>
        <?php else: ?>
            <div class="text-center">
                <a href="<?php echo APP_URL; ?>/backend/setup.php" class="btn-primary-custom">
                    <i class="fa-solid fa-arrows-rotate"></i> Retry Installation
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>