<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<main class="product-detail-page">

    <!-- 1. Breadcrumbs Ribbon -->
    <div class="prod-breadcrumb-bar">
        <div class="container-custom">
            <nav class="prod-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?= base_url() ?>" class="prod-crumb-item prod-crumb-home">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        style="vertical-align: -1px; margin-right: 4px;">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Home
                </a>
                <span class="prod-crumb-sep">&rsaquo;</span>
                <?php if (!empty($product['category_slug'])): ?>
                    <a href="<?= base_url('category/' . esc($product['category_slug'])) ?>"
                        class="prod-crumb-item prod-crumb-cat">
                        <?= strtoupper(esc($product['category_name'] ?? 'LABORATORY')) ?>
                    </a>
                    <span class="prod-crumb-sep">&rsaquo;</span>
                <?php endif; ?>
                <span class="prod-crumb-item prod-crumb-current" aria-current="page">
                    <?= esc($product['name']) ?>
                </span>
            </nav>
        </div>
    </div>


    <!-- 2. Main Product Showcase Section -->
    <section class="prod-showcase-section">
        <div class="container-custom">

            <!-- Page Main Title -->
            <div class="prod-header-wrap fade-up">
                <div class="prod-header-meta">
                    <span class="prod-code-badge">CODE: <?= esc($product['code'] ?? '1100') ?></span>
                    <?php if (!empty($product['badge'])): ?>
                        <span class="prod-cert-badge"><?= esc($product['badge']) ?></span>
                    <?php endif; ?>
                </div>
                <h1 class="prod-main-title"><?= strtoupper(esc($product['name'])) ?></h1>
            </div>

            <!-- Two-Column Hero Showcase Grid -->
            <div class="prod-main-grid">

                <!-- Left Column: Image Showcase & Action Buttons -->
                <div class="prod-left-col fade-up">
                    <div class="prod-image-card">
                        <div class="prod-image-frame">
                            <img id="mainProductImage"
                                src="<?= (strpos($product['img'], 'http') === 0) ? esc($product['img']) : base_url(esc($product['img'])) ?>"
                                alt="<?= esc($product['name']) ?>" class="prod-hero-img">
                            <div class="prod-image-overlay-badge">Ambros PRECISION</div>
                        </div>

                        <!-- Image Sub-badges -->
                        <div class="prod-features-pills">
                            <span class="prod-feature-pill">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Variable Speed Control
                            </span>
                            <span class="prod-feature-pill">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                4 Adjustable Masses
                            </span>
                            <span class="prod-feature-pill">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Stainless Steel Shaft
                            </span>
                        </div>
                    </div>

                    <!-- Quick Direct Action CTA Buttons -->
                    <div class="prod-cta-actions">
                        <a href="#quick-enquiry-form" class="btn-prod-quote"
                            onclick="document.getElementById('enquiryMsg').focus();">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" style="margin-right: 8px;">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            REQUEST QUOTATION
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=919810000000&text=Hello%20Mohan%20Brothers,%20I%20am%20interested%20in%20<?= urlencode($product['name']) ?>%20(Code:%20<?= esc($product['code']) ?>)."
                            target="_blank" rel="noopener noreferrer" class="btn-prod-whatsapp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                                style="margin-right: 8px;">
                                <path
                                    d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.588 1.961.916 2.801.916 3.177 0 5.766-2.587 5.767-5.766 0-3.18-2.589-5.767-5.772-5.767zm0 10.428c-.808 0-1.632-.245-2.316-.677l-.166-.105-1.571.412.419-1.533-.111-.176c-.475-.757-.732-1.583-.732-2.453 0-2.463 2.004-4.467 4.468-4.467 2.468 0 4.47 2.004 4.47 4.468 0 2.464-2.005 4.468-4.468 4.468z" />
                            </svg>
                            WHATSAPP ENQUIRY
                        </a>
                    </div>
                </div>

                <!-- Right Column: Descriptions, Experiments, Utilities & Specs -->
                <div class="prod-right-col fade-up" data-delay="100">

                    <!-- Overview Description -->
                    <div class="prod-detail-block prod-overview-block">
                        <p class="prod-overview-text">
                            <?= nl2br(esc($product['overview'])) ?>
                        </p>
                    </div>

                    <!-- Experiments Section -->
                    <?php if (!empty($product['experiments'])): ?>
                        <div class="prod-detail-block">
                            <h3 class="prod-block-title">EXPERIMENTS OF <?= strtoupper(esc($product['name'])) ?>:-</h3>
                            <ul class="prod-num-list">
                                <?php foreach ($product['experiments'] as $expIdx => $exp): ?>
                                    <li>
                                        <span class="exp-num"><?= $expIdx + 1 ?>.</span>
                                        <span class="exp-text"><?= esc($exp) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Utilities Required Section -->
                    <?php if (!empty($product['utilities'])): ?>
                        <div class="prod-detail-block">
                            <h3 class="prod-block-title">UTILITIES OF <?= strtoupper(esc($product['name'])) ?>:-</h3>
                            <div class="prod-utilities-list">
                                <?php foreach ($product['utilities'] as $uKey => $uVal): ?>
                                    <div class="prod-utility-row">
                                        <span class="util-bullet">&bull;</span>
                                        <strong><?= esc($uKey) ?>:</strong>
                                        <span><?= esc($uVal) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Technical Specifications Section -->
                    <?php if (!empty($product['specifications'])): ?>
                        <div class="prod-detail-block">
                            <h3 class="prod-block-title">TECHNICAL SPECIFICATION OF
                                <?= strtoupper(esc($product['name'])) ?>:-</h3>
                            <div class="prod-specs-numbered-list">
                                <?php $specNum = 1;
                                foreach ($product['specifications'] as $sKey => $sVal): ?>
                                    <div class="prod-spec-item">
                                        <span class="spec-idx"><?= $specNum++ ?>.</span>
                                        <div class="spec-content">
                                            <strong class="spec-name"><?= esc($sKey) ?> &ndash;</strong>
                                            <span class="spec-detail"><?= esc($sVal) ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Social Share Strip -->
                    <div class="prod-share-strip">
                        <span class="share-label">Share Product:</span>
                        <div class="share-buttons-row">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                                target="_blank" rel="noopener noreferrer" class="social-share-btn fb"
                                title="Share on Facebook">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($product['name']) ?>"
                                target="_blank" rel="noopener noreferrer" class="social-share-btn tw"
                                title="Share on Twitter">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode(current_url()) ?>"
                                target="_blank" rel="noopener noreferrer" class="social-share-btn in"
                                title="Share on LinkedIn">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2zM4 6a2 2 0 11-2-2 2 2 0 012 2z" />
                                </svg>
                            </a>
                            <a href="https://pinterest.com/pin/create/button/?url=<?= urlencode(current_url()) ?>&media=<?= urlencode(base_url($product['img'])) ?>&description=<?= urlencode($product['name']) ?>"
                                target="_blank" rel="noopener noreferrer" class="social-share-btn pin"
                                title="Pin on Pinterest">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                                </svg>
                            </a>
                            <a href="https://api.whatsapp.com/send?text=Check%20out%20<?= urlencode($product['name']) ?>:%20<?= urlencode(current_url()) ?>"
                                target="_blank" rel="noopener noreferrer" class="social-share-btn wa"
                                title="Share via WhatsApp">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.588 1.961.916 2.801.916 3.177 0 5.766-2.587 5.767-5.766 0-3.18-2.589-5.767-5.772-5.767zm0 10.428c-.808 0-1.632-.245-2.316-.677l-.166-.105-1.571.412.419-1.533-.111-.176c-.475-.757-.732-1.583-.732-2.453 0-2.463 2.004-4.467 4.468-4.467 2.468 0 4.47 2.004 4.47 4.468 0 2.464-2.005 4.468-4.468 4.468z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <!-- 3. QUICK ENQUIRY FORM Section (Matching Reference Page) -->
    <section class="prod-enquiry-section" id="quick-enquiry-form">
        <div class="container-custom">

            <div class="prod-enquiry-card fade-up">

                <div class="prod-enquiry-header">
                    <span class="section-tag">GET AN OFFICIAL QUOTE</span>
                    <h2 class="prod-enquiry-title">QUICK ENQUIRY FORM</h2>
                    <p class="prod-enquiry-subtitle">Direct institutional quotation, specifications &amp; lab planning
                        for <strong><?= esc($product['name']) ?></strong></p>
                </div>

                <form id="productQuickEnquiryForm" class="prod-enquiry-form" method="POST"
                    action="<?= base_url('enquiry') ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="product_name" value="<?= esc($product['name']) ?>">
                    <input type="hidden" name="product_code" value="<?= esc($product['code'] ?? '1100') ?>">

                    <div class="prod-form-grid">

                        <!-- Left Inputs Column -->
                        <div class="prod-form-left-col">
                            <div class="prod-form-group">
                                <label for="enquiryFullName" class="sr-only">Full Name</label>
                                <input type="text" id="enquiryFullName" name="name" class="prod-input-control"
                                    placeholder="Full Name *" required>
                            </div>

                            <div class="prod-form-group">
                                <label for="enquiryContact" class="sr-only">Contact Number</label>
                                <input type="tel" id="enquiryContact" name="phone" class="prod-input-control"
                                    placeholder="Contact Number *" required>
                            </div>

                            <div class="prod-form-group">
                                <label for="enquiryEmail" class="sr-only">e-mail ID</label>
                                <input type="email" id="enquiryEmail" name="email" class="prod-input-control"
                                    placeholder="e-mail ID *" required>
                            </div>

                            <div class="prod-form-group">
                                <label for="enquiryCountry" class="sr-only">Country</label>
                                <input type="text" id="enquiryCountry" name="country" class="prod-input-control"
                                    placeholder="Country" value="India">
                            </div>

                            <div class="prod-form-group">
                                <label for="enquiryCity" class="sr-only">City</label>
                                <input type="text" id="enquiryCity" name="city" class="prod-input-control"
                                    placeholder="City">
                            </div>
                        </div>

                        <!-- Right Textarea & Captcha Column -->
                        <div class="prod-form-right-col">
                            <div class="prod-form-group" style="height: calc(100% - 130px); min-height: 150px;">
                                <label for="enquiryMsg" class="sr-only">Describe Your Requirements In Detail</label>
                                <textarea id="enquiryMsg" name="message" class="prod-textarea-control"
                                    placeholder="Describe Your Requirements In Detail..."
                                    required>Please provide quotation, warranty details, and technical specification sheet for <?= esc($product['name']) ?> (Code: <?= esc($product['code'] ?? '1100') ?>).</textarea>
                            </div>

                            <!-- Bot Verification Badge -->
                            <div class="prod-captcha-box">
                                <label class="captcha-checkbox-wrap">
                                    <input type="checkbox" id="captchaCheck" name="captcha_verified" checked required>
                                    <span class="custom-checkbox"></span>
                                    <span class="captcha-text">I'm not a robot</span>
                                </label>
                                <div class="captcha-badge-logo">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#007bff"
                                        stroke-width="2">
                                        <polyline points="23 4 23 10 17 10"></polyline>
                                        <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                                    </svg>
                                    <span
                                        style="font-size: 9px; color: #888; display: block; line-height: 1;">reCAPTCHA</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="btnProductEnquirySubmit" class="btn-prod-send-email">
                                <span class="btn-text">SEND EMAIL</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" style="margin-left: 8px;">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>

                        </div>

                    </div>

                    <!-- AJAX Feedback Banner -->
                    <div id="productEnquiryFeedback" class="prod-enquiry-feedback" style="display: none;"></div>

                </form>

            </div>

        </div>
    </section>


    <!-- 4. Related Apparatus in This Laboratory -->
    <?php if (!empty($product['related'])): ?>
        <section class="prod-related-section">
            <div class="container-custom">
                <div class="cat-section-header-flex fade-up">
                    <div>
                        <span class="section-tag">COMPLEMENTARY APPARATUS</span>
                        <h2 class="section-heading" style="font-size: clamp(24px, 3.5vw, 38px);">OTHER EQUIPMENT IN
                            <?= strtoupper(esc($product['category_name'] ?? 'LABORATORY')) ?></h2>
                    </div>
                    <?php if (!empty($product['category_slug'])): ?>
                        <a href="<?= base_url('category/' . esc($product['category_slug'])) ?>" class="section-view-all">VIEW
                            COMPLETE LAB DIRECTORY &rarr;</a>
                    <?php endif; ?>
                </div>

                <div class="prod-related-grid">
                    <?php foreach ($product['related'] as $rIdx => $relItem): ?>
                        <a href="<?= base_url('product/' . esc($relItem['slug'])) ?>" class="prod-related-card fade-up"
                            data-delay="<?= $rIdx * 80 ?>">
                            <div class="prod-rel-img-box">
                                <img src="<?= (strpos($relItem['img'], 'http') === 0) ? esc($relItem['img']) : base_url(esc($relItem['img'])) ?>"
                                    alt="<?= esc($relItem['name']) ?>" loading="lazy">
                                <span class="prod-rel-code">CODE: <?= esc($relItem['code']) ?></span>
                            </div>
                            <div class="prod-rel-body">
                                <h3 class="prod-rel-title"><?= esc($relItem['name']) ?></h3>
                                <span class="prod-rel-link">View Technical Specifications &rarr;</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<?= $this->endSection() ?>