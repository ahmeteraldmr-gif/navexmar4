@extends('layouts.app')
@section('title', 'Hakkımızda | NAVEXMAR — Gemi Acenteliği Kurumsal')

@section('styles')
<style>
/* ─── ABOUT LUXURY STYLES ─── */
.abt-container { max-width: 1140px; margin: 0 auto; }

.abt-hero-deck {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}
.abt-hero-deck::after {
    content: '';
    position: absolute; right: -80px; top: -80px;
    width: 360px; height: 360px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.abt-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 52px; align-items: center;
}

.abt-img-wrap {
    border-radius: 16px; overflow: hidden;
    aspect-ratio: 4/3; position: relative;
    box-shadow: 0 16px 36px rgba(6, 24, 46, 0.15);
    border: 1px solid var(--border);
}
.abt-img-wrap img { width:100%;height:100%;object-fit:cover; }

.abt-badge {
    position: absolute; bottom: 18px; right: 18px;
    background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px);
    border-radius: 12px; padding: 14px 20px;
    display: flex; align-items: center; gap: 12px;
    box-shadow: 0 10px 30px rgba(6, 24, 46, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.5);
}
.abt-badge-icon {
    width: 42px; height: 42px; background: var(--blue);
    border-radius: 10px; display: grid; place-items: center;
    color: white; font-size: 1.1rem;
}
.abt-badge strong { display: block; color: var(--navy); font-size: 1.15rem; font-family:'Outfit',sans-serif; font-weight:800; }
.abt-badge span { color: var(--muted); font-size: 0.76rem; font-weight: 600; }

.stats-mini-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-top: 24px;
}
.stat-mini-card {
    background: white; border: 1px solid var(--border);
    border-radius: 12px; padding: 16px 18px;
    transition: transform 0.2s ease, border-color 0.2s ease;
}
.stat-mini-card:hover { transform: translateY(-2px); border-color: #90CAF9; }
.stat-mini-num {
    font-family: 'Outfit', sans-serif;
    font-size: 1.6rem; font-weight: 900;
    color: var(--blue); line-height: 1;
}
.stat-mini-lbl { font-size: 0.78rem; color: var(--muted); margin-top: 4px; font-weight:600; }

/* Timeline */
.timeline { position: relative; padding-left: 32px; }
.timeline::before {
    content: ''; position: absolute; left: 6px; top: 4px; bottom: 0;
    width: 3px; background: linear-gradient(to bottom, var(--blue), transparent);
    border-radius: 99px;
}
.tl-item { position: relative; margin-bottom: 32px; }
.tl-item::before {
    content: ''; position: absolute; left: -32px; top: 4px;
    width: 13px; height: 13px;
    background: var(--blue); border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.2);
}
.tl-year {
    font-size: 0.74rem; font-weight: 800; color: var(--blue);
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;
}
.tl-title {
    font-size: 1.02rem; font-weight: 800; color: var(--navy);
    margin-bottom: 6px; font-family: 'Outfit', sans-serif;
}
.tl-desc { font-size: 0.84rem; color: var(--muted); line-height: 1.65; }

