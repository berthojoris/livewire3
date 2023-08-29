<div class="row">
	<div class="col-lg-6">
		<x-flash-message />
		<x-blog-create></x-blog-create>
	</div>
	<div class="col-lg-6">
		<button class="btn btn-danger mb-3" wire:click='clearDb'>Clear DB</button>
		@foreach ($blogs as $blog)
			<h5>{{ $blog->title }}</h5>
			<p>{{ $blog->user->name }}</p>
			<hr>
		@endforeach
	</div>
</div>