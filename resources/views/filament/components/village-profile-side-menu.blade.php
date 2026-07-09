<style>
    [x-cloak] {
        display: none !important;
    }

    .village-setting-menu {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .village-setting-menu button {
        width: 100%;
        border: 0;
        outline: 0;
        background: transparent;
        color: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 16px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        text-align: left;
    }

    .village-setting-menu button:hover {
        background: rgba(255, 255, 255, 0.06);
        color: #ffffff;
    }

    .village-setting-menu button.active {
        background: rgba(99, 102, 241, 0.16);
        color: #818cf8;
    }

    .village-setting-menu .menu-content {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .village-setting-menu .menu-icon {
        width: 22px;
        height: 22px;
        flex-shrink: 0;
    }

    .village-setting-menu .menu-label {
        line-height: 1.2;
        white-space: normal;
    }

    .village-setting-menu .menu-arrow {
        flex-shrink: 0;
        opacity: 0.8;
    }
</style>

<div class="village-setting-menu">
    <button
        type="button"
        @click="activeSection = 'profil'"
        :class="{ 'active': activeSection === 'profil' }"
    >
        <span class="menu-content">
            <x-filament::icon icon="heroicon-o-building-office-2" class="menu-icon" />
            <span class="menu-label">Profil Dusun</span>
        </span>
        <span class="menu-arrow">→</span>
    </button>

    <button
        type="button"
        @click="activeSection = 'ketua-dusun'"
        :class="{ 'active': activeSection === 'ketua-dusun' }"
    >
        <span class="menu-content">
            <x-filament::icon icon="heroicon-o-user" class="menu-icon" />
            <span class="menu-label">Ketua Dusun</span>
        </span>
        <span class="menu-arrow">→</span>
    </button>

    <button
        type="button"
        @click="activeSection = 'karang-taruna'"
        :class="{ 'active': activeSection === 'karang-taruna' }"
    >
        <span class="menu-content">
            <x-filament::icon icon="heroicon-o-users" class="menu-icon" />
            <span class="menu-label">Ketua Karang Taruna</span>
        </span>
        <span class="menu-arrow">→</span>
    </button>

    <button
        type="button"
        @click="activeSection = 'peta'"
        :class="{ 'active': activeSection === 'peta' }"
    >
        <span class="menu-content">
            <x-filament::icon icon="heroicon-o-map" class="menu-icon" />
            <span class="menu-label">Peta Dusun</span>
        </span>
        <span class="menu-arrow">→</span>
    </button>

    <button
        type="button"
        @click="activeSection = 'informasi-singkat'"
        :class="{ 'active': activeSection === 'informasi-singkat' }"
    >
        <span class="menu-content">
            <x-filament::icon icon="heroicon-o-information-circle" class="menu-icon" />
            <span class="menu-label">Informasi Singkat</span>
        </span>
        <span class="menu-arrow">→</span>
    </button>
</div>