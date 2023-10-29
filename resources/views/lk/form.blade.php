@php
    use App\Enums\Bb\TypeEnum;
    use App\Models\Bb;
    /** @var Bb $bb */
@endphp

<x-form-group class="mb-3">
    <x-form-input
        name="title"
        label="{{ __('bbs.title') }}"
    />
</x-form-group>

<x-form-group class="mb-3">
    <x-form-textarea
        name="content"
        placeholder="{{ __('bbs.placeholder.content') }}"
        rows="6"
    />
</x-form-group>

<x-form-group class="mb-3">
    <x-form-input
        name="price"
        label="{{ __('bbs.price') }}"
    />
</x-form-group>

<x-form-group class="mb-3">
    <x-form-select
        name="type"
        :options="TypeEnum::forFormSelection()"
        :default="isset($bb) ? $bb->type->value : null"
        placeholder="{{ __('bbs.placeholder.type') }}"
    />
</x-form-group>

<div class="btn-group" role="group">
    @if(isset($bb))
        {{-- Страница обновления объявления --}}
        <x-form-submit class="btn btn-secondary">
            {{ __('lk.update_ad') }}
        </x-form-submit>
        <a class="btn btn-danger" href="{{ route('lk.delete', $bb) }}">
            {{ __('lk.delete') }}
        </a>
        <a class="btn btn-primary" href="{{ route('lk.index') }}">
            {{ __('lk.list') }}
        </a>
    @elseif(isset($deletedDb))
    {{-- Страница восстановления объявления --}}
        <input type="submit" class="btn btn-warning" value="{{ __('lk.restored') }}">
        <a class="btn btn-secondary" href="{{ route('lk.index') }}">
            {{ __('lk.list') }}
        </a>
    @else
    {{-- Страница создания объявления --}}
        <x-form-submit class="btn btn-secondary">
            {{ __('lk.add_ad') }}
        </x-form-submit>
    @endif
</div>
