@extends('layouts.app')

@section('title', 'Мои объявления')

@section('content')
    <h1 class="my-3 text-center">Добро пожаловать, {{ Auth::user()->name }}!</h1>
    <p class="text-end">000
{{--        <a href="{{ route('bb.create') }}">Добавить объявление</a>--}}
    </p>
    @if (count($bbs) > 0)
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена, руб.</th>
                <th>Создано</th>
                <th colspan="2">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bbs as $bb)
                <tr>
                    <td><h3>{{ $bb->title }}</h3></td>
                    <td>{{ $bb->price }}</td>
                    <td>{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</td>
                    <td>111
{{--                        <a href="{{ route('bb.edit', $bb) }}">Изменить</a>--}}
                    </td>
                    <td>222
{{--                        <a href="{{ route('bb.delete', $bb) }}">Удалить</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
