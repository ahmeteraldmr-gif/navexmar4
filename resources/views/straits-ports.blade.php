@extends('layouts.app')
@section('title', 'Boğazlar & Limanlar | NAVEXMAR — Türk Boğazları Geçiş Rehberi')

@section('styles')
<style>
/* ─── STRAITS & PORTS LUXURY STYLES ─── */
.stp-container { max-width: 1140px; margin: 0 auto; }

.stp-hero {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}

.strait-cards-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 24px; margin-bottom: 48px;
}
.strait-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    aspect-ratio: 16/9;
    box-shadow: 0 10px 30px rgba(6, 24, 46, 0.15);
    border: 1px solid var(--border);
}
.strait-card img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.strait-card:hover img { transform: scale(1.06); }
.strait-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(4, 16, 31, 0.92) 0%, rgba(4, 16, 31, 0.2) 65%);
}
.strait-body {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 24px; z-index: 2;
}
.strait-badge {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(56, 189, 248, 0.18);
    border: 1px solid rgba(56, 189, 248, 0.35);
    color: var(--cyan);
    padding: 4px 12px; border-radius: 99px;
    font-size: 0.72rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 0.8px;
    margin-bottom: 8px;
}
.strait-title {
    font-size: 1.4rem; font-weight: 800;
    color: white; margin-bottom: 4px; font-family:'Outfit',sans-serif;
}
.strait-sub { font-size: 0.84rem; color: rgba(255, 255, 255, 0.8); }

/* SPEC TABLES */
.spec-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 56px; }
.spec-box {
    background: white;
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
}
.spec-box-head {
    background: var(--navy);
    padding: 14px 20px;
    display: flex; align-items: center; gap: 10px;
    color: white; font-family:'Outfit',sans-serif;
    font-size: 1rem; font-weight: 800;
}
.spec-box-head i { color: var(--cyan); font-size: 1.1rem; }

.spec-table { width: 100%; border-collapse: collapse; }
.spec-table tr { border-bottom: 1px solid var(--border); }
.spec-table tr:last-child { border-bottom: none; }
.spec-table td { padding: 12px 18px; font-size: 0.84rem; }
.spec-table td:first-child { color: var(--muted); font-weight: 600; width: 45%; }
.spec-table td:last-child { color: var(--navy); font-weight: 700; }

