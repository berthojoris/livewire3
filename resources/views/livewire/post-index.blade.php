<div>
    <div class="row">
		<div class="col-md-6">
			<x-flash-message></x-flash-message>
			<x-post-create></x-post-create>
		</div>
		<div class="col-md-6">
			<x-post-list :blogs="$blogs"></x-post-list>
		</div>
	</div>
</div>
