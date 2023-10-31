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

					<div class="card-body">
						<h3 class="font-size-lg text-dark font-weight-bold">Validasi outlet:</h3>

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
								@error('nilai_score_card')
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
								<input type="text" class="form-control" wire:model='upload_score_card' />
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
								<input type="text" class="form-control" wire:model='tanggal_terima_score_card' />
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
								<input type="text" class="form-control" wire:model='form_validasi' />
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
								<input type="text" class="form-control" wire:model='dokumentasi' />
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
								<input type="text" class="form-control" wire:model='proposal' />
								@error('proposal')
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