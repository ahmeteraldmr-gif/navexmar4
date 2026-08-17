@extends('layouts.app')
@section('title', ($service->title ?? 'Hizmet Detayı') . ' | NAVEXMAR')

@php
$serviceImages = [
    'gemi-acenteligi-liman-hizmetleri'   => 'images/svc_port_agency.jpg',
    'turk-bogazlari-gecis-acenteligi'    => 'images/svc_strait_transit.jpg',
    'yakit-ve-kumanya-ikmali'            => 'images/svc_bunkering.jpg',
    'murettebat-degisimi-kara-lojistigi' => 'images/svc_crew_change.jpg',
    'yuk-ve-konteyner-operasyonlari'     => 'images/svc_cargo.jpg',
    'teknik-survey-bakim-onarim'         => 'images/svc_technical.jpg',
    'teknik-ve-makine-destegi'           => 'images/svc_technical.jpg',
];

$imgSrc = null;
if (!empty($service->image)) {
    $imgSrc = asset(ltrim($service->image, '/'));
} elseif (!empty($service->image_path)) {
    $imgSrc = Storage::url($service->image_path);
} elseif (isset($serviceImages[$service->slug])) {
    $imgSrc = asset($serviceImages[$service->slug]);
} else {
    $imgSrc = asset('images/svc_port_agency.jpg');
}
@endphp

@section('styles')
<style>
/* ─── SERVICE SHOWCASE LUXURY STYLES ─── */
.svc-container { max-width: 1140px; margin: 0 auto; }

.svc-hero {
    background: linear-gradient(135deg, #04101F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}

.svc-detail-grid { display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }

.svc-main-card {
    background: white; border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
    box-shadow: 0 4px 16px rgba(6, 24, 46, 0.04);
}

.svc-main-img {
    position: relative; width: 100%; height: 320px;
    overflow: hidden; background: #0B2545;
}
.svc-main-img img { width: 100%; height: 100%; object-fit: cover; }

.svc-content-padding { padding: 32px; }

.svc-detail-body h2 { font-size: 1.5rem; font-weight: 800; color: var(--navy); margin-bottom: 16px; font-family:'Outfit',sans-serif; }
.svc-detail-body p { color: var(--muted); line-height: 1.75; margin-bottom: 20px; font-size: 0.94rem; }

.svc-feature-box {
    background: #F8FAFC; border: 1px solid #E2E8F0;
    border-radius: 12px; padding: 24px; margin-bottom: 28px;
}
.svc-feature-box h4 { font-size: 0.95rem; font-weight: 800; color: var(--navy); margin-bottom: 14px; font-family:'Outfit',sans-serif; }

.svc-features-list { list-style: none; display: flex; flex-direction: column; gap: 10px; }
.svc-features-list li {
    display: flex; align-items: flex-start; gap: 12px;
    font-size: 0.88rem; color: var(--navy); font-weight: 600;
}
.svc-features-list li i { color: var(--teal); font-size: 1rem; margin-top: 2px; }

.svc-sidebar-card {
    background: white; border: 1px solid var(--border); border-radius: 14px; padding: 24px; margin-bottom: 20px; box-shadow: 0 4px 14px rgba(6, 24, 46, 0.04);
}
.svc-sidebar-card h4 { font-size: 0.92rem; font-weight: 800; color: var(--navy); margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--border); font-family: 'Outfit', sans-serif; }
.svc-other-link {
    display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--border);
    font-size: 0.86rem; color: var(--muted); transition: all 0.2s ease; text-decoration: none; font-weight: 600;
}
.svc-other-link:last-child { border-bottom: none; }
.svc-other-link:hover, .svc-other-link.active { color: var(--blue); }

@media(max-width: 1024px){ .svc-detail-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="svc-hero">
    <div class="container svc-container">
        <div class="page-hero-badge"><i class="fa-solid fa-anchor"></i> {{ __t('Hizmet Portföyü', 'Service Portfolio') }}</div>
        <h1>{{ $service->title }}</h1>
        <p>{{ $service->summary }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container svc-container">
        <div class="svc-detail-grid">
            <div class="svc-main-card">
                <div class="svc-main-img">
                    <img src="{{ $imgSrc }}" alt="{{ $service->title }}" loading="lazy">
                </div>
                <div class="svc-content-padding">
                    <div class="svc-detail-body">
                        <h2>{{ __t('Hizmet Detayları ve Operasyon Kapsamı', 'Service Details & Operational Scope') }}</h2>
                        <p>{{ $service->description ?? $service->summary }}</p>

                        @if(!empty($service->features))
                        <div class="svc-feature-box">
                            <h4><i class="fa-solid fa-square-check" style="color:var(--blue);margin-right:6px;"></i> {{ __t('Öne Çıkan Operasyonel Avantajlar', 'Key Operational Advantages') }}</h4>
                            <ul class="svc-features-list">
                                @foreach((is_array($service->features) ? $service->features : json_decode($service->features, true) ?? []) as $feat)
                                    <li><i class="fa-solid fa-circle-check"></i> {{ $feat }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <div style="display:flex; gap:14px; flex-wrap:wrap; margin-top:28px; padding-top:24px; border-top:1px solid var(--border);">
                        <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Proforma Teklif İste', 'Request Proforma Quote') }}</a>
                        <a href="tel:{{ \App\Models\SiteSetting::get('mobile', '+905327009090') }}" class="btn-outline"><i class="fa-solid fa-phone"></i> {{ __t('7/24 Acil Operasyon', '24/7 Duty Call') }}</a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="svc-sidebar-card">
                    <h4><i class="fa-solid fa-list" style="color:var(--blue);margin-right:6px;"></i> {{ __t('Tüm Hizmetlerimiz', 'All Services') }}</h4>
                    @foreach($services as $s)
                        <a href="{{ route('services.show', $s->slug) }}" class="svc-other-link {{ $s->slug === $service->slug ? 'active' : '' }}">
                            <span>{{ $s->title }}</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @endforeach
                </div>

                <div class="svc-sidebar-card" style="background:var(--navy); color:white;">
                    <h4 style="color:white; border-color:rgba(255,255,255,0.12);"><i class="fa-solid fa-headset" style="color:var(--cyan);margin-right:6px;"></i> {{ __t('7/24 Operasyon Masası', '24/7 Duty Desk') }}</h4>
                    <p style="font-size:0.82rem; color:rgba(255,255,255,0.7); margin-bottom:16px; line-height:1.6;">
                        {{ __t('Gemilerinizin Türk Boğazları geçişi ve liman acenteliği için 7/24 anlık canlı destek.', '24/7 duty attendance for Bosphorus transit and Turkish port agency calls.') }}
                    </p>
                    <div style="font-size:0.84rem; font-weight:700; color:white; margin-bottom:8px;">
                        <i class="fa-solid fa-phone" style="color:var(--cyan); margin-right:6px;"></i> {{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}
                    </div>
                    <div style="font-size:0.84rem; font-weight:700; color:var(--cyan);">
                        <i class="fa-solid fa-envelope" style="margin-right:6px;"></i> {{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
