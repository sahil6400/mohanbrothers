<header class="site-header" id="siteHeader">
    <div class="nav-container">
        <!-- Logo (Left: flex 1) -->
        <div class="nav-brand-col">
            <a href="<?= base_url() ?>" class="nav-brand" aria-label="Mohan Brothers Home">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Mohan Brothers — Ambros" class="nav-logo-img">
            </a>
        </div>

        <!-- Desktop Navigation Links (Center) -->
        <nav class="nav-links-center" aria-label="Main Navigation">
            <a href="#products" class="nav-link-item">Products</a>
            <a href="#labs" class="nav-link-item">Labs</a>
            <a href="#about" class="nav-link-item">About</a>
            <a href="#applications" class="nav-link-item">Applications</a>
            <a href="#contact" class="nav-link-item">Resources</a>
            <a href="#contact" class="nav-link-item">Contact</a>
        </nav>

        <!-- Right Controls (Right: flex 1, justify-content: flex-end) -->
        <div class="nav-controls-col">
            <!-- Theme Toggle Button (Dark / Light) -->
            <!--<button type="button" class="theme-toggle-btn" id="themeToggleBtn" aria-label="Toggle Dark / Light Theme"
                title="Toggle Dark / Light Mode">
                <span class="theme-icon-sun" aria-hidden="true">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2"></path>
                        <path d="M12 20v2"></path>
                        <path d="m4.93 4.93 1.41 1.41"></path>
                        <path d="m17.66 17.66 1.41 1.41"></path>
                        <path d="M2 12h2"></path>
                        <path d="M20 12h2"></path>
                        <path d="m6.34 17.66-1.41 1.41"></path>
                        <path d="m19.07 4.93-1.41 1.41"></path>
                    </svg>
                </span>
                <span class="theme-icon-moon" aria-hidden="true">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                    </svg>
                </span>
            </button>-->

            <button type="button" class="nav-search-btn" id="navSearchBtn" aria-label="Search"
                title="Search apparatus & labs (Ctrl+K)">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>

            <button type="button" class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation Menu">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenu">
    <button type="button" class="mobile-close-btn" id="mobileClose" aria-label="Close menu">&times;</button>
    <a href="<?= base_url('#products') ?>" class="mobile-nav-link">Products</a>
    <a href="<?= base_url('#labs') ?>" class="mobile-nav-link">Labs</a>
    <a href="<?= base_url('#about') ?>" class="mobile-nav-link">About</a>
    <a href="<?= base_url('#applications') ?>" class="mobile-nav-link">Applications</a>
    <a href="<?= base_url('#contact') ?>" class="mobile-nav-link">Resources</a>
    <a href="<?= base_url('#contact') ?>" class="mobile-nav-link">Contact</a>

    <!-- Mobile Theme Toggle (Commented out - default white theme)
    <div class="mobile-theme-wrapper">
        <span class="mobile-theme-label">Appearance</span>
        <button type="button" class="mobile-theme-toggle-btn" id="mobileThemeToggle">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4"></circle>
                <path d="M12 2v2"></path>
                <path d="M12 20v2"></path>
            </svg>
            <span>Toggle Theme</span>
        </button>
    </div>
    -->
</div>