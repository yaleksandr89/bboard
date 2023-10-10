@extends('layouts.app')

@section('title', __('lk.restored') . ' "' . $deletedDb->title . '"')

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.restored') }} "{{ $deletedDb->title }}"</h1>
    <form action="{{ route('lk.restore', $deletedDb) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">
                {{ __('bbs.title') }}
            </label>
            <input name="title" id="txtTitle"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $deletedDb->title) }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">
                {{ __('bbs.content') }}
            </label>
            <textarea name="content" id="txtContent"
                      class="form-control @error('content') is-invalid @enderror"
                      rows="10">{{ old('content', $deletedDb->content) }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtPrice" class="form-label">
                {{ __('bbs.price') }}
            </label>
            <input name="price" id="txtPrice"
                   class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price', $deletedDb->price) }}">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <input type="submit" class="btn btn-warning" value="{{ __('lk.restored') }}">
            <a class="btn btn-secondary" href="{{ route('lk.index') }}">
                {{ __('lk.list') }}
            </a>
        </div>
    </form>
@endsection
