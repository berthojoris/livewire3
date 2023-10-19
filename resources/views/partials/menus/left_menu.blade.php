<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
	<!--begin::Menu Nav-->
	<ul class="menu-nav">
		@php
			$dashboard_icon = "menu-icon flaticon-home";
			$contact_icon = "menu-icon flaticon-interface-8";
			$about_icon = "menu-icon flaticon-interface-8";
		@endphp

		<x-link :active="request()->is('/')" href="{{ route('home') }}" :icon="$dashboard_icon">Dashboard</x-link>
		<x-link :active="(request()->is('non-krontrak/*') || request()->is('non-krontrak'))" href="{{ route('non_kontrak_index') }}" :icon="$contact_icon">Non Kontrak</x-link>
		<x-link :active="(request()->is('kontrak/*') || request()->is('kontrak'))" href="{{ route('kontrak_index') }}" :icon="$contact_icon">Kontrak</x-link>
		<x-link :active="(request()->is('report/*') || request()->is('report'))" href="{{ route('report_index') }}" :icon="$contact_icon">Report</x-link>
		<x-link :active="(request()->is('user/*') || request()->is('user'))" href="{{ route('user_index') }}" :icon="$contact_icon">User</x-link>
        <x-link :active="(request()->is('dropdown/*') || request()->is('dropdown'))" href="{{ route('dropdown') }}" :icon="$contact_icon">Dropdown</x-link>
		{{-- <x-link :active="request()->routeIs('contact')" href="{{ route('contact') }}" :icon="$contact_icon">Contact</x-link>
		<x-link :active="request()->routeIs('about')" href="{{ route('about') }}" :icon="$about_icon">About</x-link> --}}

		{{-- <li class="menu-item menu-item-submenu menu-item-open menu-item-here" aria-haspopup="true" data-menu-toggle="hover">
			<a href="javascript:;" class="menu-link menu-toggle">
				<i class="menu-icon flaticon-interface-8"></i>
				<span class="menu-text">General</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="menu-submenu">
				<i class="menu-arrow"></i>
				<ul class="menu-subnav">
					<li class="menu-item menu-item-parent" aria-haspopup="true">
						<span class="menu-link">
							<span class="menu-text">General</span>
						</span>
					</li>
					<li class="menu-item" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">Fluid Content</span>
						</a>
					</li>
					<li class="menu-item" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">Minimized Aside</span>
						</a>
					</li>
					<li class="menu-item" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">No Aside</span>
						</a>
					</li>
					<li class="menu-item menu-item-active" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">Empty Page</span>
						</a>
					</li>
					<li class="menu-item" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">Fixed Footer</span>
						</a>
					</li>
					<li class="menu-item" aria-haspopup="true">
						<a href="{{ route('home') }}" class="menu-link">
							<i class="menu-bullet menu-bullet-dot">
								<span></span>
							</i>
							<span class="menu-text">No Header Menu</span>
						</a>
					</li>
				</ul>
			</div>
		</li> --}}
	</ul>
</div>
