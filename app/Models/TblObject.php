<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TblObject extends Model
{
    use HasFactory;
    protected $table = 'tbl_objects';
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
