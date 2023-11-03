@extends('layouts.app')

@section('title', __('lk.my_ad'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title">
                <div class="position-relative">
                    <h2 class="title text-uppercase mb-4">{{ __('lk.welcome') }}, {{ Auth::user()->name }}!</h2>
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
        <p class="text-end">
            <a class="btn btn-outline-primary" href="{{ route('lk.create') }}">
                {{ __('lk.add_ad') }}
            </a>
        </p>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('lk.index') }}">Активные объявления</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-primary" href="{{ route('lk.trash_page') }}">Удаленные объявления</a>
            </li>
        </ul>
        <div class="tab-content">
            <div>
                @if ($trashedBbs->isNotEmpty())
                    <table class="table table-striped table-borderless">
                        <thead>
                        <tr class="text-center">
                            <th>{{ __('bbs.title') }}</th>
                            <th>{{ __('bbs.price') }}, {{ __('bbs.rub') }}.</th>
                            <th>{{ __('bbs.type') }}</th>
                            <th>{{ __('lk.created') }}</th>
                            <th>{{ __('lk.deleted') }}</th>
                            <th>{{ __('lk.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($trashedBbs as $trashedBb)
                            <tr>
                                <td>{{ $trashedBb->title }}</td>
                                <td>{{ $trashedBb->price }}</td>
                                <td>
                                    <x-type :obj="$trashedBb"/>
                                </td>
                                <td>{{ $trashedBb->created_at->locale('ru')->isoFormat('LLL') }}</td>
                                <td>{{ $trashedBb->deleted_at->locale('ru')->isoFormat('LLL') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a class="btn btn-sm btn-warning" href="{{ route('lk.trash', $trashedBb) }}">
                                            {{ __('lk.restored') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $trashedBbs->links('vendor.pagination.bootstrap-5-customize') }}
                @else
                    <div class="alert alert-secondary mt-3" role="alert">
                        {{ __('bbs.no_ads') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