/* PORTS GRID */
.ports-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
.port-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 24px;
    transition: all 0.25s ease;
}
.port-card:hover { transform: translateY(-4px); border-color: #90CAF9; box-shadow: 0 12px 28px rgba(6, 24, 46, 0.1); }
.port-icon {
    width: 44px; height: 44px;
    background: var(--sky); border-radius: 10px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 1.1rem;
    margin-bottom: 14px;
}
.port-title { font-size: 1.05rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.port-region { font-size: 0.76rem; color: var(--blue); font-weight: 700; margin-bottom: 12px; }
.port-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.6; margin-bottom: 14px; }
.port-tags { display: flex; flex-wrap: wrap; gap: 6px; }
.port-tag {
    background: #F1F5F9; color: var(--navy);
    font-size: 0.7rem; font-weight: 700;
    padding: 3px 8px; border-radius: 4px;
    border: 1px solid #E2E8F0;
}

@media (max-width: 900px) {
    .strait-cards-grid, .spec-grid { grid-template-columns: 1fr; }
    .ports-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="stp-hero">
    <div class="container stp-container">
        <div class="page-hero-badge"><i class="fa-solid fa-compass"></i> {{ __t('Navigasyon & Liman Rehberi', 'Navigation & Port Guide') }}</div>
        <h1>{{ __t('Türk Boğazları & Operasyon Bölge Limanları', 'Turkish Straits & Regional Ports') }}</h1>
        <p>{{ __t('İstanbul ve Çanakkale boğazı transit geçiş limitleri, VTS bildirim süreleri ve Türkiye fener harçları rehberi.', 'Bosphorus & Dardanelles transit navigation limits, VTS regulations and port specifications.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container stp-container">
        
        <!-- Strait Cards -->
        <div class="strait-cards-grid">
            <div class="strait-card">
                <img src="/images/bosphorus_night.jpg" alt="İstanbul Boğazı" loading="lazy">
                <div class="strait-overlay"></div>
                <div class="strait-body">
                    <span class="strait-badge"><i class="fa-solid fa-water"></i> Bosphorus Strait</span>
                    <h2 class="strait-title">{{ __t('İstanbul Boğazı Transit Geçişi', 'Bosphorus Transit Passage') }}</h2>
                    <p class="strait-sub">{{ __t('Karadeniz — Marmara Denizi Geçiş Koridoru (31 km)', 'Black Sea — Sea of Marmara Transit Corridor (31 km)') }}</p>
                </div>
            </div>

            <div class="strait-card">
                <img src="/images/hero_bosphorus.jpg" alt="Çanakkale Boğazı" loading="lazy">
                <div class="strait-overlay"></div>
                <div class="strait-body">
                    <span class="strait-badge"><i class="fa-solid fa-compass"></i> Dardanelles Strait</span>
                    <h2 class="strait-title">{{ __t('Çanakkale Boğazı Transit Geçişi', 'Dardanelles Transit Passage') }}</h2>
                    <p class="strait-sub">{{ __t('Marmara Denizi — Ege Denizi Geçiş Koridoru (68 km)', 'Sea of Marmara — Aegean Sea Transit Corridor (68 km)') }}</p>
                </div>
            </div>
        </div>

        <!-- Spec Tables -->
        <div class="spec-grid">
            <div class="spec-box">
                <div class="spec-box-head">
                    <i class="fa-solid fa-anchor"></i> {{ __t('İstanbul Boğazı Teknik Parametreleri', 'Bosphorus Technical Specifications') }}
                </div>
                <table class="spec-table">
                    <tr><td>{{ __t('Kanal Uzunluğu', 'Channel Length') }}</td><td>31 km / 17 mil</td></tr>
                    <tr><td>{{ __t('En Dar Nokta', 'Narrowest Width') }}</td><td>700 m (Kandilli — Aşiyan)</td></tr>
                    <tr><td>{{ __t('Maksimum Derinlik', 'Max Depth') }}</td><td>110 m (Min: 36 m)</td></tr>
                    <tr><td>{{ __t('Akıntı Hızı', 'Current Speed') }}</td><td>3 – 4 knot (Kuzey ➔ Güney)</td></tr>
                    <tr><td>{{ __t('VHF Kanalı', 'VHF Channels') }}</td><td>VTS Ch 12 (Kuzey) / Ch 11 (Güney)</td></tr>
                    <tr><td>{{ __t('Maksimum LOA', 'Max LOA Limit') }}</td><td>330 m (Üzeri özel izne tabi)</td></tr>
                    <tr><td>{{ __t('Maksimum Draft', 'Max Draft Limit') }}</td><td>17.50 m</td></tr>
                    <tr><td>{{ __t('Kılavuz Kaptan', 'Pilotage Obligation') }}</td><td>500 GRT üzeri zorunlu / önermeli</td></tr>
                </table>
            </div>

            <div class="spec-box">
                <div class="spec-box-head">
                    <i class="fa-solid fa-location-crosshairs"></i> {{ __t('Çanakkale Boğazı Teknik Parametreleri', 'Dardanelles Technical Specifications') }}
                </div>
                <table class="spec-table">
                    <tr><td>{{ __t('Kanal Uzunluğu', 'Channel Length') }}</td><td>68 km / 37 mil</td></tr>
                    <tr><td>{{ __t('En Dar Nokta', 'Narrowest Width') }}</td><td>1.200 m (Çanakkale — Kilitbahir)</td></tr>
                    <tr><td>{{ __t('Maksimum Derinlik', 'Max Depth') }}</td><td>103 m (Min: 55 m)</td></tr>
                    <tr><td>{{ __t('Akıntı Hızı', 'Current Speed') }}</td><td>2 – 3 knot (Marmara ➔ Ege)</td></tr>
                    <tr><td>{{ __t('VHF Kanalı', 'VHF Channels') }}</td><td>VTS Ch 71 / Ch 13 / Ch 14</td></tr>
                    <tr><td>{{ __t('Maksimum LOA', 'Max LOA Limit') }}</td><td>300 m (Tanker sınırlaması)</td></tr>
                    <tr><td>{{ __t('Maksimum Draft', 'Max Draft Limit') }}</td><td>18.00 m</td></tr>
                    <tr><td>{{ __t('SP1 Bildirimi', 'SP1 Notification') }}</td><td>Geçişten 24 saat önce (SP1)</td></tr>
                </table>
            </div>
        </div>

        <!-- Regional Ports -->
        <div style="text-align:center; margin-bottom:36px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Operasyon Bölgelerimiz', 'Our Operation Ports') }}</div>
            <h2 class="sec-title">{{ __t('Acentelik Hizmeti Verdiğimiz Ana Limanlar', 'Key Ports Attended') }}</h2>
        </div>

        <div class="ports-grid">
            <div class="port-card">
                <div class="port-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                <div class="port-title">Ambarlı Liman Kompleksi</div>
                <div class="port-region">Marmara · İstanbul</div>
                <div class="port-desc">{{ __t('Kumport, Marport ve Mardaş konteyner terminal operasyonlarında acentelik ve draft gözetimi.', 'Agency attendance and draft survey at Kumport, Marport and Mardas container terminals.') }}</div>
                <div class="port-tags">
                    <span class="port-tag">Konteyner</span>
                    <span class="port-tag">Ro-Ro</span>
                    <span class="port-tag">Draft: 14.5m</span>
                </div>
            </div>

            <div class="port-card">
                <div class="port-icon"><i class="fa-solid fa-industry"></i></div>
                <div class="port-title">İzmit Körfezi Limanları</div>
                <div class="port-region">Kocaeli · Marmara</div>
                <div class="port-desc">{{ __t('Evyap, Yılport, DP World Yarımca, Tüpraş ve Poliport terminal acentelik hizmetleri.', 'Terminal attendance at Evyap, Yilport, DP World Yarimca, Tupras and Poliport.') }}</div>
                <div class="port-tags">
                    <span class="port-tag">Dökme Yük</span>
                    <span class="port-tag">Sıvı Yakıt</span>
                    <span class="port-tag">Tanker</span>
                </div>
            </div>

            <div class="port-card">
                <div class="port-icon"><i class="fa-solid fa-ship"></i></div>
                <div class="port-title">Aliağa & Nemrut Körfezi</div>
                <div class="port-region">İzmir · Ege</div>
                <div class="port-desc">{{ __t('Nemport, SOCAR Star Rafineri, Petkim ve Batıliman yakıt ve kimyasal yük acenteliği.', 'Chemical and fuel tanker attendance at Nemport, SOCAR Refinery, Petkim and Batiliman.') }}</div>
                <div class="port-tags">
                    <span class="port-tag">Kimyasal</span>
                    <span class="port-tag">LPG / LNG</span>
                    <span class="port-tag">Bunkering</span>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
