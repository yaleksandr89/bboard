@extends('layouts.bbs')

@php
    use Illuminate\Database\Eloquent\Collection;
    use App\Models\Bb;

    /** @var Collection|Bb[] $bbs */
@endphp

@section('title', 'Список объявлений')

@section('content')
    <h1 class="my-3 text-center">Объявления</h1>
    @if ($bbs->isNotEmpty())
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена, руб.</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bbs as $bb)
                <tr>
                    <td><h4>{{ $bb->title }}</h4></td>
                    <td>{{ $bb->price }}</td>
                    <td>
                        <a href="{{ route('bbs.detail', $bb) }}">Подробнее...</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-primary" role="alert">
            Объявления отсутствуют
        </div>
    @endif
@endsection
