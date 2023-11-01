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
        <!-- Горизонтальные табы -->
        <ul class="nav nav-tabs" id="lkTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                    class="nav-link active"
                    id="list-bbs-tab"
                    data-bs-toggle="tab"
                    href="#list-bbs"
                    role="tab"
                    aria-controls="list-bbs"
                    aria-selected="true"
                >
                    Активные объявления
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a
                    class="nav-link text-black-50"
                    id="deleted-bbs-tab"
                    data-bs-toggle="tab"
                    href="#deleted-bbs"
                    role="tab"
                    aria-controls="deleted-bbs"
                    aria-selected="false"
                >
                    Удаленные объявления
                </a>
            </li>
        </ul>
        <!-- Содержимое табов -->
        <div class="tab-content" id="lkTabsContent">
            <!-- Таб 1: Список объявлений -->
            <div class="tab-pane fade show active" id="list-bbs" role="tabpanel" aria-labelledby="list-bbs-tab">
                @if ($bbs->isNotEmpty())
                    <table class="table table-striped table-borderless">
                        <thead>
                        <tr class="text-center">
                            <th>{{ __('bbs.title') }}</th>
                            <th>{{ __('bbs.price') }}, {{ __('bbs.rub') }}.</th>
                            <th>{{ __('bbs.type') }}</th>
                            <th>{{ __('lk.created') }}</th>
                            <th>{{ __('lk.updated') }}</th>
                            <th>{{ __('lk.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bbs as $bb)
                            <tr>
                                <td>
                                    <a class="nav-link" href="{{ route('lk.edit', $bb) }}">
                                        {{ $bb->title }}
                                    </a>
                                </td>
                                <td>{{ $bb->price }}</td>
                                <td>
                                    <x-type :obj="$bb"/>
                                </td>
                                <td>{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</td>
                                <td>{{ $bb->updated_at->locale('ru')->isoFormat('LLL') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a class="btn btn-sm btn-dark" href="{{ route('bbs.detail', $bb) }}">
                                            {{ __('lk.show') }}
                                        </a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('lk.edit', $bb) }}">
                                            {{ __('lk.change') }}
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('lk.delete', $bb) }}">
                                            {{ __('lk.delete') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $bbs->links('vendor.pagination.bootstrap-5-customize') }}
                @else
                    <div class="alert alert-secondary mt-3" role="alert">
                        {{ __('bbs.no_ads') }}
                    </div>
                @endif
            </div>
            <!-- Таб 2: Список удаленных объявлений -->
            <div class="tab-pane fade" id="deleted-bbs" role="tabpanel" aria-labelledby="deleted-bbs-tab">
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
