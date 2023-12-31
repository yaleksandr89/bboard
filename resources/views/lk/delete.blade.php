@extends('layouts.app')

@section('title', __('lk.deleting') . ' "' . $bb->title .'"')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="my-3 text-center">{{ __('lk.deleting') }} "{{ $bb->title }}"</h1>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ $bb->content }}
            </p>
            <p class="card-text">
                <code>
                    {{ $bb->price }} {{ __('bbs.rub') }}.
                </code>
            </p>
            <p class="card-text">
                Автор: {{ $bb->user->name }}
            </p>
            <p class="card-text">
                Дата создания: {{ $bb->created_at->locale('ru')->isoFormat('LLL') }}
            </p>
        </div>
        <div class="card-footer text-muted">
            <x-form action="{{ route('lk.destroy', $bb) }}" method="DELETE">
                @bind($bb)
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <x-form-submit class="btn btn-danger">{{ __('lk.delete') }}</x-form-submit>
                        <a class="btn btn-secondary" href="{{ url()->previous() }}">
                            {{ __('bbs.back') }}
                        </a>
                    </div>
                @endbind
            </x-form>
        </div>
    </div>
@endsection
