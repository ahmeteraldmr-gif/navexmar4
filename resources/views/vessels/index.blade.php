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
.vsl-hero-wrap {
    max-width: 1140px;
    margin: 0 auto;
}

.vsl-filter-bar {
    display: flex;
    gap: 8px;
    margin-bottom: 28px;
    flex-wrap: wrap;
    justify-content: center;
}

.vsl-tab {
    padding: 8px 18px;
    border-radius: 99px;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--muted);
    background: var(--white);
    border: 1px solid var(--border);
    transition: all 0.2s ease;
    text-decoration: none;
}

.vsl-tab:hover {
    color: var(--navy);
    border-color: var(--blue);
    background: var(--sky);
}

.vsl-tab.active {
    background: var(--navy);
    color: #FFFFFF !important;
    border-color: var(--navy);
    box-shadow: 0 2px 8px rgba(11, 37, 69, 0.2);
}

.vsl-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 22px;
}

.vsl-card {
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease);
}

.vsl-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(11, 37, 69, 0.12);
    border-color: #BBDEFB;
}

.vsl-img-wrap {
    position: relative;
    width: 100%;
    height: 180px;
    overflow: hidden;
    background: #0B2545;
}

.vsl-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.vsl-card:hover .vsl-img-wrap img {
    transform: scale(1.05);
}

.vsl-badge-type {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(11, 37, 69, 0.82);
    backdrop-filter: blur(4px);
    color: #90CAF9;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(255, 255, 255, 0.15);
}

.vsl-badge-status {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(4px);
    color: var(--navy);
    font-size: 0.7rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 5px;
}

.vsl-badge-status .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #10B981;
}

.vsl-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.vsl-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 2px;
    letter-spacing: -0.2px;
}

.vsl-imo {
    font-size: 0.76rem;
    color: var(--muted);
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.vsl-specs-table {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    background: #F8FAFC;
    border: 1px solid #E2E8F0;
    padding: 10px 12px;
    border-radius: 8px;
    margin-bottom: 14px;
}

.vsl-spec-item {
    display: flex;
    flex-direction: column;
}

.vsl-spec-item .lbl {
    font-size: 0.68rem;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.4px;
    font-weight: 600;
}

.vsl-spec-item .val {
    font-size: 0.83rem;
    font-weight: 700;
    color: var(--navy);
}

.vsl-details {
    font-size: 0.8rem;
    color: var(--muted);
    line-height: 1.55;
    margin-bottom: 16px;
    flex: 1;
}

.vsl-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid var(--border);
    margin-top: auto;
}

.vsl-action-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--sky);
    color: var(--blue);
    font-size: 0.8rem;
    font-weight: 700;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s ease;
}

.vsl-action-btn:hover {
    background: var(--blue);
    color: #FFFFFF !important;
}

@media (max-width: 768px) {
    .vsl-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

@section('content')

<div class="page-hero">
    <div class="container vsl-hero-wrap">
        <div class="page-hero-badge"><i class="fa-solid fa-ship"></i> {{ __t('Acentelik Portföyü', 'Agency Portfolio') }}</div>
        <h1>{{ __t('Hizmet Verilen Gemiler & Filomuz', 'Attended Vessels & Fleet') }}</h1>
        <p>{{ __t('Türk Boğazları ve Türkiye limanlarında acenteliğini başarıyla yürüttüğümüz ticari gemiler ve deniz operasyonları.', 'Commercial vessels and maritime operations successfully attended in Turkish Straits and all ports of Turkey.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container vsl-hero-wrap">
        
        <!-- Filter Tabs -->
        @if(isset($vesselTypes) && count($vesselTypes) > 0)
        <div class="vsl-filter-bar">
            <a href="{{ route('vessels.index') }}" class="vsl-tab {{ !request('type') || request('type') == 'all' ? 'active' : '' }}">{{ __t('Tümü', 'All') }}</a>
            @foreach($vesselTypes as $type)
                <a href="{{ route('vessels.index', ['type' => $type]) }}" class="vsl-tab {{ request('type') == $type ? 'active' : '' }}">{{ $type }}</a>
            @endforeach
        </div>
        @endif

        <div class="vsl-grid">
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
            <div class="vsl-card">
                <div class="vsl-img-wrap">
                    <img src="{{ $vslImg }}" alt="{{ $vessel->name }}" loading="lazy">
                    <span class="vsl-badge-type">{{ $vessel->vessel_type ?? $vessel->type ?? 'Commercial Vessel' }}</span>
                    <span class="vsl-badge-status"><span class="dot"></span> {{ $vessel->status ?? 'Active' }}</span>
                </div>
                <div class="vsl-card-body">
                    <div class="vsl-title">{{ $vessel->name }}</div>
                    <div class="vsl-imo">
                        <i class="fa-solid fa-fingerprint" style="color: var(--blue);"></i> IMO: {{ $vessel->imo_number ?? '9481234' }}
                    </div>

                    <div class="vsl-specs-table">
                        <div class="vsl-spec-item">
                            <span class="lbl">{{ __t('Tonaj (GRT)', 'Gross Tonnage') }}</span>
                            <span class="val">{{ number_format($vessel->grt ?? 24500) }}</span>
                        </div>
                        <div class="vsl-spec-item">
                            <span class="lbl">{{ __t('Uzunluk (LOA)', 'Length (LOA)') }}</span>
                            <span class="val">{{ $vessel->loa ? $vessel->loa . ' m' : '185 m' }}</span>
                        </div>
                        <div class="vsl-spec-item" style="grid-column: span 2;">
                            <span class="lbl">{{ __t('Son Operasyon Limanı', 'Last Operation Port') }}</span>
                            <span class="val"><i class="fa-solid fa-location-dot" style="color: var(--blue); font-size:0.75rem; margin-right:3px;"></i> {{ $vessel->last_port ?? 'Ambarlı Container Terminal' }}</span>
                        </div>
                    </div>

                    @if($vessel->details)
                        <div class="vsl-details">{{ Str::limit($vessel->details, 85) }}</div>
                    @else
                        <div class="vsl-details">{{ __t('Türk Boğazları transit geçiş ve liman acenteliği hizmeti sağlandı.', 'Provided Bosphorus transit clearance and port agency attendance.') }}</div>
                    @endif

                    <div class="vsl-footer">
                        <span style="font-size:0.74rem; color:var(--muted); font-weight:600;"><i class="fa-solid fa-circle-check" style="color:#10B981; margin-right:4px;"></i> {{ __t('Acentelik Tamamlandı', 'Agency Handled') }}</span>
                        <a href="{{ route('contact') }}" class="vsl-action-btn">
                            {{ __t('Teklif Al', 'Request Quote') }} <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1; text-align:center; padding:60px 20px; color:var(--muted);">
                <i class="fa-solid fa-ship" style="font-size:2.5rem; margin-bottom:14px; display:block; color:var(--blue); opacity:0.4;"></i>
                <p>{{ __t('Kayıtlı gemi bulunamadı.', 'No vessels found.') }}</p>
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
