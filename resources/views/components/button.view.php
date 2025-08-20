<?php
$classes = 'btn';

if (!empty($class)) {
    $classes .= ' ' . $class;
}

if (!empty($type)) {
    $classes .= " btn-{$type}";
}

if (!empty($size)) {
    $classes .= " btn-{$size}";
}

// if icon-only
if (!empty($icon_only)) $classes .= ' btn-icon';
?>

<button
    @if (!empty($id))
        id="{{ $id }}"
    @endif

    @if (!empty($form))
        form="{{ $form }}"
    @endif

    @if (!empty($disabled))
        disabled
    @endif
    
    class="{{ $classes }}"
>
  {{ $slot }}
</button>