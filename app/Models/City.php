<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';
    public $timestamps = false;
    protected $fillable = ['name', 'region'];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function transports(): HasMany
    {
        return $this->hasMany(Transport::class);
    }
}
