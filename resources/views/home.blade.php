@extends('layouts.app')
@section('title', 'NAVEXMAR — Türk Boğazları Gemi Acenteliği | 7/24 Deniz Operasyonları')

@section('styles')
<style>
/* ─── NEXT-GEN MARITIME HOMEPAGE STYLES ─── */
.hm-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

/* HERO SECTION */
.hm-hero {
    position: relative;
    min-height: 620px;
    background: linear-gradient(135deg, #030D1B 0%, #07192F 50%, #0B2545 100%);
    color: white;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hm-hero::before {
    content: ''; position: absolute; inset: 0;
    background-image: url('{{ asset('images/hero_bosphorus.jpg') }}');
    background-size: cover; background-position: center;
    opacity: 0.18; filter: saturate(1.3);
}

.hm-hero::after {
    content: ''; position: absolute;
    right: -120px; bottom: -120px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.16) 0%, transparent 70%);
    pointer-events: none;
}

.hm-hero-layout {
    position: relative; z-index: 2;
    display: grid; grid-template-columns: 1fr 380px;
    gap: 48px; align-items: center;
    padding: 70px 0;
}

.hm-hero-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(56, 189, 248, 0.14);
    border: 1px solid rgba(56, 189, 248, 0.35);
    color: var(--cyan);
    padding: 6px 18px; border-radius: 99px;
    font-size: 0.76rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1.2px;
    margin-bottom: 24px;
}

.hm-hero h1 {
    font-size: clamp(2rem, 4.2vw, 3.4rem);
    font-weight: 900; color: white;
    line-height: 1.15; margin-bottom: 20px;
    letter-spacing: -0.8px;
}
.hm-hero h1 span {
    color: var(--cyan);
    text-shadow: 0 0 24px rgba(56, 189, 248, 0.45);
}

.hm-hero-desc {
    font-size: 1rem; color: rgba(255, 255, 255, 0.82);
    max-width: 520px; line-height: 1.7; margin-bottom: 36px;
}

.hm-hero-btns { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 48px; }

/* Hero Stats Deck */
.hm-hero-stats {
    display: flex; flex-wrap: wrap; gap: 36px;
    padding-top: 32px; border-top: 1px solid rgba(255, 255, 255, 0.12);
}
.hm-stat-num {
    font-family: 'Outfit', sans-serif;
    font-size: 2rem; font-weight: 900; color: white; line-height: 1;
}
.hm-stat-num span { color: var(--cyan); }
.hm-stat-lbl { font-size: 0.76rem; color: rgba(255, 255, 255, 0.6); margin-top: 5px; font-weight: 600; }

/* Right Telemetry Card */
.hm-telemetry-card {
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(16px);
    border-radius: 20px; padding: 28px;
    box-shadow: 0 24px 48px rgba(3, 13, 27, 0.45);
    border: 1px solid rgba(255, 255, 255, 0.6);
}

.hm-card-head {
    font-size: 0.78rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: 1px;
    color: var(--muted); margin-bottom: 18px;
    display: flex; align-items: center; justify-content: space-between;
}

.hm-tel-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 12px 0; border-bottom: 1px solid var(--border); gap: 12px;
}
.hm-tel-row:last-child { border-bottom: none; }

.hm-vsl-name { font-size: 0.9rem; font-weight: 800; color: var(--navy); }
.hm-vsl-route { font-size: 0.76rem; color: var(--muted); margin-top: 2px; }

