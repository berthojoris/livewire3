@if ($paginator->hasPages())
<div class="datatable-pager datatable-paging-loaded">
	<ul class="datatable-pager-nav my-2 mb-sm-0 text-end">
        @if (!$paginator->onFirstPage())
			<li>
				<a href="{{ $paginator->url(1) }}" class="datatable-pager-link datatable-pager-link-first" wire:navigate><i class="flaticon2-fast-back"></i></a>
			</li>
			<li>
				<a href="{{ $paginator->previousPageUrl() }}"  class="datatable-pager-link datatable-pager-link-prev" wire:navigate><i class="flaticon2-back"></i></a>
			</li>
        @endif

		@foreach ($elements as $element)
			@if (is_string($element))
				<li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
			@endif

			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li>
							<a href="{{ request()->url()."?page=".$page }}" wire:navigate class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active" data-page="{{ $page }}" title="{{ $page }}">{{ $page }}</a>
						</li>
					@else
						<li>
							<a href="{{ request()->url()."?page=".$page }}" wire:navigate class="datatable-pager-link datatable-pager-link-number" data-page="{{ $page }}" title="{{ $page }}">{{ $page }}</a>
						</li>
					@endif
				@endforeach
			@endif
		@endforeach

        @if ($paginator->hasMorePages())
			<li>
				<a href="{{ $paginator->nextPageUrl() }}" class="datatable-pager-link datatable-pager-link-next active" wire:navigate><i class="flaticon2-next"></i></a>
			</li>
			<li>
				<a href="{{ request()->url()."?page=".$paginator->lastPage() }}" class="datatable-pager-link datatable-pager-link-last" wire:navigate><i class="flaticon2-fast-next"></i></a>
			</li>
        @endif
    </ul>

	<span class="text-right my-auto">Display {{ $paginator->count() }} from {{ $paginator->total() }}</span>
</div>
@endif