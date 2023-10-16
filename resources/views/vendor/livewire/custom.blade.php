@if ($paginator->hasPages())
<div class="mt-5">
	<div class="d-flex justify-content-between align-items-center flex-wrap">
		<div class="d-flex flex-wrap py-2 mr-3">
			@if ($paginator->onFirstPage())
				<span class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 btn-light-blue disabled">
					<i class="ki ki-bold-arrow-back icon-xs"></i>
				</span>
			@else
				<a class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 btn-light-blue" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
			@endif

			@foreach ($elements as $element)
				@if (is_string($element))
					<li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
				@endif

				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<a class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">{{ $page }}</a>
						@else
							<a class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<a class="btn btn-icon btn-sm btn-light mr-2 my-1" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled">
					<i class="ki ki-bold-arrow-next icon-xs"></i>
				</a>
			@else
				<span class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 btn-light-blue disabled">
					<i class="ki ki-bold-arrow-next icon-xs"></i>
				</span>
			@endif
		</div>

		{{-- <div class="d-flex align-items-center py-3">
			<div class="d-flex align-items-center">
				<div class="mr-2 text-muted">Loading...</div>
				<div class="spinner mr-10"></div>
			</div>
			<select class="form-control form-control-sm font-weight-bold mr-4 border-0 bg-light" style="width: 75px;">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
			<span class="text-muted">Displaying 10 of 230 records</span>
		</div> --}}
	</div>
</div>

@endif

