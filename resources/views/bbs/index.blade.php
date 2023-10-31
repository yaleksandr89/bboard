@extends('layouts.app')

@php
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\Bb;
    /** @var Collection|Bb[] $bbs */
@endphp

@section('title', __('bbs.ads'))

@section('content')
    <div class="container">
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
                        Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="blog-post rounded shadow">
                    <img src="images/blog/01.jpg" class="img-fluid rounded-top" alt="">
                    <div class="content pt-4 pb-4 p-3">
                        <ul class="list-unstyled d-flex justify-content-between post-meta">
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm me-1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><a href="javascript:void(0)" class="text-dark">Cristino</a></li>
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag fea icon-sm me-1"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg><a href="javascript:void(0)" class="text-dark">Branding</a></li>
                        </ul>
                        <h5 class="mb-3"><a href="page-blog-detail.html" class="title text-dark">Our Home Entertainment has Evolved Significantly</a></h5>
                        <ul class="list-unstyled mb-0 pt-3 border-top d-flex justify-content-between">
                            <li><a href="javascript:void(0)" class="text-dark">Read More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right fea icon-sm"><polyline points="9 18 15 12 9 6"></polyline></svg></a></li>
                            <li><i class="mdi mdi-calendar-edit me-1"></i>10th April, 2020</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <h1 class="my-3 text-center">--}}
{{--        {{ __('bbs.ads') }}--}}
{{--    </h1>--}}
    @if ($bbs->isNotEmpty())
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>{{ __('bbs.title') }}</th>
                <th>{{ __('bbs.price') }}, {{ __('bbs.rub') }}.</th>
                <th>{{ __('bbs.type') }}</th>
                <th>{{ __('bbs.author') }}</th>
                <th>{{ __('lk.created') }}</th>
                <th>{{ __('lk.updated') }}</th>
                <th>{{ __('lk.actions') }}</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bbs as $bb)
                <tr>
                    <td><h4>{{ $bb->title }}</h4></td>
                    <td>{{ $bb->price }}</td>
                    <td><x-type :obj="$bb" /></td>
                    <td>{{ $bb->user->name }}</td>
                    <td>{{ $bb->created_at->locale('ru')->isoFormat('LL') }}</td>
                    <td>{{ $bb->updated_at->locale('ru')->isoFormat('LL') }}</td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="{{ route('bbs.detail', $bb) }}">{{ __('bbs.more') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $bbs->links('vendor.pagination.bootstrap-5-customize') }}
    @else
        <div class="alert alert-primary" role="alert">
            {{ __('bbs.no_ads') }}
        </div>
    @endif
@endsection
