<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="category-page-wrapper">

    <!-- 1. Breadcrumb Bar -->
    <div class="cat-breadcrumb-bar">
        <div class="container-custom">
            <nav class="cat-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url() ?>" class="cat-bc-link">Home</a>
                <span class="cat-bc-sep">/</span>
                <a href="<?= base_url('#labs') ?>" class="cat-bc-link">Laboratories</a>
                <span class="cat-bc-sep">/</span>
                <span class="cat-bc-current"><?= esc($category['title']) ?></span>
            </nav>
        </div>
    </div>

    <!-- 2. Category Hero Section -->
    <section class="cat-hero-section">
        <div class="container-custom">
            <div class="cat-hero-grid">

                <!-- Left: Title, Description & Action Buttons -->
                <div class="cat-hero-content fade-up">
                    <div class="cat-badge-row">
                        <span class="cat-num-pill">CATEGORY <?= esc($category['num']) ?></span>
                        <span class="cat-iso-pill">ISO 9001:2015 CERTIFIED</span>
                    </div>

                    <h1 class="cat-hero-title"><?= strtoupper(esc($category['title'])) ?></h1>

                    <?php if (!empty($category['subtitle'])): ?>
                        <p class="cat-hero-subtitle"><?= esc($category['subtitle']) ?></p>
                    <?php endif; ?>

                    <p class="cat-hero-desc">
                        <?= nl2br(esc($category['desc'])) ?>
                    </p>

                    <!-- Hero Action Buttons -->
                    <div class="cat-action-group">
                        <a href="#products-table" class="btn-primary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" style="margin-right: 6px;">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            DOWNLOAD CATALOGUE (PDF)
                        </a>
                        <a href="#lab-enquiry" class="btn-secondary">
                            REQUEST LAB QUOTE
                        </a>
                    </div>
                </div>

                <!-- Right: Visual Preview Card -->
                <div class="cat-hero-media fade-up" data-delay="100">
                    <div class="cat-hero-image-frame">
                        <img src="<?= (strpos($category['hero_img'], 'http') === 0) ? esc($category['hero_img']) : base_url(esc($category['hero_img'])) ?>"
                            alt="<?= esc($category['title']) ?>">
                        <div class="cat-hero-img-overlay"></div>
                        <div class="cat-hero-img-caption">
                            <span>High-Precision Experimental Apparatus</span>
                            <strong>Ambros India Precision Series</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- 3. Key Learning Outcomes & Experiments Covered -->
    <?php if (!empty($category['learning_outcomes'])): ?>
        <section class="cat-outcomes-section">
            <div class="container-custom">
                <div class="cat-section-header fade-up">
                    <span class="section-tag">CURRICULUM ALIGNMENT</span>
                    <h2 class="section-heading" style="font-size: clamp(26px, 3.5vw, 42px);">KEY EXPERIMENTS &amp; LEARNING
                        OUTCOMES</h2>
                </div>

                <div class="cat-outcomes-grid">
                    <?php foreach ($category['learning_outcomes'] as $idx => $outcome): ?>
                        <div class="cat-outcome-item fade-up" data-delay="<?= $idx * 60 ?>">
                            <div class="cat-outcome-num"><?= sprintf('%02d', $idx + 1) ?></div>
                            <p class="cat-outcome-text"><?= esc($outcome) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- 4. Featured Apparatus Visual Showcase -->
    <?php if (!empty($category['featured_products'])): ?>
        <section class="cat-showcase-section">
            <div class="container-custom">
                <div class="cat-section-header-flex fade-up">
                    <div>
                        <span class="section-tag">LABORATORY APPARATUS</span>
                        <h2 class="section-heading" style="font-size: clamp(28px, 4vw, 48px);">FEATURED TEST RIGS &amp;
                            SYSTEMS</h2>
                    </div>
                    <a href="#products-table" class="section-view-all">VIEW ALL CODES &rarr;</a>
                </div>

                <div class="cat-products-grid">
                    <?php foreach ($category['featured_products'] as $pIdx => $prod):
                        $prodSlug = $prod['slug'] ?? ($prod['code'] === '1100' ? 'static-dynamic-balancing-apparatus' : ($prod['code'] === '1101' ? 'motorised-gyroscope-apparatus' : ($prod['code'] === '1102' ? 'motorised-governor-apparatus' : ($prod['code'] === '1801' ? 'vapor-compression-refrigeration-test-rig' : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $prod['name']), '-'))))));
                        ?>
                        <div class="cat-prod-card fade-up" data-delay="<?= $pIdx * 75 ?>">
                            <div class="cat-prod-badge">CODE: <?= esc($prod['code']) ?></div>
                            <a href="<?= base_url('product/' . $prodSlug) ?>" class="cat-prod-img-wrap" style="display: block;">
                                <img src="<?= (strpos($prod['img'], 'http') === 0) ? esc($prod['img']) : base_url(esc($prod['img'])) ?>"
                                    alt="<?= esc($prod['name']) ?>" loading="lazy">
                            </a>
                            <div class="cat-prod-info">
                                <h3 class="cat-prod-title">
                                    <a href="<?= base_url('product/' . $prodSlug) ?>"
                                        style="color: inherit; text-decoration: none;">
                                        <?= esc($prod['name']) ?>
                                    </a>
                                </h3>
                                <p class="cat-prod-desc"><?= esc($prod['desc']) ?></p>
                                <?php if (!empty($prod['specs'])): ?>
                                    <div class="cat-prod-specs">
                                        <span class="specs-label">KEY SPECS:</span>
                                        <span class="specs-val"><?= esc($prod['specs']) ?></span>
                                    </div>
                                <?php endif; ?>
                                <div style="display: flex; gap: 10px; margin-top: 14px; flex-wrap: wrap;">
                                    <a href="<?= base_url('product/' . $prodSlug) ?>" class="cat-prod-enquire-btn"
                                        style="flex: 1; text-align: center;">
                                        VIEW PRODUCT PAGE &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- 5. Complete Products & Model Directory Table -->
    <?php if (!empty($category['products_table'])): ?>
        <section class="cat-table-section" id="products-table">
            <div class="container-custom">

                <div class="cat-table-header-box fade-up">
                    <div>
                        <span class="section-tag">COMPLETE DIRECTORY</span>
                        <h2 class="section-heading" style="font-size: clamp(26px, 3.5vw, 44px); margin-bottom: 8px;">
                            PRODUCTS &amp; EQUIPMENT LIST</h2>
                        <p style="color: var(--text-muted); font-size: 14px;">Click any apparatus row below to open its
                            dedicated specification &amp; tender page.</p>
                    </div>

                    <!-- Quick Filter Search Input -->
                    <div class="cat-table-search-wrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            style="color: var(--text-muted); margin-right: 8px;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="catTableFilter" class="cat-table-search-input"
                            placeholder="Filter equipment by code or name..." autocomplete="off">
                    </div>
                </div>

                <!-- Responsive Directory Table -->
                <div class="cat-table-responsive-wrap fade-up" data-delay="100">
                    <table class="cat-directory-table" id="directoryTable">
                        <thead>
                            <tr>
                                <th style="width: 15%;">CODE</th>
                                <th style="width: 55%;">PRODUCT NAME &amp; SYSTEM</th>
                                <th style="width: 30%; text-align: right;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($category['products_table'] as $row):
                                $rowSlug = $row['slug'] ?? ($row['code'] === '1100' ? 'static-dynamic-balancing-apparatus' : ($row['code'] === '1101' ? 'motorised-gyroscope-apparatus' : ($row['code'] === '1102' ? 'motorised-governor-apparatus' : ($row['code'] === '1801' ? 'vapor-compression-refrigeration-test-rig' : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $row['name']), '-'))))));
                                ?>
                                <tr class="cat-table-row"
                                    onclick="window.location.href='<?= base_url('product/' . $rowSlug) ?>';"
                                    style="cursor: pointer;">
                                    <td class="cat-table-code">
                                        <a href="<?= base_url('product/' . $rowSlug) ?>" class="code-tag"
                                            onclick="event.stopPropagation();"><?= esc($row['code']) ?></a>
                                    </td>
                                    <td class="cat-table-name">
                                        <a href="<?= base_url('product/' . $rowSlug) ?>"
                                            style="color: #FFFFFF; text-decoration: none;" onclick="event.stopPropagation();">
                                            <strong><?= esc($row['name']) ?></strong>
                                        </a>
                                        <?php if (!empty($row['category'])): ?>
                                            <span class="sub-category-tag"><?= esc($row['category']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="cat-table-action" style="text-align: right;">
                                        <a href="<?= base_url('product/' . $rowSlug) ?>" class="cat-table-action-link"
                                            onclick="event.stopPropagation();">
                                            View Product Page &rarr;
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    <?php endif; ?>


    <!-- 6. Other Laboratory Categories Switcher -->
    <section class="cat-switcher-section">
        <div class="container-custom">
            <div class="cat-section-header fade-up">
                <span class="section-tag">EXPLORE MORE</span>
                <h2 class="section-heading" style="font-size: clamp(24px, 3.2vw, 40px);">OTHER ENGINEERING LABORATORIES
                </h2>
            </div>

            <div class="cat-switcher-grid">
                <?php foreach ($all_categories as $cSlug => $catItem): ?>
                    <?php if ($cSlug !== $category['slug']): ?>
                        <a href="<?= base_url('category/' . $cSlug) ?>" class="cat-switcher-card fade-up">
                            <span class="cat-switcher-num"><?= esc($catItem['num']) ?></span>
                            <h3 class="cat-switcher-title"><?= esc($catItem['title']) ?></h3>
                            <span class="cat-switcher-link">View Lab Details &rarr;</span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- 7. Pre-filled Enquiry & Quotation Section -->
    <section class="section-padding" id="lab-enquiry" style="padding-top: 0;">
        <div class="contact-cta-wrapper">
            <div class="contact-cta-bg">
                <div class="contact-cta-overlay"></div>

                <div class="contact-cta-grid">

                    <div class="fade-up">
                        <p class="contact-tag">INSTITUTIONAL ENQUIRY</p>
                        <h2 class="contact-headline">
                            REQUEST<br>
                            <span class="accent-red"><?= strtoupper(esc($category['title'])) ?></span><br>
                            SPECIFICATIONS.
                        </h2>
                        <p class="contact-subtext">
                            Contact our engineering academic consultants for customized lab layouts, syllabus-aligned
                            test rig packages, and institutional tenders.
                        </p>
                        <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                            <a href="mailto:info@Ambrosindia.com" class="btn-secondary">&#9993; EMAIL US DIRECTLY</a>
                        </div>
                    </div>

                    <div class="fade-up" data-delay="150">
                        <div class="enquiry-form-card">

                            <div class="form-success-alert" id="enquirySuccessAlert">
                                <div class="form-success-icon">&#10003;</div>
                                <h4 class="form-success-title">Enquiry Received</h4>
                                <p class="form-success-msg">Thank you. Our engineering specialist for
                                    <?= esc($category['title']) ?> will contact you within 24 hours.</p>
                            </div>

                            <form id="enquiryForm" action="<?= base_url('enquiry') ?>" method="POST">
                                <?= csrf_field() ?>

                                <div class="form-grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="name">NAME *</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Prof. / Dr. / Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">EMAIL *</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="name@institution.edu" required>
                                    </div>
                                </div>

                                <div class="form-grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">CONTACT NUMBER</label>
                                        <input type="tel" id="phone" name="phone" class="form-control"
                                            placeholder="+91 00000 00000">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="category">LABORATORY CATEGORY</label>
                                        <input type="text" id="category" name="category" class="form-control"
                                            value="<?= esc($category['title']) ?>" readonly
                                            style="background: rgba(255,255,255,0.08); color: var(--primary-red); font-weight: 600;">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="enquiryMessage">REQUIREMENTS / PRODUCTS OF
                                        INTEREST</label>
                                    <textarea id="enquiryMessage" name="message" class="form-control"
                                        placeholder="Please mention apparatus model codes or lab requirements..."></textarea>
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

</div>

<?= $this->endSection() ?>

<?= $this->section('extra_scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Interactive filter for the Category Products Directory Table
        const filterInput = document.getElementById('catTableFilter');
        const table = document.getElementById('directoryTable');
        if (filterInput && table) {
            const rows = table.querySelectorAll('tbody tr');
            filterInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase().trim();
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(query) ? '' : 'none';
                });
            });
        }
    });
</script>
<?= $this->endSection() ?>