@extends('layouts.app')

@section('title', __('lk.my_ad'))

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.welcome') }}, {{ Auth::user()->name }}!</h1>
    <p class="text-end">
        <a class="btn btn-outline-secondary" href="{{ route('lk.create') }}">
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
                    <tr>
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
                            <td><h3>{{ $bb->title }}</h3></td>
                            <td>{{ $bb->price }}</td>
                            <td><x-type :obj="$bb" /></td>
                            <td>{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</td>
                            <td>{{ $bb->updated_at->locale('ru')->isoFormat('LLL') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
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
                    <tr>
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
                            <td><h3>{{ $trashedBb->title }}</h3></td>
                            <td>{{ $trashedBb->price }}</td>
                            <td><x-type :obj="$trashedBb" /></td>
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
@endsection
