{{-- sidebar.blade.php --}}

<style>
    :root {
        --sidebar-width: 80px;
        --sidebar-bg: #ffffff;
        --sidebar-border: #e5e7eb;
        --sidebar-icon-color: #9ca3af;
        --sidebar-active-color: #f97316;
        --sidebar-hover-bg: #fff7ed;
        --sidebar-active-bg: #fff7ed;
        --sidebar-shadow: -3px 0 12px rgba(0, 0, 0, 0.08);

        --bottom-nav-height: 64px;
        --bottom-nav-bg: #ffffff;
        --bottom-nav-border: #e5e7eb;
        --bottom-nav-active-color: #f97316;
        --bottom-nav-icon-color: #9ca3af;
        --bottom-nav-shadow: 0 -2px 12px rgba(0, 0, 0, 0.08);
    }

    /* ============================================================
       SIDEBAR KANAN — DESKTOP
       ============================================================ */
    .sidebar-right {
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        width: var(--sidebar-width);
        background-color: var(--sidebar-bg);
        border: 1px solid var(--sidebar-border);
        border-right: none;
        border-radius: 12px 0 0 12px;
        box-shadow: var(--sidebar-shadow);
        z-index: 900;
        padding: 4px 0;
    }

    .sidebar-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .sidebar-item {
        width: 100%;
    }

    .sidebar-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 5px;
        padding: 12px 0;
        text-decoration: none;
        color: var(--sidebar-icon-color);
        transition: background-color 0.2s ease, color 0.2s ease;
        position: relative;
        box-sizing: border-box;
        cursor: pointer;
        background: none;
        border: none;
    }

    .sidebar-link:hover {
        background-color: var(--sidebar-hover-bg);
        color: var(--sidebar-active-color);
        text-decoration: none;
    }

    .sidebar-link.active {
        background-color: var(--sidebar-active-bg);
        color: var(--sidebar-active-color);
    }

    .sidebar-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 55%;
        background-color: var(--sidebar-active-color);
        border-radius: 0 3px 3px 0;
    }

    .sidebar-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 26px;
        flex-shrink: 0;
    }

    .sidebar-icon svg {
        width: 22px;
        height: 22px;
        display: block;
    }

    .sidebar-label {
        display: block;
        width: 100%;
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-align: center;
        line-height: 1;
        font-family: inherit;
        white-space: nowrap;
    }

    /* ============================================================
       BOTTOM NAVBAR — MOBILE
       ============================================================ */
    .bottom-navbar {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: var(--bottom-nav-height);
        background-color: var(--bottom-nav-bg);
        border-top: 1px solid var(--bottom-nav-border);
        box-shadow: var(--bottom-nav-shadow);
        z-index: 1000;
        flex-direction: row;
        align-items: stretch;
        justify-content: space-around;
    }

    .bottom-nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        gap: 3px;
        padding: 8px 4px;
        text-decoration: none;
        color: var(--bottom-nav-icon-color);
        transition: color 0.2s ease;
        position: relative;
        min-width: 0;
        cursor: pointer;
        background: none;
        border: none;
    }

    .bottom-nav-item:hover {
        color: var(--bottom-nav-active-color);
        text-decoration: none;
    }

    .bottom-nav-item.active {
        color: var(--bottom-nav-active-color);
    }

    .bottom-nav-item.active::before {
        content: '';
        position: absolute;
        top: 0;
        left: 25%;
        right: 25%;
        height: 3px;
        background-color: var(--bottom-nav-active-color);
        border-radius: 0 0 3px 3px;
    }

    .bottom-nav-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        flex-shrink: 0;
    }

    .bottom-nav-icon svg {
        width: 22px;
        height: 22px;
    }

    .bottom-nav-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-align: center;
        line-height: 1;
        font-family: inherit;
        white-space: nowrap;
    }

    /* ============================================================
       RESPONSIVE
       ============================================================ */
    @media (max-width: 768px) {
        .sidebar-right {
            display: none !important;
        }
        .bottom-navbar {
            display: flex !important;
        }
        body {
            padding-bottom: var(--bottom-nav-height);
        }
    }

    @media (min-width: 769px) {
        .sidebar-right {
            display: block !important;
        }
        .bottom-navbar {
            display: none !important;
        }
    }

    /* ============================================================
       OVERLAY
       ============================================================ */
    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 1100;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .sidebar-overlay.open {
        display: block;
        opacity: 1;
    }

    /* ============================================================
       PANEL — SLIDE DARI KANAN (DESKTOP)
       ============================================================ */
    .sidebar-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 480px;
        max-width: 90vw;
        height: 100%;
        background: #ffffff;
        z-index: 1200;
        box-shadow: -4px 0 24px rgba(0, 0, 0, 0.15);
        transform: translateX(100%);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .sidebar-panel.open {
        transform: translateX(0);
    }

    .sidebar-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid #f3f4f6;
        flex-shrink: 0;
    }

    .sidebar-panel-title {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 0.05em;
        color: #111827;
        margin: 0;
    }

    .sidebar-panel-close {
        background: none;
        border: none;
        cursor: pointer;
        color: #6b7280;
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: background 0.2s, color 0.2s;
    }

    .sidebar-panel-close:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .sidebar-panel-close svg {
        width: 22px;
        height: 22px;
    }

    .sidebar-panel-body {
        flex: 1;
        overflow-y: auto;
        padding: 24px;
    }

    .sidebar-panel-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    /* ============================================================
       PANEL — SLIDE DARI BAWAH (MOBILE)
       ============================================================ */
    .bottom-panel {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 75vh;
        background: #ffffff;
        z-index: 1200;
        box-shadow: 0 -4px 24px rgba(0, 0, 0, 0.15);
        border-radius: 20px 20px 0 0;
        transform: translateY(100%);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .bottom-panel.open {
        transform: translateY(0);
    }

    .bottom-panel-handle {
        width: 40px;
        height: 4px;
        background: #d1d5db;
        border-radius: 2px;
        margin: 12px auto 0;
        flex-shrink: 0;
    }

    .bottom-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px 14px;
        border-bottom: 1px solid #f3f4f6;
        flex-shrink: 0;
    }

    .bottom-panel-title {
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 0.05em;
        color: #111827;
        margin: 0;
    }

    .bottom-panel-close {
        background: none;
        border: none;
        cursor: pointer;
        color: #6b7280;
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: background 0.2s, color 0.2s;
    }

    .bottom-panel-close:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .bottom-panel-close svg {
        width: 20px;
        height: 20px;
    }

    .bottom-panel-body {
        flex: 1;
        overflow-y: auto;
        padding: 16px 20px;
    }

    .bottom-panel-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    /* ============================================================
       PANEL CONTENT — CARD ITEM (shared desktop & mobile)
       ============================================================ */
    .panel-card {
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        aspect-ratio: 4/3;
        background: #e5e7eb;
        text-decoration: none;
        display: block;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .panel-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .panel-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .panel-card-label {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px 12px;
        background: linear-gradient(0deg, rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%);
        color: #ffffff;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.3;
    }
</style>

{{-- ===================== SIDEBAR KANAN - DESKTOP ===================== --}}
<aside class="sidebar-right">
    <ul class="sidebar-menu">
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10 17 15 12 10 7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>
                </span>
                <span class="sidebar-label">LOGIN</span>
            </a>
        </li>
        <li class="sidebar-item">
            <button type="button" class="sidebar-link" onclick="openSidebarPanel('produk')">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/>
                        <line x1="12" y1="17" x2="12" y2="21"/>
                    </svg>
                </span>
                <span class="sidebar-label">PRODUK</span>
            </button>
        </li>
        <li class="sidebar-item">
            {{-- Layanan: buka panel dari kanan --}}
            <button type="button" class="sidebar-link"
                onclick="openSidebarPanel('layanan')">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="22" x2="21" y2="22"/>
                        <line x1="6" y1="18" x2="6" y2="11"/>
                        <line x1="10" y1="18" x2="10" y2="11"/>
                        <line x1="14" y1="18" x2="14" y2="11"/>
                        <line x1="18" y1="18" x2="18" y2="11"/>
                        <polygon points="12 2 20 7 4 7"/>
                    </svg>
                </span>
                <span class="sidebar-label">LAYANAN</span>
            </button>
        </li>
        <li class="sidebar-item">
            <button type="button" class="sidebar-link" onclick="openSidebarPanel('simulasi')">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2"/>
                        <line x1="8" y1="6" x2="16" y2="6"/>
                        <line x1="8" y1="10" x2="8" y2="10"/>
                        <line x1="12" y1="10" x2="12" y2="10"/>
                        <line x1="16" y1="10" x2="16" y2="10"/>
                        <line x1="8" y1="14" x2="8" y2="14"/>
                        <line x1="12" y1="14" x2="12" y2="14"/>
                        <line x1="16" y1="14" x2="16" y2="14"/>
                        <line x1="8" y1="18" x2="12" y2="18"/>
                        <line x1="16" y1="18" x2="16" y2="18"/>
                    </svg>
                </span>
                <span class="sidebar-label">SIMULASI</span>
            </button>
        </li>
        <li class="sidebar-item">
            <a href="/pengajuanonline" class="sidebar-link">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"/>
                        <line x1="8" y1="12" x2="21" y2="12"/>
                        <line x1="8" y1="18" x2="21" y2="18"/>
                        <polyline points="3 6 4 7 6 5"/>
                        <polyline points="3 12 4 13 6 11"/>
                        <polyline points="3 18 4 19 6 17"/>
                    </svg>
                </span>
                <span class="sidebar-label">PENGAJUAN</span>
            </a>
        </li>
    </ul>
</aside>

{{-- ===================== BOTTOM NAVBAR - MOBILE ===================== --}}
<nav class="bottom-navbar">
    <a href="#" class="bottom-nav-item">
        <span class="bottom-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                <polyline points="10 17 15 12 10 7"/>
                <line x1="15" y1="12" x2="3" y2="12"/>
            </svg>
        </span>
        <span class="bottom-nav-label">Login</span>
    </a>
    <button type="button" class="bottom-nav-item" onclick="openBottomPanel('produk')">
        <span class="bottom-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="3" width="20" height="14" rx="2"/>
                <line x1="8" y1="21" x2="16" y2="21"/>
                <line x1="12" y1="17" x2="12" y2="21"/>
            </svg>
        </span>
        <span class="bottom-nav-label">Produk</span>
    </button>
    <button type="button" class="bottom-nav-item"
        onclick="openBottomPanel('layanan')">
        <span class="bottom-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="22" x2="21" y2="22"/>
                <line x1="6" y1="18" x2="6" y2="11"/>
                <line x1="10" y1="18" x2="10" y2="11"/>
                <line x1="14" y1="18" x2="14" y2="11"/>
                <line x1="18" y1="18" x2="18" y2="11"/>
                <polygon points="12 2 20 7 4 7"/>
            </svg>
        </span>
        <span class="bottom-nav-label">Layanan</span>
    </button>
    <button type="button" class="bottom-nav-item" onclick="openBottomPanel('simulasi')">
        <span class="bottom-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="2" width="16" height="20" rx="2"/>
                <line x1="8" y1="6" x2="16" y2="6"/>
                <line x1="8" y1="10" x2="8" y2="10"/>
                <line x1="12" y1="10" x2="12" y2="10"/>
                <line x1="16" y1="10" x2="16" y2="10"/>
                <line x1="8" y1="14" x2="8" y2="14"/>
                <line x1="12" y1="14" x2="12" y2="14"/>
                <line x1="16" y1="14" x2="16" y2="14"/>
                <line x1="8" y1="18" x2="12" y2="18"/>
                <line x1="16" y1="18" x2="16" y2="18"/>
            </svg>
        </span>
        <span class="bottom-nav-label">Simulasi</span>
    </button>
    <a href="/pengajuanonline" class="bottom-nav-item">
        <span class="bottom-nav-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="8" y1="6" x2="21" y2="6"/>
                <line x1="8" y1="12" x2="21" y2="12"/>
                <line x1="8" y1="18" x2="21" y2="18"/>
                <polyline points="3 6 4 7 6 5"/>
                <polyline points="3 12 4 13 6 11"/>
                <polyline points="3 18 4 19 6 17"/>
            </svg>
        </span>
        <span class="bottom-nav-label">Pengajuan</span>
    </a>
</nav>

{{-- ===================== OVERLAY ===================== --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeAllPanels()"></div>

{{-- ===================== PANEL KANAN - DESKTOP ===================== --}}
<div class="sidebar-panel" id="sidebarPanel">
    <div class="sidebar-panel-header">
        <h2 class="sidebar-panel-title" id="sidebarPanelTitle">PRODUK</h2>
        <button class="sidebar-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="sidebar-panel-body">
        <div class="sidebar-panel-grid" id="sidebarPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>
<div class="sidebar-panel" id="sidebarPanel">
    <div class="sidebar-panel-header">
        <h2 class="sidebar-panel-title" id="sidebarPanelTitle">LAYANAN</h2>
        <button class="sidebar-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="sidebar-panel-body">
        <div class="sidebar-panel-grid" id="sidebarPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>
<div class="sidebar-panel" id="sidebarPanel">
    <div class="sidebar-panel-header">
        <h2 class="sidebar-panel-title" id="sidebarPanelTitle">SIMULASI</h2>
        <button class="sidebar-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="sidebar-panel-body">
        <div class="sidebar-panel-grid" id="sidebarPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>

{{-- ===================== PANEL BAWAH - MOBILE ===================== --}}
<div class="bottom-panel" id="bottomPanel">
    <div class="bottom-panel-handle"></div>
    <div class="bottom-panel-header">
        <h2 class="bottom-panel-title" id="bottomPanelTitle">PRODUK</h2>
        <button class="bottom-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="bottom-panel-body">
        <div class="bottom-panel-grid" id="bottomPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>
<div class="bottom-panel" id="bottomPanel">
    <div class="bottom-panel-handle"></div>
    <div class="bottom-panel-header">
        <h2 class="bottom-panel-title" id="bottomPanelTitle">LAYANAN</h2>
        <button class="bottom-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="bottom-panel-body">
        <div class="bottom-panel-grid" id="bottomPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>
<div class="bottom-panel" id="bottomPanel">
    <div class="bottom-panel-handle"></div>
    <div class="bottom-panel-header">
        <h2 class="bottom-panel-title" id="bottomPanelTitle">SIMULASI</h2>
        <button class="bottom-panel-close" onclick="closeAllPanels()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>
    <div class="bottom-panel-body">
        <div class="bottom-panel-grid" id="bottomPanelGrid">
            {{-- Konten diisi via JS berdasarkan panel yang dibuka --}}
        </div>
    </div>
</div>

<script>
    // ============================================================
    // DATA PANEL — sesuaikan href dan gambar sesuai kebutuhan
    // ============================================================
    const panelData = {
        produk: {
            title: 'PRODUK',
            items: [
                {
                    label: 'Kredit',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Deposito',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Tabungan',
                    href: '#',
                    img: '',
                },
            ]
        },
        layanan: {
            title: 'LAYANAN',
            items: [
                {
                    label: 'Jaringan Kantor',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Layanan Mobil Kas Keliling',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Layanan Pengaduan Konsumen',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Layanan PPOB (Payment Point Online Banking)',
                    href: '#',
                    img: '',
                },
            ]
        },
        simulasi: {
            title: 'SIMULASI',
            items: [
                {
                    label: 'Simulasi Kredit',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Simulasi Tabungan',
                    href: '#',
                    img: '',
                },
                {
                    label: 'Simulasi Deposito',
                    href: '#',
                    img: '',
                },
            ]
        },
        
    };

    // ============================================================
    // RENDER CARDS
    // ============================================================
    function renderCards(items) {
        return items.map(item => `
            <a href="${item.href}" class="panel-card">
                ${item.img
                    ? `<img src="${item.img}" alt="${item.label}" loading="lazy">`
                    : `<div style="width:100%;height:100%;background:#dbeafe;"></div>`
                }
                <span class="panel-card-label">${item.label}</span>
            </a>
        `).join('');
    }

    // ============================================================
    // BUKA PANEL KANAN (desktop)
    // ============================================================
    function openSidebarPanel(key) {
        const data = panelData[key];
        if (!data) return;

        document.getElementById('sidebarPanelTitle').textContent = data.title;
        document.getElementById('sidebarPanelGrid').innerHTML = renderCards(data.items);

        document.getElementById('sidebarOverlay').classList.add('open');
        document.getElementById('sidebarPanel').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    // ============================================================
    // BUKA PANEL BAWAH (mobile)
    // ============================================================
    function openBottomPanel(key) {
        const data = panelData[key];
        if (!data) return;

        document.getElementById('bottomPanelTitle').textContent = data.title;
        document.getElementById('bottomPanelGrid').innerHTML = renderCards(data.items);

        document.getElementById('sidebarOverlay').classList.add('open');
        document.getElementById('bottomPanel').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    // ============================================================
    // TUTUP SEMUA PANEL
    // ============================================================
    function closeAllPanels() {
        document.getElementById('sidebarOverlay').classList.remove('open');
        document.getElementById('sidebarPanel').classList.remove('open');
        document.getElementById('bottomPanel').classList.remove('open');
        document.body.style.overflow = '';
    }

    // Tutup dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeAllPanels();
    });
</script>