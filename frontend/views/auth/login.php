<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Access - I.K HOLINESS HOME CARE SERVICES</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6.5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --bg-base: #060a09;
            --surface-card: #0f1816;
            --surface-card-hover: #14221f;
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-active: rgba(45, 212, 191, 0.35);
            --accent-main: #10b981;
            --accent-teal: #14b8a6;
            --accent-glow: rgba(20, 184, 166, 0.15);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-base);
            background-image: 
                radial-gradient(circle at 50% 0%, rgba(20, 184, 166, 0.12) 0%, transparent 60%),
                radial-gradient(circle at 100% 100%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            margin: 0;
        }

        .auth-container {
            width: 100%;
            max-width: 440px;
        }

        .auth-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 40px 36px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            position: relative;
        }

        .logo-wrap {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-box {
            width: 56px;
            height: 56px;
            margin: 0 auto 16px auto;
            border-radius: 14px;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.25) 0%, rgba(16, 185, 129, 0.12) 100%);
            border: 1px solid var(--border-active);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px var(--accent-glow);
        }

        .clinic-heading {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.35rem;
            color: #ffffff;
            letter-spacing: -0.01em;
            margin-bottom: 4px;
        }

        .clinic-subheading {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--accent-teal);
            font-weight: 600;
            margin-bottom: 4px;
        }

        .clinic-motto {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-style: italic;
        }

        .form-label {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            font-size: 0.95rem;
            z-index: 5;
            pointer-events: none;
        }

        .form-control-custom {
            width: 100%;
            background-color: rgba(6, 10, 9, 0.6);
            border: 1px solid var(--border-subtle);
            border-radius: 10px;
            padding: 12px 14px 12px 42px;
            color: var(--text-primary);
            font-size: 0.875rem;
            transition: all 0.15s ease-in-out;
            min-height: 44px;
        }

        .form-control-custom:focus {
            background-color: rgba(6, 10, 9, 0.9);
            border-color: var(--accent-teal);
            box-shadow: 0 0 0 3px var(--accent-glow);
            color: #ffffff;
            outline: none;
        }

        .form-control-custom::placeholder {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #10b981 0%, #0d9488 100%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.9375rem;
            padding: 12px;
            border-radius: 10px;
            margin-top: 24px;
            box-shadow: 0 2px 12px rgba(16, 185, 129, 0.3);
            transition: all 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #059669 0%, #0f766e 100%);
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.45);
            transform: translateY(-1px);
        }

        .demo-badge-wrap {
            margin-top: 28px;
            padding: 14px;
            border-radius: 12px;
            background-color: rgba(255, 255, 255, 0.02);
            border: 1px dashed var(--border-subtle);
            font-size: 0.78rem;
            color: var(--text-secondary);
            text-align: center;
        }

        .credential-chip {
            display: inline-block;
            background-color: rgba(20, 184, 166, 0.1);
            border: 1px solid rgba(20, 184, 166, 0.25);
            color: var(--accent-teal);
            padding: 2px 8px;
            border-radius: 6px;
            font-family: monospace;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .credential-chip:hover {
            background-color: rgba(20, 184, 166, 0.2);
        }

        .auth-footer {
            margin-top: 24px;
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <div class="auth-card">
            
            <div class="logo-wrap">
                <div class="logo-box">
                    <!-- Brand SVG Crest -->
                    <svg width="34" height="34" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="2" width="28" height="28" rx="8" fill="#0d9488" fill-opacity="0.3" stroke="#2dd4bf" stroke-width="1.5"/>
                        <path d="M16 7V25M7 16H25" stroke="#2dd4bf" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="16" cy="16" r="4" fill="#10b981" stroke="#ffffff" stroke-width="1.2"/>
                    </svg>
                </div>
                <h1 class="clinic-heading">I.K HOLINESS</h1>
                <div class="clinic-subheading">Home Care Services</div>
                <div class="clinic-motto">"Your Health is Our Life"</div>
            </div>

            <!-- Error Alerts -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger border-0 rounded-3 bg-opacity-10 bg-danger text-danger mb-4 p-3" style="font-size: 0.85rem;" role="alert">
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
                               placeholder="Enter your system username" 
                               value="<?php echo $old_username ?? ''; ?>" 
                               required 
                               autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password Key</label>
                    <div class="input-group-custom">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-control-custom" 
                               placeholder="Enter password key" 
                               required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Sign In to Portal <i class="fa-solid fa-arrow-right-to-bracket ms-2"></i>
                </button>
            </form>

            <!-- Quick Auto-Fill Demo Pills -->
            <div class="demo-badge-wrap">
                <div class="fw-semibold text-white mb-2">Quick Sign-in Presets:</div>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <span class="credential-chip" onclick="fillCreds('admin', 'admin123')">
                        <i class="fa-solid fa-user-shield me-1"></i> Admin (admin)
                    </span>
                    <span class="credential-chip" onclick="fillCreds('staff', 'staff123')">
                        <i class="fa-solid fa-user-nurse me-1"></i> Staff (staff)
                    </span>
                </div>
            </div>

            <div class="auth-footer">
                Pankrono, Kumasi &bull; 0241974447 / 0550974126<br>
                Secure Clinical Information Management System
            </div>

        </div>
    </div>

    <script>
        function fillCreds(u, p) {
            document.getElementById('username').value = u;
            document.getElementById('password').value = p;
        }
    </script>
</body>
</html>
