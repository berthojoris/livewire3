<div>
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
document.addEventListener('livewire:init', () => {
	console.log("livewire.init")
	Livewire.hook('component.init', ({ component }) => {
		console.log("component.init")
		if(component.name == "about") {
			console.log("component about")
		}
		if(component.name == "list-data") {
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
						data: 'body',
					},
				],
			})
		}
	})
})
</script>
@endpush