@extends('layouts.app')

@section('title', 'Filomuz & Deniz Operasyonları | NAVEXMAR')

@php
$vesselFallbackImages = [
    'images/vsl_container.jpg',
    'images/vsl_tanker.jpg',
    'images/vsl_bulk.jpg',
    'images/vsl_roro.jpg',
];
@endphp

@section('styles')
<style>
/* ─── ULTRA-MODERN HORIZONTAL FLEET DECK DESIGN ─── */
.deck-container {
    max-width: 1140px;
    margin: 0 auto;
}

.deck-hero {
    background: linear-gradient(135deg, #07192F 0%, #0B2545 100%);
    padding: 56px 0 48px;
    color: white;
    position: relative;
    overflow: hidden;
}

.deck-hero::after {
    content: '';
    position: absolute;
    right: -100px;
    bottom: -100px;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(25, 118, 210, 0.15) 0%, rgba(0,0,0,0) 70%);
    pointer-events: none;
}

.deck-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #90CAF9;
    padding: 5px 14px;
    border-radius: 99px;
    font-size: 0.74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 16px;
}

.deck-hero h1 {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 800;
    color: #FFFFFF;
    letter-spacing: -0.5px;
    margin-bottom: 12px;
}

.deck-hero p {
    color: rgba(255, 255, 255, 0.75);
    font-size: 0.94rem;
    max-width: 620px;
    line-height: 1.6;
}

/* Control Bar Filter */
.deck-filter-bar {
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 12px 16px;
    display: flex;
    gap: 8px;
    margin-top: -28px;
    margin-bottom: 36px;
    box-shadow: 0 8px 24px rgba(11, 37, 69, 0.08);
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

.deck-filter-btn {
    padding: 8px 18px;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--muted);
    background: transparent;
    text-decoration: none;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.deck-filter-btn:hover {
    color: var(--navy);
    background: var(--sky);
}

.deck-filter-btn.active {
    background: var(--blue);
    color: #FFFFFF !important;
    box-shadow: 0 4px 12px rgba(21, 101, 192, 0.3);
}

/* Horizontal Vessel Deck Cards */
.deck-list {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.deck-card {
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    display: grid;
    grid-template-columns: 340px 1fr;
    transition: all 0.3s var(--ease);
    box-shadow: 0 3px 12px rgba(11, 37, 69, 0.04);
}

.deck-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 36px rgba(11, 37, 69, 0.12);
    border-color: #90CAF9;
}

.deck-card-media {
    position: relative;
    background: #0B2545;
    overflow: hidden;
}

.deck-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.deck-card:hover .deck-card-media img {
    transform: scale(1.08);
}

.deck-type-pill {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(11, 37, 69, 0.88);
    backdrop-filter: blur(6px);
    color: #90CAF9;
    font-size: 0.7rem;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.deck-status-pill {
    position: absolute;
    bottom: 14px;
    left: 14px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(6px);
    color: #065F46;
    font-size: 0.7rem;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.deck-status-pill .dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #10B981;
    animation: blink 1.5s infinite;
}

.deck-card-content {
    padding: 24px 28px;
    display: flex;
    flex-direction: column;
}

.deck-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.deck-vessel-name {
    font-family: 'Poppins', sans-serif;
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--navy);
    letter-spacing: -0.3px;
    line-height: 1.2;
}

.deck-imo-tag {
    font-size: 0.76rem;
    font-weight: 700;
    color: var(--muted);
    background: #F1F5F9;
    padding: 4px 10px;
    border-radius: 6px;
    border: 1px solid #E2E8F0;
}

.deck-specs-strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 16px;
}

.deck-spec-unit {
    display: flex;
    flex-direction: column;
}

.deck-spec-unit .lbl {
    font-size: 0.66rem;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 700;
    margin-bottom: 2px;
}

.deck-spec-unit .val {
    font-size: 0.88rem;
    font-weight: 800;
    color: var(--navy);
}

.deck-desc-text {
    font-size: 0.84rem;
    color: var(--muted);
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.deck-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 16px;
    border-top: 1px solid var(--border);
}

.deck-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--blue);
    color: #FFFFFF !important;
    font-size: 0.84rem;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(21, 101, 192, 0.25);
}

.deck-cta-btn:hover {
    background: var(--navy);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(11, 37, 69, 0.3);
}

