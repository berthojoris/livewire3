<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use App\Models\AreaOffice;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;

class UpdateAkuisisi extends Component
{
	public $search = "";
	public $status = "";

	public $categories = [];
	public $subcategories = [];
	public $brands = [];

	public $dataro = [];
	public $dataao = [];

	#[Rule('required')]
	public $uuid = "";

	#[Rule('nullable')]
    public $tp_code = '';

	#[Rule('nullable')]
	public $outlet_code = '';

	#[Rule('required')]
	public $outlet_name = '';

	#[Rule('required')]
	public $horecataiment_group_type = '';

	#[Rule('required')]
	public $horecataiment_outlet_type = '';

	#[Rule('required')]
	public $ro;

	#[Rule('required')]
	public $ao = [];

	#[Rule('required')]
	public $alamat = '';

	#[Rule('nullable')]
	public $kecamatan = '';

	#[Rule('nullable')]
	public $kelurahan = '';

	#[Rule('nullable')]
	public $kabupaten_kota = '';

	#[Rule('required')]
	public $brand_sugestion = '';

	#[Rule('required')]
	public $nama_pic_outlet = '';

	#[Rule('required', message: 'Telp pic outlet field is required')]
	#[Rule('regex:/^[0-9]+$/', message: 'Telp pic only accept numbers')]
	public $telp_pic_outlet = '';

	#[Rule('nullable')]
	public $telp_pic_outlet_second = '';

	#[Rule('email')]
	public $email_pic_outlet = '';

	#[Rule('nullable')]
	public $instalasi_branding = '';

	#[Rule('nullable')]
	public $kontrak_event = '';

	#[Rule('nullable')]
	public $selling = '';

	public $outlet = [];

    public function render()
    {
        return view('livewire.update-akuisisi');
    }

	public function mount()
    {
        $this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->brands = Brand::where('status', 'ACTIVE')->pluck('merek', 'id');
        $this->subcategories = collect();

		$this->dataro = Regional::pluck('name', 'id');
        $this->dataao = collect();
    }

	public function updatedHorecataimentGroupType($value)
    {
		if(is_null($value)) {
			$this->subcategories = collect();
		} else {
			$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $value)->pluck('outlet_name', 'id');
		}
    }

	public function updatedRo($value)
    {
		if(is_null($value)) {
			$this->dataao = collect();
		} else {
			$this->dataao = AreaOffice::where('regional_id', $value)->pluck('name', 'id');
		}
    }

	public function closeAkuisisi()
	{
		$this->resetErrorBag();
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->reset();
		$this->dispatch('close-akuisisi');
	}

	#[On('get-outlet-data')]
	public function openModalAkuisisi($uuid)
	{
		$this->outlet = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->whereUuid($uuid)->firstOrFail();

		$this->uuid = $this->outlet->uuid;
		$this->tp_code = $this->outlet->tp_code;
		$this->outlet_code = $this->outlet->outlet_code;
		$this->outlet_name = $this->outlet->outlet_name;
		$this->alamat = $this->outlet->alamat;
		$this->kelurahan = $this->outlet->kelurahan;
		$this->kecamatan = $this->outlet->kecamatan;
		$this->kabupaten_kota = $this->outlet->kabupaten_kota;
		$this->nama_pic_outlet = $this->outlet->nama_pic_outlet;
		$this->telp_pic_outlet = $this->outlet->telp_pic_outlet;
		$this->telp_pic_outlet_second = $this->outlet->telp_pic_outlet_second;
		$this->email_pic_outlet = $this->outlet->email_pic_outlet;
		$this->instalasi_branding = $this->outlet->instalasi_branding;
		$this->kontrak_event = $this->outlet->kontrak_event;
		$this->selling = $this->outlet->selling;
		$this->horecataiment_group_type = $this->outlet->horecataiment_group_type;
		$this->ro = $this->outlet->ro;
		$this->brand_sugestion = $this->outlet->brand_sugestion;
		$this->horecataiment_outlet_type = $this->outlet->horecataiment_outlet_type;
		$this->ao = $this->outlet->ao;

		$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $this->outlet->horecataiment_group_type)->pluck('outlet_name', 'id');
		$this->dataao = AreaOffice::where('regional_id', $this->outlet->ro)->pluck('name', 'id');

		$this->dispatch('open_modal_akuisisi', uuid: $uuid);
	}

	public function updateOutlet()
	{
		$validated = $this->validate();

		logger($validated);

		Outlet::whereUuid($validated['uuid'])->update();

		$this->updated();
	}

	public function updated()
	{
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->reset();
		$this->dispatch('close-akuisisi');
	}
}
