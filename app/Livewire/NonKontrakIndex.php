<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;
#[Title('Non Kontrak')]

class NonKontrakIndex extends Component
{
	public $submitRepo;

	use WithPagination;

    public function render()
    {
		$outlets = Outlet::akuisisi()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->paginate(10);
		$statuses = StatusTracking::pluck('status_name', 'id');

        return view('livewire.non-kontrak-index', [
			'outlets' => $outlets,
			'statuses' => $statuses
		]);
    }
}
