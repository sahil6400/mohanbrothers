<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- 1. Stats Overview Grid -->
<div class="admin-stats-grid">
    <div class="admin-stat-card">
        <div>
            <div class="admin-stat-label">Laboratory Categories</div>
            <div class="admin-stat-value"><?= esc($categories_count) ?></div>
        </div>
        <div class="admin-stat-icon-wrap">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
        </div>
    </div>

    <div class="admin-stat-card">
        <div>
            <div class="admin-stat-label">Total Test Rigs &amp; Products</div>
            <div class="admin-stat-value"><?= esc($products_count) ?></div>
        </div>
        <div class="admin-stat-icon-wrap">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
    </div>

    <div class="admin-stat-card">
        <div>
            <div class="admin-stat-label">Total Customer Enquiries</div>
            <div class="admin-stat-value"><?= esc($enquiries_count) ?></div>
        </div>
        <div class="admin-stat-icon-wrap">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        </div>
    </div>

    <div class="admin-stat-card">
        <div>
            <div class="admin-stat-label">Pending / New Enquiries</div>
            <div class="admin-stat-value" style="color: #60a5fa;"><?= esc($new_enquiries_count) ?></div>
        </div>
        <div class="admin-stat-icon-wrap" style="background: rgba(59, 130, 246, 0.15); color: #60a5fa;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        </div>
    </div>
</div>


<!-- 2. Quick Action Shortcuts -->
<div class="admin-card" style="margin-bottom: 28px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Quick Administration Actions</h2>
    </div>
    <div style="padding: 20px 24px; display: flex; gap: 14px; flex-wrap: wrap;">
        <a href="<?= base_url('admin/products/create') ?>" class="btn-admin-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add New Apparatus / Product
        </a>
        <a href="<?= base_url('admin/categories/create') ?>" class="btn-admin-secondary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Lab Category
        </a>
        <a href="<?= base_url('admin/enquiries/export') ?>" class="btn-admin-secondary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            Export All Inquiries (CSV)
        </a>
    </div>
</div>


<!-- 3. Recent Inquiries Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Recent Customer Inquiries &amp; Quotation Requests</h2>
        <a href="<?= base_url('admin/enquiries') ?>" class="btn-admin-secondary" style="font-size: 12px;">View All Enquiries &rarr;</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Email &amp; Phone</th>
                    <th>Product / Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recent_enquiries)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--admin-text-muted);">
                            No enquiries received yet. Inquiries submitted via the website forms will appear here.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($recent_enquiries as $enq): ?>
                        <tr>
                            <td style="font-size: 12px; color: #9CA3AF;">
                                <?= esc(date('d M Y, H:i', strtotime($enq['created_at'] ?? 'now'))) ?>
                            </td>
                            <td>
                                <strong><?= esc($enq['name']) ?></strong>
                                <?php if (!empty($enq['city']) || !empty($enq['country'])): ?>
                                    <div style="font-size: 11px; color: #888;"><?= esc(implode(', ', array_filter([$enq['city'] ?? '', $enq['country'] ?? '']))) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div><a href="mailto:<?= esc($enq['email']) ?>" style="color: #60a5fa; text-decoration: none;"><?= esc($enq['email']) ?></a></div>
                                <div style="font-size: 12px; color: #AAA;"><?= esc($enq['phone'] ?: 'N/A') ?></div>
                            </td>
                            <td>
                                <?php if (!empty($enq['product_name'])): ?>
                                    <span style="color: #FFF; font-weight: 600;"><?= esc($enq['product_name']) ?></span>
                                    <?php if (!empty($enq['product_code'])): ?>
                                        <span class="code-tag" style="font-size: 10px;"><?= esc($enq['product_code']) ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span><?= esc($enq['category'] ?: 'General Laboratory Enquiry') ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="status-badge <?= esc($enq['status'] ?? 'new') ?>">
                                    <?= strtoupper(esc($enq['status'] ?? 'new')) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/enquiries') ?>" class="btn-admin-secondary" style="padding: 4px 10px; font-size: 11.5px;">
                                    Manage
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
