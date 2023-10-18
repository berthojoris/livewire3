<div wire:ignore.self class="modal fade" id="createOutlet" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$dispatch('close-modal')">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>

			<form wire:submit="createNewOutlet">
				<div class="modal-body" style="height: 500px;">
					<div class="row mb-3">
						<label for="tp_code" class="col-lg-5 col-form-label">TP Code</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" autocomplete="off" wire:model='tp_code'>
							@error('tp_code')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="outlet_code" class="col-lg-5 col-form-label">Outlet Code</label>
						<div class="col-lg-7">
							<input id="outlet_code" name="outlet_code" type="text" class="form-control" autocomplete="off" wire:model='outlet_code'>
							@error('outlet_code')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="outlet_name" class="col-lg-5 col-form-label">Outlet Name <x-asteriks /></label>
						<div class="col-lg-7">
							<input id="outlet_name" name="outlet_name" type="text" class="form-control" autocomplete="off" wire:model='outlet_name'>
							@error('outlet_name')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="horecataiment_group_type" class="col-lg-5 col-form-label">Horecataiment Group Type <x-asteriks /></label>
						<div class="col-lg-7">
							<select class="form-control" wire:model.live='horecataiment_group_type'>
								<option value="">-- Pilih --</option>
								@foreach ($categories as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
								@endforeach
							</select>
							@error('horecataiment_group_type')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="horecataiment_outlet_type" class="col-lg-5 col-form-label">Horecataiment Outlet Type <x-asteriks /></label>
						<div class="col-lg-7">
							<select class="form-control" wire:model='horecataiment_outlet_type'>
								<option value="">-- Pilih --</option>
								@foreach ($subcategories as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
								@endforeach
							</select>
							@error('horecataiment_outlet_type')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="ro" class="col-lg-5 col-form-label">RO <x-asteriks /></label>
						<div class="col-lg-7">
							<select class="form-control" wire:model.live='ro'>
								<option value="">-- Pilih --</option>
								@foreach ($dataro as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
								@endforeach
							</select>
							@error('ro')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="ao" class="col-lg-5 col-form-label">AO <x-asteriks /></label>
						<div class="col-lg-7">
							<select class="form-control" wire:model='ao'>
								<option value="">-- Pilih --</option>
								@foreach ($dataao as $key => $val)
									<option value="{{ $key }}">{{ $val }}</option>
								@endforeach
							</select>
							@error('ao')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="alamat" class="col-lg-5 col-form-label">Alamat <x-asteriks /></label>
						<div class="col-lg-7">
							<textarea name="alamat" id="alamat" class="form-control" wire:model='alamat'></textarea>
							@error('alamat')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="kecamatan" class="col-lg-5 col-form-label">Kecamatan</label>
						<div class="col-lg-7">
							<input id="kecamatan" name="kecamatan" type="text" class="form-control" autocomplete="off" wire:model='kecamatan'>
							@error('kecamatan')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="kelurahan" class="col-lg-5 col-form-label">Kelurahan</label>
						<div class="col-lg-7">
							<input id="kelurahan" name="kelurahan" type="text" class="form-control" autocomplete="off" wire:model='kelurahan'>
							@error('kelurahan')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="kabupaten_kota" class="col-lg-5 col-form-label">Kabupaten / Kota</label>
						<div class="col-lg-7">
							<input id="kabupaten_kota" name="kabupaten_kota" type="text" class="form-control" autocomplete="off" wire:model='kabupaten_kota'>
							@error('kabupaten_kota')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="brand_sugestion" class="col-lg-5 col-form-label">Brand Sugestion <x-asteriks /></label>
						<div class="col-lg-7">
							@php
							echo Form::select('brand_sugestion', $brands, '', [
								'placeholder' => '-- Pilih --',
								'class' => 'form-control',
								'wire:model' => 'brand_sugestion'
							]);
							@endphp
							@error('brand_sugestion')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="nama_pic_outlet" class="col-lg-5 col-form-label">Nama PIC Outlet <x-asteriks /></label>
						<div class="col-lg-7">
							<input id="nama_pic_outlet" name="nama_pic_outlet" type="text" class="form-control" autocomplete="off" wire:model='nama_pic_outlet'>
							@error('nama_pic_outlet')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="telp_pic_outlet" class="col-lg-5 col-form-label">Telp/Hp PIC Outlet <x-asteriks /></label>
						<div class="col-lg-7">
							<input id="telp_pic_outlet" type="number" class="form-control" autocomplete="off" wire:model='telp_pic_outlet'>
							@error('telp_pic_outlet')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="telp_pic_outlet_second" class="col-lg-5 col-form-label">Telp/Hp PIC Outlet 2
							(Optional)</label>
						<div class="col-lg-7">
							<input id="telp_pic_outlet_second" name="telp_pic_outlet_second" type="number" class="form-control numberOnly" autocomplete="off" wire:model='telp_pic_outlet_second'>
							@error('telp_pic_outlet_second')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="email_pic_outlet" class="col-lg-5 col-form-label">Email PIC Outlet</label>
						<div class="col-lg-7">
							<input id="email_pic_outlet" name="email_pic_outlet" type="email" class="form-control" autocomplete="off" wire:model='email_pic_outlet'>
							@error('email_pic_outlet')
							<span class="text-danger" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="instalasi_branding" class="col-lg-5 col-form-label">Instalasi Branding ?</label>
						<div class="col-lg-7">
							<span class="switch switch-icon">
								<label>
									<input type="checkbox" name="instalasi_branding" id="instalasi_branding" wire:model='instalasi_branding'/>
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

					<div class="row mb-3">
						<label for="kontrak_event" class="col-lg-5 col-form-label">Kontrak Event ?</label>
						<div class="col-lg-7">
							<span class="switch switch-icon">
								<label>
									<input type="checkbox" name="kontrak_event" id="kontrak_event" wire:model='kontrak_event'/>
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

					<div class="row mb-3">
						<label for="selling" class="col-lg-5 col-form-label">Selling ?</label>
						<div class="col-lg-7">
							<span class="switch switch-icon">
								<label>
									<input type="checkbox" name="selling" id="selling" wire:model='selling'/>
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
				<div class="modal-footer">
					<div wire:loading wire:target="createNewOutlet">
						<div class="spinner spinner-success mr-15"></div>
					</div>
					<button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
				</div>
			</form>
		</div>
    </div>
</div>