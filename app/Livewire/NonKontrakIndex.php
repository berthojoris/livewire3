<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\HorecataimentGroupType;
#[Title('Non Kontrak')]

class NonKontrakIndex extends Component
{
	public $search = "";
	public $status = "";

	#[Rule(['required'])]
	public $tp_code = "";

	public $outlet_code = "";
	public $outlet_name = "";
	public $horecataiment_group_type = [];
	public $horecataiment_outlet_type = [];
	public $ro = [];
	public $ao = [];
	public $alamat = "";
	public $kecamatan = "";
	public $kelurahan = "";
	public $kabupaten_kota = "";
	public $brand_sugestion = [];
	public $nama_pic_outlet = "";
	public $telp_pic_outlet = "";
	public $telp_pic_outlet_second = "";
	public $email_pic_outlet = "";
	public $instalasi_branding = "";
	public $kontrak_event = "";
	public $selling = "";


	use WithPagination;

    public function render()
    {
		$statuses = StatusTracking::pluck('status_name', 'id');
		$brands = Brand::where('status', 'ACTIVE')->get();
		$regional_office = Regional::pluck('name', 'id');
		$horeca_group_type = HorecataimentGroupType::pluck('group_name', 'id');

        return view('livewire.non-kontrak-index', [
			'statuses' => $statuses,
			'horeca_group_type' => $horeca_group_type,
			'brands' => $brands,
			'regional_office' => $regional_office
		]);
    }

	public function closeModal()
	{
		$this->resetInput();
		$this->dispatch('close-modal');
	}

	public function resetInput()
    {
        $this->tp_code = "";
        $this->outlet_code = "";
        $this->outlet_name = "";
        $this->horecataiment_group_type = [];
        $this->horecataiment_outlet_type = [];
        $this->ro = [];
        $this->ao = [];
        $this->alamat = "";
        $this->kecamatan = "";
        $this->kelurahan = "";
        $this->kabupaten_kota = "";
        $this->brand_sugestion = [];
        $this->nama_pic_outlet = "";
        $this->telp_pic_outlet = "";
        $this->telp_pic_outlet_second = "";
        $this->email_pic_outlet = "";
        $this->instalasi_branding = "";
        $this->kontrak_event = "";
        $this->selling = "";
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

	protected function rules()
    {
        return [
            'tp_code' => 'nullable',
			'outlet_code' => 'nullable',
			'outlet_name' => 'required',
			'horecataiment_group_type' => 'required',
			'horecataiment_outlet_type' => 'required',
			'ro' => 'required',
			'ao' => 'required',
			'alamat' => 'required',
			'kecamatan' => 'required',
			'kelurahan' => 'required',
			'kabupaten_kota' => 'required',
			'brand_sugestion' => 'required',
			'nama_pic_outlet' => 'required',
			'telp_pic_outlet' => 'required',
			'telp_pic_outlet_second' => 'nullable',
			'instalasi_branding' => 'nullable',
			'kontrak_event' => 'nullable',
			'selling' => 'nullable',
            'email_pic_outlet' => ['nullable','email'],
        ];
    }

	public function save()
	{
		$validatedData = $this->validate();

		$this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
		$this->js("alert('yeah')");
	}
}
