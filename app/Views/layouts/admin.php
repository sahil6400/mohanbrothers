<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Ambros India Control Panel') ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Site & Admin Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>

<body class="admin-body">

    <!-- Admin Wrapper Layout -->
    <div class="admin-wrapper">

        <!-- Left Sidebar Navigation -->
        <aside class="admin-sidebar">
            <div class="admin-brand-box">
                <a href="<?= base_url('admin/dashboard') ?>" class="admin-logo-link">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Ambros India" class="admin-brand-logo">
                    <span class="admin-panel-tag">CONTROL PANEL</span>
                </a>
            </div>

            <nav class="admin-nav-menu">
                <div class="admin-nav-group-title">MAIN NAVIGATION</div>

                <a href="<?= base_url('admin/dashboard') ?>"
                    class="admin-nav-item <?= ($active_tab ?? '') === 'dashboard' ? 'active' : '' ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="<?= base_url('admin/categories') ?>"
                    class="admin-nav-item <?= ($active_tab ?? '') === 'categories' ? 'active' : '' ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span>Lab Categories</span>
                </a>

                <a href="<?= base_url('admin/products') ?>"
                    class="admin-nav-item <?= ($active_tab ?? '') === 'products' ? 'active' : '' ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>Products &amp; Rigs</span>
                </a>

                <a href="<?= base_url('admin/enquiries') ?>"
                    class="admin-nav-item <?= ($active_tab ?? '') === 'enquiries' ? 'active' : '' ?>">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span>Customer Enquiries</span>
                </a>

                <div class="admin-nav-group-title" style="margin-top: 24px;">WEBSITE &amp; SESSION</div>

                <a href="<?= base_url() ?>" target="_blank" class="admin-nav-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        <polyline points="15 3 21 3 21 9"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                    <span>View Live Website</span>
                </a>

                <a href="<?= base_url('admin/logout') ?>" class="admin-nav-item logout-link"
                    onclick="return confirm('Are you sure you want to logout?');">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Logout</span>
                </a>
            </nav>

            <div class="admin-sidebar-footer">
                <div class="admin-user-info">
                    <div class="admin-avatar">A</div>
                    <div>
                        <div class="admin-user-name">Ambros Admin</div>
                        <div class="admin-user-email">admin@Ambros.com</div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="admin-main">

            <!-- Topbar Header -->
            <header class="admin-topbar">
                <div class="admin-topbar-left">
                    <h1 class="admin-page-title"><?= esc($title ?? 'Control Panel') ?></h1>
                </div>

                <div class="admin-topbar-right">
                    <span class="admin-server-badge">PHP 8.2 &bull; CodeIgniter 4</span>
                    <a href="<?= base_url() ?>" target="_blank" class="btn-topbar-site">
                        Live Storefront &nearr;
                    </a>
                </div>
            </header>

            <!-- Alerts / Notifications -->
            <div class="admin-content-container">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="admin-alert admin-alert-success">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span><?= esc(session()->getFlashdata('success')) ?></span>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="admin-alert admin-alert-error">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <span><?= esc(session()->getFlashdata('error')) ?></span>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>

        </div>

    </div>

</body>

</html>