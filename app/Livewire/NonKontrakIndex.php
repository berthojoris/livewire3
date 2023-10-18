<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\Regional;
use Livewire\WithPagination;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\AkuisisiForm;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;
#[Title('Non Kontrak')]

class NonKontrakIndex extends Component
{
	use WithPagination;

	public $search = "";
	public $status = "";
	public $category;
	public $subcategories = [];

	public AkuisisiForm $form;

	public function createNewOutlet()
	{
		$this->form->store();

		$this->dispatch('close-modal');
		$this->js('alert("Saved")');
	}

	// public function updatedFormHorecataimentGroupType()
    // {
	// 	$this->form->horecataiment_outlet_type = collect();

    //     if(is_null($this->form->horecataiment_group_type) || $this->form->horecataiment_group_type == "") {
	// 		$this->form->horecataiment_outlet_type = HorecataimentOutletType::where('horecataiment_group_type_id', $this->form->horecataiment_group_type)->pluck('group_name', 'id');
	// 	}
	// 	logger("hehe");
    // }

    public function render()
    {
        return view('livewire.non-kontrak-index', [
			'statuses' => StatusTracking::pluck('status_name', 'id'),
			'horecataiment_group_type' => HorecataimentGroupType::pluck('group_name', 'id'),
			'brands' => Brand::where('status', 'ACTIVE')->pluck('merek', 'id'),
			'regional_office' => Regional::pluck('name', 'id')
		]);
    }

	public function closeModal()
	{
		$this->form->resetPage();
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
}
