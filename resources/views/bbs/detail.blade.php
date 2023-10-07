@extends('layouts.bbs')

@php
    use App\Models\Bb;

    /** @var Bb $bb */
@endphp

@section('title',  )

@section('content')
    <h1 class="my-3 text-center">{{ $bb->title }}</h1>
    <p>{{ $bb->content }}</p>
    <p>{{ $bb->price }} руб.</p>
    <p>{{ $bb->user->name }}</p>
    <p><a href="{{ route('bbs.index') }}">На перечень объявлений</a></p>
@endsection('content')
