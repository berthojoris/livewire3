<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class AkuisisiForm extends Form
{
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
	public $ro = '';

	#[Rule('required')]
	public $ao = '';

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

	#[Rule('required')]
	public $telp_pic_outlet = '';

	#[Rule('nullable')]
	public $telp_pic_outlet_second = '';

	#[Rule('email')]
	public $email_pic_outlet = '';

	#[Rule('required')]
	public $instalasi_branding = '';

	#[Rule('required')]
	public $kontrak_event = '';

	#[Rule('required')]
	public $selling = '';

	public function store()
    {
        $this->validate();
		$this->reset();
    }
}
