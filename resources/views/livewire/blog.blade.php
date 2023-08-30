<div class="row">
	<div class="col-lg-6">
		<x-flash-message />
		<x-blog-create />
	</div>
	<div class="col-lg-6">
		{{-- <button class="btn btn-danger mb-3" wire:click='clearDb'>Clear DB</button> --}}
		@foreach ($blogs as $blog)
			<div wire:key="{{ $blog->id }}">
				<h5>{{ $blog->title }}</h5>
				<p>{{ $blog->user->name }}</p>
				<button class="btn btn-info" wire:click="detail({{ $blog->id }})">Detail</button>
				<button class="btn btn-danger" wire:click="remove({{ $blog->id }})">Remove</button>
			</div>
			<hr>
		@endforeach
	</div>
</div>