@extends('layouts.app')

@section('title', 'Редактировать "' . $bb->title . '"')

@section('content')
    <h1 class="my-3 text-center">Редактировать "{{ $bb->title }}"</h1>
    <form action="{{ route('lk.update', $bb) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="txtTitle" class="form-label">Название</label>
            <input name="title" id="txtTitle"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $bb->title) }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">Описание</label>
            <textarea name="content" id="txtContent"
                      class="form-control @error('content') is-invalid @enderror"
                      rows="10">{{ old('content', $bb->content) }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtPrice" class="form-label">Цена</label>
            <input name="price" id="txtPrice"
                   class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price', $bb->price) }}">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" name="user_id" value="{{ $bb->user->id }}">
        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
@endsection
