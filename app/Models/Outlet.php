<?php

namespace App\Models;

use App\Models\User;
use App\Models\Esign;
use App\Models\Regional;
use App\Models\AreaOffice;
use App\Models\OutletDetail;
use App\Models\OutletMaintenance;
use App\Models\HorecataimentGroupType;
use App\Models\OutletDetailAttachment;
use App\Models\HorecataimentOutletType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;

	protected $guarded = ['id'];

	public function scopeAkuisisi(Builder $query): void
    {
        $query->whereNotIn('status', [6, 8, 10, 11, 5, 7]);
    }

	public function scopeKontrak(Builder $query): void
    {
        $query->whereNotIn('status', [1, 3, 4]);
    }

	public function detail()
    {
        return $this->hasOne(OutletDetail::class);
    }

	public function attachment()
    {
        return $this->hasOne(OutletDetailAttachment::class);
    }

	public function maintenance()
    {
        return $this->hasOne(OutletMaintenance::class);
    }

	public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function regional()
    {
        return $this->belongsTo(Regional::class, 'ro', 'id');
    }

	public function area()
    {
        return $this->belongsTo(AreaOffice::class, 'ao', 'id');
    }

	public function horecaGroup()
    {
        return $this->belongsTo(HorecataimentGroupType::class, 'horecataiment_group_type', 'id');
    }

	public function horecaOutlet()
    {
        return $this->belongsTo(HorecataimentOutletType::class, 'horecataiment_outlet_type', 'id');
    }

	public function statusTracking()
    {
        return $this->belongsTo(StatusTracking::class, 'status', 'id');
    }

	public function signed()
    {
        return $this->hasMany(Esign::class);
    }

	// protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => indonesianFullDayAndDate($value),
    //     );
    // }

	// protected function updatedAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => indonesianFullDayAndDate($value),
    //     );
    // }
}
