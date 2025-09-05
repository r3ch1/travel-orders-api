<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Modules\TravelOrder\Enums\Status;

class TravelOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant_name',
        'user_id',
        'destination',
        'departure_at',
        'return_at',
        'status'
    ];

    protected $casts = [
        'departure_at' => 'datetime',
        'return_at' => 'datetime',
    ];

    protected $attributes = [
        'status' => Status::Requested->value,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