/* Team */
.team-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 22px; }
.team-card {
    background: white; border: 1px solid var(--border);
    border-radius: 14px; padding: 28px;
    text-align: center;
    transition: all 0.25s ease;
}
.team-card:hover { box-shadow: 0 12px 28px rgba(6, 24, 46, 0.1); transform: translateY(-4px); border-color: #90CAF9; }
.team-avatar {
    width: 64px; height: 64px; border-radius: 50%;
    background: var(--sky); border: 3px solid var(--blue);
    display: grid; place-items: center;
    font-size: 1.3rem; color: var(--blue);
    margin: 0 auto 16px;
    box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2);
}
.team-name { font-size: 1.05rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
.team-role { font-size: 0.78rem; color: var(--blue); font-weight: 700; margin-bottom: 10px; }
.team-bio { font-size: 0.82rem; color: var(--muted); line-height: 1.6; }

/* Certs */
.cert-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 16px; }
.cert-card {
    background: white; border: 1px solid var(--border);
    border-radius: 12px; padding: 22px 18px;
    text-align: center;
    transition: all 0.2s ease;
}
.cert-card:hover { border-color: #90CAF9; transform: translateY(-2px); box-shadow: var(--shadow); }
.cert-icon { font-size: 1.8rem; color: var(--blue); margin-bottom: 12px; }
.cert-name { font-size: 0.88rem; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
.cert-desc { font-size: 0.76rem; color: var(--muted); line-height: 1.5; }

@media (max-width:900px) {
    .abt-grid { grid-template-columns: 1fr; gap: 36px; }
    .team-grid { grid-template-columns: 1fr; }
    .cert-grid { grid-template-columns: 1fr 1fr; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="abt-hero-deck">
    <div class="container abt-container">
        <div class="page-hero-badge"><i class="fa-solid fa-building"></i> {{ __t('Kurumsal Profil', 'Corporate Profile') }}</div>
        <h1>{{ __t('Denizcilikte 18 Yıllık Tecrübe ve Güven', '18 Years of Excellence & Trust in Shipping') }}</h1>
        <p>{{ __t('Türk Boğazları ve Türkiye limanlarında armatör, kiracı ve gemi işletmecilerine 7/24 uluslararası standartlarda profesyonel acentelik hizmeti veriyoruz.', 'Providing 24/7 professional shipping agency services for shipowners, charterers, and operators in the Turkish Straits and all ports.') }}</p>
    </div>
</div>

{{-- SHIRKET HAKKINDA --}}
<section class="sec">
    <div class="container abt-container">
        <div class="abt-grid">
            <div>
                <div class="sec-label">{{ __t('Biz Kimiz?', 'Who We Are') }}</div>
                <h2 class="sec-title">{{ __t('Türk Boğazları & Liman Hizmetlerinde Lider Acente', 'Leading Agency in Turkish Straits & Ports') }}</h2>
                <p style="color:var(--muted); font-size:0.92rem; line-height:1.75; margin-bottom:16px;">
                    {{ __t('NAVEXMAR, 2008 yılında İstanbul\'da kurulmuş olup Türk Boğazları (İstanbul ve Çanakkale Boğazı) transit geçişleri ve Türkiye\'nin tüm limanlarında (Ambarlı, Haydarpaşa, İzmit Körfezi, Aliağa, Mersin, İskenderun vb.) 7/24 acentelik ve deniz lojistiği hizmetleri sunmaktadır.', 'Established in 2008 in Istanbul, NAVEXMAR delivers 24/7 shipping agency and maritime logistics in the Turkish Straits (Bosphorus & Dardanelles) and all ports of Turkey.') }}
                </p>
                <p style="color:var(--muted); font-size:0.92rem; line-height:1.75; margin-bottom:24px;">
                    {{ __t('Uzman ekibimiz, en karmaşık operasyonlarda bile sıfır gecikme prensibiyle hareket ederek armatörlerimize ve kiracılarımıza şeffaf, güvenilir ve rekabetçi acentelik çözümleri üretir.', 'Our expert team operates under a zero-delay principle even in complex operations, delivering transparent, reliable and cost-effective agency solutions.') }}
                </p>
                <div class="stats-mini-grid">
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">18+ {{ __t('Yıl', 'Yrs') }}</div>
                        <div class="stat-mini-lbl">{{ __t('Sektörel Tecrübe', 'Industry Experience') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">4.000+</div>
                        <div class="stat-mini-lbl">{{ __t('Başarılı Gemi Uğrağı', 'Successful Vessel Calls') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">9</div>
                        <div class="stat-mini-lbl">{{ __t('Ana Liman Bölgesi', 'Main Port Regions') }}</div>
                    </div>
                    <div class="stat-mini-card">
                        <div class="stat-mini-num">7/24</div>
                        <div class="stat-mini-lbl">{{ __t('Canlı Operasyon Masası', 'Live Duty Operations') }}</div>
                    </div>
                </div>
            </div>

            <div class="abt-img-wrap">
                <img src="/images/about_corporate.jpg" alt="NAVEXMAR Office" loading="lazy">
                <div class="abt-badge">
                    <div class="abt-badge-icon"><i class="fa-solid fa-award"></i></div>
                    <div>
                        <strong>ISO 9001:2015</strong>
                        <span>{{ __t('Sertifikalı Kalite Yönetimi', 'Certified Quality Management') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ZAMAN CIZELGESI / TIMELINE --}}
<section class="sec sec-alt">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:48px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Tarihçemiz', 'Our History') }}</div>
            <h2 class="sec-title">{{ __t('Başarılarla Dolu Yolculuğumuz', 'Our Journey of Success') }}</h2>
        </div>

        <div style="max-width:800px; margin:0 auto;">
            <div class="timeline">
                <div class="tl-item">
                    <div class="tl-year">2008</div>
                    <div class="tl-title">{{ __t('NAVEXMAR Kuruldu', 'NAVEXMAR Founded') }}</div>
                    <div class="tl-desc">{{ __t('İstanbul Ambarlı merkezli olarak Türk Boğazları geçiş acenteliği hizmetlerine başlandı.', 'Commenced Bosphorus transit shipping agency operations based in Istanbul Ambarli.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2012</div>
                    <div class="tl-title">{{ __t('Liman Ağı Genişletildi', 'Port Network Expansion') }}</div>
                    <div class="tl-desc">{{ __t('İzmit Körfezi (Evyap, Yılport, DP World) ve Aliağa limanlarında doğrudan acentelik ofisleri faaliyete geçti.', 'Direct agency branch offices opened in Izmit Bay and Aliaga ports.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2016</div>
                    <div class="tl-title">{{ __t('BIMCO & FONASBA Üyeliği', 'BIMCO & FONASBA Membership') }}</div>
                    <div class="tl-desc">{{ __t('Uluslararası denizcilik örgütlerine tam üyelik sağlanarak hizmet standartları global seviyeye taşındı.', 'Achieved full membership in global shipping organizations, upgrading service quality.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2020</div>
                    <div class="tl-title">{{ __t('7/24 Dijital Operasyon Masası', '24/7 Digital Operations Desk') }}</div>
                    <div class="tl-desc">{{ __t('Anlık gemi takibi, dijital DA/CA proforma hesaplayıcı ve canlı bildirim sistemine geçildi.', 'Launched real-time vessel tracking, digital DA/CA calculator and live notification telemetry.') }}</div>
                </div>
                <div class="tl-item">
                    <div class="tl-year">2024</div>
                    <div class="tl-title">{{ __t('Yeşil Denizcilik Masası', 'Green Shipping Desk') }}</div>
                    <div class="tl-desc">{{ __t('IMO CII ve EU ETS karbon emisyon danışmanlığı ile çevre dostu acentelik hizmeti başlatıldı.', 'Launched eco-friendly shipping agency with IMO CII and EU ETS carbon compliance consulting.') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- EKIBIMIZ --}}
<section class="sec">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:48px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Yönetim Kadromuz', 'Executive Team') }}</div>
            <h2 class="sec-title">{{ __t('Deneyimli Kaptanlar ve Denizcilik Uzmanları', 'Experienced Captains & Shipping Experts') }}</h2>
        </div>

        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-user-tie"></i></div>
                <div class="team-name">Kpt. Ahsen Boz</div>
                <div class="team-role">{{ __t('Kurucu & Genel Müdür', 'Founder & Managing Director') }}</div>
                <div class="team-bio">{{ __t('25 yıllık uzak yol kaptanlığı ve deniz acenteliği tecrübesiyle şirketin stratejik liderliğini yürütmektedir.', 'Leading company strategy with 25 years master mariner and shipping agency experience.') }}</div>
            </div>
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-compass-drafting"></i></div>
                <div class="team-name">Kpt. Erdem Demir</div>
                <div class="team-role">{{ __t('Operasyon Direktörü', 'Operations Director') }}</div>
                <div class="team-bio">{{ __t('Türk Boğazları transit geçişleri ve liman idareleri koordinasyonunu 7/24 sevk ve idare etmektedir.', 'Directing Bosphorus transit clearances and port authority logistics 24/7.') }}</div>
            </div>
            <div class="team-card">
                <div class="team-avatar"><i class="fa-solid fa-shield-halved"></i></div>
                <div class="team-name">Elif Soylu</div>
                <div class="team-role">{{ __t('Mevzuat & Kalite Müdürü', 'Regulatory & Quality Manager') }}</div>
                <div class="team-bio">{{ __t('Gümrük, Sahil Sağlık, liman izinleri ve ISO 9001 kalite standartlarının uygulanmasından sorumludur.', 'Responsible for customs, health clearance, port permits and ISO 9001 compliance.') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- SERTIFIKALAR --}}
<section class="sec sec-alt">
    <div class="container abt-container">
        <div style="text-align:center; margin-bottom:40px;">
            <div class="sec-label" style="justify-content:center;">{{ __t('Sertifika ve Akreditasyonlar', 'Certifications & Accreditations') }}</div>
            <h2 class="sec-title">{{ __t('Uluslararası Hizmet Standartları', 'International Service Standards') }}</h2>
        </div>

        <div class="cert-grid">
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-certificate"></i></div>
                <div class="cert-name">BIMCO Member</div>
                <div class="cert-desc">{{ __t('Baltık ve Uluslararası Denizcilik Konseyi Üyesi', 'Baltic & International Maritime Council Member') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-award"></i></div>
                <div class="cert-name">FONASBA</div>
                <div class="cert-desc">{{ __t('Dünya Gemi Acenteleri Dernekleri Federasyonu Standardı', 'Federation of National Associations of Ship Brokers Standard') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-shield-check"></i></div>
                <div class="cert-name">ISO 9001:2015</div>
                <div class="cert-desc">{{ __t('TÜV Rheinland Onaylı Kalite Yönetim Sistemi', 'TÜV Rheinland Certified Quality Management System') }}</div>
            </div>
            <div class="cert-card">
                <div class="cert-icon"><i class="fa-solid fa-anchor"></i></div>
                <div class="cert-name">DTO Üyesi</div>
                <div class="cert-desc">{{ __t('İMEAK Deniz Ticaret Odası Kayıtlı Acente', 'IMEAK Chamber of Shipping Registered Agency') }}</div>
            </div>
        </div>
    </div>
</section>

@endsection
