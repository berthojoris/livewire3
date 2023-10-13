<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndonesianHoliday extends Model
{
    use HasFactory, QueryCacheable;

	protected $guarded = ['id'];

	protected $cacheFor = 86400;
	public $cachePrefix = 'cache_';
	public $cacheTags = ['IndonesianHoliday'];
	protected static $flushCacheOnUpdate = true;
}