.hm-vsl-pill {
    font-size: 0.72rem; font-weight: 800; padding: 4px 10px; border-radius: 6px; white-space: nowrap;
}
.hm-vsl-pill.in   { background: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
.hm-vsl-pill.out  { background: #FFFBEB; color: #B45309; border: 1px solid #FDE68A; }
.hm-vsl-pill.port { background: #EFF6FF; color: #1D4ED8; border: 1px solid #BFDBFE; }

/* ─── QUICK PDA CALCULATOR BANNER ─── */
.hm-pda-bar {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px 32px;
    margin-top: -40px;
    position: relative; z-index: 10;
    box-shadow: 0 12px 32px rgba(6, 24, 46, 0.1);
}

.hm-pda-grid {
    display: grid; grid-template-columns: repeat(4, 1fr) auto;
    gap: 16px; align-items: center;
}

.hm-pda-field label {
    display: block; font-size: 0.72rem; font-weight: 800;
    color: var(--navy); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;
}

.hm-pda-select, .hm-pda-input {
    width: 100%; padding: 11px 14px;
    border: 1px solid var(--border); border-radius: 8px;
    font-size: 0.86rem; font-weight: 600; color: var(--text);
    background: #F8FAFC; outline: none; transition: border-color 0.2s;
}
.hm-pda-select:focus, .hm-pda-input:focus { border-color: var(--blue); background: white; }

/* ─── SERVICES SHOWCASE ─── */
.svc-deck-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px;
}

.svc-deck-card {
    background: white; border: 1px solid var(--border);
    border-radius: 16px; padding: 32px;
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    box-shadow: 0 4px 16px rgba(6, 24, 46, 0.03);
    display: flex; flex-direction: column;
}

.svc-deck-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(6, 24, 46, 0.12);
    border-color: #90CAF9;
}

.svc-deck-icon {
    width: 52px; height: 52px;
    background: var(--sky); border-radius: 12px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 1.25rem;
    margin-bottom: 22px;
    box-shadow: 0 4px 14px rgba(2, 132, 199, 0.15);
}

.svc-deck-title { font-size: 1.15rem; font-weight: 800; color: var(--navy); margin-bottom: 12px; font-family:'Outfit',sans-serif; }
.svc-deck-desc { font-size: 0.86rem; color: var(--muted); line-height: 1.65; margin-bottom: 20px; flex: 1; }

.svc-deck-bullets {
    list-style: none; margin-bottom: 22px; display: flex; flex-direction: column; gap: 8px;
    padding-top: 14px; border-top: 1px solid var(--border);
}
.svc-deck-bullets li {
    font-size: 0.78rem; font-weight: 700; color: var(--navy);
    display: flex; align-items: center; gap: 8px;
}
.svc-deck-bullets li i { color: var(--teal); font-size: 0.85rem; }

.svc-deck-action {
    display: inline-flex; align-items: center; gap: 8px;
    color: var(--blue); font-size: 0.84rem; font-weight: 800;
    text-decoration: none; transition: gap 0.2s ease, color 0.2s ease;
    margin-top: auto;
}
.svc-deck-action:hover { gap: 12px; color: var(--navy); }

/* ─── LIVE OPERATIONAL MAP & PORTS ─── */
.ops-deck {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    color: white; padding: 80px 0; border-y: 1px solid rgba(255,255,255,0.08);
}

.ops-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }

.ops-card {
    background: rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 14px; padding: 24px;
    transition: all 0.25s ease;
}
.ops-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-4px);
    border-color: rgba(56, 189, 248, 0.4);
}

.ops-card-icon { color: var(--cyan); font-size: 1.5rem; margin-bottom: 14px; }
.ops-card-title { font-size: 1.05rem; font-weight: 800; color: white; margin-bottom: 6px; font-family:'Outfit',sans-serif; }
.ops-card-subtitle { font-size: 0.78rem; color: rgba(255,255,255,0.65); margin-bottom: 14px; font-weight: 600; }
.ops-card-spec { font-size: 0.82rem; color: rgba(255,255,255,0.9); line-height: 1.6; }

