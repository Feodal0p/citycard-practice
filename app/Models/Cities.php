<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities'

    public function tickets(): HasMany
    {
        return $this->hasMany(Tickets::class);
    }

    public function transport(): HasMany
    {
        return $this->hasMany(Transport::class);
    }
}
