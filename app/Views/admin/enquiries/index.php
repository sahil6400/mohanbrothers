<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h2 class="admin-card-title">Customer Enquiries &amp; Quotation Requests</h2>
            <p style="font-size: 13px; color: var(--admin-text-muted); margin: 4px 0 0 0;">Received from product pages, category tender buttons, and contact forms</p>
        </div>

        <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
            <!-- Filter Pills -->
            <div style="display: flex; gap: 6px; background: #141414; padding: 4px; border-radius: 6px; border: 1px solid var(--admin-border);">
                <a href="<?= base_url('admin/enquiries?status=all') ?>" class="btn-admin-secondary" style="padding: 5px 10px; font-size: 12px; <?= $current_filter === 'all' ? 'background: var(--admin-red); border-color: var(--admin-red);' : '' ?>">All (<?= count($enquiries) ?>)</a>
                <a href="<?= base_url('admin/enquiries?status=new') ?>" class="btn-admin-secondary" style="padding: 5px 10px; font-size: 12px; <?= $current_filter === 'new' ? 'background: #2563eb; border-color: #2563eb;' : '' ?>">New</a>
                <a href="<?= base_url('admin/enquiries?status=contacted') ?>" class="btn-admin-secondary" style="padding: 5px 10px; font-size: 12px; <?= $current_filter === 'contacted' ? 'background: #ca8a04; border-color: #ca8a04;' : '' ?>">Contacted</a>
                <a href="<?= base_url('admin/enquiries?status=quoted') ?>" class="btn-admin-secondary" style="padding: 5px 10px; font-size: 12px; <?= $current_filter === 'quoted' ? 'background: #9333ea; border-color: #9333ea;' : '' ?>">Quoted</a>
            </div>

            <a href="<?= base_url('admin/enquiries/export') ?>" class="btn-admin-primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Export CSV
            </a>
        </div>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 140px;">Date &amp; ID</th>
                    <th style="width: 200px;">Customer Details</th>
                    <th style="width: 220px;">Equipment Requested</th>
                    <th>Message Snippet</th>
                    <th style="width: 140px;">Status</th>
                    <th style="width: 130px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($enquiries)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--admin-text-muted);">
                            No enquiry records found under this filter.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($enquiries as $enq): ?>
                        <tr>
                            <td>
                                <div style="font-size: 11px; font-weight: 700; color: #BBB;"><?= esc($enq['id'] ?? 'ENQ') ?></div>
                                <div style="font-size: 11.5px; color: #888;"><?= esc(date('d M Y, H:i', strtotime($enq['created_at'] ?? 'now'))) ?></div>
                            </td>
                            <td>
                                <strong style="color: #FFFFFF; font-size: 13.5px;"><?= esc($enq['name']) ?></strong>
                                <div><a href="mailto:<?= esc($enq['email']) ?>" style="color: #60a5fa; font-size: 12px; text-decoration: none;"><?= esc($enq['email']) ?></a></div>
                                <div style="font-size: 11.5px; color: #AAA;"><?= esc($enq['phone'] ?: 'No Phone') ?></div>
                                <?php if (!empty($enq['city']) || !empty($enq['country'])): ?>
                                    <div style="font-size: 11px; color: #777; margin-top: 2px;">
                                        <?= esc(implode(', ', array_filter([$enq['city'] ?? '', $enq['country'] ?? '']))) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($enq['product_name'])): ?>
                                    <div style="color: #FFF; font-weight: 600; font-size: 13px;"><?= esc($enq['product_name']) ?></div>
                                    <?php if (!empty($enq['product_code'])): ?>
                                        <span class="code-tag" style="font-size: 10px;">CODE: <?= esc($enq['product_code']) ?></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span style="font-size: 12.5px; color: #CCC;"><?= esc($enq['category'] ?: 'General Laboratory Request') ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="font-size: 12.5px; color: #BBB; line-height: 1.45; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; max-width: 320px;">
                                    <?= esc($enq['message']) ?>
                                </div>
                            </td>
                            <td>
                                <form action="<?= base_url('admin/enquiries/update-status') ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= esc($enq['id'] ?? '') ?>">
                                    <select name="status" onchange="this.form.submit();" style="background: #202020; color: #FFF; font-size: 11.5px; font-weight: 600; padding: 4px 8px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.15); cursor: pointer;">
                                        <option value="new" <?= ($enq['status'] ?? 'new') === 'new' ? 'selected' : '' ?>>NEW</option>
                                        <option value="contacted" <?= ($enq['status'] ?? '') === 'contacted' ? 'selected' : '' ?>>CONTACTED</option>
                                        <option value="quoted" <?= ($enq['status'] ?? '') === 'quoted' ? 'selected' : '' ?>>QUOTED</option>
                                        <option value="closed" <?= ($enq['status'] ?? '') === 'closed' ? 'selected' : '' ?>>CLOSED</option>
                                    </select>
                                </form>
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <button type="button" class="btn-admin-secondary" style="padding: 5px 8px;" title="View Details" onclick="showEnquiryModal(<?= esc(json_encode($enq)) ?>)">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </button>
                                    <form action="<?= base_url('admin/enquiries/delete/' . ($enq['id'] ?? '')) ?>" method="POST" style="display: inline;" onsubmit="return confirm('Delete this enquiry record?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-admin-danger" style="padding: 5px 8px;" title="Delete">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path></svg>
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

