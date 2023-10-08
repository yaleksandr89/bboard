@extends('layouts.app')

@section('title', __('lk.creating_ad'))

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.creating_ad') }}</h1>
    <form action="{{ route('lk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">
                {{ __('bbs.title') }}
            </label>
            <input name="title" id="txtTitle"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
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
                      rows="10">{{ old('content') }}</textarea>
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
                   value="{{ old('price') }}">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-secondary" value="{{ __('lk.add_ad') }}">
    </form>
@endsection
