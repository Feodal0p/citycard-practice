<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    public $timestamps = false;
    protected $fillable = ['type', 'transport_type', 'price'];

    public function transaction(): HasMany
    {
        return $this->hasMany(TransactionHistory::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
