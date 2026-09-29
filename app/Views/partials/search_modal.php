<!-- Quick Search Modal -->
<div class="search-modal-backdrop" id="searchModal">
    <div class="search-modal-box">
        <div class="search-input-wrap">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--text-muted); flex-shrink: 0;">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="searchInput" class="search-input-field" placeholder="Search laboratories, equipment, models..." autocomplete="off">
            <button type="button" id="searchModalClose" style="background: none; border: none; color: var(--text-muted); font-size: 20px; cursor: pointer; padding: 4px;">&times;</button>
        </div>
        <ul class="search-results-list" id="searchResults">
            <!-- Dynamically populated by main.js -->
        </ul>
        <div style="padding: 10px 16px; background: rgba(0,0,0,0.2); border-top: 1px solid rgba(255,255,255,0.05); font-size: 11px; color: var(--text-muted); display: flex; justify-content: space-between;">
            <span>Navigation: Press <kbd style="background: rgba(255,255,255,0.1); padding: 2px 4px; border-radius: 3px;">ESC</kbd> to exit</span>
            <span>Shortcut: <kbd style="background: rgba(255,255,255,0.1); padding: 2px 4px; border-radius: 3px;">Ctrl</kbd> + <kbd style="background: rgba(255,255,255,0.1); padding: 2px 4px; border-radius: 3px;">K</kbd></span>
        </div>
    </div>
</div>