<!-- Modal for Viewing Full Enquiry Details -->
<div id="enquiryDetailModal" style="display: none; position: fixed; inset: 0; z-index: 1000; background: rgba(0,0,0,0.8); backdrop-filter: blur(4px); align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #181818; border: 1px solid rgba(255,255,255,0.15); border-radius: 8px; max-width: 580px; width: 100%; padding: 28px; box-shadow: 0 24px 48px rgba(0,0,0,0.8); position: relative;">
        
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.08); padding-bottom: 14px;">
            <div>
                <h3 id="modalEnqTitle" style="font-family: 'Manrope', sans-serif; font-size: 18px; margin: 0 0 4px 0; color: #FFF;">Enquiry Details</h3>
                <span id="modalEnqDate" style="font-size: 12px; color: var(--admin-text-muted);"></span>
            </div>
            <button type="button" onclick="document.getElementById('enquiryDetailModal').style.display='none';" style="background: transparent; border: none; color: #AAA; font-size: 22px; cursor: pointer; line-height: 1;">&times;</button>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 18px; font-size: 13px;">
            <div>
                <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase;">Customer Name:</span>
                <strong id="modalEnqName" style="color: #FFF;"></strong>
            </div>
            <div>
                <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase;">Phone Number:</span>
                <span id="modalEnqPhone" style="color: #FFF;"></span>
            </div>
            <div>
                <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase;">Email Address:</span>
                <a id="modalEnqEmail" href="#" style="color: #60a5fa; text-decoration: none;"></a>
            </div>
            <div>
                <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase;">Location:</span>
                <span id="modalEnqLoc" style="color: #FFF;"></span>
            </div>
            <div style="grid-column: 1 / -1;">
                <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase;">Product / Apparatus Requested:</span>
                <span id="modalEnqProduct" style="color: #FFF; font-weight: 600;"></span>
            </div>
        </div>

        <div style="margin-bottom: 24px;">
            <span style="color: #888; display: block; font-size: 11px; text-transform: uppercase; margin-bottom: 6px;">Message / Requirements:</span>
            <div id="modalEnqMessage" style="background: #202020; padding: 14px; border-radius: 6px; font-size: 13.5px; color: #DDD; line-height: 1.6; white-space: pre-wrap; max-height: 200px; overflow-y: auto; border: 1px solid rgba(255,255,255,0.08);"></div>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 10px;">
            <a id="modalReplyMailBtn" href="#" class="btn-admin-primary">
                Reply via Email &rarr;
            </a>
            <button type="button" onclick="document.getElementById('enquiryDetailModal').style.display='none';" class="btn-admin-secondary">Close</button>
        </div>

    </div>
</div>

<script>
function showEnquiryModal(data) {
    document.getElementById('modalEnqTitle').textContent = 'Enquiry: ' + (data.id || 'ENQ');
    document.getElementById('modalEnqDate').textContent = 'Received on ' + (data.created_at || 'N/A') + ' (IP: ' + (data.ip_address || 'N/A') + ')';
    document.getElementById('modalEnqName').textContent = data.name || 'N/A';
    document.getElementById('modalEnqPhone').textContent = data.phone || 'N/A';
    
    const emailEl = document.getElementById('modalEnqEmail');
    emailEl.textContent = data.email || 'N/A';
    emailEl.href = 'mailto:' + (data.email || '');

    const replyBtn = document.getElementById('modalReplyMailBtn');
    replyBtn.href = 'mailto:' + (data.email || '') + '?subject=Regarding%20your%20quotation%20request%20-%20Ambross%20India';

    document.getElementById('modalEnqLoc').textContent = [data.city, data.country].filter(Boolean).join(', ') || 'N/A';
    document.getElementById('modalEnqProduct').textContent = data.product_name ? (data.product_name + (data.product_code ? ' (Code: ' + data.product_code + ')' : '')) : (data.category || 'General Enquiry');
    document.getElementById('modalEnqMessage').textContent = data.message || 'No message provided.';

    const modal = document.getElementById('enquiryDetailModal');
    modal.style.display = 'flex';
}
</script>

<?= $this->endSection() ?>
