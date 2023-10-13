<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acquisition extends Model
{
    use HasFactory;

	protected $guarded = ['id'];
}
