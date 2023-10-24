<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use App\Models\AreaOffice;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
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

	public $outlet;

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

	#[On('AutoRefresh')]
	public function refreshPage($data = null)
	{
		$this->resetErrorBag();
		$this->dispatch('render');
	}

    public function render()
    {
        return view('livewire.non-kontrak-index', [
			'statuses' => StatusTracking::pluck('status_name', 'id'),
		]);
    }

	public function closeModal()
	{
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->reset();
		$this->dispatch('close-modal');
		$this->dispatch('close-akuisisi');
	}

	public function reloadData()
	{
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->brands = Brand::where('status', 'ACTIVE')->pluck('merek', 'id');
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
		$this->reloadData();

		$this->outlet = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->whereUuid($uuid)->firstOrFail();

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

		$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $this->outlet->horecataiment_group_type)->pluck('outlet_name', 'id');
		$this->dataao = AreaOffice::where('regional_id', $this->outlet->ro)->pluck('name', 'id');

		$this->dispatch('open_modal_akuisisi');
	}

	public function updateOutlet($uuid)
	{
		dd($uuid);
		$validated = $this->validate();

		$validated['user_id'] = auth()->user()->id;
		$validated['status'] = 1;

		$updated = Outlet::whereUuid($uuid)->firstOrFail();
		$updated->update($updated);

		$this->saved();
	}
}
