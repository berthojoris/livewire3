<?php

namespace App\Livewire\Components\Modal;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\OutletDetail;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class ValidateOutlet extends Component
{

	use WithFileUploads;

	public $dataKuadran = [];

	#[Rule('required')]
	public $uuid = '';

	#[Rule('required')]
	public $outlet_id = '';

	#[Rule('nullable')]
	public $outlet_code = '';


	//===================================== UPDATE ===================================

	public ?Outlet $outlet;

	#[Rule('required')]
	public $nilai_score_card = '';

	#[Rule('required')]
	public $bintang = '';

	#[Rule('required')]
	public $kuadran = '';

	#[Rule('required|file|max:3024')]
	public $upload_score_card;

	#[Rule('required')]
	public $tanggal_terima_score_card = '';

	#[Rule('required|file|max:3024')]
	public $form_validasi;

	#[Rule('required|file|max:3024')]
	public $dokumentasi;

	#[Rule('required|file|max:3024')]
	public $proposal;

	#[Rule('nullable')]
	public $landmark = '';

	#[Rule('nullable')]
	public $signed_outdoor = '';

	#[Rule('nullable')]
	public $gate = '';

	#[Rule('nullable')]
	public $parking_space = '';

	#[Rule('nullable')]
	public $facade = '';

	#[Rule('nullable')]
	public $entrance_wall_branding = '';

	#[Rule('nullable')]
	public $info_board = '';

	#[Rule('nullable')]
	public $concierge_table = '';

	#[Rule('nullable')]
	public $stage_wall_branding = '';

	#[Rule('nullable')]
	public $dj_booth = '';

	#[Rule('nullable')]
	public $frame_screen = '';

	#[Rule('nullable')]
	public $totem = '';

	#[Rule('nullable')]
	public $dining_wall_branding_indoor = '';

	#[Rule('nullable')]
	public $dining_wall_branding_outdoor = '';

	#[Rule('nullable')]
	public $tv_frame_branding_dining_area = '';

	#[Rule('nullable')]
	public $bar_wall_branding_indoor = '';

	#[Rule('nullable')]
	public $tv_frame_branding_bar_area = '';

	#[Rule('nullable')]
	public $cigaret_cabinet = '';

	#[Rule('nullable')]
	public $mirror_sticker = '';

	#[Rule('nullable')]
	public $restroom_wall_branding = '';

	#[Rule('nullable')]
	public $table_ashtray = '';

	#[Rule('nullable')]
	public $standing_asthray = '';

	#[Rule('nullable')]
	public $fsu = '';

	#[Rule('nullable')]
	public $sitting_corner = '';

	#[Rule('nullable')]
	public $charging_station = '';

	#[Rule('nullable')]
	public $table_set = '';

	#[Rule('nullable')]
	public $selling_display_booth = '';

	#[Rule('nullable')]
	public $upload_form_branding = '';

	#[Rule('nullable')]
	public $no_po_branding = '';

	#[Rule('nullable')]
	public $upload_po_branding = '';

	#[Rule('nullable')]
	public $nomor_kontrak_branding = '';

	#[Rule('nullable')]
	public $upload_kontrak_branding = '';

	#[Rule('nullable')]
	public $nilai_kontrak_branding = '';

	//========================================================================================================

	public function submitValidasiOutlet()
	{
		$validated = $this->validate();

		if($this->upload_score_card) {
			$validated['upload_score_card'] = $this->upload_score_card->store('akuisisi');
		}

		if($this->form_validasi) {
			$validated['form_validasi'] = $this->form_validasi->store('akuisisi');
		}

		if($this->dokumentasi) {
			$validated['dokumentasi'] = $this->dokumentasi->store('akuisisi');
		}

		if($this->proposal) {
			$validated['proposal'] = $this->proposal->store('akuisisi');
		}

		$validated['user_id'] = auth()->user()->id;

		OutletDetail::create($validated);

		Outlet::find($this->outlet_id)->update([
			'status' => 3
		]);

		$this->saved();
	}

	public function saved()
	{
        $this->resetErrorBag();
        $this->resetValidation();
		$this->reset();
		$this->dispatch('savedValidasi');
	}

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
		$this->outlet_id = $outlet->id;
		$this->outlet_code = $outlet->outlet_code;

		$this->dispatch('show-validasi-modal');
	}

	public function updatedNilaiScoreCard($value)
    {
		if(is_null($value)) {
			$this->bintang = '';
			$this->dataKuadran = collect();
		} else {
			if(preg_match("/(^\d)\.(\d{1,2})$/", $value)) {
				if(bintang($value) == 5) {
					$this->bintang = 5;
					$this->dataKuadran = [1,5,9,13];
				} else if(bintang($value) == 4) {
					$this->bintang = 4;
					$this->dataKuadran = [2,6,10,14];
				} else if(bintang($value) == 3) {
					$this->bintang = 3;
					$this->dataKuadran = [3,7,11,15];
				} else if(bintang($value) == 2) {
					$this->bintang = 2;
					$this->dataKuadran = [4,8,12,16];
				} else {
					$this->bintang = 1;
					$this->dataKuadran = collect();
				}
			} else {
				$this->bintang = '';
				$this->dataKuadran = collect();
			}
		}
    }
}
