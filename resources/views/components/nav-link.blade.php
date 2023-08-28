@props(['active' => false])

@php
	$classes = ($active) ? "nav-link active" : "nav-link";
@endphp

<li class="nav-item">
	<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate.hover>{{ $slot }}</a>
</li>