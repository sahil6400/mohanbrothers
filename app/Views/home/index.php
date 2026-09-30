<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- =========================================================================
     1. HERO SECTION
     ========================================================================= -->
<section class="hero-section" id="hero">
    <!-- Ambient Engineering Grid Pattern -->
    <div class="hero-grid-pattern"></div>

    <!-- Left Column: Typography & CTAs -->
    <div class="hero-content">
        <span class="hero-badge">Ambros India &bull; Mohan Brothers</span>

        <h1 class="hero-title">
            ENGINEERING<br>
            <span class="highlight">THE WAY</span><br>
            YOU LEARN.
        </h1>

        <p class="hero-desc">
            Laboratory equipment, engineering apparatus and educational models crafted for precision, durability, and
            practical hands-on discovery.
        </p>

        <div class="hero-cta-group">
            <a href="#products" class="btn-primary">VIEW PRODUCTS</a>
            <a href="#contact" class="btn-secondary">REQUEST ENQUIRY</a>
        </div>

        <div class="hero-scroll-indicator">
            <div class="scroll-line-bar"></div>
            <span class="scroll-label">Scroll to Explore</span>
        </div>
    </div>

    <!-- Right Column: Engineering Video & Vignette -->
    <div class="hero-media-wrapper">
        <div class="hero-vignette-left"></div>
        <div class="hero-vignette-bottom"></div>
        <div class="hero-vignette-top"></div>

        <video class="hero-video" autoplay loop muted playsinline
            poster="<?= base_url('assets/images/engine-ref.png') ?>">
            <source src="<?= base_url('assets/videos/hero-bg.mp4') ?>" type="video/mp4">
            <img src="<?= base_url('assets/images/engine-ref.png') ?>" alt="Ambros Engineering Engine Cut-Section">
        </video>

        <!-- Dynamic Live Engine Status Badge -->
        <div class="hero-rpm-badge">
            <div class="hero-rpm-value" id="heroRpmValue">1820 RPM</div>
            <div class="hero-rpm-status">Engine Running</div>
        </div>
    </div>
</section>


<!-- =========================================================================
     2. CATEGORY / LABORATORIES SECTION
     ========================================================================= -->
<section class="section-padding" id="labs" style="background: var(--bg-warm);">
    <div class="container-custom">
        <div class="fade-up">
            <div class="section-header-flex">
                <div>
                    <p class="section-tag">OUR LABORATORIES</p>
                    <h2 class="section-heading">
                        EXPLORE OUR<br>ENGINEERING WORLD
                    </h2>
                </div>
                <a href="#products" class="section-view-all">VIEW ALL LABS &rarr;</a>
            </div>
        </div>

        <div class="labs-list">
            <?php foreach ($labs as $i => $lab): ?>
                <div class="fade-up" data-delay="<?= $i * 50 ?>">
                    <a href="<?= base_url('category/' . esc($lab['slug'])) ?>" class="lab-row-item">
                        <div class="lab-row-thumb">
                            <img src="<?= esc($lab['img']) ?>" alt="<?= esc(str_replace("\n", ' ', $lab['title'])) ?>"
                                loading="lazy">
                        </div>

                        <div class="lab-row-info">
                            <h3 class="lab-row-title"><?= nl2br(esc($lab['title'])) ?></h3>
                            <p class="lab-row-desc"><?= esc($lab['desc']) ?></p>
                        </div>

                        <span class="lab-row-action">EXPLORE LAB &rarr;</span>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="labs-bottom-border"></div>
        </div>
    </div>
</section>


<!-- =========================================================================
     3. FEATURED LAB EXPERIENCE
     ========================================================================= -->
<section class="featured-experience-wrapper">
    <div class="featured-experience-bg">
        <div class="featured-gradient-overlay"></div>

        <div class="featured-inner-content fade-up">
            <p class="featured-tag">BUILT FOR THE REAL WORLD</p>
            <h2 class="featured-title">
                BUILT FOR<br>
                <span class="accent-red">REAL</span><br>
                ENGINEERING.
            </h2>

            <!-- Schematic Diagram Indicators -->
            <div class="schematic-callouts">
                <?php
                $schematics = [
                    'MECHANICAL SYSTEMS',
                    'FLOW ANALYSIS',
                    'THERMAL TRANSFER',
                    'MATERIAL TESTING',
                    'AUTOMOTIVE SYSTEMS'
                ];
                foreach ($schematics as $item): ?>
                    <div class="schematic-item">
                        <div class="schematic-line"></div>
                        <div class="schematic-dot"></div>
                        <span class="schematic-text"><?= esc($item) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- =========================================================================
     4. PRODUCT DISCOVERY
     ========================================================================= -->
<section class="section-padding" id="products">
    <div class="container-custom">
        <div class="fade-up" style="margin-bottom: 50px;">
            <p class="section-tag">PRODUCT RANGE</p>
            <h2 class="section-heading">
                FROM CONCEPT<br>TO EXPERIMENT.
            </h2>
        </div>

        <div class="products-grid">
            <?php foreach ($products as $i => $product): ?>
                <div class="fade-up" data-delay="<?= $i * 75 ?>">
                    <a href="#contact" class="product-card">
                        <img src="<?= esc($product['img']) ?>" alt="<?= esc(str_replace("\n", ' ', $product['name'])) ?>"
                            loading="lazy">
                        <div class="product-overlay"></div>
                        <div class="product-info-box">
                            <h3 class="product-title"><?= nl2br(esc($product['name'])) ?></h3>
                            <span class="product-action-link">EXPLORE &rarr;</span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- =========================================================================
     5. ABOUT Ambros INDIA
     ========================================================================= -->