/* ─── FLEET PREVIEW STRIP ─── */
.flt-preview-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.flt-preview-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; overflow: hidden; box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
    transition: all 0.25s ease;
}
.flt-preview-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(6, 24, 46, 0.12); border-color: #90CAF9; }
.flt-preview-img { position: relative; height: 190px; background: #0B2545; overflow: hidden; }
.flt-preview-img img { width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease; }
.flt-preview-card:hover .flt-preview-img img { transform: scale(1.06); }
.flt-preview-body { padding: 20px; }
.flt-preview-name { font-size: 1.1rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.flt-preview-imo { font-size: 0.76rem; color: var(--muted); margin-bottom: 14px; font-weight: 600; }
.flt-preview-specs { display: flex; justify-content: space-between; font-size: 0.8rem; background: #F8FAFC; padding: 10px 12px; border-radius: 8px; border: 1px solid #E2E8F0; }

/* ─── WHY TRUST DECK ─── */
.why-trust-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center; }
.why-trust-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
.trust-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; padding: 22px;
    transition: all 0.25s ease;
}
.trust-card:hover { transform: translateY(-3px); border-color: #90CAF9; box-shadow: 0 10px 24px rgba(6, 24, 46, 0.08); }
.trust-icon { width: 40px; height: 40px; background: var(--sky); border-radius: 10px; display: grid; place-items: center; color: var(--blue); font-size: 1rem; margin-bottom: 12px; }
.trust-title { font-size: 0.92rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; font-family:'Outfit',sans-serif; }
.trust-desc { font-size: 0.78rem; color: var(--muted); line-height: 1.55; }

/* ─── NEWS GRID ─── */
.news-deck-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.news-deck-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; overflow: hidden;
    transition: all 0.25s ease; box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
}
.news-deck-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(6, 24, 46, 0.1); border-color: #90CAF9; }
.news-deck-img { height: 180px; position: relative; overflow: hidden; background: #0B2545; }
.news-deck-img img { width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease; }
.news-deck-card:hover .news-deck-img img { transform: scale(1.06); }
.news-deck-body { padding: 20px; }
.news-deck-cat { font-size: 0.7rem; font-weight: 800; color: var(--blue); text-transform: uppercase; letter-spacing: 0.6px; margin-bottom: 6px; }
.news-deck-title { font-size: 0.98rem; font-weight: 800; color: var(--navy); line-height: 1.4; margin-bottom: 10px; font-family:'Outfit',sans-serif; }
.news-deck-desc { font-size: 0.8rem; color: var(--muted); line-height: 1.6; margin-bottom: 16px; }

/* ─── CTA CONVERSION BAR ─── */
.cta-banner {
    background: linear-gradient(135deg, #0284C7 0%, #0B2545 100%);
    border-radius: 20px; padding: 48px; color: white;
    display: flex; justify-content: space-between; align-items: center; gap: 32px;
    box-shadow: 0 16px 40px rgba(2, 132, 199, 0.25);
    margin-bottom: 80px;
}
.cta-banner h3 { font-size: 1.8rem; font-weight: 900; color: white; margin-bottom: 8px; font-family:'Outfit',sans-serif; }
.cta-banner p { color: rgba(255, 255, 255, 0.85); font-size: 0.95rem; max-width: 540px; }

@media (max-width: 1024px) {
    .hm-hero-layout { grid-template-columns: 1fr; gap: 36px; }
    .hm-pda-grid { grid-template-columns: 1fr 1fr; }
    .svc-deck-grid, .flt-preview-grid, .news-deck-grid { grid-template-columns: 1fr 1fr; }
    .ops-grid { grid-template-columns: 1fr 1fr; }
    .why-trust-grid { grid-template-columns: 1fr; gap: 36px; }
    .cta-banner { flex-direction: column; text-align: center; }
}
@media (max-width: 640px) {
    .hm-pda-grid { grid-template-columns: 1fr; }
    .svc-deck-grid, .flt-preview-grid, .news-deck-grid, .ops-grid, .why-trust-cards { grid-template-columns: 1fr; }
}
</style>
@endsection

@section('content')

{{-- HERO SECTION --}}
<section class="hm-hero">
    <div class="hm-container">
        <div class="hm-hero-layout">
            <div>
                <div class="hm-hero-eyebrow"><span class="dot-live"></span> {{ __t('7/24 Canlı Operasyon Masası', '24/7 Live Duty Operations Desk') }}</div>
                <h1>{!! __t('Türk Boğazları & Limanlarında<br><span>Profesyonel Gemi Acenteliği</span>', 'Professional Shipping Agency<br>in <span>Turkish Straits & Ports</span>') !!}</h1>
                <p class="hm-hero-desc">{{ __t('İstanbul ve Çanakkale boğazı transit geçişleri ile Türkiye\'nin tüm limanlarında 18 yıllık tecrübe, şeffaf DA/CA raporlaması ve 7/24 kesintisiz nöbet operasyonu.', '24/7 Shipping agency attendance, transparent DA/CA statements, and zero-delay handling across the Turkish Straits and all ports with 18 years experience.') }}</p>
                
                <div class="hm-hero-btns">
                    <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Proforma Teklif İste', 'Request Proforma Quote') }}</a>
                    <a href="{{ route('straits-ports') }}" class="btn-outline-white"><i class="fa-solid fa-compass"></i> {{ __t('Boğaz & Liman Rehberi', 'Straits & Port Guide') }}</a>
                </div>

                <div class="hm-hero-stats">
                    <div><div class="hm-stat-num">18<span>+</span></div><div class="hm-stat-lbl">{{ __t('Yıllık Tecrübe', 'Years Experience') }}</div></div>
                    <div><div class="hm-stat-num">4<span>K+</span></div><div class="hm-stat-lbl">{{ __t('Yıllık Gemi Uğrağı', 'Annual Vessel Calls') }}</div></div>
                    <div><div class="hm-stat-num">9</div><div class="hm-stat-lbl">{{ __t('Ana Liman Bölgesi', 'Key Port Regions') }}</div></div>
                    <div><div class="hm-stat-num">24<span>/7</span></div><div class="hm-stat-lbl">{{ __t('Canlı Operasyon', 'Duty Operations') }}</div></div>
                </div>
            </div>

            <!-- Right Telemetry Deck -->
            <div class="hm-telemetry-card">
                <div class="hm-card-head">
                    <span><i class="fa-solid fa-satellite-dish" style="color:var(--blue);margin-right:6px;"></i> {{ __t('Canlı Operasyon Takibi', 'Live Telemetry Desk') }}</span>
                    <span style="color:#10B981; font-weight:800; font-size:0.7rem;"><i class="fa-solid fa-circle" style="font-size:0.5rem;"></i> LIVE</span>
                </div>
                <div class="hm-tel-row">
                    <div><div class="hm-vsl-name">MV ATLAS STAR</div><div class="hm-vsl-route">Ambarlı ➔ Bosphorus</div></div>
                    <span class="hm-vsl-pill in">{{ __t('Giriş', 'Inbound') }}</span>
                </div>
                <div class="hm-tel-row">
                    <div><div class="hm-vsl-name">MT GOLDEN WAVE</div><div class="hm-vsl-route">Dardanelles Strait</div></div>
                    <span class="hm-vsl-pill out">{{ __t('Çıkış', 'Outbound') }}</span>
                </div>
                <div class="hm-tel-row">
                    <div><div class="hm-vsl-name">BV MARMARA K</div><div class="hm-vsl-route">Haydarpaşa · Anchorage</div></div>
                    <span class="hm-vsl-pill port">{{ __t('Limanda', 'At Port') }}</span>
                </div>
                <div class="hm-tel-row">
                    <div><div class="hm-vsl-name">MV OLYMPIA</div><div class="hm-vsl-route">Kumport · Loading</div></div>
                    <span class="hm-vsl-pill port">{{ __t('Limanda', 'At Port') }}</span>
                </div>
                <div style="margin-top:16px; padding-top:12px; border-top:1px solid var(--border); font-size:0.76rem; color:var(--muted); font-weight:600;">
                    <i class="fa-solid fa-shield-halved" style="color:var(--blue); margin-right:4px;"></i> {{ __t('VHF Ch 16 / 12 / 11 ile 7/24 Kesintisiz Takip', 'Monitored 24/7 on VHF Ch 16 / 12 / 11') }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- QUICK PDA BANNER --}}
<div class="hm-container">
    <div class="hm-pda-bar">
        <form action="{{ route('contact') }}" method="GET" class="hm-pda-grid">
            <div class="hm-pda-field">
                <label>{{ __t('Uğrak Bölgesi', 'Call Region') }}</label>
                <select name="region" class="hm-pda-select">
                    <option value="Bosphorus">{{ __t('İstanbul Boğazı (Transit)', 'Bosphorus Transit') }}</option>
                    <option value="Dardanelles">{{ __t('Çanakkale Boğazı (Transit)', 'Dardanelles Transit') }}</option>
                    <option value="Ambarli">{{ __t('Ambarlı Limanı', 'Ambarli Port') }}</option>
                    <option value="Izmit">{{ __t('İzmit Körfezi Limanları', 'Izmit Bay Ports') }}</option>
                </select>
            </div>
            <div class="hm-pda-field">
                <label>{{ __t('Gemi Tipi', 'Vessel Type') }}</label>
                <select name="vessel_type" class="hm-pda-select">
                    <option value="Container">{{ __t('Konteyner Gemisi', 'Container Ship') }}</option>
                    <option value="Tanker">{{ __t('Petrol / Kimyasal Tanker', 'Oil/Chemical Tanker') }}</option>
                    <option value="Bulk">{{ __t('Dökme Yük Gemisi', 'Bulk Carrier') }}</option>
                    <option value="General Cargo">{{ __t('Genel Yük Gemisi', 'General Cargo') }}</option>
                </select>
            </div>
            <div class="hm-pda-field">
                <label>{{ __t('Tonaj (GRT)', 'Gross Tonnage (GRT)') }}</label>
                <input type="number" name="grt" placeholder="Örn: 24500" class="hm-pda-input">
            </div>
            <div class="hm-pda-field">
                <label>{{ __t('Hizmet Türü', 'Service Type') }}</label>
                <select name="service_type" class="hm-pda-select">
                    <option value="Agency">{{ __t('Tam Acentelik Hizmeti', 'Full Agency Clearance') }}</option>
                    <option value="Bunkering">{{ __t('Bunkering & İkmal', 'Bunkering & Supply') }}</option>
                    <option value="Crew">{{ __t('Mürettebat Değişimi', 'Crew Change') }}</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn-primary" style="padding:12px 20px; white-space:nowrap; margin-top:20px;">
                    <i class="fa-solid fa-calculator"></i> {{ __t('PDA Hesabı Al', 'Get PDA Quote') }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- SERVICES SECTION --}}
<section class="sec">
    <div class="hm-container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:36px; flex-wrap:wrap; gap:16px;">
            <div>
                <div class="sec-label">{{ __t('Uzmanlık Alanlarımız', 'Our Expertise') }}</div>
                <h2 class="sec-title">{{ __t('Geniş Denizcilik Hizmet Portföyümüz', 'Comprehensive Maritime Services') }}</h2>
            </div>
            <a href="{{ route('services.index') }}" class="btn-outline">{{ __t('Tüm Hizmetler', 'View All Services') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="svc-deck-grid">
            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-water"></i></div>
                <h3 class="svc-deck-title">{{ __t('Boğaz Transit Acenteliği', 'Straits Transit Agency') }}</h3>
                <p class="svc-deck-desc">{{ __t('İstanbul ve Çanakkale boğazlarından kesintisiz, emniyetli ve hızlı transit geçiş izinleri, VTS bildirimi ve pilotaj koordinasyonu.', 'Safety clearance, pilotage coordination, VTS notifications and administrative handling for Bosphorus & Dardanelles transit.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('7/24 SP1 & SP2 Bildirim Takibi', '24/7 SP1 & SP2 Tracking') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Kılavuz Kaptan & Römorkör İzni', 'Pilotage & Tugboat Permits') }}</li>
                </ul>
                <a href="{{ route('services.show', 'turk-bogazlari-gecis-acenteligi') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-ship"></i></div>
                <h3 class="svc-deck-title">{{ __t('Liman & Gemi Acenteliği', 'Port & Vessel Agency') }}</h3>
                <p class="svc-deck-desc">{{ __t('Ambarlı, İzmit, Aliağa ve tüm Türk limanlarında gemi giriş-çıkış idari işlemleri, yük operasyonu ve fener harçları yönetimi.', 'Complete port state formalities, cargo operations, light dues and owner representation at all Turkish ports.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Sahil Sağlık & Gümrük Onayları', 'Health & Customs Clearance') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Draft Sörvey & Yük Gözetimi', 'Draft Survey & Cargo Supervision') }}</li>
                </ul>
                <a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="svc-deck-card">
                <div class="svc-deck-icon"><i class="fa-solid fa-gas-pump"></i></div>
                <h3 class="svc-deck-title">{{ __t('Bunkering & Kumanya', 'Bunkering & Provisions') }}</h3>
                <p class="svc-deck-desc">{{ __t('Demir sahasında veya rıhtımda ISO standartlarına uygun VLSFO, MGO yakıt ikmali, taze kumanya ve yedek parça teslimatı.', 'ISO compliant VLSFO, MGO fuel bunkering, fresh provisions and spare parts delivery at anchorage or berth.') }}</p>
                <ul class="svc-deck-bullets">
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Barge & İkmal Koordinasyonu', 'Barge & Supply Logistics') }}</li>
                    <li><i class="fa-solid fa-circle-check"></i> {{ __t('Gümrüklü Transit Yedek Parça', 'Customs Bonded Spare Parts') }}</li>
                </ul>
                <a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}" class="svc-deck-action">{{ __t('Hizmet Detayları', 'Service Details') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- LIVE OPERATIONAL MAPS --}}
<section class="ops-deck">
    <div class="hm-container">
        <div style="text-align:center; margin-bottom:48px;">
            <div class="sec-label" style="color:var(--cyan); justify-content:center;">{{ __t('Operasyon Bölgelerimiz', 'Operational Regions') }}</div>
            <h2 class="sec-title" style="color:white;">{{ __t('Stratejik Su Yolları ve Ana Limanlar', 'Strategic Waterways & Main Ports') }}</h2>
        </div>

        <div class="ops-grid">
            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-water"></i></div>
                <div class="ops-card-title">İstanbul Boğazı</div>
                <div class="ops-card-subtitle">Bosphorus Strait (31 km)</div>
                <div class="ops-card-spec">Maks LOA: 330 m<br>Maks Draft: 17.5 m<br>VTS Ch 12 / Ch 11</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-compass"></i></div>
                <div class="ops-card-title">Çanakkale Boğazı</div>
                <div class="ops-card-subtitle">Dardanelles Strait (68 km)</div>
                <div class="ops-card-spec">Maks LOA: 300 m<br>Maks Draft: 18.0 m<br>VTS Ch 71 / Ch 13</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                <div class="ops-card-title">Ambarlı Limanı</div>
                <div class="ops-card-subtitle">Kumport · Marport · Mardaş</div>
                <div class="ops-card-spec">Konteyner & Ro-Ro<br>Draft: 14.5 m<br>7/24 Rıhtım Acenteliği</div>
            </div>

            <div class="ops-card">
                <div class="ops-card-icon"><i class="fa-solid fa-industry"></i></div>
                <div class="ops-card-title">İzmit Körfezi</div>
                <div class="ops-card-subtitle">Evyap · Yılport · DP World</div>
                <div class="ops-card-spec">Dökme Yük & Tanker<br>Tüpraş & Poliport<br>Kimyasal İkmal</div>
            </div>
        </div>
    </div>
</section>

{{-- WHY NAVEXMAR / TRUST DECK --}}
<section class="sec">
    <div class="hm-container">
        <div class="why-trust-grid">
            <div>
                <div class="sec-label">{{ __t('Güven ve Şeffaflık', 'Trust & Transparency') }}</div>
                <h2 class="sec-title">{{ __t('Neden Armatörler NAVEXMAR\'ı Tercih Ediyor?', 'Why Owners Choose NAVEXMAR?') }}</h2>
                <p style="color:var(--muted); font-size:0.94rem; line-height:1.7; margin-bottom:24px;">
                    {{ __t('18 yıllık tecrübemiz, BIMCO ve FONASBA üyeliklerimiz ve ISO 9001:2015 sertifikalı kalite yönetimimizle gemi uğraklarınızda sıfır hatayla hizmet sunuyoruz.', 'With 18 years of experience, BIMCO and FONASBA memberships, and ISO 9001:2015 quality management, we deliver zero-error agency attendance.') }}
                </p>
                <a href="{{ route('about') }}" class="btn-primary"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal Profilimizi İnceleyin', 'Explore Corporate Profile') }}</a>
            </div>

            <div class="why-trust-cards">
                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="trust-title">{{ __t('7/24 Kesintisiz Nöbet', '24/7 Duty Desk') }}</div>
                    <div class="trust-desc">{{ __t('Acil arıza, tıbbi nakil ve ikmallere 30 dakika içinde yerinde müdahale.', 'On-site response within 30 minutes for emergencies, medical evacuations and supply.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-file-contract"></i></div>
                    <div class="trust-title">{{ __t('Şeffaf DA/CA Hesapları', 'Transparent DA/CA') }}</div>
                    <div class="trust-desc">{{ __t('BIMCO standartlarında detaylı masraf ve dijital fatura dökümleri.', 'BIMCO standard disbursement statements with digital voucher attachments.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-certificate"></i></div>
                    <div class="trust-title">{{ __t('ISO 9001 Sertifikalı', 'ISO 9001 Certified') }}</div>
                    <div class="trust-desc">{{ __t('TÜV Rheinland onaylı kalite ve emniyet yönetim sistemi.', 'TÜV Rheinland certified quality and maritime safety management system.') }}</div>
                </div>

                <div class="trust-card">
                    <div class="trust-icon"><i class="fa-solid fa-shield-check"></i></div>
                    <div class="trust-title">{{ __t('Sıfır Gecikme Prensibi', 'Zero Delay Principle') }}</div>
                    <div class="trust-desc">{{ __t('Bürokratik onaylar önceden tamamlanarak demoraj riskleri engellenir.', 'Pre-cleared administrative approvals to eliminate charterer demurrage risks.') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONVERSION CTA BANNER --}}
<div class="hm-container">
    <div class="cta-banner">
        <div>
            <h3>{{ __t('Geminize Özel Proforma Liman Hesabı İster Misiniz?', 'Need a Custom Proforma PDA for Your Vessel?') }}</h3>
            <p>{{ __t('Türk Boğazları transit geçişi veya liman uğraklarınız için 2 saat içinde detaylı proforma hesap (PDA) hazırlayalım.', 'Let us prepare a detailed proforma disbursement account (PDA) within 2 hours for your Bosphorus transit or port call.') }}</p>
        </div>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a href="{{ route('contact') }}" class="btn-primary" style="background:white; color:var(--navy) !important;"><i class="fa-solid fa-paper-plane"></i> {{ __t('Teklif İste', 'Request Quote') }}</a>
            <a href="tel:{{ \App\Models\SiteSetting::get('mobile', '+905327009090') }}" class="btn-outline-white"><i class="fa-solid fa-phone"></i> {{ \App\Models\SiteSetting::get('mobile', '+90 532 700 90 90') }}</a>
        </div>
    </div>
</div>

@endsection
