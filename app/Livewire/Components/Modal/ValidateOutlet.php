<?php

namespace App\Livewire\Components\Modal;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ValidateOutlet extends Component
{

	#[Rule('required')]
	public $uuid = '';

	#[Rule('nullable')]
	public $outlet_code = '';


	//===================================== UPDATE ===================================


	#[Rule('required')]
	public $nilai_score_card = '';

	#[Rule('required')]
	public $upload_score_card = '';

	#[Rule('required')]
	public $tanggal_terima_score_card = '';

	#[Rule('required')]
	public $form_validasi = '';

	#[Rule('required')]
	public $dokumentasi = '';

	#[Rule('required')]
	public $proposal = '';

	public ?Outlet $outlet;

    public function render()
    {
        return view('livewire.components.modal.validate-outlet');
    }

	#[On('open-modal-validasi')]
	public function openModalValidasi($uuid)
    {
		$this->resetErrorBag();
        $this->resetValidation();

		$outlet = Outlet::akuisisi()->whereUuid($uuid)->firstOrFail();

        $this->outlet = $outlet;

		$this->uuid = $outlet->uuid;
		$this->outlet_code = $outlet->outlet_code;

		$this->dispatch('show-validasi-modal');
	}

	public function submitValidasiOutlet()
	{
		//
	}
}
