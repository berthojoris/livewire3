<div wire:ignore>
    <table class="table table-bordered" id="datatablex">
		<thead>
			<tr>
				<th scope="col">Title</th>
				<th scope="col">Body</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($blogs as $blog)
				<tr>
					<td>{{ $blog->title }}</td>
					<td>{{ $blog->body }}</td>
					<td>
						<button class="btn btn-info" wire:click='detail({{ $blog->id }})'>Detail</button>
						<button class="btn btn-danger" wire:click='remove({{ $blog->id }})'>Delete</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<style>
		.cursor-default {
			margin-right: 5px;
		}
	</style>

</div>

@push('css')
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('jslib')
<script>
$(document).ready(function() {
	var table = $('#datatablex').DataTable({
		scrollX: true,
        processing: true,
        oLanguage: {
			sProcessing: '<div class="spinner-border text-primary m-1" role="status" style="width: 3rem; height: 3rem;"><span class="sr-only">Loading...</span></div>',
		},
        order: [
            [0, "desc"]
        ],
        columns: [
            {
                data: 'id',
            },
			{
                data: 'title',
            },
            {
                data: 'start_date',
            },
        ],
    })
});
</script>
{{-- <script>
document.addEventListener("DOMContentLoaded", () => {
	console.log("xxxx")
	Livewire.hook('component.initialized', (component) => {
		console.log("component.initialized")
	})
	Livewire.hook('element.initialized', (el, component) => {
		console.log("element.initialized")
	})
	Livewire.hook('element.updating', (fromEl, toEl, component) => {
		console.log("element.updating")
	})
	Livewire.hook('element.updated', (el, component) => {
		console.log("element.updated")
	})
	Livewire.hook('element.removed', (el, component) => {
		console.log("element.removed")
	})
});
</script> --}}
@endpush