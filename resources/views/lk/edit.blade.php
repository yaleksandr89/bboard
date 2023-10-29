@php
    use App\Enums\Bb\TypeEnum;
@endphp

@extends('layouts.app')

@section('title', __('lk.edit') . ' "' . $bb->title . '"')

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.edit') }} "{{ $bb->title }}"</h1>
    <x-form action="{{ route('lk.update', $bb) }}" method="PATCH">
        @bind($bb)
            @include('lk.form')
        @endbind
    </x-form>
@endsection
