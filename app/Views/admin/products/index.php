<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h2 class="admin-card-title">Apparatus &amp; Test Rigs Management</h2>
            <p style="font-size: 13px; color: var(--admin-text-muted); margin: 4px 0 0 0;">Manage product specifications, experiments lists, utilities, and catalog codes</p>
        </div>
        <a href="<?= base_url('admin/products/create') ?>" class="btn-admin-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add New Product / Apparatus
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 70px;">Thumbnail</th>
                    <th style="width: 100px;">Code</th>
                    <th style="width: 260px;">Apparatus Name</th>
                    <th>Laboratory Category</th>
                    <th>Badge / Cert</th>
                    <th style="width: 180px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--admin-text-muted);">
                            No products found. Click "Add New Product" to create one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $slug => $prod): ?>
                        <tr>
                            <td>
                                <img src="<?= (strpos($prod['img'], 'http') === 0) ? esc($prod['img']) : base_url(esc($prod['img'])) ?>" 
                                     alt="<?= esc($prod['name']) ?>" 
                                     style="width: 48px; height: 36px; object-fit: cover; border-radius: 4px; border: 1px solid var(--admin-border);">
                            </td>
                            <td>
                                <span class="code-tag" style="font-size: 11px;"><?= esc($prod['code'] ?? '1100') ?></span>
                            </td>
                            <td>
                                <strong style="color: #FFFFFF; font-size: 14px;"><?= esc($prod['name']) ?></strong>
                                <div style="font-size: 11px; color: var(--admin-red); margin-top: 2px;">/product/<?= esc($prod['slug'] ?? $slug) ?></div>
                            </td>
                            <td>
                                <span style="font-size: 12.5px; color: #DDD;">
                                    <?= esc($prod['category_name'] ?? 'Theory of Machine Lab') ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 11px; background: rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 4px; color: #BBB;">
                                    <?= esc($prod['badge'] ?? 'ISO Calibrated') ?>
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="<?= base_url('product/' . ($prod['slug'] ?? $slug)) ?>" target="_blank" class="btn-admin-secondary" style="padding: 6px 10px;" title="View Live Product Page">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    </a>
                                    <a href="<?= base_url('admin/products/edit/' . ($prod['slug'] ?? $slug)) ?>" class="btn-admin-secondary" style="padding: 6px 10px;" title="Edit Product">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                    <form action="<?= base_url('admin/products/delete/' . ($prod['slug'] ?? $slug)) ?>" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this apparatus?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-admin-danger" style="padding: 6px 10px;" title="Delete Product">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
