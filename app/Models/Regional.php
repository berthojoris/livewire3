<?php

namespace App\Models;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regional extends Model
{
	protected $guarded = ['id'];
    use HasFactory;

	public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
