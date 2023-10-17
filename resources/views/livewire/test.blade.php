<div>

	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<h3 class="card-label">Sample
				<small>sub title</small></h3>
			</div>
		</div>
		<div class="card-body">
			<form wire:submit="createNewOutlet">
				<div class="row mb-3">
					<label for="tp_code" class="col-lg-5 col-form-label">TP Code</label>
					<div class="col-lg-7">
						<input type="text" class="form-control" autocomplete="off" wire:model='form.tp_code'>
						@error('form.tp_code')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="outlet_code" class="col-lg-5 col-form-label">Outlet Code</label>
					<div class="col-lg-7">
						<input id="outlet_code" name="outlet_code" type="text" class="form-control" autocomplete="off" wire:model='form.outlet_code'>
						@error('form.outlet_code')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="outlet_name" class="col-lg-5 col-form-label">Outlet Name <x-asteriks /></label>
					<div class="col-lg-7">
						<input id="outlet_name" name="outlet_name" type="text" class="form-control" autocomplete="off" wire:model='form.outlet_name'>
						@error('form.outlet_name')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="horecataiment_group_type" class="col-lg-5 col-form-label">Horecataiment Group Type <x-asteriks /></label>
					<div class="col-lg-7">
						@php
						echo Form::select('horecataiment_group_type', $horeca_group_type, '', [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'id' => 'horecataiment_group_type',
							'wire:model' => 'form.horecataiment_group_type'
						]);
						@endphp
						@error('form.horecataiment_group_type')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="horecataiment_outlet_type" class="col-lg-5 col-form-label">Horecataiment Outlet
						Type <x-asteriks /></label>
					<div class="col-lg-7">
						@php
						echo Form::select('horecataiment_outlet_type', [], '', [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'form.horecataiment_outlet_type'
						]);
						@endphp
						@error('form.horecataiment_outlet_type')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="ro" class="col-lg-5 col-form-label">RO <x-asteriks /></label>
					<div class="col-lg-7">
						@php
						echo Form::select('ro', $regional_office, '', [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'form.ro'
						]);
						@endphp
						@error('form.ro')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="ao" class="col-lg-5 col-form-label">AO <x-asteriks /></label>
					<div class="col-lg-7">
						@php
						echo Form::select('ao', [], '', [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'form.ao'
						]);
						@endphp
						@error('form.ao')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="alamat" class="col-lg-5 col-form-label">Alamat <x-asteriks /></label>
					<div class="col-lg-7">
						<textarea name="alamat" id="alamat" class="form-control" wire:model='form.alamat'></textarea>
						@error('form.alamat')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="kecamatan" class="col-lg-5 col-form-label">Kecamatan</label>
					<div class="col-lg-7">
						<input id="kecamatan" name="kecamatan" type="text" class="form-control" autocomplete="off" wire:model='form.kecamatan'>
						@error('form.kecamatan')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="kelurahan" class="col-lg-5 col-form-label">Kelurahan</label>
					<div class="col-lg-7">
						<input id="kelurahan" name="kelurahan" type="text" class="form-control" autocomplete="off" wire:model='form.kelurahan'>
						@error('form.kelurahan')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="kabupaten_kota" class="col-lg-5 col-form-label">Kabupaten / Kota</label>
					<div class="col-lg-7">
						<input id="kabupaten_kota" name="kabupaten_kota" type="text" class="form-control" autocomplete="off" wire:model='form.kabupaten_kota'>
						@error('form.kabupaten_kota')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="brand_sugestion" class="col-lg-5 col-form-label">Brand Sugestion <x-asteriks /></label>
					<div class="col-lg-7">
						<select class="form-control" id="brand_sugestion" name="brand_sugestion" wire:model='form.brand_sugestion'>
							<option value="">-- Pilih --</option>
							@foreach ($brands as $brand)
								<option value="{{ $brand->merek }}">{{ $brand->merek }}</option>
							@endforeach
						</select>
						@error('form.brand_sugestion')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="nama_pic_outlet" class="col-lg-5 col-form-label">Nama PIC Outlet <x-asteriks /></label>
					<div class="col-lg-7">
						<input id="nama_pic_outlet" name="nama_pic_outlet" type="text" class="form-control" autocomplete="off" wire:model='form.nama_pic_outlet'>
						@error('form.nama_pic_outlet')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="telp_pic_outlet" class="col-lg-5 col-form-label">Telp/Hp PIC Outlet <x-asteriks /></label>
					<div class="col-lg-7">
						<input id="telp_pic_outlet" name="telp_pic_outlet" type="number" class="form-control numberOnly" autocomplete="off" wire:model='form.telp_pic_outlet'>
						@error('form.telp_pic_outlet')
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
						<input id="telp_pic_outlet_second" name="telp_pic_outlet_second" type="number" class="form-control numberOnly" autocomplete="off" wire:model='form.telp_pic_outlet_second'>
						@error('form.telp_pic_outlet_second')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>

				<div class="row mb-3">
					<label for="email_pic_outlet" class="col-lg-5 col-form-label">Email PIC Outlet</label>
					<div class="col-lg-7">
						<input id="email_pic_outlet" name="email_pic_outlet" type="email" class="form-control" autocomplete="off" wire:model='form.email_pic_outlet'>
						@error('form.email_pic_outlet')
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
								<input type="checkbox" name="instalasi_branding" id="instalasi_branding" wire:model='form.instalasi_branding'/>
								<span></span>
							</label>
						</span>
						@error('form.instalasi_branding')
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
								<input type="checkbox" name="kontrak_event" id="kontrak_event" wire:model='form.kontrak_event'/>
								<span></span>
							</label>
						</span>
						@error('form.kontrak_event')
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
								<input type="checkbox" name="selling" id="selling" wire:model='form.selling'/>
								<span></span>
							</label>
						</span>
						@error('form.selling')
						<span class="text-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
			</form>
		</div>
	</div>
</div>
