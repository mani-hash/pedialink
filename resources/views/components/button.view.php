<?php
$id = !empty($id) ? "id={$id}" : "";

$form = !empty($form) ? "form={$form}" : "";

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

$disabled = !empty($disabled) ? "disabled='true'" : ""
?>

<button {{ $id }} {{ $form }} class="{{ $classes }}" {{ $disabled }}>
  {{ $slot }}
</button>