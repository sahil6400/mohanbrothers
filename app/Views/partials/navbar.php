<header class="site-header" id="siteHeader">
    <div class="nav-container">
        <!-- Logo (Left: flex 1) -->
        <div class="nav-brand-col">
            <a href="<?= base_url() ?>" class="nav-brand" aria-label="Mohan Brothers Home">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Mohan Brothers — Ambross" class="nav-logo-img">
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
            <button type="button" class="nav-search-btn" id="navSearchBtn" aria-label="Search">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>
            
            <button type="button" class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation Menu">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
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
    <a href="#products" class="mobile-nav-link">Products</a>
    <a href="#labs" class="mobile-nav-link">Labs</a>
    <a href="#about" class="mobile-nav-link">About</a>
    <a href="#applications" class="mobile-nav-link">Applications</a>
    <a href="#contact" class="mobile-nav-link">Resources</a>
    <a href="#contact" class="mobile-nav-link">Contact</a>
</div>
