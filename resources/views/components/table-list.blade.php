<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
			<th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
			<tr wire:key='{{ $blog->id }}'>
				<td>{{ $blog->title }}</td>
				<td>{{ $blog->body }}</td>
				<td><button class="btn btn-danger" wire:click='remove({{ $blog->id }})'>Delete</button></td>
			</tr>
		@endforeach

		{{ $blogs->links() }}
    </tbody>
</table>
