@extends('layouts.app')
@section('title', 'NAVEXMAR — Türk Boğazları Gemi Acenteliği | 7/24 Liman Hizmetleri')

@section('styles')
<style>
/* ─── LUXURY MARITIME HERO ─── */
.hero {
    position: relative;
    min-height: 560px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
.hero-img {
    position: absolute; inset: 0;
    background-image: url('{{ asset('images/hero_bosphorus.jpg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.22;
    filter: saturate(1.2);
}
.hero-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 70px 0;
}
.hero-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(56, 189, 248, 0.12);
    border: 1px solid rgba(56, 189, 248, 0.3);
    color: var(--cyan);
    padding: 6px 16px; border-radius: 99px;
    font-size: 0.74rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 22px;
}
.dot-live { width:7px;height:7px;background:#10B981;border-radius:50%;display:inline-block;animation:pulse-green 1.6s ease-in-out infinite; }
.hero h1 {
    font-size: clamp(1.9rem, 3.8vw, 3.1rem);
    font-weight: 900;
    color: white;
    line-height: 1.18;
    margin-bottom: 18px;
    letter-spacing: -0.5px;
}
.hero h1 span { color: var(--cyan); text-shadow: 0 0 20px rgba(56, 189, 248, 0.4); }
.hero-desc {
    font-size: 0.98rem;
    color: rgba(255,255,255,0.78);
    max-width: 500px;
    line-height: 1.7;
    margin-bottom: 32px;
}
.hero-btns { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 48px; }
.hero-stats {
    display: flex; flex-wrap: wrap;
    gap: 36px;
    padding-top: 32px;
    border-top: 1px solid rgba(255,255,255,0.12);
}
.hero-stat-num {
    font-family: 'Outfit', sans-serif;
    font-size: 1.9rem; font-weight: 900;
    color: white; line-height: 1;
}
.hero-stat-num span { color: var(--cyan); }
.hero-stat-lbl { font-size: 0.76rem; color: rgba(255,255,255,0.6); margin-top: 4px; font-weight: 500; }

/* Right Live Deck Panel */
.hero-card {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 26px;
    box-shadow: 0 20px 40px rgba(4, 16, 31, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.5);
}
.hero-card-title {
    font-size: 0.76rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1px;
    color: var(--muted); margin-bottom: 16px;
    display: flex; align-items: center; gap: 8px;
}
.hc-row {
    display: flex; justify-content: space-between;
    align-items: center; padding: 12px 0;
    border-bottom: 1px solid var(--border);
    gap: 12px;
}
.hc-row:last-child { border-bottom: none; }
.hc-vessel { font-size: 0.88rem; font-weight: 700; color: var(--navy); }
.hc-port { font-size: 0.76rem; color: var(--muted); margin-top: 2px; }
.hc-status { font-size: 0.72rem; font-weight: 800; padding: 4px 10px; border-radius: 6px; white-space: nowrap; }
.hc-status.in  { background: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
.hc-status.out { background: #FFFBEB; color: #B45309; border: 1px solid #FDE68A; }
.hc-status.port{ background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE; }

.hero-layout {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 48px;
    align-items: center;
}

/* ─── SERVICES DECK ─── */
.svc-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; }
.svc-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px;
    transition: all 0.3s var(--ease);
    box-shadow: 0 4px 12px rgba(6, 24, 46, 0.04);
}
.svc-card:hover {
    box-shadow: 0 16px 32px rgba(6, 24, 46, 0.1);
    transform: translateY(-4px);
    border-color: #90CAF9;
}
.svc-icon {
    width: 48px; height: 48px;
    background: var(--sky);
    border-radius: 12px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 1.15rem;
    margin-bottom: 18px;
    box-shadow: 0 4px 12px rgba(2, 132, 199, 0.15);
}
.svc-title { font-size: 1.05rem; font-weight: 800; color: var(--navy); margin-bottom: 10px; }
.svc-desc { font-size: 0.84rem; color: var(--muted); line-height: 1.65; margin-bottom: 18px; }
.svc-link { font-size: 0.82rem; font-weight: 700; color: var(--blue); display: inline-flex; align-items: center; gap: 6px; transition: gap 0.2s; }
.svc-link:hover { gap: 10px; color: var(--navy); }

/* ─── STATS STRIP ─── */
.stats-strip { background: var(--navy); padding: 52px 0; border-y: 1px solid rgba(255,255,255,0.08); }
.stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 28px; text-align: center; }
.stat-val { font-family: 'Outfit', sans-serif; font-size: 2.3rem; font-weight: 900; color: white; line-height: 1; }
.stat-val span { color: var(--cyan); }
.stat-lbl { font-size: 0.8rem; color: rgba(255,255,255,0.65); margin-top: 8px; font-weight: 500; }

