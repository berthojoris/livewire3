<div>
    <x-list :blogs="$blogs" lazy />
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