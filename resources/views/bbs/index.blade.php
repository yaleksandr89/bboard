@extends('layouts.app')

@php
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\Bb;
    /** @var Collection|Bb[] $bbs */
@endphp

@section('title', __('bbs.ads'))

@section('content')
    <h1 class="my-3 text-center">
        {{ __('bbs.ads') }}
    </h1>
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
