<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class System extends Model
{
    use HasFactory;

    public function procurments(): HasMany
    {
        return $this->hasMany(Procurement::class);
    }
    
    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class);
    }

    public function configurations(): HasMany
    {
        return $this->hasMany(Configuration::class);
    }

    public function informations(): HasMany
    {
        return $this->hasMany(Information::class);
    }

    public function tblobjects(): HasMany
    {
        return $this->hasMany(TblObject::class);
    }

    public function whitelists(): HasMany
    {
        return $this->hasMany(Whitelist::class);
    }

    public function filterings(): HasMany
    {
        return $this->hasMany(Filtering::class);
    }
}
