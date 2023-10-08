@extends('layouts.app')

@section('title', 'Мои объявления')

@section('content')
    <h1 class="my-3 text-center">Добро пожаловать, {{ Auth::user()->name }}!</h1>
    <p class="text-end">
        <a class="btn btn-outline-secondary" href="{{ route('lk.create') }}">
            Добавить объявление
        </a>
    </p>
    @if (count($bbs) > 0)
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена, руб.</th>
                <th>Создано</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bbs as $bb)
                <tr>
                    <td><h3>{{ $bb->title }}</h3></td>
                    <td>{{ $bb->price }}</td>
                    <td>{{ $bb->created_at->locale('ru')->isoFormat('LLL') }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-sm btn-warning" href="{{ route('lk.edit', $bb) }}">Изменить</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('lk.delete', $bb) }}">Удалить</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
