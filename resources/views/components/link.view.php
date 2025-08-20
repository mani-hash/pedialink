<?php

    $id = !empty($id) ? "id='{$id}'" : "";

    $classes = 'link';

    if (!empty($class)) {
        $classes .= ' ' . $class;
    }

    if (!empty($type)) {
        $classes .= " link-{$type}";
    } else {
        $classes .= " link-plain";
    }

    if (!empty($size)) {
        $classes .= " link-{$size}";
    }

     if (!empty($slots['icon']) && trim($slot) === '') { 
        $classes .= ' link-icon-only'; 
    }

    $targetAttr = !empty($target) ? "target='{$target}'" : "";
    $relAttr = !empty($rel) ? "rel='{$rel}'" : "";
    $ariaDisabledAttr = !empty($ariadisabled) ? "aria-disabled='true' tabindex='-1'" : "";
?>

<a
    {{ $id }}
    href="{{ $href ?? "#" }}"
    class="{{ $classes }}"
    {{ $targetAttr }} {{ $relAttr }} {{ $ariaDisabledAttr }}
>
    @if(!empty($slots['icon']))
        <span class="link-icon">
        {{ $slots["icon"] }}
        </span>
    @endif

    @if(trim($slot) !== '')
        {{ $slot }}
    @endif
</a>
