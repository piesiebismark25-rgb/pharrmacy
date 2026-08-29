<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practitioner Login - I.K HOLINESS HOME CARE SERVICES</title>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --bg-base: #f8fafc;
            --surface-card: #ffffff;
            --border-subtle: #e2e8f0;
            --border-strong: #cbd5e1;
            --accent-main: #2563eb;
            --accent-dark: #1d4ed8;
            --accent-light: #eff6ff;
            --accent-border: #bfdbfe;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-base);
            background-image: 
                radial-gradient(at 0% 0%, rgba(37, 99, 235, 0.04) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(29, 78, 216, 0.03) 0px, transparent 50%);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        .auth-container {
            width: 100%;
            max-width: 400px;
        }

        .auth-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 16px;
            padding: 32px 28px;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .logo-wrap {
            text-align: center;
            margin-bottom: 24px;
            display: block;
            text-decoration: none;
            transition: transform 0.15s ease;
        }

        .logo-wrap:hover {
            transform: translateY(-2px);
        }

        .logo-box {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px auto;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(37, 99, 235, 0.25);
            color: #ffffff;
            font-size: 1.25rem;
        }

        .clinic-heading {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.01em;
            margin-bottom: 2px;
        }

        .clinic-subheading {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--accent-main);
            font-weight: 700;
            margin-bottom: 3px;
        }

        .clinic-motto {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-style: italic;
        }

        .form-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 5px;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            color: #94a3b8;
            font-size: 0.85rem;
            z-index: 5;
            pointer-events: none;
        }

        .eye-toggle-btn {
            position: absolute;
            right: 12px;
            background: none;
            border: none;
            color: #94a3b8;
            font-size: 0.9rem;
            cursor: pointer;
            z-index: 5;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.15s ease;
        }

        .eye-toggle-btn:hover {
            color: var(--accent-main);
        }

        .form-control-custom {
            width: 100%;
            background-color: #ffffff;
            border: 1px solid var(--border-strong);
            border-radius: 8px;
            padding: 9px 38px 9px 36px;
            color: var(--text-primary);
            font-size: 0.8125rem;
            transition: all 0.15s ease-in-out;
            min-height: 40px;
        }

        .form-control-custom:focus {
            background-color: #ffffff;
            border-color: var(--accent-main);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
            color: var(--text-primary);
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
            font-size: 0.8rem;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: 1px solid #1d4ed8;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 1px 3px rgba(37, 99, 235, 0.25);
            transition: all 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            transform: translateY(-1px);
        }

        .back-home-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            color: var(--text-muted);
            text-decoration: none;
            margin-top: 14px;
            transition: color 0.15s ease;
        }

        .back-home-link:hover {
            color: var(--accent-main);
        }

        .auth-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.72rem;
            color: var(--text-muted);
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <div class="auth-card">
            
            <!-- Clickable Logo Header linking to Public Homepage -->
            <a href="<?php echo APP_URL; ?>/" class="logo-wrap" title="Click to return to homepage">
                <div class="logo-box">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <h1 class="clinic-heading">I.K HOLINESS</h1>
                <div class="clinic-subheading">Home Care Services</div>
                <div class="clinic-motto">"Your Health is Our Life"</div>
            </a>

            <!-- Error Alerts -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger border-0 rounded-3 mb-3 p-2 px-3" style="background-color: #fff1f2; color: #be123c; border: 1px solid #fecdd3 !important; font-size: 0.78rem;" role="alert">
                    <div class="d-flex align-items-center gap-2 mb-1 fw-bold">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>Authentication Required</span>
                    </div>
                    <ul class="mb-0 ps-3">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="<?php echo APP_URL; ?>/login" method="POST" autocomplete="off">
                <div class="mb-3">
                    <label for="username" class="form-label">Practitioner Username</label>
                    <div class="input-group-custom">
                        <i class="fa-solid fa-user-doctor input-icon"></i>
                        <input type="text" 
                               name="username" 
                               id="username" 
                               class="form-control-custom" 
                               placeholder="Enter username" 
                               value="<?php echo $old_username ?? ''; ?>" 
                               required 
                               autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Key</label>
                    <div class="input-group-custom">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control-custom" 
                               placeholder="Enter password" 
                               required>
                        <!-- Password Visibility Toggle Button -->
                        <button type="button" class="eye-toggle-btn" onclick="togglePasswordVisibility()" title="Toggle password visibility">
                            <i class="fa-regular fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Sign In to Portal <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                </button>
            </form>

            <div class="text-center">
                <a href="<?php echo APP_URL; ?>/" class="back-home-link">
                    <i class="fa-solid fa-arrow-left"></i> Back to Public Homepage
                </a>
            </div>

            <div class="auth-footer border-top pt-3 mt-3">
                Pankrono, Kumasi &bull; 0241974447 / 0550974126<br>
                Secure Clinical Practice Management Portal
            </div>

        </div>
    </div>

    <!-- Password Visibility Toggle Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
