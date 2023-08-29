@if (flash()->message)
	<div class="alert alert-{{ flash()->class ?? "info" }}" role="alert">
		{{ flash()->message }}
	</div>
@endif