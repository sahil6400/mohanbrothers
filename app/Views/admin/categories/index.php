<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h2 class="admin-card-title">Laboratory Categories</h2>
            <p style="font-size: 13px; color: var(--admin-text-muted); margin: 4px 0 0 0;">Manage academic curricula, lab hero banners, and descriptions</p>
        </div>
        <a href="<?= base_url('admin/categories/create') ?>" class="btn-admin-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add New Lab Category
        </a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 80px;">No.</th>
                    <th style="width: 250px;">Category Title</th>
                    <th>Subtitle &amp; Description</th>
                    <th style="width: 140px;">Learning Outcomes</th>
                    <th style="width: 180px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($categories)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 32px; color: var(--admin-text-muted);">
                            No categories found. Click "Add New Lab Category" to create one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($categories as $slug => $cat): ?>
                        <tr>
                            <td>
                                <span class="code-tag" style="font-size: 11px;"><?= esc($cat['num'] ?? '00') ?></span>
                            </td>
                            <td>
                                <strong style="color: #FFFFFF; font-size: 14px;"><?= esc($cat['title']) ?></strong>
                                <div style="font-size: 11px; color: var(--admin-red); margin-top: 2px;">/category/<?= esc($slug) ?></div>
                            </td>
                            <td>
                                <div style="font-size: 12.5px; color: #DDD; margin-bottom: 4px; font-weight: 500;"><?= esc($cat['subtitle'] ?? '') ?></div>
                                <div style="font-size: 12px; color: #888; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    <?= esc($cat['desc'] ?? '') ?>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 12px; background: #222; padding: 4px 8px; border-radius: 4px; color: #CCC;">
                                    <?= count($cat['learning_outcomes'] ?? []) ?> Outcomes
                                </span>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="<?= base_url('category/' . $slug) ?>" target="_blank" class="btn-admin-secondary" style="padding: 6px 10px;" title="View Live Page">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    </a>
                                    <a href="<?= base_url('admin/categories/edit/' . $slug) ?>" class="btn-admin-secondary" style="padding: 6px 10px;" title="Edit Category">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                    <form action="<?= base_url('admin/categories/delete/' . $slug) ?>" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this lab category?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-admin-danger" style="padding: 6px 10px;" title="Delete Category">
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
