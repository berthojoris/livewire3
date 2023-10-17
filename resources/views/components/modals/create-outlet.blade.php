<div wire:ignore class="modal fade" id="createOutlet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Create Outlet</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
            </div>

            <form wire:submit="saveStudent">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Student Name</label>
                        <input type="text" class="form-control" wire:model='name'>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Student Email</label>
                        <input type="text" class="form-control" wire:model='email'>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Student Course</label>
                        <input type="text" class="form-control" wire:model='course'>
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>