@extends('layouts.app')
@section('title', 'İletişim & Teklif | NAVEXMAR — 7/24 Operasyon Masası')

@section('styles')
<style>
/* ─── CONTACT LUXURY STYLES ─── */
.cnt-container { max-width: 1140px; margin: 0 auto; }

.cnt-hero {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}

.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 36px;
    align-items: start;
}

.info-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 26px;
    margin-bottom: 20px;
    box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
}

.info-card-title {
    font-size: 1.05rem; font-weight: 800;
    color: var(--navy); margin-bottom: 18px;
    display: flex; align-items: center; gap: 10px;
    font-family:'Outfit',sans-serif;
}
.info-card-title i { color: var(--blue); }

.info-row {
    display: flex; gap: 14px; align-items: flex-start;
    margin-bottom: 16px; font-size: 0.86rem;
}
.info-row:last-child { margin-bottom: 0; }
.info-icon {
    width: 36px; height: 36px;
    background: var(--sky); border-radius: 8px;
    display: grid; place-items: center;
    color: var(--blue); font-size: 0.85rem; flex-shrink: 0;
}
.info-lbl { font-size: 0.72rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.6px; font-weight:700; }
.info-val { color: var(--navy); font-weight: 700; line-height: 1.45; }
.info-val a { color: var(--navy); transition: color 0.2s; }
.info-val a:hover { color: var(--blue); }

.vhf-row {
    background: var(--navy); color: white;
    border-radius: 8px; padding: 12px 16px;
    font-size: 0.82rem; margin-top: 16px;
    display: flex; align-items: center; gap: 10px;
    font-weight: 600;
}
.vhf-row i { color: var(--cyan); }

/* Form Card */
.form-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 8px 24px rgba(6, 24, 46, 0.06);
}

.form-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 18px;
}
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-group.full { grid-column: span 2; }

.form-label {
    font-size: 0.78rem; font-weight: 800;
    color: var(--navy); text-transform: uppercase; letter-spacing: 0.5px;
}

.form-control {
    padding: 12px 16px;
    border: 1px solid var(--border);
    border-radius: 10px;
    font-size: 0.9rem;
    font-family: inherit;
    color: var(--text);
    background: #F8FAFC;
    transition: all 0.2s ease;
}
.form-control:focus {
    outline: none;
    border-color: var(--blue);
    background: white;
    box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.12);
}

textarea.form-control { resize: vertical; min-height: 120px; }

