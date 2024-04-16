<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function scopeTransactionReport($query, $month, $year)
    {

        return $query->with(['purchases' => function ($query) use ($month, $year) {
            $query->whereYear('created_at', $year)->whereMonth('created_at', $month);
        }, 'purchases.transaction']);
    }

}
