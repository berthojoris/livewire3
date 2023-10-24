<?php

namespace App\Livewire\Components\Modal;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\HorecataimentGroupType;

class CreateOutlet extends Component
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

	public $outlet = [];

    public function render()
    {
        return view('livewire.components.modal.create-outlet');
    }

    public function mount()
    {
        $this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->brands = Brand::where('status', 'ACTIVE')->pluck('merek', 'id');
        $this->subcategories = collect();

		$this->dataro = Regional::pluck('name', 'id');
        $this->dataao = collect();
    }

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
		$this->categories = HorecataimentGroupType::pluck('group_name', 'id');
		$this->dataro = Regional::pluck('name', 'id');
		$this->dispatch('saved');
        $this->reset();
	}

    public function closeModal()
	{
        $this->reset();
	}
}