<section class="section-padding about-section" id="about">
    <div class="container-custom">
        <div class="about-grid">
            <div class="fade-up">
                <h2 class="about-heading">
                    ENGINEERING<br>
                    KNOWLEDGE,<br>
                    <span class="accent">MADE</span><br>
                    TANGIBLE.
                </h2>
            </div>

            <div class="fade-up" data-delay="150">
                <p class="about-lead-text">
                    Ambros India (Mohan Brothers) develops laboratory equipment, engineering apparatus, educational
                    models, and training systems designed to make complex engineering concepts easier to understand,
                    demonstrate, and master.
                </p>
                <p class="about-sub-text">
                    Trusted by premier technical universities, engineering colleges, polytechnics, and industrial
                    vocational centres across India and abroad. Every instrument is rigorously calibrated, built from
                    industrial-grade components, and architected around the curriculum.
                </p>
                <a href="#contact" class="about-link">ABOUT Ambros INDIA &rarr;</a>
            </div>
        </div>
    </div>
</section>


<!-- =========================================================================
     6. APPLICATIONS SHOWCASE (HORIZONTAL SCROLL)
     ========================================================================= -->
<section class="section-padding" id="applications" style="overflow: hidden; padding-bottom: clamp(60px, 8vw, 100px);">
    <div class="container-custom" style="margin-bottom: 40px;">
        <div class="fade-up">
            <p class="section-tag">APPLICATIONS</p>
            <h2 class="section-heading">
                WHERE ENGINEERING<br>COMES TO LIFE.
            </h2>
        </div>
    </div>

    <div class="applications-carousel-wrapper">
        <?php foreach ($applications as $i => $app): ?>
            <div class="fade-up" data-delay="<?= $i * 60 ?>">
                <div class="app-card">
                    <img src="<?= esc($app['img']) ?>" alt="<?= esc($app['title']) ?>" loading="lazy">
                    <div class="app-card-overlay"></div>
                    <div class="app-card-content">
                        <h3 class="app-card-title"><?= esc($app['title']) ?></h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<!-- =========================================================================
     7. WHY Ambros (DIFFERENCE)
     ========================================================================= -->
<section class="section-padding why-section">
    <div class="container-custom">
        <div class="fade-up" style="margin-bottom: 50px;">
            <p class="section-tag">THE Ambros DIFFERENCE</p>
            <h2 class="section-heading">WHY Ambros.</h2>
        </div>

        <div class="why-grid">
            <?php foreach ($why_reasons as $i => $why): ?>
                <div class="fade-up" data-delay="<?= $i * 80 ?>">
                    <div class="why-card <?= in_array($why['num'], ['02', '04']) ? 'is-boxed' : '' ?>">
                        <span class="why-card-num"><?= esc($why['num']) ?></span>
                        <h3 class="why-card-title"><?= esc($why['title']) ?></h3>
                        <p class="why-card-desc"><?= esc($why['desc']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- =========================================================================
     8. CTA + INTERACTIVE ENQUIRY FORM
     ========================================================================= -->
<section class="section-padding" style="padding-top: 0;">
    <div class="contact-cta-wrapper">
        <div class="contact-cta-bg">
            <div class="contact-cta-overlay"></div>

            <div class="contact-cta-grid">

                <!-- Left: Headline & Context -->
                <div class="fade-up">
                    <p class="contact-tag">GET IN TOUCH</p>
                    <h2 class="contact-headline">
                        BUILD A<br>
                        <span class="accent-red">BETTER</span><br>
                        LAB.
                    </h2>
                    <p class="contact-subtext">
                        Equip your institution with industry-grade engineering setups. Contact our academic solutions
                        team for catalogues, specifications, and lab planning.
                    </p>
                    <a href="#products" class="btn-primary">VIEW PRODUCTS</a>
                </div>

                <!-- Right: Interactive CodeIgniter Form -->
                <div class="fade-up" data-delay="150">
                    <div class="enquiry-form-card">

                        <!-- Dynamic Success Message Alert -->
                        <div class="form-success-alert" id="enquirySuccessAlert">
                            <div class="form-success-icon">&#10003;</div>
                            <h4 class="form-success-title">Enquiry Received</h4>
                            <p class="form-success-msg">Thank you for reaching out. Our engineering representative will
                                contact you within 24 hours.</p>
                        </div>

                        <!-- Enquiry Form with CSRF -->
                        <form id="enquiryForm" action="<?= base_url('enquiry') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label class="form-label" for="name">NAME *</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Your full name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">EMAIL *</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="you@institution.edu" required>
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div class="form-group">
                                    <label class="form-label" for="phone">CONTACT NUMBER</label>
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        placeholder="+91 00000 00000">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="country">COUNTRY</label>
                                    <select id="country" name="country" class="form-control">
                                        <option value="" disabled selected>Select country</option>
                                        <?php foreach ($countries as $c): ?>
                                            <option value="<?= esc($c) ?>"><?= esc($c) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="category">CATEGORY OF INTEREST</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="" disabled selected>Select a lab category</option>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= esc($cat) ?>"><?= esc($cat) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="message">MESSAGE</label>
                                <textarea id="message" name="message" class="form-control"
                                    placeholder="Tell us about your requirements or lab setup plans..."></textarea>
                            </div>

                            <button type="submit" class="form-submit-btn" id="enquirySubmitBtn">
                                SUBMIT ENQUIRY &rarr;
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>