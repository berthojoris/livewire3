@props(['active' => false, 'icon' => $icon, 'href' => $href])

@php
$classes = ($active) ? "menu-item menu-item-active" : "menu-item";
@endphp

<li {{ $attributes->merge(['class' => $classes]) }} aria-haspopup="true">
	<a href="{{ $href }}" class="menu-link" wire:navigate>
		<i class="{{ $icon }}"></i>
		<span class="menu-text">{{ $slot }}</span>
	</a>
</li>