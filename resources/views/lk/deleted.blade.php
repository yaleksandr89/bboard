@extends('layouts.app')

@section('title', __('lk.restored') . ' "' . $deletedDb->title . '"')

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.restored') }} "{{ $deletedDb->title }}"</h1>
    <x-form action="{{ route('lk.restore', $deletedDb) }}">
        @bind($deletedDb)
            @include('lk.form')
        @endbind
    </x-form>
@endsection
