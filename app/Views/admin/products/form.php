<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title"><?= esc($title) ?></h2>
        <a href="<?= base_url('admin/products') ?>" class="btn-admin-secondary">&larr; Back to Products</a>
    </div>

    <form action="<?= esc($action_url) ?>" method="POST" enctype="multipart/form-data" class="admin-form">
        <?= csrf_field() ?>

        <div class="admin-form-grid">
            
            <div class="admin-form-group">
                <label for="prodCode" class="admin-label">Equipment / Catalog Code * (e.g. 1100, 1101, 1801)</label>
                <input type="text" id="prodCode" name="code" class="admin-input" value="<?= esc($product['code'] ?? '1100') ?>" required>
            </div>

            <div class="admin-form-group">
                <label for="prodCategory" class="admin-label">Laboratory Category *</label>
                <select id="prodCategory" name="category_slug" class="admin-select" required>
                    <?php foreach ($categories as $cSlug => $cat): ?>
                        <option value="<?= esc($cSlug) ?>" <?= (($product['category_slug'] ?? '') === $cSlug) ? 'selected' : '' ?>>
                            <?= esc($cat['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="admin-form-group full-width">
                <label for="prodName" class="admin-label">Product / Apparatus Name *</label>
                <input type="text" id="prodName" name="name" class="admin-input" value="<?= esc($product['name'] ?? '') ?>" placeholder="e.g. Static Dynamic Balancing Apparatus" required>
            </div>

            <div class="admin-form-group">
                <label for="prodSlug" class="admin-label">URL Slug (e.g. static-dynamic-balancing-apparatus)</label>
                <input type="text" id="prodSlug" name="slug" class="admin-input" value="<?= esc($product['slug'] ?? '') ?>" placeholder="auto-generated-if-empty">
            </div>

            <div class="admin-form-group">
                <label for="prodBadge" class="admin-label">Badge / Standard Certification</label>
                <input type="text" id="prodBadge" name="badge" class="admin-input" value="<?= esc($product['badge'] ?? 'ISO 9001:2015 Precision Calibrated') ?>">
            </div>

            <!-- Upload Product / Apparatus Image -->
            <div class="admin-form-group full-width">
                <label class="admin-label">Apparatus Image *</label>
                
                <div class="admin-upload-wrapper">
                    <div class="admin-upload-grid">
                        <!-- Dropzone / File Picker -->
                        <div class="admin-dropzone" id="prodDropzone" onclick="document.getElementById('prodImgFile').click()">
                            <input type="file" id="prodImgFile" name="img_file" accept="image/png, image/jpeg, image/webp, image/svg+xml, image/jpg" style="display: none;">
                            
                            <div class="admin-dropzone-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                            </div>
                            <div class="admin-dropzone-primary">
                                <span id="prodDropzoneText">Click to upload image</span> or drag and drop
                            </div>
                            <div class="admin-dropzone-hint">PNG, JPG, WebP, SVG up to 10MB</div>
                        </div>

                        <!-- Current / Selected Image Preview -->
                        <?php 
                            $currentProdImg = $product['img'] ?? 'assets/images/static-dynamic-balancing.jpg';
                            $imgProdSrc = (strpos($currentProdImg, 'http') === 0) ? $currentProdImg : base_url($currentProdImg);
                        ?>
                        <div class="admin-preview-card" id="prodPreviewCard">
                            <img src="<?= esc($imgProdSrc) ?>" alt="Product Preview" id="prodPreviewImg" class="admin-preview-img" onerror="this.src='<?= base_url('assets/images/static-dynamic-balancing.jpg') ?>'">
                            <span class="admin-preview-badge" id="prodPreviewBadge"><?= !empty($product['img']) ? 'Current Image' : 'Default Image' ?></span>
                        </div>
                    </div>

                    <!-- Optional Fallback URL/Path for advanced usage -->
                    <div>
                        <button type="button" class="admin-url-toggle-btn" onclick="toggleProdUrlField()">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            <span>Or specify external URL / custom path</span>
                        </button>
                        <div id="prodUrlFallbackBox" class="admin-url-fallback-box" style="display: none;">
                            <input type="text" id="prodImg" name="img" class="admin-input" value="<?= esc($product['img'] ?? 'assets/images/static-dynamic-balancing.jpg') ?>" placeholder="e.g. assets/images/... or https://...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-form-group full-width">
                <label for="prodOverview" class="admin-label">Overview &amp; Experimental Principle *</label>
                <textarea id="prodOverview" name="overview" class="admin-textarea" rows="4" required><?= esc($product['overview'] ?? '') ?></textarea>
            </div>

            <div class="admin-form-group full-width">
                <label for="prodExperiments" class="admin-label">Experiments Covered (One per line)</label>
                <?php
                    $expText = '';
                    if (!empty($product['experiments']) && is_array($product['experiments'])) {
                        $expText = implode("\n", $product['experiments']);
                    }
                ?>
                <textarea id="prodExperiments" name="experiments" class="admin-textarea" rows="4" placeholder="To balance the masses statically and dynamically...&#10;To observe effect of unbalance in rotating mass..."><?= esc($expText) ?></textarea>
            </div>

            <div class="admin-form-group">
                <label for="prodUtilities" class="admin-label">Utilities Required (Format: Key : Value)</label>
                <?php
                    $utilText = '';
                    if (!empty($product['utilities']) && is_array($product['utilities'])) {
                        foreach ($product['utilities'] as $uk => $uv) {
                            $utilText .= $uk . ' : ' . $uv . "\n";
                        }
                    }
                ?>
                <textarea id="prodUtilities" name="utilities" class="admin-textarea" rows="4" placeholder="Electricity Supply : 0.5 kW, 220 V, 50 Hz, Single Phase&#10;Working Space : 1.5 m × 0.8 m Rigid Bench Top"><?= esc(trim($utilText)) ?></textarea>
                <span class="admin-form-help">Enter one utility per line in <code>Key : Value</code> format.</span>
            </div>

            <div class="admin-form-group">
                <label for="prodSpecs" class="admin-label">Technical Specifications (Format: Key : Value)</label>
                <?php
                    $specText = '';
                    if (!empty($product['specifications']) && is_array($product['specifications'])) {
                        foreach ($product['specifications'] as $sk => $sv) {
                            $specText .= $sk . ' : ' . $sv . "\n";
                        }
                    }
                ?>
                <textarea id="prodSpecs" name="specifications" class="admin-textarea" rows="4" placeholder="Drive Motor : FHP Motor, variable speed, with controller&#10;Balancing Weight : 4 Nos. of Stainless Steel&#10;Rotating Shaft : Material Stainless Steel"><?= esc(trim($specText)) ?></textarea>
                <span class="admin-form-help">Enter one specification per line in <code>Key : Value</code> format.</span>
            </div>

        </div>

        <div class="admin-form-actions">
            <button type="submit" class="btn-admin-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                Save Product / Apparatus
            </button>
            <a href="<?= base_url('admin/products') ?>" class="btn-admin-secondary">Cancel</a>
        </div>

    </form>
</div>

<script>
function toggleProdUrlField() {
    var box = document.getElementById('prodUrlFallbackBox');
    if (box.style.display === 'none') {
        box.style.display = 'block';
    } else {
        box.style.display = 'none';
    }
}

// Live Image Preview & Drag-Drop Handling
(function() {
    var fileInput = document.getElementById('prodImgFile');
    var dropzone = document.getElementById('prodDropzone');
    var previewImg = document.getElementById('prodPreviewImg');
    var previewBadge = document.getElementById('prodPreviewBadge');
    var dropzoneText = document.getElementById('prodDropzoneText');

    if (!fileInput || !dropzone) return;

    fileInput.addEventListener('change', function(e) {
        if (fileInput.files && fileInput.files[0]) {
            handleSelectedFile(fileInput.files[0]);
        }
    });

    ['dragenter', 'dragover'].forEach(function(eventName) {
        dropzone.addEventListener(eventName, function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('dragover');
        }, false);
    });

    ['dragleave', 'drop'].forEach(function(eventName) {
        dropzone.addEventListener(eventName, function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');
        }, false);
    });

    dropzone.addEventListener('drop', function(e) {
        var dt = e.dataTransfer;
        var files = dt.files;
        if (files && files.length > 0) {
            fileInput.files = files;
            handleSelectedFile(files[0]);
        }
    }, false);

    function handleSelectedFile(file) {
        if (!file.type.match('image.*')) {
            alert('Please select a valid image file (PNG, JPG, WEBP, SVG).');
            return;
        }
        var reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewBadge.textContent = 'Selected: ' + file.name;
            previewBadge.style.color = '#4ade80';
            dropzoneText.textContent = 'Selected ' + file.name + ' (Click to change)';
        };
        reader.readAsDataURL(file);
    }
})();
</script>

<?= $this->endSection() ?>
