@extends('layouts.app')

@section('title', __('lk.my_ad'))

@section('content')
    <h1 class="my-3 text-center">{{ __('lk.welcome') }}, {{ Auth::user()->name }}!</h1>
    <p class="text-end">
        <a class="btn btn-outline-secondary" href="{{ route('lk.create') }}">
            {{ __('lk.add_ad') }}
        </a>
    </p>
    @if (count($bbs) > 0)
        <table class="table table-striped table-borderless">
            <thead>
            <tr>
                <th>{{ __('bbs.title') }}</th>
                <th>{{ __('bbs.price') }}, {{ __('bbs.rub') }}.</th>
                <th>{{ __('lk.created') }}</th>
                <th>{{ __('lk.actions') }}</th>
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
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('lk.edit', $bb) }}">{{ __('lk.change') }}</a>
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('lk.delete', $bb) }}">{{ __('lk.delete') }}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
