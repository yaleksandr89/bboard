@extends('layouts.app')

@php
    use App\Models\Bb;
    /** @var Bb $bb */
@endphp

@section('title',  )

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
                    {{ $bb->price }} руб.
                </code>
            </p>

            <a href="{{ route('bbs.index') }}" class="btn btn-sm btn-secondary">На перечень объявлений</a>
        </div>
        <div class="card-footer text-muted">
            <span class="card-text">{{ $bb->user->name }}</span>
            /
            <span class="card-text">{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</span>
        </div>
    </div>
@endsection
