<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - I.K HOLINESS CLINIC</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-grad: linear-gradient(135deg, #0f766e 0%, #115e59 100%);
            --secondary-grad: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
            --body-bg: #0b1514;
            --card-bg: rgba(20, 35, 33, 0.7);
            --card-border: rgba(13, 148, 136, 0.2);
            --text-color: #f2f7f7;
            --accent-color: #2dd4bf;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at 50% 50%, #142e2a 0%, var(--body-bg) 100%);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Decorative Background Orbs */
        .orb {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(45, 212, 191, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
            filter: blur(40px);
            z-index: 0;
            pointer-events: none;
        }
        .orb-1 { top: -100px; left: -100px; }
        .orb-2 { bottom: -100px; right: -100px; }

        .login-container {
            z-index: 10;
            width: 100%;
            max-width: 480px;
            padding: 20px;
        }

        .login-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            padding: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            box-shadow: 0 20px 45px rgba(13, 148, 136, 0.25);
            border-color: rgba(45, 212, 191, 0.4);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-icon {
            font-size: 3rem;
            background: linear-gradient(135deg, #2dd4bf 0%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            display: inline-block;
            filter: drop-shadow(0 2px 8px rgba(45, 212, 191, 0.3));
        }

        .clinic-title {
            font-weight: 800;
            letter-spacing: 1.5px;
            font-size: 1.6rem;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .clinic-subtitle {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--accent-color);
            font-weight: 500;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: #a3bda8;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .input-group-text {
            background-color: rgba(13, 148, 136, 0.1);
            border: 1px solid rgba(13, 148, 136, 0.25);
            color: var(--accent-color);
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .form-control {
            background-color: rgba(10, 20, 18, 0.6);
            border: 1px solid rgba(13, 148, 136, 0.25);
            color: #ffffff;
            font-weight: 400;
            padding: 12px;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(10, 20, 18, 0.8);
            border-color: var(--accent-color);
            box-shadow: 0 0 10px rgba(45, 212, 191, 0.25);
            color: #ffffff;
        }

        .form-control::placeholder {
            color: #527570;
        }

        .btn-login {
            background: var(--primary-grad);
            border: none;
            color: white;
            padding: 14px;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 12px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-top: 15px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
        }

        .btn-login:hover {
            background: var(--secondary-grad);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 212, 191, 0.45);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert-custom {
            background-color: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.4);
            color: #fca5a5;
            border-radius: 12px;
            padding: 12px;
            font-size: 0.9rem;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .demo-credentials {
            margin-top: 30px;
            padding: 15px;
            border-radius: 12px;
            background: rgba(13, 148, 136, 0.05);
            border: 1px dashed rgba(13, 148, 136, 0.2);
            font-size: 0.8rem;
            color: #8faea8;
            text-align: center;
        }

        .demo-credentials code {
            color: var(--accent-color);
            background: rgba(45, 212, 191, 0.1);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
    </style>
</head>
<body>

    <!-- Background Orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="login-container">
        <div class="login-card">
            
            <div class="logo-section">
                <i class="fa-solid fa-house-chimney-medical logo-icon"></i>
                <h1 class="clinic-title">I.K HOLINESS CLINIC</h1>
                <p class="clinic-subtitle">Clinic Management System</p>
            </div>

            <!-- Error Alerts -->
            <?php if (!empty($errors)): ?>
                <div class="alert-custom">
                    <i class="fa-solid fa-circle-exclamation text-danger fs-5"></i>
                    <div>
                        <?php foreach ($errors as $error): ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="<?php echo APP_URL; ?>/login" method="POST" autocomplete="off">
                <div class="mb-4">
                    <label for="username" class="form-label">
                        <i class="fa-solid fa-user-doctor"></i> Username / Email
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" 
                               name="username" 
                               id="username" 
                               class="form-control" 
                               placeholder="Enter your username" 
                               value="<?php echo $old_username ?? ''; ?>" 
                               required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="fa-solid fa-key"></i> Password
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control" 
                               placeholder="Enter your password" 
                               required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login w-100">
                    Sign In <i class="fa-solid fa-arrow-right-to-bracket ms-2"></i>
                </button>
            </form>

            <!-- Quick Demo Access Credentials -->
            <div class="demo-credentials">
                <i class="fa-solid fa-circle-info me-1"></i> <strong>Demo Access Settings:</strong><br>
                Admin: <code>admin</code> / <code>admin123</code><br>
                Staff: <code>staff</code> / <code>staff123</code>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
