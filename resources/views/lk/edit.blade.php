@php
    use App\Enums\Bb\TypeEnum;
@endphp

@extends('layouts.app')

@section('title', __('lk.edit') . ' "' . $bb->title . '"')

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.edit') }} "{{ $bb->title }}"</h1>
    <form action="{{ route('lk.update', $bb) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="txtTitle" class="form-label">
                {{ __('bbs.title') }}
            </label>
            <input name="title" id="txtTitle"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $bb->title) }}">
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
                      rows="10">{{ old('content', $bb->content) }}</textarea>
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
                   value="{{ old('price', $bb->price) }}">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtType" class="form-label">
                {{ __('bbs.type') }}
            </label>
            <select name="type" id="txtType" class="form-control">
                <option value="" disabled selected>---</option>
                @foreach (TypeEnum::cases() as $type)
                    <option
                        value="{{ $type->value }}"
                        {{ null !== $bb->type && $type === $bb->type ? 'selected' : '' }}
                    >
                        {{ __($type->text()) }}
                    </option>
                @endforeach
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <input type="submit" class="btn btn-success" value="{{ __('lk.save') }}">
            <a class="btn btn-danger" href="{{ route('lk.delete', $bb) }}">
                {{ __('lk.delete') }}
            </a>
            <a class="btn btn-secondary" href="{{ route('lk.index') }}">
                {{ __('lk.list') }}
            </a>
        </div>
    </form>
@endsection