@media (max-width: 992px) {
    .deck-card { grid-template-columns: 1fr; }
    .deck-card-media { height: 220px; }
    .deck-specs-strip { grid-template-columns: 1fr 1fr; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="deck-hero">
    <div class="container deck-container">
        <div class="deck-hero-badge"><i class="fa-solid fa-anchor"></i> {{ __t('Filo Operasyon Dizini', 'Fleet Operations Directory') }}</div>
        <h1>{{ __t('Acentelik Portföyümüz & Gemiler', 'Attended Fleet & Operations') }}</h1>
        <p>{{ __t('Türk Boğazları transit geçişleri ve Türkiye limanlarında 7/24 acenteliğini başarıyla üstlendiğimiz ticari filomuz.', 'Our attended commercial fleet with 24/7 shipping agency coverage across the Turkish Straits and all ports of Turkey.') }}</p>
    </div>
</div>

<section class="sec sec-alt" style="padding-top:0;">
    <div class="container deck-container">
        
        <!-- Filter Tabs Bar -->
        @if(isset($vesselTypes) && count($vesselTypes) > 0)
        <div class="deck-filter-bar">
            <a href="{{ route('vessels.index') }}" class="deck-filter-btn {{ !request('type') || request('type') == 'all' ? 'active' : '' }}">
                <i class="fa-solid fa-border-all"></i> {{ __t('Tüm Filo', 'All Fleet') }}
            </a>
            @foreach($vesselTypes as $type)
                <a href="{{ route('vessels.index', ['type' => $type]) }}" class="deck-filter-btn {{ request('type') == $type ? 'active' : '' }}">
                    <i class="fa-solid fa-ship"></i> {{ $type }}
                </a>
            @endforeach
        </div>
        @endif

        <!-- Horizontal Deck Cards List -->
        <div class="deck-list">
            @forelse($vessels as $index => $vessel)
            @php
                $vslImg = null;
                if (!empty($vessel->image)) {
                    $vslImg = asset(ltrim($vessel->image, '/'));
                } elseif (!empty($vessel->image_path)) {
                    $vslImg = Storage::url($vessel->image_path);
                } else {
                    $vslImg = asset($vesselFallbackImages[$index % count($vesselFallbackImages)]);
                }
            @endphp
            <div class="deck-card">
                <div class="deck-card-media">
                    <img src="{{ $vslImg }}" alt="{{ $vessel->name }}" loading="lazy">
                    <span class="deck-type-pill">{{ $vessel->vessel_type ?? $vessel->type ?? 'Gemi' }}</span>
                    <span class="deck-status-pill"><span class="dot"></span> {{ $vessel->status ?? __t('Aktif Operasyon', 'Active Operation') }}</span>
                </div>

                <div class="deck-card-content">
                    <div class="deck-card-header">
                        <div>
                            <h2 class="deck-vessel-name">{{ $vessel->name }}</h2>
                        </div>
                        <span class="deck-imo-tag"><i class="fa-solid fa-fingerprint" style="color:var(--blue);margin-right:4px;"></i> IMO {{ $vessel->imo_number ?? '9481234' }}</span>
                    </div>

                    <div class="deck-specs-strip">
                        <div class="deck-spec-unit">
                            <span class="lbl">{{ __t('Tonaj (GRT)', 'Gross Tonnage') }}</span>
                            <span class="val">{{ number_format($vessel->grt ?? 24500) }}</span>
                        </div>
                        <div class="deck-spec-unit">
                            <span class="lbl">{{ __t('Uzunluk (LOA)', 'Length Overall') }}</span>
                            <span class="val">{{ $vessel->loa ? $vessel->loa . ' m' : '185 m' }}</span>
                        </div>
                        <div class="deck-spec-unit">
                            <span class="lbl">{{ __t('Bayrak', 'Flag') }}</span>
                            <span class="val"><i class="fa-solid fa-flag" style="color:var(--blue);font-size:0.75rem;"></i> {{ $vessel->flag ?? 'Panama' }}</span>
                        </div>
                        <div class="deck-spec-unit">
                            <span class="lbl">{{ __t('Son Liman', 'Last Port') }}</span>
                            <span class="val"><i class="fa-solid fa-location-dot" style="color:var(--blue);font-size:0.75rem;"></i> {{ $vessel->last_port ?? 'Ambarlı' }}</span>
                        </div>
                    </div>

                    <p class="deck-desc-text">
                        @if($vessel->details)
                            {{ $vessel->details }}
                        @else
                            {{ __t('Türk Boğazları transit geçişi ve liman acenteliği operasyonu sıfır gecikme ile başarıyla tamamlandı.', 'Bosphorus & Dardanelles transit clearance and port agency attendance completed with zero delay.') }}
                        @endif
                    </p>

                    <div class="deck-card-footer">
                        <span style="font-size:0.78rem; color:var(--muted); font-weight:600;">
                            <i class="fa-solid fa-circle-check" style="color:#10B981; margin-right:5px;"></i> {{ __t('7/24 Operasyon Takibinde', '24/7 Duty Monitored') }}
                        </span>
                        <a href="{{ route('contact') }}" class="deck-cta-btn">
                            <i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }} <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align: center; padding: 60px 20px; color: var(--muted); background: white; border-radius: 16px; border: 1px solid var(--border);">
                <i class="fa-solid fa-ship" style="font-size: 2.5rem; margin-bottom: 14px; display: block; color: var(--blue); opacity: 0.4;"></i>
                <p>{{ __t('Kayıtlı gemi bulunamadı.', 'No registered vessels found.') }}</p>
            </div>
            @endforelse
        </div>

        @if(method_exists($vessels, 'links'))
        <div style="margin-top: 36px; display:flex; justify-content:center;">
            {{ $vessels->links() }}
        </div>
        @endif

    </div>
</section>

@endsection
