<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;

class Dropdown extends Component
{
	public $categories;
	public $subcategories = [];

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required')]
    public $category;

    #[Rule('required')]
    public $subcategory;

    public function mount()
    {
        $this->categories = HorecataimentGroupType::pluck('group_name', 'id');
        $this->subcategories = collect();
    }

    public function updatedCategory($value)
    {
		if(is_null($value)) {
			$this->subcategories = collect();
		} else {
			$this->subcategories = HorecataimentOutletType::where('horecataiment_group_type_id', $value)->pluck('outlet_name', 'id');
		}
    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
