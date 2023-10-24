<div>
	<form class="form" wire:submit='updateOutlet()'>
		<input type="hidden" wire:model='uuid'>
		<div class="card-body">
			<h3 class="font-size-lg text-dark font-weight-bold">Data outlet:</h3>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label">TP Code</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='tp_code'/>
					@error('tp_code')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Outlet Code</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='outlet_code'/>
					@error('outlet_code')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Outlet Name</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='outlet_name'/>
					@error('outlet_name')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Horecataiment Group Type</label>
				<div class="col-lg-8">
					@php
						echo Form::select('horecataiment_group_type', $this->categories, (is_null($outlet)) ? [] : $outlet->horecataiment_group_type, [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'horecataiment_group_type'
						]);
					@endphp
					@error('horecataiment_group_type')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Horeca Outlet Type</label>
				<div class="col-lg-8">
					@php
						echo Form::select('horecataiment_outlet_type', $subcategories, (is_null($outlet)) ? [] : $outlet->horecataiment_outlet_type, [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'horecataiment_outlet_type'
						]);
					@endphp
					@error('horecataiment_outlet_type')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Regional Office</label>
				<div class="col-lg-8">
					@php
						echo Form::select('ro', $this->dataro, (is_null($outlet)) ? [] : $outlet->ro, [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'ro'
						]);
					@endphp
					@error('ro')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Area Office</label>
				<div class="col-lg-8">
					@php
						echo Form::select('ao', $dataao, (is_null($outlet)) ? [] : $outlet->ao, [
							'placeholder' => '-- Pilih --',
							'class' => 'form-control',
							'wire:model' => 'ao'
						]);
					@endphp
					@error('ao')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Alamat</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='alamat'/>
					@error('alamat')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kecamatan</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='kecamatan'/>
					@error('kecamatan')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kelurahan</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='kelurahan'/>
					@error('kelurahan')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kabupaten Kota</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='kabupaten_kota'/>
					@error('kabupaten_kota')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Brand Suggestion</label>
				<div class="col-lg-8">
					@php
						echo Form::select('brand_sugestion', $brands, (is_null($outlet)) ? [] : $outlet->brand_sugestion, [
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

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Nama PIC Outlet</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='nama_pic_outlet'/>
					@error('nama_pic_outlet')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Telp PIC Outlet</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='telp_pic_outlet'/>
					@error('telp_pic_outlet')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Telp PIC Outlet 2 (Optional)</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='telp_pic_outlet_second'/>
					@error('telp_pic_outlet_second')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Email PIC Outlet</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='email_pic_outlet'/>
					@error('email_pic_outlet')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Instalasi Branding</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='instalasi_branding'/>
					@error('instalasi_branding')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Kontrak Event</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='kontrak_event'/>
					@error('kontrak_event')
					<span class="text-danger" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-lg-4 col-form-label">Selling</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" wire:model='selling'/>
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
					<button type="submit" class="btn btn-success float-right">Update</button>
				</div>
			</div>
		</div>

	</form>
</div>