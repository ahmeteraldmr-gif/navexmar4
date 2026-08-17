@extends('layouts.app')
@section('title', 'NAVEXMAR — Türk Boğazları Gemi Acenteliği | 7/24 Liman Hizmetleri')

@section('styles')
<style>
/* ─── HERO ─── */
.hero {
    position: relative;
    min-height: 520px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: var(--navy);
}
.hero-img {
    position: absolute; inset: 0;
    background-image: url('{{ asset('images/hero_bosphorus.jpg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.28;
}
.hero-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 60px 0;
}
.hero-eyebrow {
    display: inline-flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: #90CAF9;
    padding: 5px 14px; border-radius: 99px;
    font-size: 0.72rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.8px;
    margin-bottom: 18px;
}
.dot-live { width:6px;height:6px;background:#4CAF50;border-radius:50%;display:inline-block;animation:blink 1.5s ease-in-out infinite; }
.hero h1 {
    font-size: clamp(1.7rem, 3.5vw, 2.8rem);
    font-weight: 700;
    color: white;
    line-height: 1.2;
    margin-bottom: 16px;
    letter-spacing: -0.3px;
}
.hero h1 span { color: #90CAF9; }
.hero-desc {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.7);
    max-width: 480px;
    line-height: 1.7;
    margin-bottom: 28px;
}
.hero-btns { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 44px; }
.hero-stats {
    display: flex; flex-wrap: wrap;
    gap: 32px;
    padding-top: 28px;
    border-top: 1px solid rgba(255,255,255,0.12);
}
.hero-stat-num {
    font-family: 'Poppins', sans-serif;
    font-size: 1.7rem; font-weight: 700;
    color: white; line-height: 1;
}
.hero-stat-num span { color: #90CAF9; }
.hero-stat-lbl { font-size: 0.75rem; color: rgba(255,255,255,0.55); margin-top: 3px; }

/* Sağ kart */
.hero-card {
    background: white;
    border-radius: var(--r);
    padding: 24px;
    box-shadow: var(--shadow-lg);
}
.hero-card-title {
    font-size: 0.76rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.7px;
    color: var(--muted); margin-bottom: 14px;
    display: flex; align-items: center; gap: 7px;
}
.hc-row {
    display: flex; justify-content: space-between;
    align-items: flex-start; padding: 10px 0;
    border-bottom: 1px solid var(--border);
    gap: 12px;
}
.hc-row:last-child { border-bottom: none; }
.hc-vessel { font-size: 0.84rem; font-weight: 600; color: var(--navy); }
.hc-port { font-size: 0.74rem; color: var(--muted); }
.hc-status { font-size: 0.69rem; font-weight: 700; padding: 3px 8px; border-radius: 4px; white-space: nowrap; }
.hc-status.in  { background: #E8F5E9; color: #2E7D32; }
.hc-status.out { background: #FFF8E1; color: #E65100; }
.hc-status.port{ background: #E3F2FD; color: #1565C0; }

.hero-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 48px;
    align-items: center;
}

/* ─── SERVICES ─── */
.svc-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 20px; }
.svc-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    padding: 24px;
    transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
}
.svc-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-3px);
    border-color: #BBDEFB;
}
.svc-icon {
    width: 44px; height: 44px;
    background: var(--sky);
    border-radius: var(--r);
    display: grid; place-items: center;
    color: var(--blue); font-size: 1rem;
    margin-bottom: 14px;
}
.svc-title { font-size: 0.95rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
.svc-desc { font-size: 0.82rem; color: var(--muted); line-height: 1.6; margin-bottom: 14px; }
.svc-link { font-size: 0.8rem; font-weight: 600; color: var(--blue); display: inline-flex; align-items: center; gap: 5px; transition: gap 0.2s; }
.svc-link:hover { gap: 8px; }

/* ─── WHY ─── */
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
.why-img-wrap { border-radius: var(--r); overflow: hidden; aspect-ratio: 4/3; }
.why-img-wrap img { width:100%;height:100%;object-fit:cover; }
.why-list { display: flex; flex-direction: column; gap: 16px; margin-top: 24px; }
.why-item {
    display: flex; gap: 14px; align-items: flex-start;
    padding: 16px; border: 1px solid var(--border);
    border-radius: var(--r); background: white;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.why-item:hover { border-color: #BBDEFB; box-shadow: var(--shadow); }
.why-item-icon {
    width: 38px; height: 38px; flex-shrink: 0;
    background: var(--sky); border-radius: var(--r);
    display: grid; place-items: center;
    color: var(--blue); font-size: 0.9rem;
}
.why-item h4 { font-size: 0.88rem; font-weight: 700; color: var(--navy); margin-bottom: 3px; font-family:'Inter',sans-serif; }
.why-item p { font-size: 0.79rem; color: var(--muted); line-height: 1.55; }

/* ─── STATS STRIP ─── */
.stats-strip { background: var(--navy); padding: 44px 0; }
.stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 24px; text-align: center; }
.stat-val { font-family: 'Poppins', sans-serif; font-size: 2rem; font-weight: 700; color: white; line-height:1; }
.stat-val span { color: #90CAF9; }
.stat-lbl { font-size: 0.76rem; color: rgba(255,255,255,0.55); margin-top: 6px; }

/* ─── PDA ─── */
.pda-wrap {
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--r);
    overflow: hidden;
    box-shadow: var(--shadow);
}
.pda-head {
    background: var(--navy);
    padding: 20px 28px;
    display: flex; justify-content: space-between; align-items: center;
}
.pda-head h3 { font-size: 1rem; font-weight: 700; color: white; margin-bottom: 2px; }
.pda-head p { font-size: 0.78rem; color: rgba(255,255,255,0.6); }
.pda-live { display:flex;align-items:center;gap:6px;font-size:0.7rem;color:#A5D6A7;font-weight:600;text-transform:uppercase; }
.pda-body { padding: 28px; }
.pda-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; margin-bottom: 14px; }
.pf label { display:block;font-size:0.72rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:0.5px;margin-bottom:5px; }
.pf select, .pf input {
    width:100%;border:1px solid var(--border);border-radius:6px;
    padding:9px 12px;font-size:0.84rem;font-family:'Inter',sans-serif;
    color:var(--text);background:var(--bg);outline:none;
    transition:border-color 0.2s, background 0.2s;
}
.pf select:focus, .pf input:focus { border-color:var(--blue);background:white; }
.pda-actions { display:flex;gap:10px;flex-wrap:wrap;align-items:center; }
.pda-result {
    display:none;margin-top:20px;background:var(--bg);
    border:1px solid var(--border);border-radius:var(--r);padding:20px;
}
.pda-result.show { display:block; }
.pda-result-title { font-size:0.72rem;text-transform:uppercase;letter-spacing:0.7px;color:var(--muted);margin-bottom:14px;font-weight:600; }
.pda-items { display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:12px; }
.pda-item { display:flex;justify-content:space-between;font-size:0.82rem;padding:8px 12px;background:white;border:1px solid var(--border);border-radius:6px; }
.pda-item-lbl { color:var(--muted); }
.pda-item-val { color:var(--navy);font-weight:600; }
.pda-total {
    display:flex;justify-content:space-between;align-items:center;
    padding:12px 16px;background:var(--sky);border:1px solid #BBDEFB;border-radius:var(--r);
}
.pda-total-lbl { font-weight:700;color:var(--navy);font-size:0.86rem; }
.pda-total-val { font-family:'Poppins',sans-serif;font-size:1.3rem;color:var(--blue);font-weight:700; }

/* ─── PORTS TABS ─── */
.port-tabs { display:flex;gap:6px;flex-wrap:wrap;margin-bottom:20px; }
.port-tab {
    padding:7px 16px;background:white;border:1px solid var(--border);
    border-radius:6px;font-size:0.82rem;font-weight:600;cursor:pointer;
    color:var(--muted);font-family:'Inter',sans-serif;transition:all 0.2s;
}
.port-tab.active,.port-tab:hover { background:var(--navy);border-color:var(--navy);color:white; }
.port-panel { display:none; }
.port-panel.active { display:block; }
.port-info-grid { display:grid;grid-template-columns:1fr 1fr;gap:12px; }
.port-info-card { background:white;border:1px solid var(--border);border-radius:var(--r);padding:16px; }
.port-info-card h4 { font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:var(--blue);margin-bottom:7px;font-family:'Inter',sans-serif; }
.port-info-card p { font-size:0.8rem;color:var(--muted);line-height:1.6; }

/* ─── VESSELS ─── */
.vessel-grid { display:grid;grid-template-columns:repeat(4,1fr);gap:16px; }
.vessel-card { background:white;border:1px solid var(--border);border-radius:var(--r);overflow:hidden;transition:box-shadow 0.2s,transform 0.2s; }
.vessel-card:hover { box-shadow:var(--shadow-lg);transform:translateY(-3px); }
.vessel-img { aspect-ratio:16/9;overflow:hidden;background:var(--bg); }
.vessel-img img { width:100%;height:100%;object-fit:cover;transition:transform 0.4s; }
.vessel-card:hover .vessel-img img { transform:scale(1.04); }
.vessel-body { padding:14px; }
.vessel-type { display:inline-block;padding:2px 8px;border-radius:4px;font-size:0.67rem;font-weight:700;text-transform:uppercase;letter-spacing:0.4px;background:var(--sky);color:var(--blue);margin-bottom:6px; }
.vessel-name { font-size:0.88rem;font-weight:700;color:var(--navy);margin-bottom:8px;font-family:'Inter',sans-serif; }
.vessel-specs { display:grid;grid-template-columns:1fr 1fr;gap:4px; }
.vessel-spec { font-size:0.72rem;color:var(--muted); }
.vessel-spec strong { display:block;font-size:0.76rem;color:var(--text); }

/* ─── NEWS ─── */
.news-grid { display:grid;grid-template-columns:1.3fr 1fr 1fr;gap:20px; }
.news-card { background:white;border:1px solid var(--border);border-radius:var(--r);overflow:hidden;display:flex;flex-direction:column;transition:box-shadow 0.2s,transform 0.2s; }
.news-card:hover { box-shadow:var(--shadow-lg);transform:translateY(-3px); }
.news-card-img { aspect-ratio:16/9;overflow:hidden; }
.news-card-img img { width:100%;height:100%;object-fit:cover;transition:transform 0.4s; }
.news-card:hover .news-card-img img { transform:scale(1.04); }
.news-body { padding:18px;flex:1;display:flex;flex-direction:column; }
.news-cat { display:inline-block;padding:2px 8px;border-radius:4px;font-size:0.67rem;font-weight:700;text-transform:uppercase;background:var(--sky);color:var(--blue);margin-bottom:8px; }
.news-title { font-size:0.9rem;font-weight:700;color:var(--navy);margin-bottom:7px;line-height:1.35;font-family:'Inter',sans-serif; }
.news-title:hover { color:var(--blue); }
.news-excerpt { font-size:0.78rem;color:var(--muted);line-height:1.6;flex:1;margin-bottom:10px; }
.news-date { font-size:0.71rem;color:var(--muted); }

/* ─── CTA STRIP ─── */
.cta-strip { background: var(--navy); padding: 60px 0; text-align: center; }
.cta-strip h2 { font-size: clamp(1.3rem,2.5vw,1.9rem); font-weight:700; color:white; margin-bottom:10px; }
.cta-strip p { color:rgba(255,255,255,0.65); font-size:0.88rem; margin-bottom:24px; }
.cta-btns { display:flex;justify-content:center;gap:12px;flex-wrap:wrap; }

/* ─── RESPONSIVE ─── */
@media (max-width:1100px) { .svc-grid{grid-template-columns:1fr 1fr;} .vessel-grid{grid-template-columns:1fr 1fr;} .news-grid{grid-template-columns:1fr 1fr;} .pda-grid{grid-template-columns:1fr 1fr;} .hero-layout{grid-template-columns:1fr;} .hero-card{display:none;} .stats-grid{grid-template-columns:1fr 1fr;} .why-grid{grid-template-columns:1fr;gap:28px;} }
@media (max-width:640px) { .svc-grid{grid-template-columns:1fr;} .vessel-grid{grid-template-columns:1fr;} .news-grid{grid-template-columns:1fr;} .pda-grid{grid-template-columns:1fr;} .port-info-grid{grid-template-columns:1fr;} .pda-items{grid-template-columns:1fr;} .stats-grid{grid-template-columns:1fr 1fr;} }
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="hero-img"></div>
    <div class="container hero-content">
        <div class="hero-layout">
            <div>
                <div class="hero-eyebrow"><span class="dot-live"></span> {{ __t('7/24 Operasyon Hattı Aktif', '24/7 Operations Line Active') }}</div>
                <h1>{!! __t('Türk Boğazları\'nda<br>Güvenilir <span>Gemi Acenteniz</span>', 'Your Reliable <span>Shipping Agency</span><br>in Turkish Straits') !!}</h1>
                <p class="hero-desc">{{ __t('İstanbul ve Çanakkale Boğazlarından Türkiye limanlarına — 18 yıllık deneyimle 7/24 profesyonel acentelik ve liman hizmetleri.', 'From the Bosphorus & Dardanelles Straits to all Turkish ports — 24/7 professional shipping agency and port services with 18 years of experience.') }}</p>
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
                <div class="hero-card-title"><i class="fa-solid fa-satellite-dish" style="color:var(--teal);"></i> {{ __t('Anlık Operasyonlar', 'Live Operations') }}</div>
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
                <div style="margin-top:14px;padding-top:12px;border-top:1px solid var(--border);font-size:0.72rem;color:var(--muted);">
                    <i class="fa-solid fa-circle-info" style="margin-right:4px;"></i> {{ __t('Gerçek zamanlı veri — Bugün 07:30 itibarıyla', 'Real-time data — As of 07:30 today') }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HİZMETLER --}}
<section class="sec sec-alt">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:28px;flex-wrap:wrap;gap:16px;">
            <div>
                <div class="sec-label">{{ __t('Hizmetlerimiz', 'Our Services') }}</div>
                <h2 class="sec-title">{{ __t('Size Neler Sunuyoruz?', 'What We Offer') }}</h2>
            </div>
            <a href="{{ route('services.index') }}" class="btn-outline" style="font-size:0.82rem;padding:9px 18px;">{{ __t('Tüm Hizmetler', 'All Services') }} <i class="fa-solid fa-arrow-right"></i></a>
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

{{-- STATS --}}
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

{{-- GEMİLER --}}
@php
$vesselFallbackImages = [
    'images/vsl_container.jpg',
    'images/vsl_tanker.jpg',
    'images/vsl_bulk.jpg',
    'images/vsl_roro.jpg',
];
$newsFallbackImages = [
    'images/news_rules.jpg',
    'images/news_limits.jpg',
    'images/news_green.jpg',
];
@endphp

@if(isset($vessels) && $vessels->count())
<section class="sec sec-alt">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:24px;flex-wrap:wrap;gap:14px;">
            <div><div class="sec-label">{{ __t('Operasyon Filosu', 'Operation Fleet') }}</div><h2 class="sec-title">{{ __t('Hizmetimizde Olan Gemiler', 'Vessels Attended') }}</h2></div>
            <a href="{{ route('vessels.index') }}" class="btn-outline" style="font-size:0.82rem;padding:9px 18px;">{{ __t('Tüm Filo', 'Full Fleet') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="vessel-grid">
            @foreach($vessels->take(4) as $index => $v)
            @php
                $vslImg = null;
                if (!empty($v->image)) {
                    $vslImg = asset(ltrim($v->image, '/'));
                } elseif (!empty($v->image_path)) {
                    $vslImg = Storage::url($v->image_path);
                } else {
                    $vslImg = asset($vesselFallbackImages[$index % count($vesselFallbackImages)]);
                }
            @endphp
            <div class="vessel-card">
                <div class="vessel-img">
                    <img src="{{ $vslImg }}" alt="{{ $v->name }}" loading="lazy">
                </div>
                <div class="vessel-body">
                    <span class="vessel-type">{{ $v->type ?? $v->vessel_type ?? 'Cargo' }}</span>
                    <div class="vessel-name">{{ $v->name }}</div>
                    <div class="vessel-specs">
                        @if($v->grt)<div class="vessel-spec"><strong>{{ number_format($v->grt) }} GRT</strong>Gross Tonnage</div>@endif
                        @if($v->loa)<div class="vessel-spec"><strong>{{ $v->loa }} m</strong>LOA</div>@endif
                        @if($v->flag)<div class="vessel-spec"><strong>{{ $v->flag }}</strong>{{ __t('Bayrak', 'Flag') }}</div>@endif
                        @if($v->year_built)<div class="vessel-spec"><strong>{{ $v->year_built }}</strong>{{ __t('İnşa Yılı', 'Built Year') }}</div>@endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- HABERLER --}}
@if(isset($news) && $news->count())
<section class="sec">
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:24px;flex-wrap:wrap;gap:14px;">
            <div><div class="sec-label">{{ __t('Haberler', 'News') }}</div><h2 class="sec-title">{{ __t('Son Gelişmeler', 'Latest Developments') }}</h2></div>
            <a href="{{ route('news.index') }}" class="btn-outline" style="font-size:0.82rem;padding:9px 18px;">{{ __t('Tüm Haberler', 'All News') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="news-grid">
            @foreach($news->take(3) as $index => $item)
            <div class="news-card">
                <div class="news-card-img">
                    <img src="{{ $item->image_path ? Storage::url($item->image_path) : ($newsFallbackImages[$index % count($newsFallbackImages)]) }}" alt="{{ $item->title }}" loading="lazy">
                </div>
                <div class="news-body">
                    <span class="news-cat">{{ $item->category ?? 'Haber' }}</span>
                    <a href="{{ route('news.show', $item->slug) }}" class="news-title">{{ $item->title }}</a>
                    <p class="news-excerpt">{{ Str::limit($item->excerpt ?? $item->content, 100) }}</p>
                    <span class="news-date"><i class="fa-regular fa-calendar" style="margin-right:4px;"></i>{{ $item->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<div class="cta-strip">
    <div class="container">
        <h2>Geminiz İçin Teklif Alın</h2>
        <p>İstanbul'dan İzmir'e, tüm Türkiye limanlarında acentelik için uzman ekibimizle iletişime geçin.</p>
        <div class="cta-btns">
            <a href="{{ route('contact') }}" class="btn-primary" style="font-size:0.9rem;padding:12px 28px;"><i class="fa-solid fa-envelope"></i> İletişime Geçin</a>
            <a href="tel:{{ preg_replace('/\s+/', '', \App\Models\SiteSetting::get('phone', '+902124446283')) }}" class="btn-outline-white" style="font-size:0.9rem;padding:11px 26px;"><i class="fa-solid fa-phone"></i> {{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}</a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function switchPort(e, id) {
    document.querySelectorAll('.port-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.port-tab').forEach(t => t.classList.remove('active'));
    document.getElementById('port-' + id)?.classList.add('active');
    e.currentTarget.classList.add('active');
}

function calcPDA() {
    const port    = document.getElementById('pdaPort').value;
    const type    = document.getElementById('pdaVesselType').value;
    const grt     = parseFloat(document.getElementById('pdaGrt').value) || 0;
    const loa     = parseFloat(document.getElementById('pdaLoa').value) || 0;
    const purpose = document.getElementById('pdaPurpose').value;
    if (!port || !type || !grt) { alert('Lütfen en az Liman, Gemi Tipi ve GRT giriniz.'); return; }
    const pm = { istanbul:1.0,canakkale:0.85,ambarli:1.3,haydarpasa:1.1,izmit:1.15,izmir:1.2 }[port] || 1;
    const tm = { tanker:1.2,bulkcarrier:1.0,container:1.3,general:1.0,roro:1.1 }[type] || 1;
    const pa = { transit:0,loading:800,discharge:800,bunkering:400,repair:600 }[purpose] || 0;
    const pilotage = Math.round(grt*0.018*pm*tm);
    const harbour  = Math.round(grt*0.012*pm);
    const mooring  = Math.round(loa>0 ? loa*18*pm : grt*0.006*pm);
    const vts      = (port==='istanbul'||port==='canakkale') ? Math.round(grt*0.004*pm) : 0;
    const agency   = Math.round((pilotage+harbour+mooring)*0.12*tm);
    const total    = pilotage+harbour+mooring+vts+agency+pa;
    const f = n => '$'+n.toLocaleString('tr-TR');
    const items = [['Pilotaj',f(pilotage)],['Liman Harcı',f(harbour)],['Palamar',f(mooring)],['VTS',vts?f(vts):'Dahil'],['Acentelik',f(agency)],['Ek Gider',pa?f(pa):'—']];
    document.getElementById('pdaItems').innerHTML = items.map(([l,v]) => `<div class="pda-item"><span class="pda-item-lbl">${l}</span><span class="pda-item-val">${v}</span></div>`).join('');
    document.getElementById('pdaTotalVal').textContent = f(total);
    const r = document.getElementById('pdaResult');
    r.classList.add('show');
    r.scrollIntoView({behavior:'smooth',block:'nearest'});
}

function resetPDA() {
    ['pdaPort','pdaVesselType','pdaGrt','pdaLoa','pdaDraft'].forEach(id => { const el=document.getElementById(id); if(el) el.value=''; });
    document.getElementById('pdaResult').classList.remove('show');
}
</script>
@endsection
