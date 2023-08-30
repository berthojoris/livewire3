<div>
    <div class="row">
		<div class="col-md-6">
			<x-flash-message></x-flash-message>
			<x-blog-create></x-blog-create>
		</div>
		<div class="col-md-6">
			<x-blog-list :blogs="$blogs"></x-blog-list>
		</div>
	</div>
</div>
