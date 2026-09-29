<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title"><?= esc($title) ?></h2>
        <a href="<?= base_url('admin/categories') ?>" class="btn-admin-secondary">&larr; Back to Categories</a>
    </div>

    <form action="<?= esc($action_url) ?>" method="POST" enctype="multipart/form-data" class="admin-form">
        <?= csrf_field() ?>

        <div class="admin-form-grid">
            
            <div class="admin-form-group">
                <label for="catNum" class="admin-label">Lab Number (e.g. 01, 02, 08)</label>
                <input type="text" id="catNum" name="num" class="admin-input" value="<?= esc($category['num'] ?? '01') ?>" required>
            </div>

            <div class="admin-form-group">
                <label for="catSlug" class="admin-label">URL Slug (e.g. theory-of-machine-lab)</label>
                <input type="text" id="catSlug" name="slug" class="admin-input" value="<?= esc($category['slug'] ?? '') ?>" placeholder="auto-generated-if-empty">
            </div>

            <div class="admin-form-group full-width">
                <label for="catTitle" class="admin-label">Laboratory Title *</label>
                <input type="text" id="catTitle" name="title" class="admin-input" value="<?= esc($category['title'] ?? '') ?>" placeholder="e.g. Theory of Machine Lab" required>
            </div>

            <div class="admin-form-group full-width">
                <label for="catSubtitle" class="admin-label">Subtitle / Key Disciplines</label>
                <input type="text" id="catSubtitle" name="subtitle" class="admin-input" value="<?= esc($category['subtitle'] ?? '') ?>" placeholder="e.g. Kinematics, Dynamics, Balancing, Cams & Gyroscopic Systems">
            </div>

            <!-- Upload Laboratory Hero / Showcase Image -->
            <div class="admin-form-group full-width">
                <label class="admin-label">Hero / Showcase Image *</label>
                
                <div class="admin-upload-wrapper">
                    <div class="admin-upload-grid">
                        <!-- Dropzone / File Picker -->
                        <div class="admin-dropzone" id="catDropzone" onclick="document.getElementById('catHeroImgFile').click()">
                            <input type="file" id="catHeroImgFile" name="hero_img_file" accept="image/png, image/jpeg, image/webp, image/svg+xml, image/jpg" style="display: none;">
                            
                            <div class="admin-dropzone-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                            </div>
                            <div class="admin-dropzone-primary">
                                <span id="catDropzoneText">Click to upload image</span> or drag and drop
                            </div>
                            <div class="admin-dropzone-hint">PNG, JPG, WebP, SVG up to 10MB</div>
                        </div>

                        <!-- Current / Selected Image Preview -->
                        <?php 
                            $currentImg = $category['hero_img'] ?? 'assets/images/refrigeration-lab.jpg';
                            $imgSrc = (strpos($currentImg, 'http') === 0) ? $currentImg : base_url($currentImg);
                        ?>
                        <div class="admin-preview-card" id="catPreviewCard">
                            <img src="<?= esc($imgSrc) ?>" alt="Category Preview" id="catPreviewImg" class="admin-preview-img" onerror="this.src='<?= base_url('assets/images/refrigeration-lab.jpg') ?>'">
                            <span class="admin-preview-badge" id="catPreviewBadge"><?= !empty($category['hero_img']) ? 'Current Image' : 'Default Image' ?></span>
                        </div>
                    </div>

                    <!-- Optional Fallback URL/Path for advanced usage -->
                    <div>
                        <button type="button" class="admin-url-toggle-btn" onclick="toggleCatUrlField()">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            <span>Or specify external URL / custom path</span>
                        </button>
                        <div id="catUrlFallbackBox" class="admin-url-fallback-box" style="display: none;">
                            <input type="text" id="catHeroImg" name="hero_img" class="admin-input" value="<?= esc($category['hero_img'] ?? 'assets/images/refrigeration-lab.jpg') ?>" placeholder="e.g. assets/images/... or https://...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-form-group full-width">
                <label for="catDesc" class="admin-label">Overview &amp; Curriculum Description</label>
                <textarea id="catDesc" name="desc" class="admin-textarea" rows="4" required><?= esc($category['desc'] ?? '') ?></textarea>
            </div>

            <div class="admin-form-group full-width">
                <label for="catOutcomes" class="admin-label">Learning Outcomes &amp; Core Experiments (One per line)</label>
                <textarea id="catOutcomes" name="learning_outcomes" class="admin-textarea" rows="6" placeholder="Analyze planar mechanisms...&#10;Perform static and dynamic multi-plane balancing..."><?= esc(!empty($category['learning_outcomes']) ? implode("\n", $category['learning_outcomes']) : '') ?></textarea>
                <span class="admin-form-help">Enter each key curriculum learning outcome on a separate line.</span>
            </div>

        </div>

        <div class="admin-form-actions">
            <button type="submit" class="btn-admin-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                Save Laboratory Category
            </button>
            <a href="<?= base_url('admin/categories') ?>" class="btn-admin-secondary">Cancel</a>
        </div>

    </form>
</div>

<script>
function toggleCatUrlField() {
    var box = document.getElementById('catUrlFallbackBox');
    if (box.style.display === 'none') {
        box.style.display = 'block';
    } else {
        box.style.display = 'none';
    }
}

// Live Image Preview & Drag-Drop Handling
(function() {
    var fileInput = document.getElementById('catHeroImgFile');
    var dropzone = document.getElementById('catDropzone');
    var previewImg = document.getElementById('catPreviewImg');
    var previewBadge = document.getElementById('catPreviewBadge');
    var dropzoneText = document.getElementById('catDropzoneText');

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
