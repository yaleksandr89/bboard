@extends('layouts.app')

@php
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\Bb;
    /** @var Collection|Bb[] $bbs */
@endphp

@section('title', __('bbs.ads'))

@section('content')
    @if ($bbs->isNotEmpty())
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <div class="position-relative">
                        <h1 class="title text-uppercase mb-4">{{ __('bbs.ads') }}</h1>
                        <div>
                            <div class="title-box"></div>
                            <div class="title-line"></div>
                        </div>
                    </div>
                    <p class="text-muted mx-auto para-desc mt-5 mb-0">
                        Наши сокровища — ваша новая находка! Переходите в мир уникальных сделок и сделайте свой дом ярче без лишних затрат. Ваша барахолка для сокровищ находится здесь.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($bbs as $bb)
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="blog-post rounded shadow">
                        <x-type :obj="$bb" />
                        {{-- TODO: ХЗ нужно будет или нет, на всякий случай оставлю :) --}}
                        {{-- <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded-top" alt=""> --}}
                        <div class="content pt-4 pb-4 p-3">
                            <h5 class="mb-3">
                                <a href="{{ route('bbs.detail', $bb) }}" class="title text-dark">
                                    {{ $bb->title }}
                                </a>
                            </h5>
                            <p>
                                {{Str::limit($bb->content)}}
                            </p>
                            <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z"></path>
                                        <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4"></path>
                                        <path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z"></path>
                                        <path d="M3 6v10c0 .888 .772 1.45 2 2"></path>
                                        <path d="M3 11c0 .888 .772 1.45 2 2"></path>
                                    </svg>
                                    <strong>{{ $bb->price }}</strong>
                                </li>
                            </ul>
                            <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4h6v6h-6z"></path>
                                        <path d="M14 4h6v6h-6z"></path>
                                        <path d="M4 14h6v6h-6z"></path>
                                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    </svg>
                                    ...Вставить категорию...
                                </li>
                            </ul>
                            <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tags" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592 -3.592a2.41 2.41 0 0 0 0 -3.408l-5.71 -5.71a2 2 0 0 0 -1.414 -.586h-4.172a2 2 0 0 0 -2 2z"></path>
                                        <path d="M18 19l1.592 -1.592a4.82 4.82 0 0 0 0 -6.816l-4.592 -4.592"></path>
                                        <path d="M7 10h-.01"></path>
                                    </svg>
                                    ...Вставить теги...
                                </li>
                            </ul>
                            <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                                <li></li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h16"></path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    </svg>
                                    {{ $bb->created_at->locale('ru')->isoFormat('LL') }}
                                </li>
                            </ul>
                            <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                                <li></li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                    {{ $bb->user->name }}
                                </li>
                            </ul>
                            <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                                <li></li>
                                <li>
                                    <a href="{{ route('bbs.detail', $bb) }}" class="text-dark">
                                        {{ __('bbs.more') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right fea icon-sm"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            {{ $bbs->links('vendor.pagination.bootstrap-5-customize') }}
        </div>
    @else
        <div class="alert alert-primary" role="alert">
            {{ __('bbs.no_ads') }}
        </div>
    @endif
@endsection
