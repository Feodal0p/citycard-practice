<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $table = 'transports';
    public $timestamps = false;
    protected $fillable = ['transport_type', 'route_number','route_description'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
