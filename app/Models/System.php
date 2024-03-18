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

    public function directories(): HasMany
    {
        return $this->hasMany(Directory::class);
    }
    public function informations(): HasMany
    {
        return $this->hasMany(Information::class);
    }

    public function tblobects(): HasMany
    {
        return $this->hasMany(TblObject::class);
    }

    public function whitelists(): HasMany
    {
        return $this->hasMany(Whitelist::class);
    }
}
