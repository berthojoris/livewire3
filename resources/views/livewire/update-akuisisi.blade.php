<div wire:ignore.self class="modal" id="akuisisi" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Manage Outlet</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='closeAkuisisi'>
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
				</ul>

				<div class="tab-content mt-5" id="myTabContent">
					<div class="tab-pane fade show active" id="tab_data_outlet" role="tabpanel" aria-labelledby="tab_data_outlet">
						<form wire:submit='updateOutlet'>
							<div class="card-body">

								<input type="hidden" class="form-control" wire:model='uuid'>

								<div class="form-group row">
									<label class="col-lg-5 col-form-label">TP Code</label>
									<div class="col-lg-7">
										<input type="text" class="form-control" wire:model='tp_code'/>
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
										<input type="text" class="form-control" wire:model='outlet_code'/>
										@error('outlet_code')
										<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-5 col-form-label">Outlet Name <x-asteriks /></label>
									<div class="col-lg-7">
										<input type="text" class="form-control" wire:model='outlet_name'/>
										@error('outlet_name')
										<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-5 col-form-label">Horecataiment Group Type <x-asteriks /></label>
									<div class="col-lg-7">
										<select class="form-control" wire:model.live='horecataiment_group_type'>
											@forelse ($categories as $key => $val)
												<option value="{{ $key }}" @if ($key == $outlet->horecataiment_group_type) selected @endif>{{ $val }}</option>
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
									<label class="col-lg-5 col-form-label">Horeca Outlet Type <x-asteriks /></label>
									<div class="col-lg-7">
										<select class="form-control" wire:model='horecataiment_outlet_type'>
											@forelse ($subcategories as $key => $val)
												<option value="{{ $key }}" @if ($key == $outlet->horecataiment_outlet_type) selected @endif>{{ $val }}</option>
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
									<label class="col-lg-5 col-form-label">Regional Office <x-asteriks /></label>
									<div class="col-lg-7">
										<select class="form-control" wire:model.live='ro'>
											@forelse ($this->dataro as $key => $val)
												<option value="{{ $key }}" @if ($key == $outlet->ro) selected @endif>{{ $val }}</option>
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
									<label class="col-lg-5 col-form-label">Area Office <x-asteriks /></label>
									<div class="col-lg-7">
										<select class="form-control" wire:model='ao'>
											@forelse ($dataao as $key => $val)
												<option value="{{ $key }}" @if ($key == $outlet->ao) selected @endif>{{ $val }}</option>
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
									<label class="col-lg-5 col-form-label">Alamat <x-asteriks /></label>
									<div class="col-lg-7">
										<input type="text" class="form-control" wire:model='alamat'/>
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
										<input type="text" class="form-control" wire:model='kecamatan'/>
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
										<input type="text" class="form-control" wire:model='kelurahan'/>
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
										<input type="text" class="form-control" wire:model='kabupaten_kota'/>
										@error('kabupaten_kota')
										<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-5 col-form-label">Brand Suggestion <x-asteriks /></label>
									<div class="col-lg-7">
										<select class="form-control" wire:model='brand_sugestion'>
											@forelse ($brands as $key => $val)
												<option value="{{ $key }}" @if ($key == $outlet->brand_sugestion) selected @endif>{{ $val }}</option>
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
									<label class="col-lg-5 col-form-label">Nama PIC Outlet <x-asteriks /></label>
									<div class="col-lg-7">
										<input type="text" class="form-control" wire:model='nama_pic_outlet'/>
										@error('nama_pic_outlet')
										<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-5 col-form-label">Telp PIC Outlet <x-asteriks /></label>
									<div class="col-lg-7">
										<input type="text" class="form-control" wire:model='telp_pic_outlet'/>
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
										<input type="text" class="form-control" wire:model='telp_pic_outlet_second'/>
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
										<input type="text" class="form-control" wire:model='email_pic_outlet'/>
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
												<input type="checkbox" wire:model='instalasi_branding'/>
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
												<input type="checkbox" wire:model='kontrak_event'/>
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
												<input type="checkbox" wire:model='selling'/>
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
										<div wire:loading wire:target="updateOutlet">
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
    </div>
</div>