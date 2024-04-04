<div wire:ignore.self class="modal" id="validasiOutlet" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
	aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Validasi Outlet</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$dispatch('close-validasi-modal')">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>

			<div class="modal-body" style="height: 500px;">
				<x-error-notif />

				<form wire:submit='submitValidasiOutlet'>
					<input type="hidden" wire:model='uuid'>
					<input type="hidden" wire:model='outlet_id'>

					<div class="card-body">
						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Outlet Code</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='outlet_code' />
								@error('outlet_code')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Nilai SC</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model.live='nilai_score_card' />
								<span class="form-text text-muted">Bintang and kuadran will be calculated automatically</span>
								@error('nilai_score_card')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Bintang</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='bintang' disabled/>
								@error('bintang')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Kuadran</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model='kuadran'>
									<option value="">-- Pilih --</option>
									@foreach ($dataKuadran as $key => $val)
										<option value="{{ $key }}">{{ $val }}</option>
									@endforeach
								</select>
								@error('kuadran')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						{{-- BINTANG DAN KUADRAN DI SAVE DI TABLE MASTER --}}

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Upload Score Card</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='upload_score_card' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($upload_score_card)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='upload_score_card'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('upload_score_card')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Tanggal Terima SC</label>
							<div class="col-lg-7">
								<input type="text" class="form-control datepickertxt" data-date-format="yyyy-mm-dd" wire:model='tanggal_terima_score_card' id="tanggal_sc"/>
								@error('tanggal_terima_score_card')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Form Validasi</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='form_validasi' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($form_validasi)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='form_validasi'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('form_validasi')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Dokumentasi</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='dokumentasi' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($dokumentasi)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='dokumentasi'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('dokumentasi')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Proposal</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='proposal' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($proposal)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='proposal'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('proposal')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="alert alert-secondary" role="alert">Instalasi Unit Branding</div>

						<div class="row mb-3">
							<label for="landmark" class="col-lg-5 col-form-label">Landmark</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='landmark'/>
										<span></span>
									</label>
								</span>
								@error('landmark')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="signed_outdoor" class="col-lg-5 col-form-label">Signed Outdoor</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='signed_outdoor'/>
										<span></span>
									</label>
								</span>
								@error('signed_outdoor')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="gate" class="col-lg-5 col-form-label">Gate</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='gate'/>
										<span></span>
									</label>
								</span>
								@error('gate')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="parking_space" class="col-lg-5 col-form-label">Parking Space</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='parking_space'/>
										<span></span>
									</label>
								</span>
								@error('parking_space')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="facade" class="col-lg-5 col-form-label">Facade</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='facade'/>
										<span></span>
									</label>
								</span>
								@error('facade')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="entrance_wall_branding" class="col-lg-5 col-form-label">Entrance Wall Branding</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='entrance_wall_branding'/>
										<span></span>
									</label>
								</span>
								@error('entrance_wall_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="info_board" class="col-lg-5 col-form-label">Info Board</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='info_board'/>
										<span></span>
									</label>
								</span>
								@error('info_board')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="concierge_table" class="col-lg-5 col-form-label">Concierge Table</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='concierge_table'/>
										<span></span>
									</label>
								</span>
								@error('concierge_table')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="stage_wall_branding" class="col-lg-5 col-form-label">Stage Wall Branding</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='stage_wall_branding'/>
										<span></span>
									</label>
								</span>
								@error('stage_wall_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="dj_booth" class="col-lg-5 col-form-label">DJ Booth</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='dj_booth'/>
										<span></span>
									</label>
								</span>
								@error('dj_booth')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="frame_screen" class="col-lg-5 col-form-label">Frame Screen</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='frame_screen'/>
										<span></span>
									</label>
								</span>
								@error('frame_screen')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="totem" class="col-lg-5 col-form-label">Totem</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='totem'/>
										<span></span>
									</label>
								</span>
								@error('totem')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="dining_wall_branding_indoor" class="col-lg-5 col-form-label">Dining Wall Branding Indoor</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='dining_wall_branding_indoor'/>
										<span></span>
									</label>
								</span>
								@error('dining_wall_branding_indoor')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="dining_wall_branding_outdoor" class="col-lg-5 col-form-label">Dining Wall Branding Outdoor</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='dining_wall_branding_outdoor'/>
										<span></span>
									</label>
								</span>
								@error('dining_wall_branding_outdoor')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="tv_frame_branding_dining_area" class="col-lg-5 col-form-label">TV Frame Branding Dining Area</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='tv_frame_branding_dining_area'/>
										<span></span>
									</label>
								</span>
								@error('tv_frame_branding_dining_area')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="bar_wall_branding_indoor" class="col-lg-5 col-form-label">Bar Wall Branding Indoor</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='bar_wall_branding_indoor'/>
										<span></span>
									</label>
								</span>
								@error('bar_wall_branding_indoor')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="tv_frame_branding_bar_area" class="col-lg-5 col-form-label">TV Frame Branding Bar Area</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='tv_frame_branding_bar_area'/>
										<span></span>
									</label>
								</span>
								@error('tv_frame_branding_bar_area')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="cigaret_cabinet" class="col-lg-5 col-form-label">Cigaret Cabinet</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='cigaret_cabinet'/>
										<span></span>
									</label>
								</span>
								@error('cigaret_cabinet')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="mirror_sticker" class="col-lg-5 col-form-label">Mirror Sticker</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='mirror_sticker'/>
										<span></span>
									</label>
								</span>
								@error('mirror_sticker')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="restroom_wall_branding" class="col-lg-5 col-form-label">Restroom Wall Branding</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='restroom_wall_branding'/>
										<span></span>
									</label>
								</span>
								@error('restroom_wall_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="table_ashtray" class="col-lg-5 col-form-label">Table Ashtray</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='table_ashtray'/>
										<span></span>
									</label>
								</span>
								@error('table_ashtray')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="standing_asthray" class="col-lg-5 col-form-label">Standing Ashtray</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='standing_asthray'/>
										<span></span>
									</label>
								</span>
								@error('standing_asthray')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="fsu" class="col-lg-5 col-form-label">FSU</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='fsu'/>
										<span></span>
									</label>
								</span>
								@error('fsu')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="sitting_corner" class="col-lg-5 col-form-label">Sitting Corner</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='sitting_corner'/>
										<span></span>
									</label>
								</span>
								@error('sitting_corner')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="charging_station" class="col-lg-5 col-form-label">Charging Station</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='charging_station'/>
										<span></span>
									</label>
								</span>
								@error('charging_station')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="table_set" class="col-lg-5 col-form-label">Table Set</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='table_set'/>
										<span></span>
									</label>
								</span>
								@error('table_set')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<label for="selling_display_booth" class="col-lg-5 col-form-label">Selling Display Booth</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										<input type="checkbox" wire:model='selling_display_booth'/>
										<span></span>
									</label>
								</span>
								@error('selling_display_booth')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Upload Form Branding</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='upload_form_branding' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($upload_form_branding)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='upload_form_branding'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('upload_form_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">No PO Branding</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='no_po_branding' />
								@error('no_po_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Upload PO Branding</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='upload_po_branding' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($upload_po_branding)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='upload_po_branding'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('upload_po_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Nomor Kontrak Branding</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='nomor_kontrak_branding' />
								@error('nomor_kontrak_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Upload Kontrak Branding</label>
							<div class="col-lg-7">
								<div class="custom-file">
									<input type="file" class="custom-file-input" wire:model='upload_kontrak_branding' />
									<label class="custom-file-label" for="customFile"></label>
								</div>
								@if ($upload_kontrak_branding)
									<span class="text-success">File Uploaded</span>
								@endif
								<div wire:loading wire:target='upload_kontrak_branding'>
									<span class="text-success">Uploading...</span>
								</div>
								@error('upload_kontrak_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Nilai Kontrak Branding</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='nilai_kontrak_branding' />
								@error('nilai_kontrak_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>


					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12">
								<div wire:loading wire:target="submitValidasiOutlet">
									<div class="spinner spinner-success mr-15"></div>
								</div>
								<button type="submit" class="btn btn-success float-right">Submit</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@push('style')
@endpush

@push('script')
<script>

var KTBootstrapDatepicker = function () {

var arrows;
if (KTUtil.isRTL()) {
	arrows = {
		leftArrow: '<i class="la la-angle-right"></i>',
		rightArrow: '<i class="la la-angle-left"></i>'
	}
} else {
	arrows = {
		leftArrow: '<i class="la la-angle-left"></i>',
		rightArrow: '<i class="la la-angle-right"></i>'
	}
}

var initDatePicker = function () {
	$('.datepickertxt').datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
		orientation: "bottom left",
		templates: arrows,
		autoclose: true,
		clearBtn: true,
		todayBtn: "linked",
	});

	$('#tanggal_sc').on('change', function (e) {
		@this.set('tanggal_terima_score_card', e.target.value);
	});
}

return {
	init: function() {
		initDatePicker();
	}
};
}();

jQuery(document).ready(function() {
	KTBootstrapDatepicker.init();
});


document.addEventListener('livewire:init', () => {
	Livewire.hook('request', ({ fail }) => {
		console.log("REQUEST")
	})

	Livewire.hook('message.processed', (message, component) => {
		let errors = message.response.serverMemo.errors;
		console.log(errors)
	})
})

</script>
@endpush