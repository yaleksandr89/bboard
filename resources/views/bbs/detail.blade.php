@extends('layouts.app')

@php
    use App\Models\Bb;
    /** @var Bb $bb */
@endphp

@section('title', $bb->title)

@section('content')
    <div class="row">
        <section class="bg-half d-table w-100" style="background: url('/images/bg-pages.jpg')center center;">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h1 class="title">{{ ucfirst($bb->title) }}</h1>
                            <ul class="list-unstyled mt-3">
                                <li class="list-inline-item me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                    <span class="text-muted">{{ $bb->user->name }}</span>
                                </li>
                                <li class="list-inline-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-due mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h16"></path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    </svg>
                                    <span class="text-muted">{{ $bb->created_at->locale('ru')->isoFormat('LL') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="blog position-relative overflow-hidden shadow rounded">
                <div class="content p-4">
                    <h6 class="font-weight-normal">
                        <x-type :obj="$bb"/>
                    </h6>
                    <p class="text-muted mt-3">{{ $bb->content }}</p>
                    <div class="post-meta mt-3">
                        <ul class="list-unstyled pt-3 border-top d-flex justify-content-between">
                            <li></li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coins mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v6h-6z"></path>
                                    <path d="M14 4h6v6h-6z"></path>
                                    <path d="M4 14h6v6h-6z"></path>
                                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                </svg>
                                ...Вставить категорию...
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tags mb-1" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592 -3.592a2.41 2.41 0 0 0 0 -3.408l-5.71 -5.71a2 2 0 0 0 -1.414 -.586h-4.172a2 2 0 0 0 -2 2z"></path>
                                    <path d="M18 19l1.592 -1.592a4.82 4.82 0 0 0 0 -6.816l-4.592 -4.592"></path>
                                    <path d="M7 10h-.01"></path>
                                </svg>
                                ...Вставить теги...
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <a href="{{ route('bbs.index') }}" class="btn btn-primary rounded">
                            {{ __('bbs.list_ads') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Gate::allows('update', $bb) || Gate::allows('destroy', $bb))
        <div class="row mt-3">
            <div class="col-12 mt-6 d-flex justify-content-evenly">
                <div class="blog position-relative overflow-hidden shadow rounded">
                    <div class="content p-4">
                        <h6>Блок управления</h6>
                        <p class="card-text">
                            @can('update', $bb)
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('lk.edit', $bb) }}">{{ __('lk.change') }}</a>
                            @endcan
                            @can('destroy', $bb)
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('lk.delete', $bb) }}">{{ __('lk.delete') }}</a>
                            @endcan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
