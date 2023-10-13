@if ($paginator->hasPages())
<div class="datatable-pager datatable-paging-loaded">
	<ul class="datatable-pager-nav my-2 mb-sm-0 text-end">
        @if ($paginator->onFirstPage())
			<li>
				<a href="{{ $paginator->previousPageUrl() }}" wire:navigate class="datatable-pager-link datatable-pager-link-prev datatable-pager-link-disabled"><i class="flaticon2-back"></i></a>
			</li>
		@else
			<li>
				<a href="{{ $paginator->previousPageUrl() }}" wire:navigate class="datatable-pager-link datatable-pager-link-prev"><i class="flaticon2-back"></i></a>
			</li>
		@endif

        @if($paginator->currentPage() > 3)
            <li>
				<a class="datatable-pager-link datatable-pager-link-number" data-page="1" title="1" href="{{ $paginator->url(1) }}" wire:navigate data-page="1" title="1">1</a>
			</li>
        @endif

        @if($paginator->currentPage() > 4)
            <li><span>...</span></li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
					<li>
						<span class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active">{{ $i }}</span>
					</li>
                @else
                    <li>
						<a href="{{ request()->url()."?page=".$i }}" wire:navigate class="datatable-pager-link datatable-pager-link-number" data-page="{{ $i }}" title="{{ $i }}">{{ $i }}</a>
					</li>
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li><span>...</span></li>
        @endif

        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="hidden-xs">
				<a class="datatable-pager-link datatable-pager-link-number" data-page="{{ $i }}" title="{{ $i }}" href="{{ $paginator->url($paginator->lastPage()) }}" wire:navigate>{{ $paginator->lastPage() }}</a>
			</li>
        @endif

        @if ($paginator->hasMorePages())
            <li>
				<a href="{{ $paginator->nextPageUrl() }}" class="datatable-pager-link datatable-pager-link-next active" wire:navigate><i class="flaticon2-next"></i></a>
			</li>
		@else
			<li>
				<a href="{{ $paginator->nextPageUrl() }}" class="datatable-pager-link datatable-pager-link-next datatable-pager-link-disabled" wire:navigate><i class="flaticon2-next"></i></a>
			</li>
        @endif
    </ul>

	<span class="text-right my-auto">Display {{ $paginator->count() }} from {{ $paginator->total() }}</span>
</div>
@endif