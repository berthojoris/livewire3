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
	public $bintang = '';

	#[Rule('required')]
	public $kuadran = [];

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
		$this->reset();

		$outlet = Outlet::akuisisi()->whereUuid($uuid)->firstOrFail();

        $this->outlet = $outlet;

		$this->uuid = $outlet->uuid;
		$this->outlet_code = $outlet->outlet_code;

		$this->dispatch('show-validasi-modal');
	}

	public function updatedNilaiScoreCard($value)
    {
		if(is_null($value)) {
			$this->bintang = '';
			$this->kuadran = '';
		} else {
			if(preg_match("/(^\d)\.(\d{1,2})$/", $value)) {
				if(bintang($value) == 5) {
					$this->bintang = 5;
					$this->kuadran = [1,5,9,13];
				} else if(bintang($value) == 4) {
					$this->bintang = 4;
					$this->kuadran = [2,6,10,14];
				} else if(bintang($value) == 3) {
					$this->bintang = 3;
					$this->kuadran = [3,7,11,15];
				} else if(bintang($value) == 2) {
					$this->bintang = 2;
					$this->kuadran = [4,8,12,16];
				} else {
					$this->bintang = 1;
					$this->kuadran = collect();
				}
			} else {
				$this->bintang = '';
				$this->kuadran = collect();
			}
		}
    }

	public function submitValidasiOutlet()
	{
		$validated = $this->validate();
	}
}
