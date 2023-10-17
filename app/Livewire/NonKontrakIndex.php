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
#[Title('Non Kontrak')]

class NonKontrakIndex extends Component
{
	use WithPagination;

	public $search = "";
	public $status = "";

	public AkuisisiForm $form;

	public function createNewOutlet()
	{
		$this->form->store();

		$this->dispatch('close-modal');
		$this->js('alert("Yeay")');
	}

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
