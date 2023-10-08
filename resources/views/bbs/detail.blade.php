@extends('layouts.app')

@php
    use App\Models\Bb;
    /** @var Bb $bb */
@endphp

@section('title', $bb->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="my-3 text-center">{{ $bb->title }}</h1>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ $bb->content }}
            </p>
            <p class="card-text">
                <code>
                    {{ $bb->price }} {{ __('bbs.rub') }}.
                </code>
            </p>

            <a href="{{ route('bbs.index') }}" class="btn btn-sm btn-secondary">
                {{ __('bbs.list_ads') }}
            </a>
        </div>
        <div class="card-footer text-muted">
            <p class="card-text">
                <span class="card-text">{{ $bb->user->name }}</span>
                /
                <span class="card-text">{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</span>

            @if (Gate::allows('update', $bb) || Gate::allows('destroy', $bb))
                <p class="card-text">
                    @can('update', $bb)
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('lk.edit', $bb) }}">{{ __('lk.change') }}</a>
                    @endcan
                    @can('destroy', $bb)
                        <a class="btn btn-sm btn-outline-danger" href="{{ route('lk.delete', $bb) }}">{{ __('lk.delete') }}</a>
                    @endcan
                </p>
            @endif
        </div>
    </div>
@endsection
