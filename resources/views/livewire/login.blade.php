<div>
	<main role="main" class="container">
		<h1 class="mt-5">Login Page</h1>

		<form wire:submit='login' class="mt-3">
			<div class="form-group">
				<label for="title">Email</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Enter email" wire:model='form.email' autocomplete="off">
				@error('form.email')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="body">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="password" wire:model='form.password' autocomplete="off">
				@error('form.password')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary mt-3">Login</button>
		</form>
	  </main>
</div>