@extends('layouts.app')

@section('title', __('lk.creating_ad'))

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.creating_ad') }}</h1>
    <x-form action="{{ route('lk.store') }}">
        @include('lk.form')
    </x-form>
@endsection
