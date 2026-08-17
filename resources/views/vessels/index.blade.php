@extends('layouts.app')

@section('title', 'Filomuz & Operasyonlar | NAVEXMAR')

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
/* ─── FLEET PAGE SPECIFIC STYLES ─── */
.fleet-hero-container {
    max-width: 1200px;
    margin: 0 auto;
}

.fleet-stat-bar {
    background: #0B2545;
    border-radius: 14px;
    padding: 24px 32px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-top: -30px;
    margin-bottom: 36px;
    box-shadow: 0 10px 30px rgba(11, 37, 69, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.1);
    flex-wrap: wrap;
}

.fleet-stat-item {
    display: flex;
    align-items: center;
    gap: 14px;
}

.fleet-stat-icon {
    width: 44px; height: 44px;
    background: rgba(255, 255, 255, 0.12);
    border-radius: 10px;
    display: grid; place-items: center;
    color: #90CAF9;
    font-size: 1.2rem;
}

.fleet-stat-val {
    font-family: 'Poppins', sans-serif;
    font-size: 1.35rem;
    font-weight: 700;
    line-height: 1;
    color: #FFFFFF;
}

.fleet-stat-lbl {
    font-size: 0.76rem;
    color: rgba(255, 255, 255, 0.65);
    margin-top: 3px;
}

/* Filter Navigation */
.fleet-nav-wrapper {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 36px;
    flex-wrap: wrap;
}

.fleet-pill-tab {
    padding: 9px 20px;
    border-radius: 99px;
    font-size: 0.84rem;
    font-weight: 600;
    color: var(--muted);
    background: var(--white);
    border: 1px solid var(--border);
    text-decoration: none;
    transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.fleet-pill-tab:hover {
    color: var(--navy);
    border-color: var(--blue);
    background: var(--sky);
    transform: translateY(-1px);
}

.fleet-pill-tab.active {
    background: var(--blue);
    color: #FFFFFF !important;
    border-color: var(--blue);
    box-shadow: 0 4px 14px rgba(21, 101, 192, 0.3);
}

.fleet-pill-tab i { font-size: 0.85rem; }

/* Modern Fleet Grid Layout */
.fleet-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 28px;
}

.flt-card {
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.05);
}

.flt-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 36px rgba(11, 37, 69, 0.14);
    border-color: #90CAF9;
}

.flt-header {
    padding: 16px 20px;
    background: #F8FAFC;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.flt-type-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.74rem;
    font-weight: 700;
    color: var(--navy);
    background: var(--sky);
    padding: 4px 12px;
    border-radius: 99px;
    border: 1px solid #BBDEFB;
}

.flt-status-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.72rem;
    font-weight: 700;
    color: #065F46;
    background: #ECFDF5;
    padding: 4px 12px;
    border-radius: 99px;
    border: 1px solid #A7F3D0;
}

.flt-status-tag .live-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #10B981;
    animation: blink 1.5s infinite;
}

.flt-image-container {
    position: relative;
    width: 100%;
    height: 210px;
    background: #0F172A;
    overflow: hidden;
}

.flt-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.flt-card:hover .flt-image-container img {
    transform: scale(1.07);
}

.flt-imo-badge {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: rgba(11, 37, 69, 0.88);
    backdrop-filter: blur(6px);
    color: #FFFFFF;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 6px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    gap: 6px;
}

.flt-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.flt-name {
    font-family: 'Poppins', sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 14px;
    letter-spacing: -0.3px;
}

.flt-specs-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 18px;
    background: #F8FAFC;
    padding: 14px;
    border-radius: 10px;
    border: 1px solid #E2E8F0;
}

.flt-spec-box {
    display: flex;
    align-items: flex-start;
    gap: 8px;
}

.flt-spec-box i {
    color: var(--blue);
    font-size: 0.85rem;
    margin-top: 3px;
}

.flt-spec-box .lbl {
    font-size: 0.68rem;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.4px;
    font-weight: 700;
    display: block;
}

.flt-spec-box .val {
    font-size: 0.84rem;
    font-weight: 700;
    color: var(--navy);
    line-height: 1.2;
}

.flt-desc {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.6;
    margin-bottom: 18px;
    flex: 1;
}

.flt-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid var(--border);
    margin-top: auto;
}

.flt-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--blue);
    color: #FFFFFF !important;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 8px;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.15s ease;
    box-shadow: 0 2px 8px rgba(21, 101, 192, 0.25);
}

.flt-btn:hover {
    background: var(--navy);
    transform: translateY(-1px);
}