/* ─── WHY NAVEXMAR ─── */
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center; }
.why-img-wrap { border-radius: 16px; overflow: hidden; aspect-ratio: 4/3; box-shadow: var(--shadow-lg); }
.why-img-wrap img { width:100%;height:100%;object-fit:cover; }
.why-list { display: flex; flex-direction: column; gap: 18px; margin-top: 28px; }
.why-item {
    display: flex; gap: 16px; align-items: flex-start;
    padding: 18px; border: 1px solid var(--border);
    border-radius: 12px; background: white;
    transition: all 0.25s ease;
}
.why-item:hover { border-color: #90CAF9; box-shadow: 0 8px 24px rgba(6, 24, 46, 0.08); transform: translateY(-2px); }
.why-item-icon {
    width: 42px; height: 42px; flex-shrink: 0;
    background: var(--sky); border-radius: 10px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 1rem;
}
.why-item h4 { font-size: 0.92rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.why-item p { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }

@media (max-width: 1024px) {
    .hero-layout { grid-template-columns: 1fr; gap: 36px; }
    .svc-grid { grid-template-columns: 1fr 1fr; }
    .why-grid { grid-template-columns: 1fr; gap: 36px; }
    .stats-grid { grid-template-columns: 1fr 1fr; gap: 24px; }
}
@media (max-width: 640px) {
    .svc-grid { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="hero-img"></div>
    <div class="container hero-content">
        <div class="hero-layout">
            <div>
                <div class="hero-eyebrow"><span class="dot-live"></span> {{ __t('7/24 Nöbetçi Operasyon Masası', '24/7 Live Duty Operations Desk') }}</div>
                <h1>{!! __t('Türk Boğazları\'nda<br>Güvenilir <span>Gemi Acenteniz</span>', 'Your Reliable <span>Shipping Agency</span><br>in Turkish Straits') !!}</h1>
                <p class="hero-desc">{{ __t('İstanbul ve Çanakkale Boğazlarından Türkiye limanlarına — 18 yıllık deneyimle 7/24 profesyonel acentelik ve liman hizmetleri.', 'From Bosphorus & Dardanelles Straits to all Turkish ports — 24/7 professional shipping agency and port attendance with 18 years experience.') }}</p>
                <div class="hero-btns">
                    <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif İste', 'Request Quote') }}</a>
                    <a href="{{ route('services.index') }}" class="btn-outline-white"><i class="fa-solid fa-anchor"></i> {{ __t('Hizmetlerimiz', 'Our Services') }}</a>
                </div>
                <div class="hero-stats">
                    <div><div class="hero-stat-num">18<span>+</span></div><div class="hero-stat-lbl">{{ __t('Yıllık Tecrübe', 'Years Experience') }}</div></div>
                    <div><div class="hero-stat-num">4<span>K+</span></div><div class="hero-stat-lbl">{{ __t('Yıllık Gemi Çağrısı', 'Annual Vessel Calls') }}</div></div>
                    <div><div class="hero-stat-num">9</div><div class="hero-stat-lbl">{{ __t('Liman Kapsamı', 'Ports Covered') }}</div></div>
                    <div><div class="hero-stat-num">24<span>/7</span></div><div class="hero-stat-lbl">{{ __t('Nöbet Operasyonu', 'Duty Operation') }}</div></div>
                </div>
            </div>

            <div class="hero-card">
                <div class="hero-card-title"><i class="fa-solid fa-satellite-dish" style="color:var(--blue);"></i> {{ __t('Canlı Operasyon Masası', 'Live Operations Desk') }}</div>
                <div class="hc-row">
                    <div><div class="hc-vessel">MV ATLAS STAR</div><div class="hc-port">Ambarlı → Bosphorus</div></div>
                    <span class="hc-status in">{{ __t('Giriş', 'Inbound') }}</span>
                </div>
                <div class="hc-row">
                    <div><div class="hc-vessel">MT GOLDEN WAVE</div><div class="hc-port">Dardanelles Strait</div></div>
                    <span class="hc-status out">{{ __t('Çıkış', 'Outbound') }}</span>
                </div>
                <div class="hc-row">
                    <div><div class="hc-vessel">BV MARMARA K</div><div class="hc-port">Haydarpaşa · Anchorage</div></div>
                    <span class="hc-status port">{{ __t('Limanda', 'At Port') }}</span>
                </div>
                <div class="hc-row">
                    <div><div class="hc-vessel">MV OLYMPIA</div><div class="hc-port">Ambarlı · Loading</div></div>
                    <span class="hc-status port">{{ __t('Limanda', 'At Port') }}</span>
                </div>
                <div style="margin-top:16px;padding-top:14px;border-top:1px solid var(--border);font-size:0.75rem;color:var(--muted);">
                    <i class="fa-solid fa-circle-info" style="margin-right:4px;color:var(--blue);"></i> {{ __t('Gerçek zamanlı deniz verisi — 7/24 Aktif Takip', 'Real-time maritime telemetry — 24/7 Active Tracking') }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HİZMETLER --}}
<section class="sec sec-alt">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:32px;flex-wrap:wrap;gap:16px;">
            <div>
                <div class="sec-label">{{ __t('Hizmetlerimiz', 'Our Services') }}</div>
                <h2 class="sec-title">{{ __t('Size Neler Sunuyoruz?', 'What We Offer') }}</h2>
            </div>
            <a href="{{ route('services.index') }}" class="btn-outline" style="font-size:0.84rem;padding:10px 20px;">{{ __t('Tüm Hizmetler', 'All Services') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="svc-grid">
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-water"></i></div>
                <div class="svc-title">{{ __t('Boğaz Transit Acenteliği', 'Straits Transit Agency') }}</div>
                <div class="svc-desc">{{ __t('İstanbul ve Çanakkale Boğazlarından transit geçiş için pilotaj, kılavuzluk, VTS bildirimi ve tüm idari işlemler.', 'Pilotage, VTS notification, clearance and full administrative handling for Bosphorus & Dardanelles transit.') }}</div>
                <a href="{{ route('services.show', 'turk-bogazlari-gecis-acenteligi') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-ship"></i></div>
                <div class="svc-title">{{ __t('Gemi & Liman Acenteliği', 'Port & Vessel Agency') }}</div>
                <div class="svc-desc">{{ __t('Liman devlet işlemleri, yük operasyonları, armatör ve kiracı temsili, disbursement hesapları.', 'Port state formalities, cargo operations, owner/charterer representation, disbursement accounting.') }}</div>
                <a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-gas-pump"></i></div>
                <div class="svc-title">{{ __t('Bunkering & Kumanya', 'Bunkering & Provisions') }}</div>
                <div class="svc-desc">{{ __t('VLSFO, MGO, LSFO yakıt ikmali ve gemi erzak temini. Rekabetçi fiyat ve hızlı teslimat garantisi.', 'VLSFO, MGO fuel bunkering and fresh vessel provisions with competitive pricing and fast delivery.') }}</div>
                <a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-users"></i></div>
                <div class="svc-title">{{ __t('Mürettebat Değişimi', 'Crew Change Services') }}</div>
                <div class="svc-desc">{{ __t('Vize işlemleri, transfer, otel ve havalimanı lojistiği dahil eksiksiz mürettebat değişimi planlaması.', 'Full crew change handling including OKTB visas, airport transfers, hotel booking and shore passes.') }}</div>
                <a href="{{ route('services.show', 'murettebat-degisimi-kara-lojistigi') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                <div class="svc-title">{{ __t('Teknik Destek', 'Technical Support') }}</div>
                <div class="svc-desc">{{ __t('Türkiye limanlarında acil arıza müdahalesi, yedek parça temini ve sertifikalı bakım hizmetleri.', 'Emergency technical repairs, spare parts delivery and certified maintenance at all Turkish ports.') }}</div>
                <a href="{{ route('services.show', 'teknik-survey-bakim-onarim') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="svc-card">
                <div class="svc-icon"><i class="fa-solid fa-box"></i></div>
                <div class="svc-title">{{ __t('Yük & Konteyner', 'Cargo & Container') }}</div>
                <div class="svc-desc">{{ __t('Konteyner, dökme yük ve proje kargo operasyonlarında liman koordinasyonu ve gümrük desteği.', 'Port coordination and customs support for container, dry bulk and project heavy lift cargoes.') }}</div>
                <a href="{{ route('services.show', 'yuk-ve-konteyner-operasyonlari') }}" class="svc-link">{{ __t('Detaylar', 'Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- STATS STRIP --}}
<div class="stats-strip">
    <div class="container">
        <div class="stats-grid">
            <div><div class="stat-val">18<span>+</span></div><div class="stat-lbl">{{ __t('Yıllık Operasyonel Tecrübe', 'Years Operational Experience') }}</div></div>
            <div><div class="stat-val">4<span>K+</span></div><div class="stat-lbl">{{ __t('Yıllık Gemi Çağrısı', 'Annual Vessel Calls') }}</div></div>
            <div><div class="stat-val">95<span>%</span></div><div class="stat-lbl">{{ __t('Zamanında Tamamlama Oranı', 'On-Time Completion Rate') }}</div></div>
            <div><div class="stat-val">9</div><div class="stat-lbl">{{ __t('Türk Limanı Kapsamı', 'Turkish Ports Covered') }}</div></div>
        </div>
    </div>
</div>

{{-- NEDEN NAVEXMAR --}}
<section class="sec">
    <div class="container">
        <div class="why-grid">
            <div>
                <div class="why-img-wrap">
                    <img src="/images/about_corporate.jpg" alt="NAVEXMAR Ekibi" loading="lazy">
                </div>
            </div>
            <div>
                <div class="sec-label">{{ __t('Neden NAVEXMAR?', 'Why NAVEXMAR?') }}</div>
                <h2 class="sec-title">{{ __t('18 Yıllık Tecrübe ve Güven', '18 Years of Experience & Trust') }}</h2>
                <p class="sec-sub" style="margin-bottom:4px;">{{ __t('Armatörler ve kiracılar için Türkiye\'nin en kritik su yollarında kesintisiz acentelik hizmetleri.', 'Uninterrupted shipping agency services for shipowners and charterers in Turkey\'s most critical waterways.') }}</p>
                <div class="why-list">
                    <div class="why-item">
                        <div class="why-item-icon"><i class="fa-solid fa-clock"></i></div>
                        <div><h4>{{ __t('7/24 Kesintisiz Nöbet', '24/7 Continuous Duty') }}</h4><p>{{ __t('Gece yarısı arıza olsa bile 30 dakika içinde sahadayız. Yılın 365 günü aktif nöbet operasyonu.', 'Even in midnight emergencies, our port agents are on site within 30 minutes. Active 365 days.') }}</p></div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-icon"><i class="fa-solid fa-file-contract"></i></div>
                        <div><h4>{{ __t('Şeffaf Disbursement Hesapları', 'Transparent Disbursement Accounts') }}</h4><p>{{ __t('Her kalem için dijital fatura ve BIMCO standardında DA/CA raporları. Sürpriz maliyet yok.', 'Digital vouchers and BIMCO standard DA/CA statements for every cost item. No surprise fees.') }}</p></div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-icon"><i class="fa-solid fa-map-location-dot"></i></div>
                        <div><h4>{{ __t('Geniş Liman Ağı', 'Extensive Port Network') }}</h4><p>{{ __t('İstanbul, İzmit, Ambarlı, Çanakkale, İzmir, Mersin ve Trabzon\'da entegre operasyon.', 'Integrated agency attendance in Istanbul, Izmit, Ambarli, Canakkale, Izmir, Mersin and Trabzon.') }}</p></div>
                    </div>
                    <div class="why-item">
                        <div class="why-item-icon"><i class="fa-solid fa-certificate"></i></div>
                        <div><h4>{{ __t('BIMCO & FONASBA Üyesi', 'BIMCO & FONASBA Member') }}</h4><p>{{ __t('ISO 9001:2015 sertifikalı, uluslararası standartlarda hizmet kalitesi güvencesi.', 'ISO 9001:2015 certified, guaranteed international agency quality standards.') }}</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
