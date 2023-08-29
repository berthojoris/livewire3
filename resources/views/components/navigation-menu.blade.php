<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="{{ route('home') }}">Livewire 3</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				@guest
					<x-nav-link :active="request()->routeIs('home')" href="{{ route('home') }}">Home</x-nav-link>
					<x-nav-link :active="request()->routeIs('about')" href="{{ route('about') }}">About</x-nav-link>
					<x-nav-link :active="request()->routeIs('login')" href="{{ route('login') }}">Login</x-nav-link>
				@endguest

				@auth
					<x-nav-link :active="request()->routeIs('blog')" href="{{ route('blog') }}">Create Blog</x-nav-link>
					{{-- <x-nav-link href="">Logout</x-nav-link> --}}
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="nav-link">Logout</button>
					</form>
				@endauth
			</ul>
		</div>
	</div>
</nav>