@media (max-width: 900px) {
    .fleet-cards-grid { grid-template-columns: 1fr; }
    .fleet-stat-bar { flex-direction: column; align-items: flex-start; }
}
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<div class="page-hero">
    <div class="container fleet-hero-container">
        <div class="page-hero-badge"><i class="fa-solid fa-ship"></i> {{ __t('Acentelik Portföyü', 'Agency Portfolio') }}</div>
        <h1>{{ __t('Hizmet Verilen Gemiler & Filomuz', 'Attended Vessels & Fleet') }}</h1>
        <p>{{ __t('Türk Boğazları ve Türkiye limanlarında acenteliğini başarıyla yürüttüğümüz ticari gemiler ve deniz operasyonları.', 'Commercial vessels and maritime operations successfully attended in Turkish Straits and all ports of Turkey.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container fleet-hero-container">
        
        <!-- Live Fleet Statistics Bar -->
        <div class="fleet-stat-bar">
            <div class="fleet-stat-item">
                <div class="fleet-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <div>
                    <div class="fleet-stat-val">18+ {{ __t('Yıl', 'Years') }}</div>
                    <div class="fleet-stat-lbl">{{ __t('Acentelik Tecrübesi', 'Agency Experience') }}</div>
                </div>
            </div>
            <div class="fleet-stat-item">
                <div class="fleet-stat-icon"><i class="fa-solid fa-ship"></i></div>
                <div>
                    <div class="fleet-stat-val">4.000+</div>
                    <div class="fleet-stat-lbl">{{ __t('Yıllık Gemi Uğrağı', 'Annual Vessel Calls') }}</div>
                </div>
            </div>
            <div class="fleet-stat-item">
                <div class="fleet-stat-icon"><i class="fa-solid fa-compass"></i></div>
                <div>
                    <div class="fleet-stat-val">9 {{ __t('Liman', 'Ports') }}</div>
                    <div class="fleet-stat-lbl">{{ __t('Operasyon Kapsamı', 'Operational Coverage') }}</div>
                </div>
            </div>
            <div class="fleet-stat-item">
                <div class="fleet-stat-icon"><i class="fa-solid fa-tower-broadcast"></i></div>
                <div>
                    <div class="fleet-stat-val">7/24</div>
                    <div class="fleet-stat-lbl">{{ __t('Canlı Operasyon Hattı', 'Live Operations Desk') }}</div>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        @if(isset($vesselTypes) && count($vesselTypes) > 0)
        <div class="fleet-nav-wrapper">
            <a href="{{ route('vessels.index') }}" class="fleet-pill-tab {{ !request('type') || request('type') == 'all' ? 'active' : '' }}">
                <i class="fa-solid fa-list-check"></i> {{ __t('Tüm Gemiler', 'All Vessels') }}
            </a>
            @foreach($vesselTypes as $type)
                <a href="{{ route('vessels.index', ['type' => $type]) }}" class="fleet-pill-tab {{ request('type') == $type ? 'active' : '' }}">
                    <i class="fa-solid fa-anchor"></i> {{ $type }}
                </a>
            @endforeach
        </div>
        @endif

        <!-- Fleet Grid -->
        <div class="fleet-cards-grid">
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
            <div class="flt-card">
                <div class="flt-header">
                    <span class="flt-type-tag"><i class="fa-solid fa-anchor"></i> {{ $vessel->vessel_type ?? $vessel->type ?? 'Gemi' }}</span>
                    <span class="flt-status-tag"><span class="live-dot"></span> {{ $vessel->status ?? __t('Tamamlandı', 'Handled') }}</span>
                </div>
                
                <div class="flt-image-container">
                    <img src="{{ $vslImg }}" alt="{{ $vessel->name }}" loading="lazy">
                    <div class="flt-imo-badge">
                        <i class="fa-solid fa-fingerprint" style="color: #90CAF9;"></i> IMO: {{ $vessel->imo_number ?? '9481234' }}
                    </div>
                </div>

                <div class="flt-body">
                    <h3 class="flt-name">{{ $vessel->name }}</h3>

                    <div class="flt-specs-grid">
                        <div class="flt-spec-box">
                            <i class="fa-solid fa-weight-hanging"></i>
                            <div>
                                <span class="lbl">{{ __t('Tonaj (GRT)', 'Gross Tonnage') }}</span>
                                <span class="val">{{ number_format($vessel->grt ?? 24500) }}</span>
                            </div>
                        </div>
                        <div class="flt-spec-box">
                            <i class="fa-solid fa-ruler-combined"></i>
                            <div>
                                <span class="lbl">{{ __t('Uzunluk (LOA)', 'Length (LOA)') }}</span>
                                <span class="val">{{ $vessel->loa ? $vessel->loa . ' m' : '185 m' }}</span>
                            </div>
                        </div>
                        <div class="flt-spec-box">
                            <i class="fa-solid fa-flag"></i>
                            <div>
                                <span class="lbl">{{ __t('Bayrak', 'Flag') }}</span>
                                <span class="val">{{ $vessel->flag ?? 'Panama' }}</span>
                            </div>
                        </div>
                        <div class="flt-spec-box">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <span class="lbl">{{ __t('Son Liman', 'Last Port') }}</span>
                                <span class="val">{{ $vessel->last_port ?? 'Ambarlı' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flt-desc">
                        @if($vessel->details)
                            {{ Str::limit($vessel->details, 95) }}
                        @else
                            {{ __t('Türk Boğazları transit geçişi ve liman acenteliği operasyonu başarıyla tamamlandı.', 'Bosphorus transit clearance and port agency attendance completed successfully.') }}
                        @endif
                    </div>

                    <div class="flt-footer">
                        <span style="font-size:0.75rem; color:var(--muted); font-weight:600;">
                            <i class="fa-solid fa-circle-check" style="color:#10B981; margin-right:4px;"></i> {{ __t('Acentelik Hizmeti Verildi', 'Agency Service Attended') }}
                        </span>
                        <a href="{{ route('contact') }}" class="flt-btn">
                            <i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px; color: var(--muted);">
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
