@props(['active' => false])

@php
	$classes = ($active) ? "menu-item-active active" : "menu-item-active";
@endphp

<li class="nav-item">
	<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>{{ $slot }}</a>
</li>