<?php

namespace App\Models;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutletDetailAttachment extends Model
{
    use HasFactory;

	protected $guarded = ['id'];

	public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
