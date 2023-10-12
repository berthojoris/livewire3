<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
	<div class="d-flex flex-center mb-15">
		<a href="#">
			<img src="{{ asset('assets/media/logos/logo-sm.png') }}" class="max-h-100px" alt="" />
		</a>
	</div>
	<form wire:submit='login' class="mt-3">
		<div class="login-signin">
			<div class="mb-20">
				<h3>Sign In</h3>
				<p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p>
			</div>
			<form class="form" id="kt_login_signin_form">
				<div class="form-group">
					<input type="text" class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" id="email" name="email" placeholder="Enter email" wire:model='form.email' autocomplete="off">
				</div>
				<div class="form-group">
					<input type="password" class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" id="password" name="password" placeholder="Password" wire:model='form.password' autocomplete="off">
				</div>
				<div class="form-group text-center mt-10">
					<button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
				</div>
			</form>
		</div>
	</form>

	{{-- <div class="login-signup">
		<div class="mb-20">
			<h3>Sign Up</h3>
			<p class="opacity-60">Enter your details to create your account</p>
		</div>
		<form class="form text-center" id="kt_login_signup_form">
			<div class="form-group">
				<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="fullname" />
			</div>
			<div class="form-group">
				<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
			</div>
			<div class="form-group">
				<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
			</div>
			<div class="form-group">
				<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
			</div>
			<div class="form-group text-left px-8">
				<div class="checkbox-inline">
					<label class="checkbox checkbox-outline checkbox-white text-white m-0">
					<input type="checkbox" name="agree" />
					<span></span>I Agree the
					<a href="#" class="text-white font-weight-bold ml-1">terms and conditions</a>.</label>
				</div>
				<div class="form-text text-muted text-center"></div>
			</div>
			<div class="form-group">
				<button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
				<button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
			</div>
		</form>
	</div>

	<div class="login-forgot">
		<div class="mb-20">
			<h3>Forgotten Password ?</h3>
			<p class="opacity-60">Enter your email to reset your password</p>
		</div>
		<form class="form" id="kt_login_forgot_form">
			<div class="form-group mb-10">
				<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
			</div>
			<div class="form-group">
				<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
				<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
			</div>
		</form>
	</div> --}}

</div>