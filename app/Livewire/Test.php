<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Regional;
use App\Models\StatusTracking;
use App\Livewire\Forms\AkuisisiForm;
use App\Models\HorecataimentGroupType;

class Test extends Component
{
    public function render()
    {
		$statuses = StatusTracking::pluck('status_name', 'id');
		$brands = Brand::where('status', 'ACTIVE')->get();
		$regional_office = Regional::pluck('name', 'id');
		$horeca_group_type = HorecataimentGroupType::pluck('group_name', 'id');

        return view('livewire.test', [
			'statuses' => $statuses,
			'horeca_group_type' => $horeca_group_type,
			'brands' => $brands,
			'regional_office' => $regional_office
		]);
    }

	public AkuisisiForm $form;

	public function createNewOutlet()
	{
		$this->form->store();

		$this->dispatch('close-modal');
		$this->js('alert("Yeay")');
	}
}
