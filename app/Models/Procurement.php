<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Casts\MoneyCast;
class Procurement extends Model
{
    use HasFactory;
    protected $casts = [
        'price' => MoneyCast::class,
    ];

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
