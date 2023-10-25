<?php

namespace App\Livewire\Components\Modal;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use App\Models\AreaOffice;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;

class UpdateOutlet extends Component
{
	public $categories = [];
	public $subcategories = [];
	public $brands = [];

	public $dataro = [];
	public $dataao = [];

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

	#[Rule('nullable')]
	public $uuid = '';

	public ?Outlet $outlet;

    public function render()
    {
        return view('livewire.components.modal.update-outlet');
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

	public function mount()
    {
        $this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->brands = Brand::where('status', 'ACTIVE')->pluck('merek', 'id');
		$this->dataro = Regional::pluck('name', 'id');

		$this->subcategories = collect();
		$this->dataao = collect();
    }

	#[On('open-modal-update')]
    public function openModalCreate($uuid)
    {
        $this->resetErrorBag();
        $this->resetValidation();

		$outlet = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->whereUuid($uuid)->firstOrFail();

        $this->outlet = $outlet;

        $this->uuid = $outlet->uuid;
        $this->tp_code = $outlet->tp_code;
		$this->outlet_code = $outlet->outlet_code;
		$this->outlet_name = $outlet->outlet_name;
		$this->alamat = $outlet->alamat;
		$this->kelurahan = $outlet->kelurahan;
		$this->kecamatan = $outlet->kecamatan;
		$this->kabupaten_kota = $outlet->kabupaten_kota;
		$this->nama_pic_outlet = $outlet->nama_pic_outlet;
		$this->telp_pic_outlet = $outlet->telp_pic_outlet;
		$this->telp_pic_outlet_second = $outlet->telp_pic_outlet_second;
		$this->email_pic_outlet = $outlet->email_pic_outlet;
		$this->instalasi_branding = $outlet->instalasi_branding;
		$this->kontrak_event = $outlet->kontrak_event;
		$this->selling = $outlet->selling;
		$this->horecataiment_group_type = $outlet->horecataiment_group_type;
		$this->ro = $outlet->ro;
		$this->brand_sugestion = $outlet->brand_sugestion;
		$this->horecataiment_outlet_type = $outlet->horecataiment_outlet_type;
		$this->ao = $outlet->ao;

		$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $outlet->horecataiment_group_type)->pluck('outlet_name', 'id');
		$this->dataao = AreaOffice::where('regional_id', $outlet->ro)->pluck('name', 'id');

        $this->dispatch('show-update-modal');
    }

	public function updateData()
	{
		$validated = $this->validate();
		$outlet = Outlet::whereUuid($validated['uuid'])->firstOrFail();
		$outlet->update($validated);
		$this->updateForm();
	}

	public function updateForm()
	{
		$this->dispatch('outlet-created');
		$this->dispatch('updated');
	}

	public function closeModal()
	{
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
	}
}
