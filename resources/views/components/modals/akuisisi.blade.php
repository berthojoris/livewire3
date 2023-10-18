<div wire:ignore.self class="modal fade" id="akuisisi" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Manage Outlet</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$dispatch('close-akuisisi')">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>

			<div class="modal-body" style="height: 500px;">
				<ul class="nav nav-tabs nav-tabs-line">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tab_data_outlet">
							<span class="nav-icon"><i class="fas fa-envelope-open-text"></i></span>
							<span class="nav-text">Data Outlet</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab_validasi">
							<span class="nav-icon"><i class="fas fa-edit"></i></span>
							<span class="nav-text">Validasi</span>
						</a>
					</li>
					{{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="nav-icon"><i class="flaticon2-drop"></i></span>
							<span class="nav-text">Dropdown</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Action</a>
							<a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Another action</a>
							<a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Something else here</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" data-toggle="tab" href="#kt_tab_pane_3">Separated link</a>
						</div>
					 </li>
					<li class="nav-item">
						<a class="nav-link disabled" data-toggle="tab" href="#kt_tab_pane_4" tabindex="-1" aria-disabled="true">
							<span class="nav-icon"><i class="flaticon2-protected"></i></span>
							<span class="nav-text">Disabled</span>
						</a>
					</li> --}}
				</ul>
				<div class="tab-content mt-5" id="myTabContent">
					<div class="tab-pane fade show active" id="tab_data_outlet" role="tabpanel" aria-labelledby="tab_data_outlet">
						<x-nonkontrak.tab-data-outlet />
					</div>
					<div class="tab-pane fade" id="tab_validasi" role="tabpanel" aria-labelledby="tab_validasi">
						<x-nonkontrak.tab-data-validasi />
					</div>
				</div>
			</div>
		</div>
    </div>
</div>