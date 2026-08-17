@extends('layouts.app')

@section('title', 'Haberler & Denizcilik Duyuruları | NAVEXMAR')

@php
$newsFallbackImages = [
    'images/news_rules.jpg',
    'images/news_limits.jpg',
    'images/news_green.jpg',
];
@endphp

@section('styles')
<style>
.news-hero-wrap {
    max-width: 1140px;
    margin: 0 auto;
}

.news-grid-layout {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
}

.nws-card {
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 12px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease), border-color 0.25s ease;
}

.nws-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(11, 37, 69, 0.12);
    border-color: #BBDEFB;
}

.nws-img-wrap {
    position: relative;
    width: 100%;
    height: 190px;
    overflow: hidden;
    background: #0B2545;
}

.nws-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.nws-card:hover .nws-img-wrap img {
    transform: scale(1.06);
}

.nws-badge-cat {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(11, 37, 69, 0.85);
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

.nws-badge-date {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(4px);
    color: var(--navy);
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 5px;
}

.nws-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.nws-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.02rem;
    font-weight: 700;
    color: var(--navy);
    line-height: 1.38;
    margin-bottom: 10px;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.2s ease;
}

.nws-title:hover {
    color: var(--blue);
}

.nws-excerpt {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.6;
    margin-bottom: 18px;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.nws-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid var(--border);
    margin-top: auto;
}

.nws-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--blue);
    font-size: 0.82rem;
    font-weight: 700;
    text-decoration: none;
    transition: gap 0.2s ease, color 0.2s ease;
}

.nws-read-more:hover {
    gap: 10px;
    color: var(--navy);
}

@media (max-width: 768px) {
    .news-grid-layout {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

@section('content')

<div class="page-hero">
    <div class="container news-hero-wrap">
        <div class="page-hero-badge"><i class="fa-solid fa-newspaper"></i> {{ __t('Sirkülerler & Duyurular', 'Circulars & Bulletins') }}</div>
        <h1>{{ __t('Denizcilik Haberleri & Liman Sirkülerleri', 'Maritime News & Port Circulars') }}</h1>
        <p>{{ __t('Türk Boğazları mevzuat güncellemeleri, liman başkanlığı duyuruları ve denizcilik sektör haberleri.', 'Turkish Straits regulation updates, port authority circulars, and maritime industry news.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container news-hero-wrap">
        <div class="news-grid-layout">
            @forelse($newsList as $index => $item)
            @php
                $nImg = null;
                if (!empty($item->image)) {
                    $nImg = asset(ltrim($item->image, '/'));
                } elseif (!empty($item->image_path)) {
                    $nImg = Storage::url($item->image_path);
                } else {
                    $nImg = asset($newsFallbackImages[$index % count($newsFallbackImages)]);
                }
            @endphp
            <div class="nws-card">
                <div class="nws-img-wrap">
                    <img src="{{ $nImg }}" alt="{{ $item->title }}" loading="lazy">
                    <span class="nws-badge-cat">{{ $item->category ?? __t('Mevzuat & Duyuru', 'Regulation') }}</span>
                    <span class="nws-badge-date">
                        <i class="fa-regular fa-calendar" style="color: var(--blue);"></i> {{ $item->created_at->format('d M Y') }}
                    </span>
                </div>
                <div class="nws-card-body">
                    <a href="{{ route('news.show', $item->slug) }}" class="nws-title">{{ $item->title }}</a>
                    <p class="nws-excerpt">{{ Str::limit($item->short_description ?? $item->summary ?? strip_tags($item->content), 120) }}</p>
                    <div class="nws-footer">
                        <span style="font-size:0.75rem; color:var(--muted); font-weight:600;"><i class="fa-solid fa-building-columns" style="color:var(--blue); margin-right:4px;"></i> NAVEXMAR Press</span>
                        <a href="{{ route('news.show', $item->slug) }}" class="nws-read-more">
                            {{ __t('Devamını Oku', 'Read Article') }} <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px; color: var(--muted);">
                <i class="fa-solid fa-newspaper" style="font-size: 2.5rem; margin-bottom: 14px; display: block; color: var(--blue); opacity: 0.4;"></i>
                <p>{{ __t('Kayıtlı duyuru bulunamadı.', 'No announcements found.') }}</p>
            </div>
            @endforelse
        </div>

        @if(method_exists($newsList, 'links'))
        <div style="margin-top: 36px; display:flex; justify-content:center;">
            {{ $newsList->links() }}
        </div>
        @endif
    </div>
</section>

@endsection
