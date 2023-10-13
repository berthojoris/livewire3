<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;

#[Title('Kontrak')]

class KontrakIndex extends Component
{
	use WithPagination;

    public function render()
    {
		$outlets = Outlet::kontrak()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])->paginate(10);
		$statuses = StatusTracking::pluck('status_name', 'id');

        return view('livewire.kontrak-index', [
			'outlets' => $outlets,
			'statuses' => $statuses
		]);
    }
}
