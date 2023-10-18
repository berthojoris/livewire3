<form wire:submit='store' class="mt-3">
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Enter title" wire:model.live='form.title' autocomplete="off">
		@error('form.title')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="body">Body</label>
		<input type="text" class="form-control" id="body" name="body" placeholder="Body" wire:model.live='form.body' autocomplete="off">
		@error('form.body')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror
	</div>

	<button type="submit" class="btn btn-primary mt-3">Submit</button>
	<div wire:loading wire:target="store">
        Saving data ...
    </div>
	<div wire:loading wire:target="remove">
        Removing data ...
    </div>
</form>