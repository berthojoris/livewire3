<?php

namespace App\Models;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutletDetail extends Model
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

	// protected function nilaiKontrakBranding(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
    //     );
    // }

	// protected function nilaiKontrakEvent(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
    //     );
    // }

	// protected function proposalOutlet(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => onlyNumberAccepted($value),
    //     );
    // }

	// protected function estimasiNilaiBranding(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
    //     );
    // }

	// protected function estimasiNilaiEvent(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
    //     );
    // }

	// protected function totalNilaiKontrak(): Attribute
    // {
    //     return Attribute::make(
	// 		set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
    //     );
    // }

	protected function rangeNegosiasiMin(): Attribute
    {
        return Attribute::make(
			set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
        );
    }

	protected function rangeNegosiasiMax(): Attribute
    {
        return Attribute::make(
			set: fn (string $value) => (is_null(onlyNumberAccepted($value)) || empty(onlyNumberAccepted($value))) ? 0 : onlyNumberAccepted($value),
        );
    }
}
