@php
    use App\Enums\Bb\TypeEnum;
@endphp

@props([
    'obj',
])

@switch($obj->type)
    @case(TypeEnum::BUY)
        <small class="d-inline-flex px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle">
            {{ __($obj->type->text()) }}
        </small>
        @break
    @case(TypeEnum::SELL)
        <small class="d-inline-flex px-2 py-1 fw-semibold text-success-emphasis bg-warning-subtle border border-warning-subtle">
            {{ __($obj->type->text()) }}
        </small>
        @break
    @default
        <p>Тип не определен</p>
@endswitch
