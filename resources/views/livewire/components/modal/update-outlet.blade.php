<div wire:ignore.self class="modal" id="updateOutlet" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
	aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Manage Outlet</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
					@click="$dispatch('close-updated-modal')">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>

			<div class="modal-body" style="height: 500px;">
				<x-error-notif />

				<form wire:submit='updateData'>
					<input type="hidden" wire:model='uuid'>
					<div class="card-body">
						<h3 class="font-size-lg text-dark font-weight-bold">Data outlet:</h3>
						<div class="form-group row">
							<label class="col-lg-5 col-form-label">TP Code</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='tp_code' />
								@error('tp_code')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

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
							<label class="col-lg-5 col-form-label">Outlet Name
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='outlet_name' />
								@error('outlet_name')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Horecataiment Group Type
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model.live='horecataiment_group_type'>
									@forelse ($this->categories as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
									@empty
									<option value="">-- Pilih --</option>
									@endforelse
								</select>
								@error('horecataiment_group_type')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Horeca Outlet Type
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model='horecataiment_outlet_type'
									id="horecataiment_outlet_type">
									@forelse ($subcategories as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
									@empty
									<option value="">-- Pilih --</option>
									@endforelse
								</select>
								@error('horecataiment_outlet_type')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Regional Office
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model.live='ro'>
									@forelse ($this->dataro as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
									@empty
									<option value="">-- Pilih --</option>
									@endforelse
								</select>
								@error('ro')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Area Office
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model='ao'>
									@forelse ($dataao as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
									@empty
									<option value="">-- Pilih --</option>
									@endforelse
								</select>
								@error('ao')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Alamat
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='alamat' />
								@error('alamat')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Kecamatan</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='kecamatan' />
								@error('kecamatan')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Kelurahan</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='kelurahan' />
								@error('kelurahan')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Kabupaten Kota</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='kabupaten_kota' />
								@error('kabupaten_kota')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Brand Suggestion
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<select class="form-control" wire:model='brand_sugestion'>
									@forelse ($brands as $key => $val)
									{{-- <option value="{{ $key }}" @if ($key==$outlet->brand_sugestion) selected
										@endif>{{ $val }}</option> --}}
									<option value="{{ $key }}">{{ $val }}</option>
									@empty
									<option value="">-- Pilih --</option>
									@endforelse
								</select>
								@error('brand_sugestion')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Nama PIC Outlet
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='nama_pic_outlet' />
								@error('nama_pic_outlet')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Telp PIC Outlet
								<x-asteriks />
							</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='telp_pic_outlet' />
								@error('telp_pic_outlet')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Telp PIC Outlet 2 (Optional)</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='telp_pic_outlet_second' />
								@error('telp_pic_outlet_second')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Email PIC Outlet</label>
							<div class="col-lg-7">
								<input type="text" class="form-control" wire:model='email_pic_outlet' />
								@error('email_pic_outlet')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Instalasi Branding</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										@if (!empty($outlet))
										<input type="checkbox" wire:model='instalasi_branding' @if ($outlet->instalasi_branding == 1) checked @endif/>
										@else
										<input type="checkbox" wire:model='instalasi_branding' />
										@endif
										<span></span>
									</label>
								</span>
								@error('instalasi_branding')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Kontrak Event</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										@if (!empty($outlet))
										<input type="checkbox" wire:model='kontrak_event' @if ($outlet->kontrak_event == 1) checked @endif/>
										@else
										<input type="checkbox" wire:model='kontrak_event' />
										@endif
										<span></span>
									</label>
								</span>
								@error('kontrak_event')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label class="col-lg-5 col-form-label">Selling</label>
							<div class="col-lg-7">
								<span class="switch switch-icon">
									<label>
										@if (!empty($outlet))
										<input type="checkbox" wire:model='selling' @if ($outlet->selling == 1) checked @endif/>
										@else
										<input type="checkbox" wire:model='selling' />
										@endif
										<span></span>
									</label>
								</span>
								@error('selling')
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
								<div wire:loading wire:target="updateData">
									<div class="spinner spinner-success mr-15"></div>
								</div>
								<button type="submit" class="btn btn-success float-right">Update</button>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>