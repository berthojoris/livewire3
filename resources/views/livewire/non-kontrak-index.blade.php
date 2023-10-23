<div>
    <div class="card card-custom">
		<div class="card-header flex-wrap border-0 pt-6 pb-0">
			<div class="card-title">
				<h3 class="card-label">List Outlet Non Kontrak
					<span class="d-block text-muted pt-2 font-size-sm">Datatable for list outlet yang belum (dalam proses) akuisisi</span>
				</h3>
			</div>
			<div class="card-toolbar">
				<div class="dropdown dropdown-inline mr-2">
					<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="svg-icon svg-icon-md">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"></rect>
									<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
									<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
								</g>
							</svg>
						</span>
						Export
					</button>

					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
						<ul class="navi flex-column navi-hover py-2">
							<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
								<span class="navi-icon">
								<i class="la la-file-excel-o"></i>
								</span>
								<span class="navi-text">Excel</span>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#createOutlet">
					<span class="svg-icon svg-icon-md">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"></rect>
								<circle fill="#000000" cx="9" cy="15" r="6"></circle>
								<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
							</g>
						</svg>
					</span>
					New Record
				</a>
			</div>
		</div>

		<div class="card-body">
			<div class="mb-7">
				<div class="row align-items-center">
					<div class="col-lg-9 col-xl-8">
						<div class="row align-items-center">
							<div class="col-md-4 my-2 my-md-0">
								<div class="input-icon">
									<input type="text" class="form-control" placeholder="Search outlet name..." wire:model.live='search'>
									<span>
									<i class="flaticon2-search-1 text-muted"></i>
									</span>
								</div>
							</div>
							<div class="col-md-4 my-2 my-md-0">
								<div class="d-flex align-items-center">
									<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
									<select class="form-control" id="filter_status" wire:model.live='status'>
										<option value="">-- ALL --</option>
										@foreach ($statuses as $key => $val)
											<option value="{{ $key }}">{{ $val }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="datatable datatable-default datatable-bordered datatable-loaded">
				<table class="datatable-bordered datatable-head-custom datatable-table" id="kt_datatable" style="display: block; text-align: center;">
					<thead class="datatable-head">
						<tr class="datatable-row" style="left: 0px;">
							<th class="datatable-cell datatable-cell-sort" style="width: 10%;"><span>Outlet Code</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 15%;"><span>Outlet Name</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 15%;"><span>Horeca Group Type</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 15%;"><span>Horeca Outlet Type</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 10%;"><span>Regional Office</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 10%;"><span>Status</span></th>
							<th class="datatable-cell datatable-cell-sort" style="width: 10%;"><span>Action</span></th>
						</tr>
					</thead>
					<tbody style="" class="datatable-body">
						@foreach ($this->listKontrak as $outlet)
							<x-nonkontrak.list-kontrak :outlet="$outlet" />
						@endforeach
					</tbody>
				</table>

				{{ $this->listKontrak->onEachSide(1)->links() }}
			</div>
		</div>
	</div>


	<x-modals.create-outlet :brands="$brands" :dataro="$dataro" :dataao="$dataao" :categories="$categories" :subcategories="$subcategories" />

	<x-modals.akuisisi :subcategories="$subcategories" :dataao="$dataao" :outlet="$outlet"/>
</div>