<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	@include('partials.kt_subheader')

	<div class="d-flex flex-column-fluid">
		<div class="container">
			{{ $slot }}
		</div>
	</div>
</div>