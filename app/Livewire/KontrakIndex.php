<?php

namespace App\Livewire;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StatusTracking;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Kontrak')]

class KontrakIndex extends Component
{
	use WithPagination;

	public $search = "";
	public $status = "";

	public $name = "";
	public $email = "";
	public $course = "";

    public function render()
    {
		$statuses = StatusTracking::pluck('status_name', 'id');

        return view('livewire.kontrak-index', [
			'statuses' => $statuses
		]);
    }

	public function closeModal()
	{
		$this->resetInput();
	}

	public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->course = '';
    }

	public function updatingSearch()
    {
        $this->resetPage();
    }

	#[Computed()]
	public function listKontrak()
	{
		$query = Outlet::kontrak()->with(['regional', 'area', 'horecaGroup', 'horecaOutlet', 'statusTracking'])
		->when($this->search != "", function ($q) {
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