@media (max-width: 900px) {
    .contact-layout { grid-template-columns: 1fr; }
    .form-grid { grid-template-columns: 1fr; }
    .form-group.full { grid-column: span 1; }
}
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="cnt-hero">
    <div class="container cnt-container">
        <div class="page-hero-badge"><i class="fa-solid fa-headset"></i> {{ __t('7/24 Nöbetçi Operasyon Masası', '24/7 Duty Operations Desk') }}</div>
        <h1>{{ __t('İletişim & Proforma Teklif Talebi', 'Contact & Proforma PDA Request') }}</h1>
        <p>{{ __t('Türk Boğazları ve tüm Türkiye limanları için 7/24 anlık liman masraf hesabı (PDA) ve acentelik teklifi alın.', 'Get 24/7 instant port disbursement calculation (PDA) and agency quotes for Turkish Straits and all ports.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container cnt-container">
        
        @if(session('success'))
            <div style="background:#ECFDF5; border:1px solid #A7F3D0; color:#065F46; padding:16px 20px; border-radius:12px; margin-bottom:28px; font-weight:700; display:flex; align-items:center; gap:10px;">
                <i class="fa-solid fa-circle-check" style="font-size:1.2rem;"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="contact-layout">
            <!-- Left Info Panel -->
            <div>
                <div class="info-card">
                    <div class="info-card-title"><i class="fa-solid fa-building-flag"></i> {{ __t('Merkez Ofis İletişim', 'Headquarters Contact') }}</div>
                    
                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Adres', 'Address') }}</div>
                            <div class="info-val">{{ \App\Models\SiteSetting::get('address', 'Marport Plaza Kat:8, Ambarlı Liman Yolu, Avcılar / İstanbul') }}</div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Santral / Telefon', 'Central Phone') }}</div>
                            <div class="info-val"><a href="tel:{{ \App\Models\SiteSetting::get('phone', '+902124446283') }}">{{ \App\Models\SiteSetting::get('phone', '+90 (212) 444 62 83') }}</a></div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('7/24 Acil Operasyon Hattı', '24/7 Emergency Line') }}</div>
                            <div class="info-val"><a href="tel:{{ \App\Models\SiteSetting::get('mobile', '+905327009090') }}">{{ \App\Models\SiteSetting::get('mobile', '+90 (532) 700 90 90') }}</a></div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <div class="info-lbl">{{ __t('Operasyon E-posta', 'Operations Email') }}</div>
                            <div class="info-val"><a href="mailto:{{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}">{{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}</a></div>
                        </div>
                    </div>

                    <div class="vhf-row">
                        <i class="fa-solid fa-tower-broadcast"></i>
                        <span>VTS VHF: Ch 16 / 12 / 11 (Bosphorus & Dardanelles)</span>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-title"><i class="fa-solid fa-clock"></i> {{ __t('Çalışma Saatleri', 'Working Hours') }}</div>
                    <div style="font-size:0.84rem; color:var(--muted); line-height:1.7;">
                        <strong style="color:var(--navy); display:block; margin-bottom:4px;">{{ __t('Liman & Sahil Acenteliği:', 'Port & Shore Agency:') }}</strong>
                        7/24 Kesintisiz (365 Gün Nöbetçi Operasyon)
                    </div>
                </div>
            </div>

            <!-- Right Form Card -->
            <div class="form-card">
                <h2 style="font-size:1.4rem; font-weight:800; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">
                    {{ __t('Anlık Teklif & Proforma PDA İsteyin', 'Request Instant Quote & Proforma PDA') }}
                </h2>
                <p style="color:var(--muted); font-size:0.86rem; margin-bottom:24px; line-height:1.6;">
                    {{ __t('Gemi bilgilerinizi ve uğrak limanınızı iletin; proforma liman giderleriniz (PDA) en geç 2 saat içinde tarafınıza iletilsin.', 'Submit your vessel specs and port call details; your proforma disbursement account (PDA) will be delivered within 2 hours.') }}
                </p>

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">{{ __t('Adınız Soyadınız', 'Full Name') }} *</label>
                            <input type="text" name="name" class="form-control" placeholder="Örn: Capt. John Smith" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __t('E-posta Adresi', 'Email Address') }} *</label>
                            <input type="email" name="email" class="form-control" placeholder="agency@company.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __t('Telefon / WhatsApp', 'Phone / WhatsApp') }}</label>
                            <input type="text" name="phone" class="form-control" placeholder="+90 532 ...">
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __t('Şirket / Armatör Adı', 'Company / Shipowner') }}</label>
                            <input type="text" name="company" class="form-control" placeholder="Örn: Ocean Shipping Ltd.">
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __t('Gemi Adı & IMO No', 'Vessel Name & IMO') }}</label>
                            <input type="text" name="vessel_name" class="form-control" placeholder="Örn: MV ATLAS STAR (IMO 9481234)">
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __t('Hizmet / Operasyon Tipi', 'Service / Operation') }}</label>
                            <select name="subject" class="form-control">
                                <option value="Boğaz Transit Geçişi">{{ __t('İstanbul / Çanakkale Boğaz Transit', 'Bosphorus / Dardanelles Transit') }}</option>
                                <option value="Liman Acenteliği">{{ __t('Liman Acenteliği (Ambarlı, İzmit vb.)', 'Port Agency Attendance') }}</option>
                                <option value="Bunkering / Kumanya">{{ __t('Bunkering & Yakıt İkmali', 'Bunkering & Provisions') }}</option>
                                <option value="Mürettebat Değişimi">{{ __t('Mürettebat Değişimi & Lojistik', 'Crew Change & Shore Logistics') }}</option>
                                <option value="Diğer">{{ __t('Diğer Özel Talep', 'Other Special Request') }}</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label class="form-label">{{ __t('Mesajınız & Operasyon Detayları', 'Message & Operation Details') }} *</label>
                            <textarea name="message" class="form-control" placeholder="{{ __t('Gemi GRT, LOA, draft, varış tarihi ve beklenen hizmet detaylarını yazabilirsiniz...', 'Enter vessel GRT, LOA, draft, ETA date and service requirements...') }}" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary" style="width:100%; justify-content:center; margin-top:24px; padding:14px;">
                        <i class="fa-solid fa-paper-plane"></i> {{ __t('Teklif Talebini Gönder', 'Submit Quote Request') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
