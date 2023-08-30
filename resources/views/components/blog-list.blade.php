@foreach ($blogs as $blog)
	<div wire:key="{{ $blog->id }}">
		<h5>{{ $blog->title }}</h5>
		<p>{{ $blog->user->name }}</p>
		<button class="btn btn-info" wire:click="detail({{ $blog->id }})">Detail</button>
		<button class="btn btn-danger" wire:click="remove({{ $blog->id }})">Remove</button>
	</div>
	<hr>
@endforeach