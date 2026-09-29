<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Ambross India Control Panel</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body class="admin-login-body">

    <div class="admin-login-card">
        
        <div class="admin-login-brand">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Ambross India" style="height: 44px; margin-bottom: 8px;">
            <h1 class="admin-login-title">ADMINISTRATOR PORTAL</h1>
            <p class="admin-login-sub">Sign in to manage categories, apparatuses, and customer inquiries</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="admin-alert admin-alert-error" style="margin-bottom: 20px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span><?= esc(session()->getFlashdata('error')) ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="admin-alert admin-alert-success" style="margin-bottom: 20px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <span><?= esc(session()->getFlashdata('success')) ?></span>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST" class="admin-login-form">
            <?= csrf_field() ?>

            <div class="admin-form-group" style="margin-bottom: 16px;">
                <label for="adminUsername" class="admin-label">Username / Admin Email</label>
                <input type="text" id="adminUsername" name="username" class="admin-input" placeholder="admin or admin@ambross.com" value="<?= old('username', 'admin') ?>" required autofocus>
            </div>

            <div class="admin-form-group" style="margin-bottom: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label for="adminPassword" class="admin-label">Password</label>
                </div>
                <input type="password" id="adminPassword" name="password" class="admin-input" placeholder="••••••••" value="admin123" required>
            </div>

            <button type="submit" class="btn-admin-primary" style="width: 100%; justify-content: center; padding: 13px; font-size: 14px;">
                <span>SIGN IN TO CONTROL PANEL</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
        </form>

        <div class="admin-demo-box">
            <strong>Default Demo Credentials:</strong><br>
            Username: <code style="color: #f87171;">admin</code> &bull; Password: <code style="color: #f87171;">admin123</code>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="<?= base_url() ?>" style="font-size: 12.5px; color: var(--admin-text-muted); text-decoration: none;">
                &larr; Back to Public Website
            </a>
        </div>

    </div>

</body>
</html>
