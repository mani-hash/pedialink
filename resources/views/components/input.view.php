<?php
$error = !empty($error) ? $error : null;

$classes = 'input-row';
$classes .= isset($class) ? ' ' . $class : '';

if (!empty($size)) {
    $classes .= " input--{$size}";
}

if ($error) {
    $classes .= " input--error";
}
?>

<div class="input-wrapper">
    @if(!empty($label))
        <label 
            class="input-label"
            @if (!empty($id))
                for="{{ $id }}"
            @endif
        >
            {{ $label }}
        </label>
    @endif

    <div 
        class="{{ $classes }}"

        @if (!empty($ariaDisabled))
            aria-disabled="true"
        @endif
    >
        @if(!empty($slots['prefix']))
            <span class="input-prefix">
                {{ $slots['prefix'] }}
            </span>
        @endif

        <input
            class="input-field"

            @if (!empty($id))
                id="{{ $id }}"
            @endif

            @if (!empty($type))
                type="{{ $type }}"
            @endif

            @if (!empty($name))
                name="{{ $name }}"
            @endif

            @if (!empty($placeholder))
                placeholder="{{ $placeholder }}"
            @endif

            @if (!empty($required))
                required
            @endif
            
            @if (!empty($disabled))
                disabled
            @endif

            @if (!empty($ariaInvalid))
                aria-invalid="true"
            @endif

            @if (!empty($value))
                value="{{ $value }}"
            @endif
        />

        @if(!empty($slots['suffix']))
            <span class="input-suffix">
                {{ $slots['suffix'] }}
            </span>
        @endif
    </div>

    @if(!empty($help) && !$error)
        <div class="input-help">{{ $help }}</div>
    @endif

    @if(!empty($error))
        <div class="input-error-text">{{ $error ?? "" }}</div>
    @endif
</div>
