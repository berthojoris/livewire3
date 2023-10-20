<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use App\Models\AreaOffice;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;

#[Title('Non Kontrak')]

class NonKontrakIndex extends Component
{
	use WithPagination;

	public $search = "";
	public $status = "";

	public $categories;
	public $subcategories = [];

	public $outlet = "";

	public $dataro;
	public $dataao = [];

	public $updateHot = [];
	public $updateAo = [];

	#[Rule('nullable')]
    public $tp_code = '';

	#[Rule('nullable')]
	public $outlet_code = '';

	#[Rule('required')]
	public $outlet_name = '';

	#[Rule('required')]
	public $horecataiment_group_type;

	#[Rule('required')]
	public $horecataiment_outlet_type = [];

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

	public function createNewOutlet()
	{
		$validated = $this->validate();

		$validated['user_id'] = auth()->user()->id;
		$validated['status'] = 1;
		$validated['uuid'] = Str::uuid();

		Outlet::create($validated);

		$this->saved();
	}

	public function saved()
	{
		$this->reset();
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->dispatch('saved');
	}

	public function mount()
    {
        $this->categories = HorecataimentGroupType::pluck('group_name', 'id');
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

    public function render()
    {
        return view('livewire.non-kontrak-index', [
			'statuses' => StatusTracking::pluck('status_name', 'id'),
			'brands' => Brand::where('status', 'ACTIVE')->pluck('merek', 'id'),
		]);
    }

	public function closeModal()
	{
		$this->reset();
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->dispatch('close-modal');
	}

	#[Computed()]
	public function listKontrak()
	{
		$query = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->when($this->search != "", function ($q) {
			if($this->status == "") {
				return $q->where('outlet_name', 'like', "%{$this->search}%");
			} else {
				return $q->where('outlet_name', 'like', "%{$this->search}%")->where('status', $this->status);
			}
		})->when($this->status != "", function ($q) {
			if($this->search == "") {
				return $q->where('status', $this->status);
			} else {
				return $q->where('status', $this->status)->where('outlet_name', 'like', "%{$this->search}%");
			}
		})->paginate(10);

		return $query;
	}

	public function openModalAkuisisi($uuid)
	{
		$outlet = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->whereUuid($uuid)->firstOrFail();
		$this->outlet = $outlet->toArray();

		$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $outlet->horecataiment_group_type)->pluck('outlet_name', 'id');
		$this->updateAo = AreaOffice::where('regional_id', $outlet->ro)->pluck('name', 'id');

		$this->dispatch('open_modal_akuisisi');
	}
}
